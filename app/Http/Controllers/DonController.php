<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonRequest;
use App\Http\Requests\DonUpdateRequest;
use App\Http\Resources\DonResource;
use App\Models\Category;
use App\Models\Don;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Don $don){
        $this->Don = $don;
    }

    public function index()
    {
        $data = $this->Don->all();

        $donResource = DonResource::collection($data);

        return Response()->json(['data' => $donResource],Response::HTTP_OK);
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
    public function store(DonRequest $request)
    {
        $data = $request->all();
        $don = $this->Don->create($data);

        $donResource= new DonResource($don);

        return  response()->json(['data'=> $donResource],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->Don->find($id);

        $donResource = new DonResource($data);
        return Response()->json(['data' => $donResource],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function edit(Don $don)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function update(DonUpdateRequest $request, $id)
    {

        $data = $request->all();
        $user_id = $request->user_id;
        
        $user= User::find($user_id);
        if(isset($user)){
            
            $category = Category::find($data['category_id']);
            if(isset($category)){
                $don=$this->Don->findorfail($id);
                $don->update($data);
                $donResource= new DonResource($don);

                return  response()->json(['data'=> $donResource],Response::HTTP_OK);
            }
            else{
                return  response()->json(['data'=> 'Không tồn tại danh mục đơn này'],Response::HTTP_NOT_FOUND);
            }
        }

        else 
        {
            return  response()->json(['data'=> 'Không tồn tại user'],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $don = $this->Don->findorfail($id);

        $don->delete();


        return  response()->json(['data'=>'Da Xoa'],Response::HTTP_OK);
    }
}
