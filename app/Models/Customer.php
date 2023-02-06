<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    private static $customer;
    use HasFactory;
    public static function saveCustomer($request){
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->address = $request->address;
        self::$customer->save();
    }

    public static function updateCustomer($request){
        self::$customer = Customer::where('id',$request->customer_id)->first();
        self::$customer->name = $request->name;
        self::$customer->address = $request->address;
        self::$customer->save();
    }

    public function advance()
    {
        return $this->hasMany(AdvanceHistory::class);
    }
}
