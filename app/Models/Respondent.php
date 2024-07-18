<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Respondent extends Model
{
    use HasFactory;
    protected $fillable = [
        'respondent_code',
        'name',
        'email',
        'gender',
        'question_id',
        'answer'
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
