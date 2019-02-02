<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use function GuzzleHttp\json_encode;
class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jsonString = file_get_contents(base_path('items.json'));
        $data = json_decode($jsonString, true);
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('items');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get  json content to add new item
        $jsonString = file_get_contents(base_path('items.json'));
        $allItems = json_decode($jsonString, true);
        if(!is_array($allItems)) $allItems = [];

        $errors = $this->validateItem($request);
        if(sizeof($errors) ) return response($errors, 400);
        $name = $request->Input('name');
        $price = $request->Input('price');

        $item =  new \stdClass();
        $item->id = $this->createId($allItems);
        $item->name = $name;
        $item->price = $price;
        array_push($allItems, $item);

        $newJsonString = json_encode($allItems, JSON_PRETTY_PRINT);
        file_put_contents(base_path('items.json'), stripslashes($newJsonString));

        return response($allItems , 200);

    }

    public function validateItem(Request $request){

    $name = $request->Input('name');
    $price = $request->Input('price');
    $errors = [];
    if(!$name){array_push($errors, 'name is required');}
    if(!$price){array_push($errors, 'price is required');}
    if(!is_numeric($price)){ array_push($errors,'price must be a number'); }
    return $errors;
}

    public function createId ($allItems){
        return sizeof($allItems) + 1 ;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
