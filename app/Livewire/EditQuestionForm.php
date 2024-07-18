<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Question;
use Livewire\Component;

class EditQuestionForm extends Component
{
    public $question_id;
    public $question;
    public $category_id;

    public function mount($id)
    {
        $question = Question::findOrFail($id);
        $this->question_id = $question->id;
        $this->question = $question->text;
        $this->category_id = $question->category_id;
    }

    public function updateQuestion()
    {
        $validated = $this->validate([
            'question' => 'required|min:5',
            'category_id' => 'required',
        ]);

        $category_name = Category::where('id', $this->category_id)->pluck('name')->first();

        $question = Question::findOrFail($this->question_id);

        $question->text = $validated['question'];
        $question->category_id = $validated['category_id'];

        $question->save();

        return redirect()->to(route('question-data', $category_name))->with('success', 'Pertanyaan berhasil di update!');
    }

    public function render()
    {
        $categories = Category::all();

        return view('admin.livewire.edit-question-form', [
            'categories' => $categories
        ]);
    }
}
