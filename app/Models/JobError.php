<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobError extends Model
{
    use HasFactory;


    protected $fillable = [
        'job_name',
        'error_message',
        'stack_trace',
        'payload',
    ];
}
