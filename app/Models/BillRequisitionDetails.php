<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillRequisitionDetails extends Model
{
    protected $guarded = ['id'];
    protected $table = 'bill_requisition_details';

    public function itemName()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function getManager()
    {
        return $this->belongsTo(Employee::class, 'project_manager_id', 'id');
    }

    public function getStaff()
    {
        return $this->belongsTo(Employee::class, 'staff_id', 'id');
    }
}
