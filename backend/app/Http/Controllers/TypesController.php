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
use App\Models\Types;

class TypesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show_types(Request $request){
        $all = Types::all();
        return response() -> json($all);
    }
    public function add_type(Request $request){
        $add = new Types();
        $add -> appartaments_type = $request->input('appartaments_type');
        $add -> save();
        return response() -> json(["appartaments id" => $add -> id]);
    }

}
