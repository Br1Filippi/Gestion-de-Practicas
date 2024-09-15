<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comuna;
use App\Model\Region;

class RegionController extends Controller
{

public function getComunas($regionId)
{
    $comunas = Comuna::where('id_region', $regionId)->get();
    return response()->json(['comunas' => $comunas]);
}

}
