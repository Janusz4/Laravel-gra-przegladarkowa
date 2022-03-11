<?php
use App\Models\Sawmill;
use App\Models\Village;
use App\Models\Castle;

$village = Village::where('id_user', Auth::user()->id)->get();
$sawmill = Sawmill::find($village[0]->id_sawmill);
$castle = Castle::find($village[0]->id_castle);
?>

@if(isset(Auth::user()->id))

    <div class="row">
    <div class="col-sm-11 col-11 budynek-nazwa">Tartak</div>
    <div class="col-sm-1 col-1">
        <i class="fa fa-window-close zamknij" onclick="closeB('tartak_info')"></i>
    </div>
    </div>
    <p>
        Poziom: {{$sawmill->level}}
    </p>
    <p>
        Produkcja: {{$sawmill->production}} szt./min
    </p>
    <p>Koszt ulepszenia

    @if($sawmill->level < Sawmill::max('level'))
      <p>
          Drewno: {{$sawmill->wood}}
      </p>
      <p>
          Kamień: {{$sawmill->stone}}
      </p>
      @if($sawmill->level < $castle->level)
          <button class="btn-primary" id="ulepsz_tartak">Ulepsz</button>
      @else
          <p>
              Aby ulepszyć ten mudynek twój zamek musisz rozbudować swój zamek.
          </p>
      @endif
    @else
      <p>Osiągnięto maksymalny poziom budynku.</p>
    @endif

@endif
