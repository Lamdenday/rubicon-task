<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhanSuRequest;
use App\Http\Requests\NhanSuUpdateRequest;
use App\Http\Resources\NhanSuResource;
use App\Models\NhanSu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NhanSuController extends Controller
{
    public function __construct(NhanSu $NhanSu){
        $this->NhanSu = $NhanSu;
    }

    public function index()
    {
        $NhanSu = $this->NhanSu->all();
        $NhanSuResource = NhanSuResource::collection($NhanSu);

        return  response()->json(['data'=> $NhanSuResource],Response::HTTP_OK);
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
    public function store(NhanSuRequest $request)
    {
        $data = $request->all();

        $user_id = $request->user_id;
        
        $user= User::find($user_id);
        
        if(isset($user)){
        $NhanSu = $this->NhanSu->create($data);

        $NhanSuResource= new NhanSuResource($NhanSu);

        return  response()->json(['data'=> $NhanSuResource],Response::HTTP_OK);
        }
        else 
        {
            return  response()->json(['data'=> 'Khong ton tai user'],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->NhanSu->findorfail($id);
        $NhanSuResource = new NhanSuResource($data);

        return  response()->json(['data'=> $NhanSuResource],Response::HTTP_OK);
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
    public function update(NhanSuUpdateRequest $request, $id)
    {
        $data = $request->all();
        $NhanSu = $this->NhanSu->findorfail($id);

        $user_id = $request->user_id;
        
        $user= User::find($user_id);
        if(isset($user)){
        $NhanSu->update($data);
        $NhanSuResource= new NhanSuResource($NhanSu);

        return  response()->json(['data'=> $NhanSuResource],Response::HTTP_OK);}

        else 
        {
            return  response()->json(['data'=> 'Khong ton tai user'],Response::HTTP_NOT_FOUND);
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
        $NhanSu = $this->NhanSu->findorfail($id);

        $NhanSu->delete();


        return  response()->json(['data'=>'Da Xoa'],Response::HTTP_OK);
    }
}
