<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use DB;

class HouseController extends Controller
{
    public function index(Request $req)
    {
        $name = $req->name;
        $price_min = $req->price_min;
        $price_max = $req->price_max;
        $bedrooms = $req->bedrooms;
        $bathrooms = $req->bathrooms;
        $storeys = $req->storeys;
        $garages = $req->garages;
        $query = [];
            if(isset($name)){
                array_push($query, ['name', 'LIKE', '%'.$name.'%']);
            }
            if(isset($price_min)){
                array_push($query, ['price', '>=', $price_min]);
            }
            if(isset($price_max)){
                array_push($query, ['price', '<=', $price_max]);
            }
            if(isset($bedrooms)){
                array_push($query, ['bedrooms', '=', $bedrooms]);
            }
            if(isset($bathrooms)){
                array_push($query, ['bathrooms', '=', $bathrooms]);
            }
            if(isset($storeys)){
                array_push($query, ['storeys', '=', $storeys]);
            }
            if(isset($garages)){
                array_push($query, ['garages', '=', $garages]);
            };

        return House::orWhere($query)->get();
    }
}
