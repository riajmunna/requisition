<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    private static $department;
    use HasFactory;
    public static function saveDepartment($request){
        self::$department = new Department();
        self::$department->name = $request->name;
        self::$department->save();
    }

    public static function updateDepartment($request){
        self::$department = Department::where('id',$request->department_id)->first();
        self::$department->name = $request->name;
        self::$department->save();
    }
}
