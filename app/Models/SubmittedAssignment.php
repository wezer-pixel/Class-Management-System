<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// SubmittedAssignment.php
class SubmittedAssignment extends Model {

    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function assignment() {
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }

}

