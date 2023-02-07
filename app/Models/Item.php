<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Item extends Model
{
    private static $item;
    use HasFactory;

    public static function saveItem($request)
    {
        self::$item = new Item();
        self::$item->name = $request->name;
        self::$item->code = $request->code;
        self::$item->created_by = Auth::user()->id;
        self::$item->updated_by = Auth::user()->id;
        self::$item->save();
    }

    public static function updateItem($request)
    {
        self::$item = Item::where('id', $request->item_id)->first();
        self::$item->name = $request->name;
        self::$item->code = $request->code;
        self::$item->updated_by = Auth::user()->id;
        self::$item->save();
    }
}
