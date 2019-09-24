<?php

namespace App\Http\Controllers;

use App\Shorteats;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ShortEatStoreRequest;
use App\Http\Requests\ShorteatsUpdateRequest;
use App\Http\Resources\ShorteatsResource;

class ShorteatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            $shorteats = Shorteats::with('client');
            return ShorteatsResource::collection($shorteats->paginate());
            
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShortEatStoreRequest $request)
    {
      
            $shorteats = new Shorteats();

                
                $shorteats->type = $request->type;
                $shorteats->minQty = $request->minQty;
                $shorteats->maxQty = $request->maxQty;
                $shorteats->unit_price = $request->unit_price;
                $shorteats->client_id = $request->client_id;
                $shorteats->fac_id = 7;

                $shorteats->save();
           
                return ShorteatsResource::collection($shorteats->paginate());
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shorteats  $shorteats
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
            $shorteats = Shorteats::find($id)->with('client');
            return ShorteatsResource::collection($shorteats->paginate(1));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shorteats  $shorteats
     * @return \Illuminate\Http\Response
     */
    public function edit(Shorteats $shorteats)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shorteats  $shorteats
     * @return \Illuminate\Http\Response
     */
    public function update(ShortEatUpdateRequest $request,$id)
    {
        
            $shorteats = Shorteats::find($id);

                
                $shorteats->type = $request->type;
                $shorteats->minQty = $request->minQty;
                $shorteats->maxQty = $request->maxQty;
                $shorteats->unit_price = $request->unit_price;
                $shorteats->client_id = $request->client_id;
                $shorteats->fac_id = 7;

                $shorteats->save();
           
                return ShorteatsResource::collection($shorteats->paginate());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shorteats  $shorteats
     * @return \Illuminate\Http\Response
     */

    public function delete(Shorteats $shorteats)
    {
        
    }

    public function destroy($id)
    {
       
            $shorteats = Shorteats::find($id);
            $shorteats->delete();

    }

    public function getclient($type,$qty)
    {
        $clients = Shorteats::where('type', $type)->where('minQty','<',$qty)->where('maxQty','>',$qty)->with('client')->paginate(10);
        return ShorteatsResource::collection($clients);
            
    }
}
