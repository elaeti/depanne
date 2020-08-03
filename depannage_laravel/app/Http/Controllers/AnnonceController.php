<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AnnonceResource;
use App\User;
use App\Categorie;
use App\Ouvrier;
use App\Annonce;
class AnnonceController extends Controller
{
  
    public function index()
    {
        $annonces = Annonce::all();
        return AnnonceResource::collection($annonces);
    }

    public function store(Request $request)
    {

        $rules = [
            'users_id' => "required",
            'categories_id' => "required",
            'description' => "string|required",
            'titre' => "string|required",
        ];
        $data = $request->validate($rules);
        $categorie = $request->input('categories_id');
        $res1 = Categorie::where('libelle', $categorie)->value('id');
        $user =  $request->input('users_id');
        $res = User::where('email', $user)->value('id');
        $annonce = Annonce::create(
            [

              'users_id' => $res,
              'categories_id' => $res1,
              'description' => $data["description"],
              'titre' => $data["titre"]

            ]
        );
    
          return new AnnonceResource($annonce);

    }

   
    public function show(Annonce $annonce)
    {
        return new AnnonceResource($annonce);
    }

    
    public function update(Request $request, Annonce $annonce)
    {
        $rules = [
            'users_id' => "numeric|required",
            'categories_id' => "numeric|required",
            'description' => "string|required"
        ];
        $data = $request->validate($rules);

        $annonce->update(
            [
              'users_id' => $data["users_id"],
              'categories_id' => $data["categories_id"],
              'description' => $data["description"]
            ]
        );
    
          return new AnnonceResource($annonce);
    }

    
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

      return response()->json(null, 204);
    }
}
