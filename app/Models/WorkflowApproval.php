<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkflowApproval extends Model
{
    use HasFactory;
    public function userApproval()
    {
        return $this->hasMany(UserApproval::class, 'id');
    }

    public function needApprovals()
    {
        return $this->hasMany(NeedApproval::class, 'modul_id', 'id');
    }
}
