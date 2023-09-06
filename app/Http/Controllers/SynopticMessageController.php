<?php

namespace App\Http\Controllers;

use Soandso\Synop\Report;
use Soandso\Synop\Sheme\BaricTendencyGroup;
use App\Models\SynopticMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Queue;
use phpseclib\Net\FTP;


class SynopticMessageController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $synopticMessages = SynopticMessage::all();
        //dd(SynopticMessage::all());
        // Supprimer les messages datant d'un an ou plus
        $dateLimite = Carbon::now()->subYear(); // Calculer la date limite (il y a un an)
        DB::table('synoptic_messages')->where('created_at', '<=', $dateLimite)->delete();
        return view('Messagetable', compact('synopticMessages'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('synoptic_messages.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        SynopticMessage::create([
            'message' => $request->message,
        ]);

        return redirect()->route('synoptic-messages.index')
            ->with('success', 'Synoptic message created successfully.');
    }

    // Display the specified resource.
    public function show($id)
    {
        $synopticMessage = SynopticMessage::findOrFail($id);
        return view('synoptic_messages.show', compact('synopticMessage'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $synopticMessage = SynopticMessage::findOrFail($id);
        return view('synoptic_messages.edit', compact('synopticMessage'));
    }

    // Update the specified resource in storage.
    public function updateRecord(Request $request)
    {
        //dd($request->message_id,$request->username,$request->content);
        DB::beginTransaction();
        try {

            $updateRecord = [
                'message' => $request->message_content
            ];

            SynopticMessage::where("id", $request->message_id)->update($updateRecord);
            Toastr::success('Updated message successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollback();
            Toastr::error('Fail, message Update :)', 'Error');
            return redirect()->back();
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $synopticMessage = SynopticMessage::findOrFail($id);
        $synopticMessage->update([
            'message' => $request->message,
        ]);

        return redirect()->route('synoptic-messages.index')
            ->with('success', 'Synoptic message updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        // $synopticMessage = SynopticMessage::findOrFail($id);
        // $synopticMessage->delete();

        // return redirect()->route('synoptic-messages.index')
        //     ->with('success', 'Synoptic message deleted successfully.');
        try {

            SynopticMessage::destroy($request->id);
            Toastr::success('Message deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (Exception $e) {

            DB::rollback();
            Toastr::error('Message delete fail :)', 'Error');
            return redirect()->back();
        }
    }


    public function submitForm(Request $request)
    {
        try {
            /** */
            function myEndsWith($haystack, $needle)
            {
                $length = strlen($needle);
                if ($length == 0) {
                    return true;
                }
                return substr($haystack, -$length) === $needle;
            }
            /* */
            //dd($request->all());
            $message = $request->input('Synopmessage');
            //dd($message);
            if ($message != '') {
                if (myEndsWith($message, '=')) {
                    $report = new Report($message);
                    //Starts the decoding process
                    $report->parse();

                    //Check validate format
                    $report->validate(); //true
                    //If the validate method returns false, you can use the getErrors method to display errors decoding the weather report

                    //Returns errors in meteorological weather report.
                    //If the validate method returns false, then the getErrors method will return an array of errors.
                    //Otherwise, it returns false
                    $report->getErrors(); //false

                    //Returns information about decoding errors in short form (error description only)
                    $report->getErrorList(); //false

                    //Group YYGGiw
                    //Get a type of weather station
                    $report->getTypeStation(); //AAXX

                    //Get a date (day) of a meteorological report
                    $report->getDay(); //07

                    //Get a time (hour) of a meteorological report
                    $report->getTime(); //18

                    //Get a unit of measure for wind speed
                    $report->getUnitWind(); //m/s

                    //Get a type of wind measurement
                    $report->getWindDetection(); //Instrumental

                    //Group IIiii
                    //Area number of meteorological station
                    $areanumber = $report->getAreaNumber(); //33
                    //Number of meteorological station
                    $stationnumber = $report->getStationNumber(); //837
                    //station index
                    $station = $report->getStationIndex(); //33837
                    if ($areanumber == 60 && $stationnumber == 220 && $station == 60220) {

                        //Group IrIxhVV
                        //Index inclusion the precipitation group 6RRRtr
                        $report->getInclusionPrecipitation(); //Included in section 1

                        //Weather indicator inclusion index 7wwW1W2
                        $report->getInclusionWeather(); //Included

                        //Type station operation
                        $report->getTypeStationOperation(); //Manned

                        //Base height of low clouds above sea level
                        $report->getHeightLowCloud(); //600-1000

                        //Unit for a base height of low clouds above sea level
                        $report->getHeightLowCloudUnit(); //m

                        //Meteorological range of visibility
                        $report->getVisibility(); //45

                        //Unit for a meteorological range of visibility
                        $report->getVisibilityUnit(); //km
/*------------------------------Group NDDff--------------------------------------*/
                        //Group NDDff
/*------------------------------Group NDDff--------------------------------------*/

                        //Total clouds
                        $report->getTotalAmountCloud(); //10
                        //Direction of wind
                        $report->getWindDirection(); //310

                        //Unit for direction of wind
                        $report->getWindDirectionUnit(); //degrees

                        //Wind speed
                        $report->getWindSpeed(); //2

                        //Unit for wind speed
                        $report->getWindSpeedUnit(); //m/s

                        /** The groups **/
                        $groupsArray = explode(" ", $message);
                        // dd($groupsArray[4]);
                        $nddffIndex = array_search($groupsArray[4], $groupsArray);
                        $nddffGroup = $groupsArray[$nddffIndex];
                        if (substr($nddffGroup, 0, 1) === "0") {
                            for ($i = $nddffIndex + 1; $i < count($groupsArray); $i++) {
                                if (preg_match('/^8\d+/', $groupsArray[$i])) {
                                    $groupStartingWith8 = $groupsArray[$i];
                                    throw new Exception("Error : The group ($groupStartingWith8) should not be present.");
                                }
                            }
                        } else {
                            if (substr($nddffGroup, 0, 1) === "9") {
                                for ($i = $nddffIndex + 1; $i < count($groupsArray); $i++) {
                                    if (preg_match('/^8\d+/', $groupsArray[$i])) {
                                        if (substr($groupsArray[$i], 1, 4) != "////") {
                                            throw new Exception("Error : The group nebulosity value is 9 the groups related shoud be somthing like 8////.");
                                        }
                                    }
                                }
                            } else {
                                if (substr($nddffGroup, 1, 2) == "00") {
                                    if (substr($nddffGroup, 3, 4) != "00") {
                                        throw new Exception("Error : Since the wind direction is zero, its speed must also be zero.");
                                    }
                                } else if ((((int) substr($nddffGroup, 1, 2)) > 0 && ((int) substr($nddffGroup, 1, 2)) <= 36) || substr($nddffGroup, 1, 2) == '99') {
                                    if (substr($nddffGroup, 3, 4) == "00") {
                                        throw new Exception("Error : Since the wind direction is not null, its speed must also be not null.");
                                    } else {
                                        //Group 8NhClCmCH
                                        //Amount of low or middle cloud
                                        $cloudArray = $report->getAmountLowOrMiddleCloud();
                                        //  dd(substr((int)$cloudArray[1],4,1));
                                        if ($cloudArray = $report->getAmountLowOrMiddleCloud()) {
                                            if (substr((int) $cloudArray[1], 1, 1) >= 0 && substr((int) $cloudArray[1], 1, 1) <= 8 && substr((int) $cloudArray[1], 1, 1) <= (int) substr($nddffGroup, 0, 1)) {
                                                // dd(true);
                                                if ((substr((int) $cloudArray[1], 1, 1) == 0 && substr((int) $cloudArray[1], 2, 1) != 0) || (substr((int) $cloudArray[1], 1, 1) == 8 && substr((string) $cloudArray[1], 2, 1) != '/') || (substr((string) $cloudArray[1], 4, 1) == '/' && substr((int) $cloudArray[1], 3, 1) != 8)) { //dd(false);
                                                    throw new Exception('Error: Invalid Amount of low or middle cloud group');
                                                }
                                            }
                                        } else {
                                            throw new Exception('Error : Group 8NhClCmCh was not found.');
                                        }
                                        $report->getAmountLowOrMiddleCloud(); //2 eight of sky covered

                                        //Form of low cloud
                                        $report->getFormLowCloud(); //Stratocumulus not resulting from the spreading out of Cumulus

                                        //Form of medium cloud
                                        $report->getFormMediumCloud(); //Semi-transparent Altocumulus in bands, or Altocumulus in one or more fairly continuous layers (semi-transparent or opaque), progressively invading the sky; these Altocumulus clouds generally thicken as a whole

                                        //Form of high cloud
                                        $report->getFormHighCloud(); //Cirrus, Cirrocumulus and Cirrostartus invisible owing to darkness, fog, blowing dust or sand, or other similar phenomena or more often because of the presence of a continuous layer of lower clouds
                                        //Group 8NsChshs
                                        //Amount of individual cloud layer
                                        $section3 = strstr($message, '333');
                                        $groupesSection3 = explode(" ", $section3);
                                        //  dd($groupesSection3);
                                        //Debut test
                                        global $groupe8;
                                        foreach ($groupesSection3 as $groupe) {
                                            if (substr($groupe, 0, 1) === '8') {
                                                $groupe8 = $groupe;
                                                break;
                                            }
                                        }

                                        if (isset($groupe8)) {
                                            $trouve = true;
                                        } else {
                                            $trouve = false;
                                        }
                                        // fin test
                                        if ($trouve) {

                                            if (!((int) substr($groupe8, 1, 1) >= 1 && (int) substr($groupe8, 1, 1) <= 8 && (int) substr($groupe8, 1, 1) < (int) substr($nddffGroup, 0, 1))) {
                                                throw new Exception('Error : Nebulosity value in 8NsChshs group is not valid!');
                                            }
                                            if (!((int) substr($groupe8, 2, 1) >= 0 && (int) substr($groupe8, 2, 1) <= 9)) {
                                                throw new Exception('Error : Amount of individual cloud value is invalid in 8NsChshs group !!');

                                            }
                                            $report->getAmountIndividualCloudLayer();
                                            //Form of cloud (additional cloud information)
                                            $report->getFormCloud(); //NULL

                                            //Height of base of cloud layer (additional cloud information)
                                            $report->getHeightCloud(); //NULL

                                            //Unit for a form of cloud (additional cloud information)
                                            $report->getHeightCloudUnit(); //NULL
                                        } else {
                                            throw new Exception('Error : Group 8NsChshs was not found.');
                                        }
                                    }
                                } else
                                    throw new Exception("Error : Invalid wind direction value.");
                            }
                        }
                        /*------------------------------Group NDDff--------------------------------------*/
                        //Group NDDff//
                        /*------------------------------Group NDDff--------------------------------------*/



                        /*------------------------------Group 1SnTTT--------------------------------------*/
                        //Group 1SnTTT
/*------------------------------Group 1SnTTT--------------------------------------*/

                        $OneSnTTTIndex = array_search($groupsArray[5], $groupsArray);
                        //dd($OneSnTTTIndex,$groupsArray[$OneSnTTTIndex ]);
                        $OneSnTTTGroup = $groupsArray[$OneSnTTTIndex];
                        // dd(substr($OneSnTTTGroup, 1,1));
                        if (((int) $report->getAirTemperature()) > 0.0 && ((int) $report->getAirTemperature()) < 50.0) {
                            if (substr($OneSnTTTGroup, 1, 1) != "0" && substr($OneSnTTTGroup, 1, 1) != "1") {
                                throw new Exception("Error : Invalid air temperature sign.");
                            }

                            //Air temperature
                            $report->getAirTemperature(); //3.9
                            //Unit for air temperature
                            $report->getAirTemperatureUnit(); //degree C

                        } else
                            throw new Exception("Error : Ivalid air temperature value.");


                        /*------------------------------Group 1SnTTT--------------------------------------*/
                        //Group 1SnTTT
/*------------------------------Group 1SnTTT--------------------------------------*/



                        //Group 3P0P0P0
                        if ($report->getStationLevelPressure() && $report->getSeaLevelPressure()) {
                            if ($report->getStationLevelPressure() > 880.0 && $report->getStationLevelPressure() < 1050.0) {
                                if ($report->getStationLevelPressure() > $report->getSeaLevelPressure()) {
                                    throw new Exception("Error : Atmospheric pressure at station level should be less than the atmospheric pressure reduced to mean sea level.");
                                }
                            } else
                                throw new Exception("Error : Ivalid atmospheric pressure at station level value.");
                        }
                        //Atmospheric pressure at station level
                        $report->getStationLevelPressure(); //1004.9

                        //Unit for atmospheric pressure at station level
                        $report->getStationLevelPressureUnit(); //hPa

                        //Group 4PPPP
                        //Atmospheric pressure reduced to mean sea level
                        //dd((int)$report->getSeaLevelPressure());
                        if ($report->getSeaLevelPressure() && $report->getSeaLevelPressure()) {
                            if (!((int) $report->getSeaLevelPressure() > 880.0 && (int) $report->getSeaLevelPressure() < 1050.0)) {
                                throw new Exception('Error : Ivalid atmospheric pressure reduced to mean sea level value.');
                            }
                        }
                        $report->getSeaLevelPressure(); //1010.1

                        //Unit for atmospheric pressure reduced to mean sea level
                        $report->getSeaLevelPressureUnit(); //hPa

                        //Group 5appp




                        // dd($report->getBaricTendency());
                        if ($report->getBaricTendency()) {
                            if (!($report->getTime() == '14' || $report->getTime() == '01' || $report->getTime() == '02' || $report->getTime() == '04' || $report->getTime() == '05' || $report->getTime() == '07' || $report->getTime() == '08' || $report->getTime() == '10' || $report->getTime() == '11' || $report->getTime() == '13' || $report->getTime() == '16' || $report->getTime() == '17' || $report->getTime() == '19' || $report->getTime() == '20' || $report->getTime() == '22' || $report->getTime() == '23')) {
                                if (((int) $report->getBaricTendency()[0] >= 0 && (int) $report->getBaricTendency()[0] <= 8)) {
                                    $messageHour = (int) $report->getTime();
                                    $messageDay = (int) $report->getDay();
                                    $threeHoursAgoHour = ($messageHour >= 3) ? ($messageHour - 3) : (24 - (3 - $messageHour));
                                    $threeHoursAgoDay = ($messageHour >= 3) ? $messageDay : ($messageDay - 1);
                                    // dd($messageHour,$messageDay,$threeHoursAgoHour,$threeHoursAgoDay);
                                    // Récupérez tous les enregistrements de la table
                                    $messages = SynopticMessage::all();

                                    foreach ($messages as $msg) {
                                        $messageText = $msg->message;
                                        $groupes = explode(' ', $messageText);
                                        // dd($groupes);
                                        $cinquiemeGroupe = $groupes[4];
                                        // dd($cinquiemeGroupe);
                                        // dd((int)substr($cinquiemeGroupe, 0, 2)===$threeHoursAgoDay);
                                        if ((int) substr($cinquiemeGroupe, 0, 2) == $threeHoursAgoDay && (int) substr($cinquiemeGroupe, 2, 2) == $threeHoursAgoHour) {
                                            // dd(true);
                                            // start
                                            // Trouvez l'indice du groupe '333'
                                            $indiceGroupe333 = array_search('333', $groupes);
                                            // dd($groupes[$indiceGroupe333]);
                                            if ($indiceGroupe333 !== false) {
                                                // Parcourez les groupes à partir de l'indice 11 jusqu'à '333'
                                                $sousChaineGroupes = [];
                                                for ($i = 10; $i < $indiceGroupe333; $i++) {
                                                    $sousChaineGroupes[] = $groupes[$i];
                                                }

                                                // Rejoignez les groupes pour former la sous-chaîne
                                                $sousChaine = implode(' ', $sousChaineGroupes);
                                                // dd($sousChaine);
                                                $souschainegroupes = explode(' ', $sousChaine);
                                                // dd($souschainegroupes);
                                                // Parcourez les groupes et cherchez celui dont le premier caractère est '3'
                                                global $groupeTrouve;
                                                foreach ($souschainegroupes as $chainegroupe) {
                                                    if (substr($chainegroupe, 0, 1) === '3') {
                                                        // dd(true);
                                                        $groupeTrouve = $chainegroupe;
                                                        break;
                                                    }
                                                }
                                            }
                                            //  dd($report->getStationLevelPressure(),$groupeTrouve);
                                            $p0p0p0 = substr($chainegroupe, 1, 4);
                                            $realvalp0p0p0 = (float) ('1' . substr($chainegroupe, 1, 3) . '.' . substr($chainegroupe, 4, 1));
                                            // dd($realvalp0p0p0 === $report->getStationLevelPressure());
                                            if ((($report->getStationLevelPressure() > $realvalp0p0p0) && !($report->getBaricTendency()[0] >= 0 && $report->getBaricTendency()[0] <= 3))) {
                                                throw new Exception('Error : Baric tendency should be one of those values {0,1,2 or 3} !!');
                                            } else if ((($report->getStationLevelPressure() < $realvalp0p0p0) && !($report->getBaricTendency()[0] >= 5 && $report->getBaricTendency()[0] <= 8))) {
                                                throw new Exception('Error : Baric tendency should be one of those values {5,6,7 or 8} !!');
                                            } else if ((($report->getStationLevelPressure() === $realvalp0p0p0) && !($report->getBaricTendency()[0] == 0 || $report->getBaricTendency()[0] == 4 || $report->getBaricTendency()[0] == 5))) {
                                                throw new Exception('Error : Baric tendency should be one of those values {0,5 or 4} !!');
                                            }
                                        }
                                    }
                                } else {
                                    throw new Exception('Error : Invalid baric tendency value.');
                                }
                                if (!((int) $report->getBaricTendency()[1] >= 0 && (int) $report->getBaricTendency()[1] <= 5)) {
                                    //dd($report->getBaricTendency()[1]);
                                    throw new Exception('Error : Invalid pressure change over last three hours value.');
                                }
                            } else {

                                throw new Exception('Error : The group 5appp should not exists!');
                            }
                        }
                        //Pressure change over last three hours

                        $report->getBaricTendency();
                        //Unit for pressure change over last three hours
                        $report->getBaricTendencyUnit(); //hPa

                        // -----------------------------5appp--------------------------------------//
                        //Group 5appp
// -----------------------------5appp--------------------------------------//

                        // -----------------------------6RRRtr--------------------------------------//
                        //Group 6RRRtr
// -----------------------------6RRRtr--------------------------------------//


                        if (($report->getTime() == '00' || $report->getTime() == '06' || $report->getTime() == '12' || $report->getTime() == '18')) {
                            if ($report->getAmountRainfall() == null) {
                                throw new Exception('Error: The group 6RRRtr should appear!!');
                            } else {
                                // dd($report->getDurationPeriodRainfall());
                                if (!((int) $report->getAmountRainfall() >= 1 && (int) $report->getAmountRainfall() <= 3)) {
                                    throw new Exception('Error: Invalid amount rainfall value at 6RRRtr group !!');
                                }
                                if ($report->getDurationPeriodRainfall() == 1 && !(((int) $report->getTime() == 00 || (int) $report->getTime() == 12))) {
                                    throw new Exception('Error: Invalid duration period rainfall value at 6RRRtr group !!');
                                }
                                if ($report->getDurationPeriodRainfall() == 4 && (int) $report->getTime() != 06) {
                                    throw new Exception('Error: Invalid duration period rainfall value at 6RRRtr group !!');
                                }
                                if ($report->getDurationPeriodRainfall() == 2 && (int) $report->getTime() != 18) {
                                    throw new Exception('Error: Invalid duration period rainfall value at 6RRRtr group !!');
                                }

                                $report->getAmountRainfall(); //1

                                //Unit for amount of rainfall
                                $report->getAmountRainfallUnit(); //mm

                                //Duration period of rainfall
                                $report->getDurationPeriodRainfall(); //At 0600 and 1800 GMT
                            }
                        } else {
                            if ($report->getAmountRainfall() != null) {
                                throw new Exception('Error: The group 6RRRtr should not exist!!');
                            }
                        }

                        // -----------------------------6RRRtr--------------------------------------//
                        //Group 6RRRtr
// -----------------------------6RRRtr--------------------------------------//


                        // -----------------------------7wwW1W2--------------------------------------//
                        //Group 7wwW1W2
// -----------------------------7wwW1W2--------------------------------------//


                        if ($report->getPresentWeather()) {
                            // dd($report->getPresentWeather());$report->getPastWeather();
                            $weatherVals = substr($report->getPresentWeather(), 1, 4);
                            //present weather
                            $presentW = substr($weatherVals, 0, 2);
                            //Past weather
                            $pastW = substr($weatherVals, 2, 2);
                            // dd($presentW,$pastW);
                            if (!((int) $presentW >= 0 && (int) $presentW <= 99)) {
                                throw new Exception('Error : Invalid present weather value !!');
                            }
                            if (!((int) $pastW >= 0 && (int) $pastW <= 99)) {
                                throw new Exception('Error : Invalid past weather value !!');
                            }

                        }



                        // -----------------------------7wwW1W2--------------------------------------//
                        //Group 7wwW1W2
// -----------------------------7wwW1W2--------------------------------------//


                        // -----------------------------2SnTdTdTd--------------------------------------//
                        //Group 2SnTdTdTd
// -----------------------------2SnTdTdTd--------------------------------------//

                        //Dew point temperature
                        $report->getDewPointTemperature(); //-0.7

                        //Unit for dew point temperature
                        $report->getDewPointTemperatureUnit(); //degree C

                        // -----------------------------2SnTdTdTd--------------------------------------//
                        //Group 2SnTdTdTd
// -----------------------------2SnTdTdTd--------------------------------------//

                        //-----------------------------Section 2----------------------------------


                        $groupes = explode(' ', $message);
                        // dd($groupes);
                        // Étape 1: Extraire une sous-chaîne à partir de l'indice 7 jusqu'à la fin
                        $indiceGroupe333 = array_search('333', $groupes) - 1;
                        $indiceGroupe7 = 7;
                        if ($indiceGroupe7 < count($groupes)) {
                            $sousChaineEtape1 = array_slice($groupes, $indiceGroupe7, $indiceGroupe333 - 7 + 1);
                            // dd($sousChaineEtape1);
                            global $groupeTrouvee;
                            global $sousChaineEtape2;
                            foreach ($sousChaineEtape1 as $groupe) {
                                if (strpos($groupe, '222') === 0) {
                                    $groupeTrouvee = $groupe;
                                    break; // Sortez de la boucle dès que le groupe est trouvé
                                }
                            }
                            if ($groupeTrouvee !== null) {
                                $indiceGroupe222 = array_search($groupeTrouvee, $sousChaineEtape1);
                                $sousChaineEtape2 = array_slice($sousChaineEtape1, $indiceGroupe222 + 1);
                                dd($sousChaineEtape2);
                            }
                            if ($sousChaineEtape2) {

                                //--------------------------------222DsVs------------------------
                                //222DsVs
//--------------------------------222DsVs------------------------

                                if ($groupeTrouvee !== null) {
                                    // Étape 3: Vérifier et effectuer des tests si nécessaire
                                    // dd("Groupe trouvé : " . $groupeTrouvee);
                                    $dsvs = substr($groupeTrouvee, 3, 2);
                                    // dd($dsvs);
                                    if (!(substr($dsvs, 0, 1) >= 1 && substr($dsvs, 0, 1) <= 9 && substr($dsvs, 1, 1) >= 1 && substr($dsvs, 1, 1) <= 9)) {
                                        throw new Exception('Error : Invalid values for Ds & Vs in 22DsVs group !!');
                                    }

                                }
                                //--------------------------------222DsVs------------------------
                                //222DsVs
//--------------------------------222DsVs------------------------


                                //--------------------------------0snTwTwTw------------------------
                                //0snTwTwTw
//--------------------------------0snTwTwTw------------------------
                                global $ZerosnTwTwTw;
                                foreach ($sousChaineEtape2 as $groupe) {
                                    if (strpos($groupe, '0') === 0) {
                                        $ZerosnTwTwTw = $groupe;
                                        // dd($ZerosnTwTwTw);
                                        break;
                                    }
                                }

                                if ($ZerosnTwTwTw !== null) {
                                    //  dd("Groupe trouvé : " . $ZerosnTwTwTw);
                                    if ((int) substr($ZerosnTwTwTw, 1, 1) !== 0 && (int) substr($ZerosnTwTwTw, 1, 1) !== 1) {
                                        throw new Exception('Error : Invalid water temperature sign !!');
                                    }
                                    if (!((((int) substr($ZerosnTwTwTw, 2, 4)) / 10) >= 0.1 && (((int) substr($ZerosnTwTwTw, 2, 4)) / 10) <= 20.0)) {
                                        throw new Exception('Error : Invalid water temperature value !! ');
                                    }
                                }
                                //--------------------------------0snTwTwTw------------------------
                                //0snTwTwTw
//--------------------------------0snTwTwTw------------------------

                                //--------------------------------1PwaPwaHwaHwa------------------------
                                //1PwaPwaHwaHwa
//--------------------------------1PwaPwaHwaHwa------------------------

                                global $OnePwaPwaHwaHwa;
                                foreach ($sousChaineEtape2 as $groupe) {
                                    if (strpos($groupe, '1') === 0) {
                                        $OnePwaPwaHwaHwa = $groupe;
                                        // dd($OnePwaPwaHwaHwa);
                                        break;
                                    }
                                }

                                if ($OnePwaPwaHwaHwa !== null) {
                                    //  dd("Groupe trouvé : " . $OnePwaPwaHwaHwa);
                                    // dd((int)substr($OnePwaPwaHwaHwa,3,2));
                                    if (!((int) substr($OnePwaPwaHwaHwa, 1, 2) >= 0 && (int) substr($OnePwaPwaHwaHwa, 1, 2) <= 60)) {
                                        throw new Exception('Error : Invalid waves period instrumental value !!');
                                    }
                                    if (!((int) substr($OnePwaPwaHwaHwa, 3, 2) >= 0 && (int) substr($OnePwaPwaHwaHwa, 3, 2) <= 15)) {
                                        throw new Exception('Error : Invalid waves hight instrumental value !! ');
                                    }
                                }

                                //--------------------------------1PwaPwaHwaHwa------------------------
                                //1PwaPwaHwaHwa
//--------------------------------1PwaPwaHwaHwa------------------------



                                //--------------------------------2PwPwHwHw------------------------
                                //2PwPwHwHw
//--------------------------------2PwPwHwHw------------------------

                                global $TwoPwPwHwHw;
                                foreach ($sousChaineEtape2 as $groupe) {
                                    if (strpos($groupe, '2') === 0) {
                                        $TwoPwPwHwHw = $groupe;
                                        // dd($TwoPwPwHwHw);
                                        break;
                                    }
                                }

                                if ($TwoPwPwHwHw !== null) {
                                    //  dd("Groupe trouvé : " . $TwoPwPwHwHw);
                                    // dd((int)substr($TwoPwPwHwHw,1,2));
                                    if (!((int) substr($TwoPwPwHwHw, 1, 2) >= 0 && (int) substr($TwoPwPwHwHw, 1, 2) <= 60)) {
                                        throw new Exception('Error : Invalid waves period estimated value !!');
                                    }
                                    if (!((int) substr($TwoPwPwHwHw, 3, 2) >= 0 && (int) substr($TwoPwPwHwHw, 3, 2) <= 15)) {
                                        throw new Exception('Error : Invalid waves hight estimated value !! ');
                                    }
                                }

                                //--------------------------------2PwPwHwHw------------------------
                                //2PwPwHwHw
//--------------------------------2PwPwHwHw------------------------



                                //--------------------------------3dw1dw1dw2dw2------------------------
                                //3dw1dw1dw2dw2
//--------------------------------3dw1dw1dw2dw2------------------------
                                global $threedw1dw1dw2dw2;
                                foreach ($sousChaineEtape2 as $groupe) {
                                    if (strpos($groupe, '3') === 0) {
                                        $threedw1dw1dw2dw2 = $groupe;
                                        // dd($threedw1dw1dw2dw2);
                                        break;
                                    }
                                }

                                if ($threedw1dw1dw2dw2 !== null) {
                                    //  dd("Groupe trouvé : " . $threedw1dw1dw2dw2);
                                    // dd((int)substr($threedw1dw1dw2dw2,1,2));
                                    if (!((int) substr($threedw1dw1dw2dw2, 1, 2) >= 0 && (int) substr($threedw1dw1dw2dw2, 1, 2) <= 36)) {
                                        throw new Exception('Error : Invalid direction wave of the first system value!!');
                                    }
                                    if (!((int) substr($threedw1dw1dw2dw2, 3, 2) >= 0 && (int) substr($threedw1dw1dw2dw2, 3, 2) <= 36)) {
                                        throw new Exception('Error : Invalid direction wave of the second system value !! ');
                                    }
                                }
                                //--------------------------------3dw1dw1dw2dw2------------------------
                                //3dw1dw1dw2dw2
//--------------------------------3dw1dw1dw2dw2------------------------

                                //--------------------------------6IsEsEsRs------------------------
                                //6IsEsEsRs
//--------------------------------6IsEsEsRs------------------------

                                global $sixIsEsEsRs;
                                foreach ($sousChaineEtape2 as $groupe) {
                                    if (strpos($groupe, '6') === 0) {
                                        $sixIsEsEsRs = $groupe;
                                        // dd($sixIsEsEsRs);
                                        break;
                                    }
                                }

                                if ($sixIsEsEsRs !== null) {
                                    //  dd("Groupe trouvé : " . $sixIsEsEsRs);
                                    // dd((int)substr($sixIsEsEsRs,1,1));
                                    if (!((int) substr($sixIsEsEsRs, 1, 1) >= 0 && (int) substr($sixIsEsEsRs, 1, 1) <= 9)) {
                                        throw new Exception('Error : The type of icing on ships is invalid !!');
                                    }
                                    if (!((int) substr($sixIsEsEsRs, 2, 2) >= 0 && (int) substr($sixIsEsEsRs, 2, 2) <= 50)) {
                                        throw new Exception('Error : Accumulated ice thickness is invalid !! ');
                                    }
                                    if (!((int) substr($sixIsEsEsRs, 4, 1) >= 0 && (int) substr($sixIsEsEsRs, 4, 1) <= 9)) {
                                        throw new Exception('Error : The value for the speed at which ice accumulates on the vessel is invalid !!');
                                    }
                                }

                                //--------------------------------6IsEsEsRs------------------------
                                //6IsEsEsRs
//--------------------------------6IsEsEsRs------------------------


                                //--------------------------------ICE + cisibiDizi------------------------
                                //ICE + cisibiDizi
//--------------------------------ICE + cisibiDizi------------------------

                                global $ICEcisibidizi;
                                foreach ($sousChaineEtape2 as $groupe) {
                                    if (strpos($groupe, 'ICE') === 0) {
                                        $ICEcisibidizi = $groupe;
                                        // dd($ICEcisibidizi);
                                        break;
                                    }
                                }

                                if ($ICEcisibidizi !== null) {
                                    //  dd("Groupe trouvé : " . $ICEcisibidizi);
                                    $IceETcisibidizi = explode('+', $ICEcisibidizi);
                                    $cisibidizi = $IceETcisibidizi[1];
                                    // dd($cisibidizi);
                                    if (!((int) $cisibidizi >= 0 && (int) $cisibidizi <= 99999)) {
                                        throw new Exception('Error : Invalid value in the group ICE+ cisibidizi!!');
                                    }

                                }


                                //--------------------------------ICE + cisibiDizi------------------------
                                //ICE + cisibiDizi
//--------------------------------ICE + cisibiDizi------------------------
                            }

                        }
                        //----------------------------- End Section 2----------------------------------




                        //-----------------------------Section 3----------------------------------

                        //------------------------------------------------------------------------------
                        //Group 1SnTxTxTx
//------------------------------------------------------------------------------

                        //Maximum air temperature
                        if ($report->getMaxAirTemperature()) //9.1
                        { //dd(true);
                            if (((int) $report->getAirTemperature()) > ((int) $report->getMaxAirTemperature())) {
                                throw new Exception('Error : Max temperature should be higher than the ambient dry temperature.');
                            }

                            if (!(((int) $report->getMaxAirTemperature()) >= 0 && ((int) $report->getMaxAirTemperature()) <= 50)) {
                                throw new Exception('Error : Invalid temperature value.');
                            }

                        }
                        //Unit for maximum air temperature
                        $report->getMaxAirTemperatureUnit(); //degree C

                        //------------------------------------------------------------------------------
                        //Group 2SnTnTnTn
//------------------------------------------------------------------------------

                        //Minimum air temperature
                        //Debut test 
                        $groupe555 = '555';
                        if (preg_match('/\s' . preg_quote($groupe555) . '\s/', $message, $matches)) {
                            // echo "Groupe trouvé.";
                            $trouve555 = true;
                        } else {
                            // echo "Groupe non trouvé dans la chaîne.";
                            $trouve555 = false;
                        }
                        //fin test 
                        // dd($report->getMinAirTemperature(), $report->getMaxAirTemperature(), ((int) $report->getMinAirTemperature()) < ((int) $report->getMaxAirTemperature()));

                        if ($trouve555) {
                            if ($report->getMaxAirTemperature()) {
                                if (((int) $report->getMinAirTemperature()) > ((int) $report->getMaxAirTemperature())) {
                                    throw new Exception('Error : Max temperature should be higher than the min temperature.');
                                }
                            }
                            if ($report->getAirTemperature()) {
                                if (((int) $report->getMinAirTemperature()) > ((int) $report->getAirTemperature())) {
                                    throw new Exception('Error : Dry ambiant temperature should be higher than the min temperature.');
                                }
                            }
                            if (!(((int) $report->getMinAirTemperature()) >= 0 && ((int) $report->getMinAirTemperature()) <= 50)) {
                                throw new Exception('Error : Invalid temperature value.');
                            }
                        } //NULL

                        //Unit for minimum air temperature
                        $report->getMinAirTemperatureUnit(); //NULL
//------------------------------------------------------------------------------
                        //Group 3ESnTgTg
//------------------------------------------------------------------------------
                        // dd($report->getStateGroundWithoutSnow());
                        if ($report->getStateGroundWithoutSnow()) {
                            //state of ground for case ground without snow or measurable ice cover
                            $report->getStateGroundWithoutSnow(); //NULL

                            //Grass minimum temperature for case ground without snow or measurable ice cover
                            $report->getMinTemperatureOfGroundWithoutSnow(); //NULL

                            //Unit for grass minimum temperature for case ground without snow or measurable ice cover
                            $report->getMinTemperatureOfGroundWithoutSnowUnit(); //NULL
                        }
                        //------------------------------------------------------------------------------
                        //Group 4E'sss
//------------------------------------------------------------------------------

                        //State of ground for case ground with snow or measurable ice cover
                        $report->getStateGroundWithSnow(); //NULL

                        //Depth of snow
                        $report->getDepthSnow(); //NULL

                        //Unit for depth of snow
                        $report->getDepthSnowUnit(); //NULL

                        //------------------------------------------------------------------------------
                        //Group 55SSS
                        //------------------------------------------------------------------------------

                        //Duration of daily sunshine
                        if ($report->getDurationSunshine()) {
                            if (!((int) $report->getDurationSunshine() >= 0 && (int) $report->getDurationSunshine() <= 150)) {
                                throw new Exception('Error : Duration of daily sunshine value is invalid');
                            }
                        } //NULL

                        //Unit for a duration of daily sunshine
                        $report->getDurationSunshineUnit(); //NULL
//------------------------------------------------------------------------------
                        //Group 6RRRtr
//------------------------------------------------------------------------------

                        //Amount of rainfall
                        // dd($report->getRegionalExchangeAmountRainfall());
                        if ($report->getRegionalExchangeAmountRainfall()) {
                            if ($report->getRegionalExchangeAmountRainfall()[1]) {
                                if (!((float) $report->getRegionalExchangeAmountRainfall()[1] >= 0.0 && (float) $report->getRegionalExchangeAmountRainfall()[1] <= 0.9)) {
                                    throw new Exception('Error : Invalid amount of rainfall value !');
                                }
                                //Duration period of rainfall
                                if ((int) $report->getRegionalExchangeDurationPeriodRainfall() != 7) {
                                    throw new Exception('Error: Duration period of rainfall should be 7!');
                                }
                                //Unit for amount of rainfall
                                $report->getRegionalExchangeAmountRainfallUnit(); //NULL

                                //dd($report->getRegionalExchangeDurationPeriodRainfall()); //NULL
                            }
                        } //NULL



                        /*-----------------Etete-----------------------------------*/
                        if ($report->getTime() == '00' || $report->getTime() == '06' || $report->getTime() == '12' || $report->getTime() == '18')
                            $TT = 'SM';
                        else if ($report->getTime() == '03' || $report->getTime() == '09' || $report->getTime() == '15' || $report->getTime() == '21')
                            $TT = 'SI';
                        else
                            $TT = 'SN';
                        $TTAAii = $TT . 'MC40';
                        $wholemessage = $TTAAii . ' ' . "GMMi" . ' ' . $report->getDay() . $report->getTime() . '00' . ' ' . $message;
                        // dd($wholemessage);
                        $username = Auth::user()->name;
                        // Create a new instance of SynopticMessage model
                        $synopticMessage = new SynopticMessage();
                        $synopticMessage->message = $wholemessage;
                        $synopticMessage->username = $username;
                        $synopticMessage->save();

                        //connexion ftp et envoie au serveur.
                        $messageContent = $wholemessage;
                        // Écrire le contenu dans un fichier temporaire
                            $tempFilePath = tempnam(sys_get_temp_dir(), 'message');
                            file_put_contents($tempFilePath, $messageContent);
                            $fileCommandsPath = 'C:\\Users\\LENOVO\\OneDrive\\Bureau\\II-BDCC\\PremièreAnnée\\Stage d\'observation\\commandes.txt';
                            // Utiliser la commande système pour transférer le fichier via FileZilla
                            $remotePath = '.';
                            $command = 'Téléchargements\\FileZilla.exe -u "usaouiraa:Saouiraa15TRans" -p 21 -b "' . $fileCommandsPath . '"';
                            $commands = [
                                "open ftp://172.16.0.38",
                                "put \"$tempFilePath\" \"$remotePath\"",
                                "bye"
                            ];
                            file_put_contents($fileCommandsPath, implode("\n", $commands));
                            exec($command);
                            // Nettoyer le fichier temporaire
                            unlink($tempFilePath);
                        //Transmission HTTP

                         // Informations du serveur distant
                            // $serverHost = "172.16.0.38";
                            // $serverPort = 21;
                            // $serverUsername = "usaouiraa";
                            // $serverPassword = "Saouiraa15TRans";
                            // $remotePath = ".";

                            // // Connexion FTP
                            // $ftp = ftp_connect($serverHost, $serverPort);
                            // ftp_login($ftp, $serverUsername, $serverPassword);
                            // ftp_chdir($ftp, $remotePath);

                            // // Écrire le contenu dans un fichier temporaire
                            // $tempFilePath = tempnam(sys_get_temp_dir(), 'message');
                            // $tempFilePathWithExtension = $tempFilePath; // Use .x extension directly
                            // // dd($tempFilePathWithExtension);
                            // file_put_contents($tempFilePathWithExtension, $messageContent);

                            // // Envoi du fichier avec l'extension .x
                            // $remoteFilename = "SAOUIRA.tmp";
                            // ftp_nb_put($ftp, $remoteFilename, $tempFilePathWithExtension, FTP_BINARY);

                            // // Nettoyage
                            // unlink($tempFilePathWithExtension);

                            // // Fermeture de la connexion FTP
                            // ftp_close($ftp);

                        Toastr::success('success', 'Message submitted successfully!');
                        return redirect()->back()->with('success', 'Message submitted successfully!');
                    } else {
                        throw new Exception("Error in area number or number station !!");
                    }
                } else {
                    throw new Exception("Message must ends with = caracter!!");
                }
            } else {
                throw new Exception("Empty message");
            }
        } catch (Exception $e) {
            // Toastr::error('Wrong weather report format :)', 'Error');
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('error_message', $errorMessage);
        }

    }
}