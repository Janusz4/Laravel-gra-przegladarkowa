<?php
use App\Models\Field;
use App\Models\Village;
use App\Models\Castle;

$village = Village::where('id_user', Auth::user()->id)->get();
$field = Field::find($village[0]->id_field);
$castle = Castle::find($village[0]->id_castle);
?>

@if(isset(Auth::user()->id))

    <div class="row">
    <div class="col-sm-11 col-11 budynek-nazwa">Pole</div>
    <div class="col-sm-1 col-1">
        <i class="fa fa-window-close zamknij" onclick="closeB('pole_info')"></i>
    </div>
    </div>
    <p>
        Poziom: {{$field->level}}
    </p>
    <p>
        Produkcja: {{$field->production}} szt./min
    </p>
    <p>Koszt ulepszenia

    @if($field->level < Field::max('level'))
      <p>
          Drewno: {{$field->wood}}
      </p>
      <p>
          Kamień: {{$field->stone}}
      </p>
      @if($field->level < $castle->level)
          <button class="btn-primary" id="ulepsz_pole">Ulepsz</button>
      @else
          <p>
              Aby ulepszyć ten budynek twój zamek musisz rozbudować swój zamek.
          </p>
      @endif
    @else
      <p>Osiągnięto maksymalny poziom budynku.</p>
    @endif

@endif
