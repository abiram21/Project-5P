<?php

namespace App\Http\Controllers;

use App\Food;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodUpdateRequest;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $food = Food::all();
            $response['status'] = "Success";
            $response['msg'] = "Get all Food";
            $response['is_success'] = true;
            $response['data'] = array('client'=>client::all(),'food'=>$food);
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get()->pluck('phoneNo', 'id')->toArray();
        return view('foods.create',compact('clients'));
        
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodStoreRequest $request)
    {
    
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $food = new Food();

                $food->name = $request->name;
                $food->type = $request->type;
                $food->minQty = $request->minQty;
                $food->maxQty = $request->maxQty;
                $food->unit_price = $request->unit_price;
                $food->client_id = $request->client_id;
                $food->fac_id = 1;

                $food->save();
            $response['status'] = "Success";
            $response['msg'] = "Add Food";
            $response['is_success'] = true;
            $response['data'] =$food;
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $food = Food::find($id);
            $response['status'] = "Success";
            $response['msg'] = "Get one Food";
            $response['is_success'] = true;
            $response['data'] = array('food'=>$food);
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $clients = Client::get()->pluck('phoneNo', 'id')->toArray();
        return view('foods.edit', compact( 'clients'));
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
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $food = Food::find($id);

                $food->name = $request->name;
                $food->type = $request->type;
                $food->minQty = $request->minQty;
                $food->maxQty = $request->maxQty;
                $food->unit_price = $request->unit_price;
                $food->client_id = $request->client_id;
                $food->fac_id = 1;

                $food->save();
            $response['status'] = "Success";
            $response['msg'] = "Update Food";
            $response['is_success'] = true;
            $response['data'] =$food;
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */

    public function delete(Food $food)
    {
        $clients = Client::get()->pluck('phoneNo', 'id')->toArray();
        return view('foods.delete', compact('clients'));
    }

    public function destroy($id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $food = Food::find($id);
            $food->delete();
            $response['status'] = "Success";
            $response['msg'] = "Delect Food";
            $response['is_success'] = true;
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }

    public function getclient($name,$type,$qty)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $findclient = Food::where('name','=',$name) -> where('type','=', $type)->where('minQty','<',$qty)->where('maxQty','>',$qty)->pluck('client_id')->toArray();
            $foodprice = Food::where('name','=',$name) -> where('type','=', $type)->where('minQty','<',$qty)->where('maxQty','>',$qty)->pluck('unit_price','client_id')->sort()->toArray();
            $client = Client::find($findclient);
            $totalprice = $foodprice*$qty;
            
            $response['status'] = "Success";
            $response['msg'] = "Found";
            $response['is_success'] = true;
            $response['data'] =array('client'=>$client,'totalprice'=>$totalprice);
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }
}
