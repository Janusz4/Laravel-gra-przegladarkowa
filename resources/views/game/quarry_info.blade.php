<?php
use App\Models\Quarry;
use App\Models\Village;
use App\Models\Castle;

$village = Village::where('id_user', Auth::user()->id)->get();
$quarry = Quarry::find($village[0]->id_quarry);
$castle = Castle::find($village[0]->id_castle);

?>

@if(isset(Auth::user()->id))

    <div class="row">
    <div class="col-sm-11 col-11 budynek-nazwa">Kamieniołom</div>
    <div class="col-sm-1 col-1">
        <i class="fa fa-window-close zamknij" onclick="closeB('kamieniolom_info')"></i>
    </div>
    </div>
    <p>
        Poziom: {{$quarry->level}}
    </p>
    <p>
        Produkcja: {{$quarry->production}} szt./min
    </p>
    <p>Koszt ulepszenia

    @if($quarry->level < Quarry::max('level'))
      <p>
          Drewno: {{$quarry->wood}}
      </p>
      <p>
          Kamień: {{$quarry->stone}}
      </p>
      @if($quarry->level < $castle->level)
          <button class="btn-primary" id="ulepsz_kamieniolom">Ulepsz</button>
      @else
          <p>Aby ulepszyć ten mudynek twój zamek musisz rozbudować swój zamek.</p>
      @endif
    @else
      <p>Osiągnięto maksymalny poziom budynku.</p>
    @endif

@endif
