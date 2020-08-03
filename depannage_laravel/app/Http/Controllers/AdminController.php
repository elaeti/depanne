<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\InterventionResource;
use App\Client;
use App\Ouvrier;
use App\Administrateur;
use App\User;
use App\Annonce;
use App\Intervention;
class AdminController extends Controller
{
    public function listeusers()
    {
        $user = User::all();
        return UserResource::collection($user);
    }


    public function listeintervention()
    {
        $intervention = Intervention::all();
        return InterventionResource::collection($intervention);
    }


    public function showliste(Request $request)
    {

        $role = $request->input('role');
        
        if ($role=="client") {
            $value = User::where('role', $role)->get();
        }else if ($role=="ouvrier") {
             $value = User::where('role', $role)->get();
        } else{
            $value=User::where('role', $role)->get();
        }

        return $value;
    }

    public function showouvriers(Request $request)
    {
       
        $value = User::where('role', "ouvrier")->get();
        
       return UserResource::collection($value);
    }



   public function destroyouvrier(Ouvrier $ouvrier)
    {
       $ouvrier = Ouvrier::find(1);
        $ouvrier->delete();

      return response()->json(null, 204);
    }
    public function destroyuser($id)

    {

        $user = User::find($id);

        $user->delete();
         

        return response()->json(null, 204);
    }
  
    //INTERVENTION

    public function createintervention(Request $request)
    {
        $rules = [
            'annonces_id' => 'required',
            'ouvriers_id' => 'required',
            'date_fin' => 'date|required',
            'note' => 'numeric|required'
            
        ];

        $data = $request->validate($rules);
        $annonce = $request->input('annonces_id');
        $res = Annonce::where('titre', $annonce)->value('id');
        $ouvrier = $request->input('ouvriers_id');
        $res1 = User::where('email', $ouvrier)->value('id');


        $intervention = Intervention::create(
            [
              'annonces_id' => $res,
              'ouvriers_id' => $res1,
              'note' =>  $data["note"],
              'date_fin' => $data["date_fin"]
            ]
        );
    
          return new InterventionResource($intervention);
    }


    public function updateIntervention(Request $request,  $id)
    {
        
    
            $intervention =Intervention::findOrFail($id);
            $input = $request->all(); 
             $intervention->update($input);
        
        
              return new InterventionResource($intervention);
        
    }


public function listetache($id)

    {
       
        $interventions = Intervention::where('ouvriers_id', $id)->get();

        return  $interventions;
    }

    

}
