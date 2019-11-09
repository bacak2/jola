<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Owner extends Controller
{
    public function getOwnerSettings($ownerName)
    {
        $ownerSettings = DB::table('owners')
            ->where('name', $ownerName)
            ->first();

        return json_encode($ownerSettings);
    }
}
