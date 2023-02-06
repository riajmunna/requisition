<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    private static $designation;
    use HasFactory;

    public static function saveDesignation($request)
    {
        self::$designation = new Designation();
        self::$designation->name = $request->name;
        self::$designation->save();
    }

    public static function updateDesignation($request)
    {
        self::$designation = Designation::where('id', $request->designation_id)->first();
        self::$designation->name = $request->name;
        self::$designation->save();
    }
}
