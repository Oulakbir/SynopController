<?php

namespace App\Http\Controllers;
use App\Models\StationInformation;
use Illuminate\Http\Request;

class StationInformationController extends Controller
{
    public function showForm()
    {
        $stationInformation = StationInformation::first();

        return view('dashboardAdmin', compact('stationInformation'));
    }

    public function submitForm(Request $request)
    {    
        // Vérifier s'il existe déjà un enregistrement dans la table
        $stationInformation = StationInformation::first();
        //dd($request->all());
        // dump(request('stationId'),request('stationType'),request('Altitude'),request('stuff'),request('wind'));
        if ($stationInformation) {
            // S'il existe, mettez à jour ses valeurs
            $stationInformation->update([
                'stationId' => request('stationId'),
                'stationType' => request('stationType'),
                'altitude' => request('altitude'),
                'stuff' => request('stuff'),
                'wind' => request('wind'),
            ]);
        } else {
            // S'il n'existe pas, créez un nouvel enregistrement
            $stationInformation = new StationInformation();
            $stationInformation->stationId = request('stationId');
            $stationInformation->stationType = request('stationType');
            $stationInformation->Altitude = request('altitude');
            $stationInformation->stuff = request('stuff');
            $stationInformation->wind = request('wind');
            $stationInformation->save();
        }
    
        return redirect()->route('home')->with('success', 'Station information saved successfully!');
    }
}    
