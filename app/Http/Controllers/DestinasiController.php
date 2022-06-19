<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasis;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasis = Destinasis::all();
        return response()->json($destinasis);
    }

    public function store(Request $request)
    {
        $destinasi = new destinasis;
        $destinasi->name = $request->name;
        $destinasi->location = $request->location;
        $destinasi->open = $request->open;
        $destinasi->describe = $request->describe;
        $destinasi->save();
        return response()->json([
            "message" => "destinasi Added."
        ], 201);
    }

    public function show($id)
    {
        $destinasi = Destinasis::find($id);
        if(!empty($destinasi))
        {
            return response()->json($destinasi);
        }
        else
        {
            return response()->json([
                "message" => "destinasi not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Destinasis::where('id', $id)->exists()) {
            $destinasi = Destinasis::find($id);
            $destinasi->name = is_null($request->name) ? $destinasi->name : $request->name;
            $destinasi->location = is_null($request->author) ? $destinasi->author : $request->author;
            $destinasi->open= is_null($request->publish_date) ? $destinasi->publish_date : $request->publish_date;
            $destinasi->describe = is_null($request->describe) ? $destinasi->describe : $request->describe;
            $destinasi->save();
            return response()->json([
                "message" => "Destinasi Updated."
            ], 404);
        }else{
            return response()->json([
                "message" => "Destinasi Not Found."
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Destinasis::where('id', $id)->exists()) {
            $destinasi = Destinasis::find($id);
            $destinasi->delete();

            return response()->json([
              "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
              "message" => "destinasi not found."
            ], 404);
        }
    }
}