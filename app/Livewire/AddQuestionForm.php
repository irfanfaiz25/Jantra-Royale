<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Question;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AddQuestionForm extends Component
{
    public $question;
    public $category_id;


    public function addQuestion()
    {
        // validate form-data before inserting to database
        $validated = $this->validate([
            'question' => 'required|min:5',
            'category_id' => 'required',
        ]);

        // insert data to database
        Question::create([
            'text' => $validated['question'],
            'category_id' => $validated['category_id'],
        ]);

        // get caetgory name for redirecting
        $category_name = Category::where('id', $this->category_id)->pluck('name')->first();

        $this->question = '';
        $this->category_id = '';

        return redirect()->to('/question-data/' . $category_name)->with('success', 'Pertanyaan berhasil di tambahkan!');
    }

    public function render()
    {
        $categories = Category::all();

        return view('admin.livewire.add-question-form', [
            'categories' => $categories
        ]);
    }
}
