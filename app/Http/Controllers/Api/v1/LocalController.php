<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLocalRequest;
use App\Http\Requests\UpdateLocalRequest;
use App\Models\Local;
use App\Http\Controllers\Controller;
use App\Http\Resources\LocalResource;
use App\Http\Resources\LocalCollection;
use App\Services\v1\LocalQuery;


class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter = new LocalQuery();
        $queryItems = $filter->transform($request);
        
        if(count($queryItems)==0){
            return new LocalCollection(Local::paginate());
        }
        return new LocalCollection(Local::where($queryItems)->paginate());
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocalRequest $request)
    {
        return new LocalResource(Local::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Local $local)
    {
        return new LocalResource($local);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Local $local)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocalRequest $request, Local $local)
    {
        $local->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Local $local)
    {
        Local::destroy($local->id);
    }
}
