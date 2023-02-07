<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceHistory extends Model
{
    protected $guarded =['id'];
    protected $table = 'advance_history';
//    public  function advance(){
//        return $this->hasMany(BillRequisitionDetails::class,'bill_id','id');
//    }
    public  function getManager(){
        return $this->belongsTo(Employee::class,'project_manager_id','id');
    }
    public  function getStaff(){
        return $this->belongsTo(Employee::class,'staff_id','id');
    }


}
