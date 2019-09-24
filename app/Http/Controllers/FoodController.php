<?php

namespace App\Http\Controllers;

use App\Food;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodUpdateRequest;
use App\Http\Resources\FoodResource;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
            $food = Food::with('client');
            return FoodResource::collection($food->paginate());
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
    public function store(FoodStoreRequest $request)
    {
    
        
            $food = new Food();

                $food->name = $request->name;
                $food->type = $request->type;
                $food->minQty = $request->minQty;
                $food->maxQty = $request->maxQty;
                $food->unit_price = $request->unit_price;
                $food->client_id = $request->client_id;
                $food->fac_id = 1;

                $food->save();
           return FoodResource::collection($food->paginate());
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
            $food = Food::find($id)->with('client');
            return FoodResource::collection($food->paginate(1));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
            $food = Food::find($id);

                $food->name = $request->name;
                $food->type = $request->type;
                $food->minQty = $request->minQty;
                $food->maxQty = $request->maxQty;
                $food->unit_price = $request->unit_price;
                $food->client_id = $request->client_id;
                $food->fac_id = 1;

                $food->save();
                return FoodResource::collection($food->paginate());
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */

    public function delete(Food $food)
    {
        
    }

    public function destroy($id)
    {
        
            $food = Food::find($id);
            $food->delete();
            
    }

    public function getclient($name,$type,$qty)
    {
        $clients = Food::where('name',$name) -> where('type', $type)->where('minQty','<',$qty)->where('maxQty','>',$qty)->with('client')->paginate(10);
        return FoodResource::collection($clients);
            
     }
}
