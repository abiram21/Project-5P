<?php

namespace App\Http\Controllers;

use App\Hallcover;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\HallcoverStoreRequest;

use App\Http\Requests\HallcoverUpdateRequest;
use App\Http\Resources\HallCoverResource;

class HallcoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            $hallcover = Hallcover::with('client');
            return HallCoverResource::collection($hallcover->paginate());
            
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
    public function store(HallcoverStoreRequest $request)
    {
           
            $hallcover = new hallcover();

                $hallcover->hall_size = $request->hall_size;
               
                $hallcover->colors = $request->colors;
                $hallcover->price = $request->price;
                
                $hallcover->client_id = $request->client_id;
                $hallcover->fac_id = 3;

                $hallcover->save();
                return HallCoverResource::collection($hallcover->paginate());
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hallcover  $hallcover
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
       
            $hallcover = hallcover::find($id);
            return HallCoverResource::collection($hallcover->paginate(1));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hallcover  $hallcover
     * @return \Illuminate\Http\Response
     */
    public function edit(Hallcover $hallcover)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hallcover  $hallcover
     * @return \Illuminate\Http\Response
     */
    public function update(HallcoverUpdateRequest $request, $id)
    {
        
            $hallcover = Hallcover::find($id);

                $hallcover->hall_size = $request->hall_size;
                $hallcover->colors = $request->colors;
                $hallcover->price = $request->price;
                $hallcover->client_id = $request->client_id;
                $hallcover->fac_id = 3;
                $hallcover->save();

                return HallCoverResource::collection($hallcover->paginate());
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hallcover  $hallcover
     * @return \Illuminate\Http\Response
     */
    public function delete(Hallcover $hallcover)
    {
       
    }
    public function destroy($id)
    {
       
            $hallcover = Hallcover::find($id);
            $hallcover->delete();
                
           
    }

    public function getclient($size)
    {
            $clients = Hallcover::where('hall_size',$size)->with('client')->orderBy('price')->paginate(10);
            return HallCoverResource::collection($clients);
    }
}
