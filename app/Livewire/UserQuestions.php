<?php

namespace App\Livewire;

use livewire\Attributes\Validate;
use App\Models\Category;
use App\Models\Question;
use App\Models\Respondent;
use Livewire\Component;
use illuminate\Support\Str;

class UserQuestions extends Component
{
    public $respondentName;
    public $respondentGender;
    public $email;
    public $questionUsing;
    public $questionInterest;
    public $questionLong;

    public $answers = [];


    public function updated($questionId, $value)
    {
        $this->answers[$questionId] = $value;
    }

    public function submit()
    {
        $this->validate([
            'respondentName' => 'required',
            'respondentGender' => 'required',
            'email' => 'required|email'
        ]);

        $questionIds = array_keys(array_filter($this->answers, function ($key) {
            return is_numeric($key);
        }, ARRAY_FILTER_USE_KEY));

        $answers = array_intersect_key($this->answers, array_flip($questionIds));
        $respondentName = $this->answers['respondentName'];
        $respondentGender = $this->answers['respondentGender'];
        $email = $this->answers['email'];

        $uniqueCode = $this->generateUniqueCode();

        foreach ($questionIds as $questionId) {
            Respondent::create([
                'respondent_code' => $uniqueCode,
                'name' => $respondentName,
                'gender' => $respondentGender,
                'email' => $email,
                'question_id' => $questionId,
                'answer' => $answers[$questionId],
            ]);
        }

        $this->resetForm();

        session()->flash('success', 'Terimakasih telah bersedia mengisi kuisioner ini.');
    }

    public function resetForm()
    {
        $this->reset('respondentName', 'respondentGender', 'email', 'questionUsing', 'questionInterest', 'questionLong');
        $this->answers = [];
    }

    public function optionCategory($category)
    {
        if ($category == "control") {
            return "efisien";
        } else {
            return "baik";
        }
    }

    public function generateUniqueCode()
    {
        $uniqueCode = Str::random(20);

        while (Respondent::where('respondent_code', $uniqueCode)->exists()) {
            $uniqueCode = Str::random(20);
        }

        return $uniqueCode;
    }

    public function render()
    {
        $categories = Category::with('questions')->get();
        return view('user.livewire.user-questions', [
            'categories' => $categories
        ]);
    }
}
