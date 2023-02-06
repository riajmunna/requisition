<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public static $employee,$user;
    use HasFactory;
    public static function saveEmployee($request)
    {
        self::$employee = new User();
        self::$employee->name = $request->name;
        self::$employee->phone = $request->phone;
        self::$employee->user_type = 'employee';
        self::$employee->email = $request->email;
        self::$employee->password = bcrypt($request->password);
        self::$employee->department = $request->department;
        self::$employee->designation = $request->designation;
        self::$employee->balance = $request->balance;
        self::$employee->gender = $request->gender;
        self::$employee->blood = $request->blood;
        self::$employee->dob = $request->dob;
        self::$employee->present_address = $request->present_address;
        self::$employee->permanent_address = $request->permanent_address;
        self::$employee->save();

        self::$employee = new Employee();
        $id = User::where('email',$request->email)->value('id');
        self::$employee->user_id = $id;
        self::$employee->save();
    }

    public static function updateEmployee($request)
    {
        self::$employee = User::where('id',$request->employee_id)->first();
        self::$employee->name = $request->name;
        self::$employee->phone = $request->phone;
        self::$employee->email = $request->email;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
