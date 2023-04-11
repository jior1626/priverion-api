<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'password',
        'isTemplate',
    ];

    public $with = [
        "questions"
    ];

    public function questions() {
        return $this->hasMany(Question::class);
    }
    
}
