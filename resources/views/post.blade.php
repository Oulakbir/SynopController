@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<link rel="icon" type="image/x-icon" href="img/logoWB.png" />
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Form</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Form Input</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                            <form method="POST" action="{{ route('store-user') }}">
                            @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" placeholder="Name" class="form-control" name="name">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" placeholder="Email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="dateInput">Join Date</label>
                                        <input type="date" class="form-control" id="dateInput" name="join_date" readonly>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
@section('script')

@endsection
@endsection
