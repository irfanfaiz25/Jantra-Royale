<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Question;
use App\Models\Respondent;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class ResultTable extends Component
{

    public $results = [];
    public $categories = [];
    public $answerCounts = [];
    public $totalRespondents;

    public function render()
    {
        return view('livewire.result-table');
    }

    public function mount()
    {
        $this->calculateResults();
    }

    public function calculateResults()
    {
        // Get the total number of unique respondents
        $this->totalRespondents = Respondent::distinct('respondent_code')->count();

        // Initialize an array to hold the final results and answer counts
        $this->results = [];
        $this->answerCounts = [];

        // Get all categories with their questions
        $this->categories = Category::with('questions')->get();

        foreach ($this->categories as $category) {
            $categoryId = $category->id;
            $totalQuestionsInCategory = $category->questions->count();

            // Initialize sum for the category and answer count array
            $categorySum = 0;
            $this->answerCounts[$categoryId] = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];

            // Get all respondents' answers for the current category
            $answers = DB::table('respondents')
                ->join('questions', 'respondents.question_id', '=', 'questions.id')
                ->where('questions.category_id', $categoryId)
                ->select('respondents.answer', DB::raw('count(*) as total'))
                ->groupBy('respondents.answer')
                ->get();

            // Calculate the sum for the category and count answers
            foreach ($answers as $answer) {
                $this->answerCounts[$categoryId][$answer->answer] = $answer->total;
                $categorySum += $answer->answer * $answer->total;
            }

            // Calculate the final result for the category
            $this->results[$categoryId] = $categorySum / ($totalQuestionsInCategory * $this->totalRespondents);
        }
    }

    public function getConclusion($score)
    {
        if ($score <= 1.79) {
            return 'Sangat Tidak Puas';
        } elseif ($score <= 2.59) {
            return 'Tidak Puas';
        } elseif ($score <= 3.3) {
            return 'Cukup Puas';
        } elseif ($score <= 4.91) {
            return 'Puas';
        } else {
            return 'Sangat Puas';
        }
    }

    public function getConclusionColor($score)
    {
        if ($score <= 1.79) {
            return 'bg-red-500';
        } elseif ($score <= 2.59) {
            return 'bg-yellow-500';
        } elseif ($score <= 3.3) {
            return 'bg-gray-500';
        } elseif ($score <= 4.91) {
            return 'bg-blue-500';
        } else {
            return 'bg-green-500';
        }
    }

    public function exportAnalyze()
    {
        $results = $this->results;
        $categories = $this->categories;
        $answerCounts = $this->answerCounts;
        $totalRespondents = $this->totalRespondents;

        // Ensure DOMPDF options are set correctly
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Create a new DOMPDF instance
        $dompdf = new Dompdf($options);

        // Load the HTML from a view
        $html = View::make('admin.pdf.analyze-report', [
            'results' => $results,
            'categories' => $categories,
            'answerCounts' => $answerCounts,
            'totalRespondents' => $totalRespondents,
        ])->render();

        // Load HTML to DOMPDF
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the PDF
        $dompdf->render();

        // Output the PDF to the browser
        return response()->streamDownload(
            function () use ($dompdf) {
                echo $dompdf->output();
            },
            'analyze-report.pdf'
        );
    }
}
