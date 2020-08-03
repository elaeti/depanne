<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\client;
use App\Annonce;
use App\ouvrier;
use App\administrateur;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tel' => 'string|required',
            'name' => 'string|required',
            'prenom' => 'string|required',
            'email' => 'string|required',
            'password' => 'string|required',
            'role' => 'string|required',
           
            
        ];

   
        $data = $request->validate($rules);
        $role = $request->input('role');
        if ($role=="client") {
            $value = Client::create();
        }else if ($role=="ouvrier") {
             $value = Ouvrier::create();
        } else{
            $value= Administrateur::create();
        }
        $user = User::create(
            [
              'profillable_id' => $value->id,
              'profillable_type' => $role,
              'tel' => $data["tel"],
              'name' => $data["name"],
              'prenom' => $data["prenom"],
              'email' => $data["email"],
              'password' => $data["password"],
              'role' => $data["role"]
            ]
        );
    
          return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'tel' => 'string|required',
            'name' => 'string|required',
            'prenom' => 'string|required',
            'email' => 'string|required',
            'password' => 'string|required',
            'role' => 'string|required'

        ];
        $data = $request->validate($rules);
        $profil->update(
            [
                'tel' => $data["tel"],
                'name' => $data["name"],
                'prenom' => $data["prenom"],
                'role' => $data["role"],
                'email' => $data["email"],
                'password' => $data["password"]
            ]
        );
    
          return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    


    public function showlisteannoncepro()
    {
         $userauth = JWTAuth::parseToken()->authenticate();
      $obj = json_decode($userauth , true);
      $first = array_values($obj)[0];
        $annonces = Annonce::where('users_id', $first )->get();
        return $annonces;
        
    }

     public function getuser(){
      $userauth = JWTAuth::parseToken()->authenticate();
      $obj = json_decode($userauth , true);
      $first = array_values( $obj )[0];
      return $first;
    
      


   
       
 

      
      
      
    }


}
