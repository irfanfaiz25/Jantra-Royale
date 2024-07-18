<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Respondent;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;


class RespondenTable extends Component
{
    use WithPagination;

    public $questionsGroupedByCategory;
    public $respondents;

    public $isConfirmationModalShow = false;
    public $deleteCode;

    public $isDetailsModalShow = false;
    public $detailName;
    public $detailEmail;
    public $detailGender;

    public $reportData = [];

    public function mount()
    {
        $this->refreshData();
    }

    #[On('respondent-deleted')]
    public function deleteAlert($is_deleted)
    {
        if ($is_deleted) {
            $this->refreshData();
            session()->flash('success', 'Data responden berhasil di hapus!');
        }
    }

    public function refreshData()
    {
        $questions = Question::with('category')->get();

        $this->questionsGroupedByCategory = $questions->groupBy('category.name')->all();

        $respondents = Respondent::all()->groupBy('respondent_code');

        $this->respondents = $respondents->map(function ($respondentGroup) {
            $data = [
                'respondent_id' => $respondentGroup->first()->id,
                'respondent_code' => $respondentGroup->first()->respondent_code,
                'respondent_name' => $respondentGroup->first()->name,
                'respondent_email' => $respondentGroup->first()->email,
                'respondent_gender' => $respondentGroup->first()->gender,
            ];

            foreach ($respondentGroup as $respondent) {
                $answer = $respondent->answer;
                $answer_code = $answer ?? 'N/A';

                $data['Q' . $respondent->question_id] = $answer_code;
            }

            $this->reportData = $data;

            return $data;
        });
    }

    public function setConfirmationModalOpen($code)
    {
        $this->isConfirmationModalShow = true;
        $this->deleteCode = $code;
    }

    public function setConfirmationModalClose()
    {
        $this->isConfirmationModalShow = false;
        $this->reset('deleteCode');
    }

    public function setDetailsModalOpen($id)
    {
        $this->isDetailsModalShow = true;

        $respondent = Respondent::find($id);
        $this->detailName = $respondent->name;
        $this->detailEmail = $respondent->email;
        $this->detailGender = $respondent->gender;
    }

    public function setDetailsModalClose()
    {
        $this->isDetailsModalShow = false;
        $this->reset('detailName', 'detailEmail', 'detailGender');
    }

    public function deleteRespondent()
    {
        Respondent::where('respondent_code', $this->deleteCode)->delete();

        $this->setConfirmationModalClose();
        $this->dispatch('respondent-deleted', is_deleted: true);
    }

    public function exportReport()
    {
        $data = $this->reportData;

        // Ensure DOMPDF options are set correctly
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Create a new DOMPDF instance
        $dompdf = new Dompdf($options);

        // Load the HTML from a view
        $html = View::make('admin.pdf.report', [
            'data' => $data,
            'respondents' => $this->respondents,
            'questionsGroupedByCategory' => $this->questionsGroupedByCategory
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
            'respondent_table.pdf'
        );
    }

    public function render()
    {
        return view('admin.livewire.responden-table', [
            'respondents' => $this->respondents,
            'questionsGroupedByCategory' => $this->questionsGroupedByCategory,
        ]);
    }
}
