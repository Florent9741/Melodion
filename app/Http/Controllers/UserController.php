<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function getall()
    {
        $membres = User::all();


        return  view('/user', [

            'membres' => $membres,


        ]);
    }
        


        
public function showdel($id)
    {
        $membre = User::find($id);

        return view('showdelete', [
            'membre' => $membre,


        ]);
    }


    public function delete(Request $request)
    {
        $membre = User::find($request->input('id'));
        $membre->delete();
        return redirect('/user');
    }

    public function showrestore()
    {
       $members= User::onlyTrashed()->get();

return view ('user_restore', compact('members') );

    }

    public function restore( $id)

    {
         User::withTrashed()->find($id)->restore();
      
            return redirect()->route('user');
        }
    }

