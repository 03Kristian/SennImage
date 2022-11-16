<?php

namespace App\Http\Controllers;

use App\Models\SendImage;
use Illuminate\Http\Request;

class SendImageController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $sendImage = new SendImage();

       /* permite almacenar multiples archivos/image en la carpeta public
       *  el imput va asi image[]
       * */
       $images = $request->file('image');
            $imageName = ' ';
            foreach ($images as $image) {
                $new_name = rand().'.'.$image->getClientOriginalName();
                $image->move(storage_path('app/public/guia'),$new_name);
                $imageName = $imageName.$new_name.", ";
            }
        $imagedb = $imageName;

        $sendImage->image = $imagedb;
        $sendImage->save();

        return response()->json([
            'status' => 200,
            'message' => 'register successful',
            'Images' => $imagedb
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SendImage  $sendImage
     * @return \Illuminate\Http\Response
     */
    public function show(SendImage $sendImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SendImage  $sendImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SendImage $sendImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SendImage  $sendImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SendImage $sendImage)
    {
        //
    }
}
