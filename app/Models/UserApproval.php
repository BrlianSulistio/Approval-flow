<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApproval extends Model
{
    use HasFactory;

    public function workflow()
    {
        return $this->belongsTo(Workflow::class, 'modul_id');
    }
}
