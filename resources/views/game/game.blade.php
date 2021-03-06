@extends('layouts.app')

@section('content')
<script src="{{ asset('js/skrypt.js') }}" defer></script>
<h1 class="text-center logo">Osadnicy</h1>
<div class="menu row">

    <div class="col-md-2">Witaj {{Auth::user()->name}}</div>
    <div id="surowce" class="col-md-6"></div>
    <div class="col-md-2">
        <span class="fas fa-medal"
        style="position:relative; top:3px; margin-right:5px; font-size:18px;">
        </span>
        <span id="ranking" style="cursor: pointer;">Ranking</span>
    </div>
    <div class="col-md-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <span class="glyphicon glyphicon-log-out"
            style="position:relative;
            top:3px;
            margin-right:5px;
            font-size:18px;">
            </span>
            <button type="submit" class="logout">Wyloguj się</button>
        </form>
    </div>

</div>
<div class="container" style="min-height: 92vh;">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4 budynek">
            <span class="fab fa-fort-awesome img"
             id ="zamek"
             onclick="show('zamek_info')">
            </span>
            <p>Zamek</p>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4 budynek">
            <span class="fa fa-tree img" id ="tartak" onclick="show('tartak_info')"></span>
            <p>Tartak</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4 budynek">
            <span class="fas fa-mountain img" id ="kamieniolom" onclick="show('kamieniolom_info')"></span>
            <p>Kamieniołom</p>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4 budynek">
            <img src = "images/field.png" id ="pole" class="img" onclick="show('pole_info')">
            <p>Pole</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4 budynek">
            <span class="fas fa-campground img" id ="koszary" onclick="show('koszary_info')"></span>
            <p>Koszary</p>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4 budynek">
            <img src = "images/sword.png" class="img" id ="atakuj" onclick="show('atakuj_info')">
            <p>Atakuj</p>
        </div>
    </div>
    <div id="zamek_info" class="popup_content col-12 col-md-6">Zamek, poziom, koszt ulepszenia<a href = " " onclick="close(zamek)">Close</a></div>
    <div id="tartak_info" class="popup_content col-12 col-md-6">Tartak</div>
    <div id="kamieniolom_info" class="popup_content col-12 col-md-6">kamieniolom</div>
    <div id="pole_info" class="popup_content col-12 col-md-6">Pole</div>
    <div id="koszary_info" class="popup_content col-12 col-md-6">Koszary</div>
    <div id="atakuj_info" class="popup_content col-12 col-md-6">Atak</div>
    <div id="ranking_info" class="popup_content col-12 col-md-6">ranking</div>

    <div id="fade" class="black_overlay"></div>
</div>
@endsection
