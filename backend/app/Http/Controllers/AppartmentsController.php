<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Appartaments;

class AppartmentsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show_appartments(Request $request){
        $show = Appartaments::all();

        return response() -> json($show);
    }

    public function create_apparts(Request $request){
        $add = new Appartaments();
        $add -> m2 = $request -> input("m2");
        $add -> floor = $request -> input("floor");
        $add -> rooms = $request -> input("rooms");
        $add -> appartaments_type_id = $request -> input("appartaments_type_id");
        $add -> cost = $request -> input("cost");

        $add -> save();

        return response() -> json($add);

    }


}
