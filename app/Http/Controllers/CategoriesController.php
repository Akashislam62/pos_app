<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    function CategoriePage(){
        return view('pages.dashboard.categorie-page');
    }



    function CategorieList(Request $request){
        $user_id = $request->header('id');
        return Categorie::where('user_id' , $user_id)->get();
    }



    function CategorieCreate(Request $request){
        $user_id = $request->header('id');
        return Categorie::create([
            'name' => $request->input('name'),
            'user_id' => $user_id
        ]);
    }



    function CategorieDelete(Request $request){
        $categorie_id = $request->input('id');
        $user_id = $request->header('id');
        return Categorie::where('id',$categorie_id)->where('user_id',$user_id)->delete();
    }



    function CategorieById(Request $request){
        $categorie_id = $request->input('id');
        $user_id = $request->header('id');
        return Categorie::where('id',$categorie_id)->where('user_id',$user_id)->first();
    }



    function CategorieUpdate(Request $request){
        $categorie_id = $request->input('id');
        $user_id = $request->header('id');
        return Categorie::where('id',$categorie_id)->where('user_id',$user_id)->update([
            'name' => $request->input('name')
        ]);
    }
}
