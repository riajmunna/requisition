<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = ['name', 'phone', 'department', 'designation', 'balance', 'gender', 'blood', 'dob', 'present_address', 'permanent_address'];

    public static $employee,$user;

    public static function saveEmployee($request)
    {
        self::$employee = new Employee();
        self::$employee->name = $request->name;
        self::$employee->phone = $request->phone;
        self::$employee->department = $request->department;
        self::$employee->designation = $request->designation;
        self::$employee->balance = $request->balance;
        self::$employee->gender = $request->gender;
        self::$employee->blood = $request->blood;
        self::$employee->dob = $request->dob;
        self::$employee->present_address = $request->present_address;
        self::$employee->permanent_address = $request->permanent_address;
        self::$employee->save();
    }

    public static function updateEmployee($request)
    {
        self::$employee = Employee::where('id',$request->employee_id)->first();
        self::$employee->name = $request->name;
        self::$employee->phone = $request->phone;
        self::$employee->department = $request->department;
        self::$employee->designation = $request->designation;
        self::$employee->balance = $request->balance;
        self::$employee->gender = $request->gender;
        self::$employee->blood = $request->blood;
        self::$employee->dob = $request->dob;
        self::$employee->present_address = $request->present_address;
        self::$employee->permanent_address = $request->permanent_address;
        self::$employee->save();
    }
}
