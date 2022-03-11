<?php
use App\Models\Castle;
use App\Models\Village;

$village = Village::where('id_user', Auth::user()->id)->get();
$castle = Castle::find($village[0]->id_castle);
?>

@if(isset(Auth::user()->id))

      <div class="row">
      <div class="col-sm-11 col-11 budynek-nazwa">Zamek</div>
      <div class="col-sm-1 col-1">
          <i class="fa fa-window-close zamknij" onclick="closeB('zamek_info')">
          </i>
      </div>
      </div>
      <p>
          Poziom: {{$castle->level}}
      </p>
      <p>
          Koszt ulepszenia
      </p>

      @if($castle->level < Castle::max('level'))
          <p>
              Drewno: {{$castle->wood}}
          </p>
          <p>
              Kamień: {{$castle->stone}}
          </p>
          <button class="btn-primary" id="ulepsz_zamek">Ulepsz</button>
      @else
          <p>Osiągnięto maksymalny poziom budynku.</p>
      </br>
      @endif

@endif
