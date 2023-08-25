<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreApiModelRequest;
use App\Http\Requests\UpdateApiModelRequest;

class ApiModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = ApiModel::paginate();
        return response()->json($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
         $validateData = $request->validate(
            [
            'title' => 'required',
            'description' => 'required',
            'company'=>'required',
            ]
            );
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApiModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ApiModel $apiModel,String $id)
    {
        $request = $apiModel::find($id);
        return response()->json($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApiModel $apiModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApiModelRequest $request, ApiModel $apiModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiModel $apiModel)
    {
        //
    }
}