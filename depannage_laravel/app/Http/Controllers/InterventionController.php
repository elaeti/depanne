<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ouvrier;
use App\annonce;
use App\intervention;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
            'annonces_id' => 'numeric|required',
            'ouvriers_id' => 'numeric|required',
            'date_fin' => 'date|required',
            'note' => 'numeric|required'
            
        ];

        $data = $request->validate($rules);
        $annonce = $request->input('annonces_id');
        $ouvrier = $request->input('ouvriers_id');


        $intervention = intervention::create(
            [
              'annonces_id' => $annonce,
              'ouvriers_id' => $ouvrier,
              'note' =>  $data["note"],
              'date_fin' => $data["date_fin"]
            ]
        );
    
          return new InterventionResource($intervention);
    }



    public function showintervention(Request $request)
    {
        $ouvrier = Ouvrier::find(1);

       foreach ($ouvrier->interventions as $intervention) {
       echo $intervention->pivot->id;
    }
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(intervention $intervention)
    {
        return new InterventionResource($intervention);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, intervention $intervention)
    {
        {
            $rules = [
                'annonces_id' => 'numeric|required',
                'ouvriers_id' => 'numeric|required',
                'date_fin' => 'date|required',
                'note' => 'numeric|required'
    
            ];
            $data = $request->validate($rules);
    
            $intervention->update(
                [
                //'ouvriers_id' => $data["ouvriers_id"],
                  'note' => $data["note"],
                  'date_fin' => $data["date_fin"],
                  'annonces_id' => $data["annonces_id"],
                  'ouvriers_id' => $data["ouvriers_id"]
                ]
            );
        
              return new InterventionResource($intervention);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
