<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class needApproval_employee extends Model
{
    use HasFactory;
    public function needApproval()
    {
        return $this->belongsTo(NeedApproval::class, 'need_approval_id', 'id');
    }
}
