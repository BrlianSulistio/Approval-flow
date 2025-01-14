<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeedApproval extends Model
{
    use HasFactory;

    public function workflowApproval()
    {
        return $this->belongsTo(WorkflowApproval::class, 'modul_id', 'id');
    }

    public function needApprovalEmployees()
    {
        return $this->hasMany(needApproval_employee::class, 'need_approval_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
