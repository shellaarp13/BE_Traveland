<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourGuides;

class TourGuideController extends Controller
{
    public function index()
    {
        $tourguides = Tourguides::all();
        return response()->json($tourguides);
    }

    public function store(Request $request)
    {
        $tourguide = new Tourguides;
        $tourguide->name = $request->name;
        $tourguide->fee = $request->fee;
        $tourguide->profile = $request->profile;
        $tourguide->available = $request->avalaible;
        $tourguide->save();
        return response()->json([
            "message" => "Tourguide Added."
        ], 201);
    }

    public function show($id)
    {
        $tourguide = Tourguides::find($id);
        if(!empty($tourguide))
        {
            return response()->json($tourguide);
        }
        else
        {
            return response()->json([
                "message" => "Tourguide not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Tourguides::where('id', $id)->exists()) {
            $tourguide = Tourguides::find($id);
            $tourguide->name = is_null($request->name) ? $tourguide->name : $request->name;
            $tourguide->fee = is_null($request->fee) ? $tourguide->fee : $request->fee;
            $tourguide->profile = is_null($request->profile) ? $tourguide->profile : $request->profile;
            $tourguide->available = is_null($request->available) ? $tourguide->available : $request->available;
            $tourguide->save();
            return response()->json([
                "message" => "Tourguide Updated."
            ], 404);
        }else{
            return response()->json([
                "message" => "Tourguide Not Found."
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Tourguides::where('id', $id)->exists()) {
            $tourguide = Tourguides::find($id);
            $tourguide->delete();

            return response()->json([
              "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
              "message" => "Tourguide not found."
            ], 404);
        }
    }
}

