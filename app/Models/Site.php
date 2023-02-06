<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    private static $site;
    use HasFactory;

    public static function saveSite($request)
    {
        self::$site = new Site();
        self::$site->customer_id = $request->customer_id;
        self::$site->name = $request->name;
        self::$site->site_code = $request->site_code;
        self::$site->address = $request->address;
        self::$site->save();
    }

    public static function updateSite($request)
    {
        self::$site = Site::where('id', $request->site_id)->first();
        self::$site->name = $request->name;
        self::$site->site_code = $request->site_code;
        self::$site->address = $request->address;
        self::$site->save();
    }

    public function advance()
    {
        return $this->hasMany(AdvanceHistory::class);
    }
}
