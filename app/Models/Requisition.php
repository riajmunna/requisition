<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    private static $requisition;
    use HasFactory;

    public static function updateRequisition($request)
    {
        self::$requisition = Requisition::where('id', $request->requisition_id)->first();
        self::$requisition->total_amount = $request->total_amount;
        self::$requisition->save();
    }
}
