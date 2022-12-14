<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfume;

class PerfumeController extends Controller
{
    public function getPerfumes() {

        $perfumes = Perfume::all();

        return view( "perfumes" , [
            "perfumes"=>$perfumes
        ]);
    }

    public function newPerfume() {
       
        return view( "new_perfume" );
    }

    public function storePerfume( Request $request ) {
        $request->validate([
            "name"=> 'required',
            "type" => 'required',
            "price" => 'required'
        ],
        [
            "name.required"=> "Név mezőt ki kell tölteni",
            "type.required"=> "Típus mezőt ki kell tölteni",
            "price.required"=> " Az ár mezőt ki kell tölteni"
        ]);

        $perfume = new Perfume;

        $perfume->name = $request->name;
        $perfume->type = $request->type;
        $perfume->price = (int)$request->price;

        $perfume->save();

        return redirect( "perfumes" );
    }

    public function editPerfume( $id ) {

        $perfume = Perfume::find( $id );

        return view( "edit_perfume", [
            "perfume" => $perfume
        ]);
    
    }

    public function updatePerfume( Request $request) {

        $request->validate([
            'name' => 'required',
            'type' =>'required',
            'price' =>'required',
        ]
        );

        $id = $request->id;
        $name = $request->name;
        $type = $request->type;
        $price = $request->price;
       

        Perfume::where('id','=',$id)->update([
            'name'=>$name,
            'type'=>$type,
            'price'=>$price
            
        ]);
        
        return redirect( "perfumes" );
    }

    public function deletePerfume( $id ) {

        $perfume = Perfume::find( $id );
        $perfume->delete();

        return redirect( "perfumes" );
    }


}
