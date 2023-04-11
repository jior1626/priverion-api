<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'form_id',
        'description',
        'type',
    ];

    public $with = [
        "answers"
    ];

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
