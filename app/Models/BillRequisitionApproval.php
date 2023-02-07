<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillRequisitionApproval extends Model
{
    protected $guarded =['id'];
    protected $table = 'bill_approval_tables';

    public  function getBill(){
        return $this->belongsTo(BillRequisition::class,'bill_id','id');
    }
    public  function getManager(){
        return $this->belongsTo(Employee::class,'project_manager_id','id');
    }
    public  function getStaff(){
        return $this->belongsTo(Employee::class,'staff_id','id');
    }
}
