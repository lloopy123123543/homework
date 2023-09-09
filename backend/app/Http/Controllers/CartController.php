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
use App\Models\Carts;

class CartController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function my_cart(Request $request)
    {
        $bearer = $request->header("authorization");
        $token = explode(" ", $bearer)[1];
        $user = User::all()->where("token", $token)->first();


        if ($bearer != '') {
            if ($user != null) {
                $cart = Carts::all()->where("user_id", $user->id);
                return response()->json($cart);
            } else {
                return response()->json("user not found");
            }
        } else {
            return response()->json("token is empty");
        }
    }

    public function create_cart(Request $request)
    {
        $bearer = $request->header("authorization");
        $token = explode(" ", $bearer)[1];
        $user = User::all()->where("token", $token)->first();


        if ($bearer != '') {
            if ($user != null) {
                $add_cart = new Carts();
                $add_cart->user_id = $user->id;
                $add_cart->appartaments_id = request()->input("appartaments_id");
                $add_cart -> save();
                return response()->json($add_cart);
            } else {
                return response()->json("user not found");
            }
        } else {
            return response()->json("token is empty");
        }
    }
}
