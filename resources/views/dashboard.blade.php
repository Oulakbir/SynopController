<x-app-layout>
  <l ik rel="stylesheet" href="https://fonts.googleapis.com/cssfamily=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <l ik rel="stylesheet" href="css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bs-stepper.min.css">
  <l ik rel="icon" type="image/x-icon" href="img/logoWB.png" />
  <style>
    *{
        font-family:"Tims-new-romain";

    }
    a{
        text-decoration:none;
    }
     .invalid-input {
    border: 1px solid red; /* Bordure rouge pour indiquer un champ invalide */
     color: red; /* Texte en rouge pour une indication supplémentaire */
} 
     /* Custom Dialog Box Styles */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width:100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .modal-content {
    background-color:#f08080;
    color:white;
    font-size: large;
    font-weight: bold;
    box-shadow: 0 2px 4px rgba(2, 2, 2, 2.2);
    border-radius:10px;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width:30%;
  }
.modal-content p{
    text-align: center;
}
  .close {
    font-weight: bolder;
    font-size: 20px;
    float: right !important;
    cursor: pointer;
    color: red;
    display:inline;
  }

  </style>  
  <x-slot name="header">
        <h6 class="font-semibold text-l  text-gray-800 dark:text-gray-200 leading-tight">
           Enter your synoptic message to control.
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row m-5 p-5">
                        <div class="col-md-12">
                            <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">SYNOP Controller</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="bs-stepper linear">
                                <div class="bs-stepper-header" role="tablist">
                                    <!-- your steps here -->
                                    <div class="step active" data-target="#logins-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger" aria-selected="true">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">General information</span>
                                    </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger" aria-selected="false" disabled="disabled">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Input grid</span>
                                    </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <!-- your steps content here -->
                                    <div id="logins-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="logins-part-trigger">
                                    <div class="form-group">
                                        <label for="dateInput">Time</label>
                                        <input type="date" class="form-control" id="dateInput" disabled>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="exampleInputTime1">Message time</label>
                                        <select class="form-control" id="exampleInputTime1" required>
                                        <option disabled selected>Choose time</option>
                                            <option value="0">00</option>
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                            <option value="5">05</option>
                                            <option value="6">06</option>
                                            <option value="7">07</option>
                                            <option value="8">08</option>
                                            <option value="9">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                        </select>
                                    </div> -->
                                    
                                    <div class="form-group">
                                        <label for="exampleInputCity1">City</label>
                                        <select class="form-control" id="exampleInputCity1" disabled>
                                            <option value="60220" {{ $stationInformation->stationId == 60220 ? 'selected' : '' }}>Essaouira</option>
                                            <option value="60222" {{ $stationInformation->stationId == 60222 ? 'selected' : '' }}>Essaouira</option>
                                            <option value="60185" {{ $stationInformation->stationId == 60185 ? 'selected' : '' }}>Casablanca</option>
                                            <option value="60255" {{ $stationInformation->stationId == 60255 ? 'selected' : '' }}>Marrakech</option>
                                        </select>

                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="exampleInputTextArea1">Symbolic formula</label>
                                        <textarea class="form-control" id="exampleInputTextArea1" placeholder="Formula" disabled></textarea>
                                    </div> -->
                                    <br><br>
                                    <button class="btn btn-primary" id="nextButn" onclick="stepper.next()">Next</button>
                                    <a href="/test-connexion" id="testBtn" class="btn btn-primary">Connexion test</a>
                                    </div>
                                    @if(session()->has('success'))
                                        <div class="alert alert-success m-3">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    
                                    <form id="synopticForm" action="{{ route('submit.form') }}" method="post">
                                                @csrf
                                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                        <div class="card card-light">
                                            <hr>
                                            
                                                <div class="card-body" >
    
                                                    <div class="form-group">
                                                            <label>SYNOP message:</label>

                                                            <div class="input-group" style="display: flex;align-items:center;vertical-align:middle;">
                                                                <div class="input-group-prepend" style="margin-right:0px;">
                                                                <span class="input-group-text" style="margin:0px;"><img width="25" style="margin:0px;" src="{{URL::to('img/email.png')}}" alt=""></span>
                                                                </div>
                                                                <input type="text" style="margin-left:0px;" class="form-control m-2" name="Synopmessage" id="Synopmessage" placeholder="Tape you message here...">
                                                            </div>
                                                            <!-- /.input group -->
                                                    </div>   
                                                </div>
                                            <!-- /.card-body -->
                                            <hr>
                                        </div>
                                        
                                            <!--  -->
                                                <br><br>
                                                <input type="hidden" name="synopContent" id="synopContent" value="">
                                                <button class="btn btn-primary" id="previousButton" onclick="stepper.previous()">Previous</button>
                                                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        <!-- Custom Dialog Box HTML -->
                                            <div id="customDialog" class="modal">
                                            <div class="modal-content">
                                                <span class="close text-danger" onclick='hideDialog()'><img class="rounded-circle" width="35" src="{{URL::to('img/closef.png')}}" alt=""></span>
                                                <p id="dialogMessage text-dark">
                                                {{ session('error_message') }} <!-- Affiche le message d'erreur provenant de la session flash -->
                                                </p>
                                            </div>
                                            </div>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                                <br><br>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div style="display:none">
                                        <input type="hidden" id="form0" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 5appp 6RRR1 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR7 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 00UUU (54g0sndT) 553SS 2FFFF 6RRR5 (931SS)=">
                                        <input type="hidden" id="form1" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form2" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form3" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP 5appp (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR7 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5 (931SS)=">
                                        <input type="hidden" id="form4" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form5" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form6" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 5appp 6RRR4 7wwW1W2 8NhCLCMCH 9GGgg 333 2snTnTnTn 3EsnTgTg 55SSS 2F24F24F24F24 6RRR7 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 00UUU 1snTxTxTx 33SSS (54g0sndT) 553SS 2FFFF 6RRR5 (931SS)=">
                                        <input type="hidden" id="form7" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form8" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form9" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 5appp 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR7 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 4EEE1 4EEE4 553SS 2FFFF 6RRR5 7dxdxfxfx (00fxfxfx) 77HhHhHh 8UmUmUnUn=">
                                        <input type="hidden" id="form10" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form11" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form12" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 5appp 6RRR1 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR7 (4E'sss) 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 00UUU (54g0sndT) 553SS 2FFFF 6RRR5 (931SS)=">
                                        <input type="hidden" id="form13" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form14" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form15" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP 5appp (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR7 8NsChshs 910ff 911ff 950Nmn3 (960ww) 555 553SS 2FFFF 6RRR5 (931SS)=">
                                        <input type="hidden" id="form16" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 953Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form17" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 953Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form18" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 5appp 6RRR2 7wwW1W2 8NhCLCMCH 9GGgg 333 1snTxTxTx 6RRR7 7R24R24R24R24 8NsChshs 910ff 911ff 953Nmn3 (960ww) 555 00UUU 2snTnTnTn (54g0sndT) 553SS 2FFFF 6RRR5 (931SS)=">
                                        <input type="hidden" id="form19" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 953Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form20" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 953Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form21" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 5appp 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR7 8NsChshs 910ff 911ff 953Nmn3 (960ww) 555 553SS 2FFFF 6RRR5 (931SS)=">
                                        <input type="hidden" id="form22" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 953Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                        <input type="hidden" id="form23" value="iRiXhVV Nddff 1snTTT 2snTdTdTd 3P0P0P0 4PPPP (4a3hhh) 7wwW1W2 8NhCLCMCH 9GGgg 333 6RRR5 8NsChshs 910ff 911ff 953Nmn3 (960ww) 555 553SS 2FFFF 6RRR5=">
                                     </div>
                </div>
            </div>
        </div>
    </div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/adminlte copy.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/bs-stepper.js"></script>
<script src="js/bs-stepper.min.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function () {
        var stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
        var stepper = new Stepper(document.querySelector('.bs-stepper'))
        stepper.next()
        // Obtenir la date actuelle
      var currentDate = new Date();

        // Formater la date au format "YYYY-MM-DD" pour définir la valeur du champ de saisie
        var year = currentDate.getFullYear();
        var month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Ajoute un zéro devant si nécessaire
        var day = currentDate.getDate().toString().padStart(2, '0'); // Ajoute un zéro devant si nécessaire
        var formattedDate = year + '-' + month + '-' + day;
        // Définir la valeur du champ de saisie de type date avec la date actuelle
        document.getElementById("dateInput").value = formattedDate
</script>
<script>
    // document.getElementById('exampleInputTime1').addEventListener('change',changer);
    // function changer(){
    // let temps=parseInt(document.getElementById('exampleInputTime1').value);
    // // console.log(temps)
    // let formule=document.getElementById(`form${temps}`);
    // // console.log(formule)
    // document.getElementById('exampleInputTextArea1').innerHTML=formule.value;}

</script>
<script>
    
    // Cette fonction sera appelée lors de la soumission du formulaire
    function prepareSynopContent() {
        // Récupérer le contenu de l'input "Synopmessage"
        var synopContent = document.getElementById("Synopmessage").value;
        // Mettre à jour la valeur du champ caché "synopContent" avec le contenu de l'input
        document.getElementById("synopContent").value = synopContent;
    }
    function showDialog(message) {
    // Afficher la boîte de dialogue
    document.getElementById("customDialog").style.display = "block";
}

function hideDialog() {
    // Masquer la boîte de dialogue
    document.getElementById("customDialog").style.display = "none";
}

window.addEventListener('DOMContentLoaded', (event) => {
        // Vérifiez si un message d'erreur est présent dans les données de la vue
        const errorMessage = "{{ session('error_message') }}";
        if (errorMessage !== "") {
            // Si un message d'erreur est présent, affichez la boîte de dialogue
            showDialog();
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#testBtn').on('click', function(e) {
            e.preventDefault();

            // Effectuer la requête GET vers la route /test-connexion
            $.get('/test-connexion', function(response) {
                // Afficher la réponse dans une boîte de dialogue ou une alerte
                alert(response.message);
            });
        });
    });
</script>
</x-app-layout>
