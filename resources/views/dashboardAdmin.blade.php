<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SynopticXpress - Synops control</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Facultatif : Lien vers les icônes de Font Awesome (si vous les utilisez) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bs-stepper.min.css">
    <link rel="icon" type="image/x-icon" href="img/Logoc.png" />
</head>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
      *{
        font-family: 'Times New Roman', Times, serif;
      }
      .form-label{
        color:#5F9EA0;
        
      }
      .card-title{
        color:#FF8C00;
        font-size: larger;
        font-weight: bolder;
      }
      .side-title{ 
        font-size: large;
        font-weight: bold;
      }
    </style>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                        
                    </div>
                    
                </header>
            @endif

            <!-- Page Content -->
            <div class="row page-titles rounded" style="margin:20px; font-size:20px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-primary active"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item text-secondary"><a href="http://127.0.0.1:8000/home">Station Infos</a></li>
            </ol>
          </div>
            <main class="justify-content-center d-flex p-5 m-4" style="display:flex;flex-wrap:wrap;justify-content: center; align-items: center;">

                <div class="col-md-5 card card-info p-4 m-3 justify-content-center" >
                <br>
                <div class="card-header">
                        <h3 class="card-title">STATOPN INFOS</h3>
                </div><br><br>
            <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('form.submit') }}" method="post" style="font-size:large;font-weight:bold;">
                        <div class="row">
                                <div class="col-md-6">
                                @csrf
                                    <!-- select -->
                                    <div class="form-group">
                                        <label for="stationId" class="form-label">Station ID  (IIiii)</label>
                                        <select class="form-control" name="stationId" id="stationId" required>
                                        <option disabled selected>Choose ID</option>
                                            <option id="SId1">60220</option>
                                            <option id="SId2">60222</option>
                                            <option id="SId3">60185</option>
                                            <option id="SId4">60255</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stationType" class="form-label">Station type</label>
                                        <select class="form-control"  id="stationType" placeholder="station type" required disabled>
                                            <option id="SType1">Land</option>
                                            <option id="SType2">Sea</option>
                                            <option id="SType3">Mountain</option>
                                            <option id="SType4">Coastal</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label for="Altitude" class="form-label">Altitude</label>
                                        <select class="form-control"id="Altitude" placeholder="altitude" required disabled>
                                            <option id="Alt1">1500</option>
                                            <option id="Alt2">1600</option>
                                            <option id="Alt3">2000</option>
                                            <option id="Alt4">2500</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="stuff" class="form-label">Stuff</label>
                                        <select class="form-control" id="stuff" placeholder="with/without" required disabled>
                                            <option id="stuff1">with</option>
                                            <option id="stuff2">without</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="wind" class="form-label">Wind</label>
                                        <select class="form-control" id="wind" placeholder="mesured/unmesured" required disabled>
                                            <option id="wind1">mesured</option>
                                            <option id="wind2">unmesured</option>
                                        </select>
                                    </div>
                                </div>

                                 <!-- Champs cachés pour stocker les valeurs sélectionnées -->
                                  <input type="hidden" name="stationType" id="hiddenStationType">
                                  <input type="hidden" name="altitude" id="hiddenAltitude">
                                  <input type="hidden" name="stuff" id="hiddenStuff">
                                  <input type="hidden" name="wind" id="hiddenWind">
                            </div>   

                            <br><br><br>
                            <div class="row-md-12 justify-content-center" style="display: flex; justify-content: center; align-items: center;">
                            <button type="submit" class="btn bg-info text-light p-2" ><strong>Submit</strong></button><br>

                            </div>
                        </form>
                    </div>
        <!-- /.card-body -->
                </div>
                <br><br>
    <div class="col-md-5 card  m-5">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title p-3">RANGE CONTROL</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-3">
                <table class="table table-hover text-nowrap h-50">
                  <thead>
                    <tr>
                      <th>Settings</th>
                      <th>Minimum threshold</th>
                      <th>Maximum threshold</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Humidity</td>
                      <td>0</td>
                      <td>100</td>
                      </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Cloudiness</td>
                      <td>0</td>
                      <td>9</td>
                      </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Wind direction</td>
                      <td>0</td>
                      <td>36</td>
                     </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Present time</td>
                      <td>0</td>
                      <td>99</td>
                    </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Past time</td>
                      <td>0</td>
                      <td>9</td>
                    </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Dry temperature</td>
                      <td>-12</td>
                      <td>50</td>
                    </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Dew point temperature</td>
                      <td>-12</td>
                      <td>50</td>
                    </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Wet temperature</td>
                      <td>-12</td>
                      <td>50</td>
                    </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Sea level pressure</td>
                      <td>880</td>
                      <td>1050</td>
                    </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Station pressure</td>
                      <td>880</td>
                      <td>1050</td>
                    </tr>
                    <tr>
                      <td class="side-title" style="color:#5F9EA0;">Visibility</td>
                      <td>0</td>
                      <td>50000</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
    <br><br>
        
            
        </div>
    </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/bs-stepper.js"></script>
        <script src="js/bs-stepper.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
          let stId = document.getElementById('stationId');
            stId.addEventListener('change', f);

            function f() {
              let val = stId.value;

              if (val === document.getElementById('SId1').value) {
                // 
                document.getElementById('stationType').value = document.getElementById('SType1').value;
                document.getElementById('Altitude').value = document.getElementById('Alt1').value;
                document.getElementById('stuff').value = document.getElementById('stuff1').value;
                document.getElementById('wind').value = document.getElementById('wind1').value;

                //
                document.getElementById('hiddenStationType').value = document.getElementById('stationType').value;
                document.getElementById('hiddenAltitude').value = document.getElementById('Altitude').value;
                document.getElementById('hiddenStuff').value = document.getElementById('stuff').value;
                document.getElementById('hiddenWind').value = document.getElementById('wind').value;
                //
              } else if (val === document.getElementById('SId2').value) {
                document.getElementById('stationType').value = document.getElementById('SType1').value;
                document.getElementById('Altitude').value = document.getElementById('Alt2').value;
                document.getElementById('stuff').value = document.getElementById('stuff1').value;
                document.getElementById('wind').value = document.getElementById('wind1').value;

                 //
                 document.getElementById('hiddenStationType').value = document.getElementById('stationType').value;
                document.getElementById('hiddenAltitude').value = document.getElementById('Altitude').value;
                document.getElementById('hiddenStuff').value = document.getElementById('stuff').value;
                document.getElementById('hiddenWind').value = document.getElementById('wind').value;
                //
              } else if (val === document.getElementById('SId3').value) {
                document.getElementById('stationType').value = document.getElementById('SType1').value;
                document.getElementById('Altitude').value = document.getElementById('Alt3').value;
                document.getElementById('stuff').value = document.getElementById('stuff1').value;
                document.getElementById('wind').value = document.getElementById('wind1').value;

                 //
                 document.getElementById('hiddenStationType').value = document.getElementById('stationType').value;
                document.getElementById('hiddenAltitude').value = document.getElementById('Altitude').value;
                document.getElementById('hiddenStuff').value = document.getElementById('stuff').value;
                document.getElementById('hiddenWind').value = document.getElementById('wind').value;
                //
              }
              else if (val === document.getElementById('SId4').value) {
                document.getElementById('stationType').value = document.getElementById('SType1').value;
                document.getElementById('Altitude').value = document.getElementById('Alt4').value;
                document.getElementById('stuff').value = document.getElementById('stuff1').value;
                document.getElementById('wind').value = document.getElementById('wind1').value;

                 //
                 document.getElementById('hiddenStationType').value = document.getElementById('stationType').value;
                document.getElementById('hiddenAltitude').value = document.getElementById('Altitude').value;
                document.getElementById('hiddenStuff').value = document.getElementById('stuff').value;
                document.getElementById('hiddenWind').value = document.getElementById('wind').value;
                //
              }
            }
          });
        </script>
    </body>
</html>
