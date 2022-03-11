<?php
use App\Models\Barrack;
use App\Models\Village;
use App\Models\Castle;
use App\Models\Army;

$village = Village::where('id_user', Auth::user()->id)->get();
$barrack = Barrack::find($village[0]->id_barracks);
$castle = Castle::find($village[0]->id_castle);
$army = Army::find(Auth::user()->id_army);
?>

@if(isset(Auth::user()->id))

          <div class="row">
          <div class="col-sm-11 col-11 budynek-nazwa">Koszary</div>
          <div class="col-sm-1 col-1">
              <i class="fa fa-window-close zamknij" onclick="closeB('koszary_info')"></i>
          </div>
          </div>
          <p>
              Poziom: {{$barrack->level}}
          </p>
          <p>Koszt ulepszenia

          @if($barrack->level < Barrack::max('level'))
              <p>
                  Drewno: {{$barrack->wood}}
              </p>
              <p>
                  Kamień: {{$barrack->stone}}
              </p>
              @if($barrack->level < $castle->level)
                  <button class="btn-primary" id="ulepsz_koszary">Ulepsz</button>
              @else
                  <p>
                      Aby ulepszyć ten budynek
                      twój zamek musisz rozbudować swój zamek.
                  </p>
              @endif
          @else
              <p>Osiągnięto maksymalny poziom budynku.</p>
          @endif

          <p>Wojownicy: {{$army->worriors}}/{{$barrack->worriors}}</p>
          <p>Łucznicy: {{$army->archers}}/{{$barrack->archers}}</p>
        @if(Auth::user()->creral >= 700)
            @if($army->worriors < $barrack->worriors)
                </br>
                <button class="btn-primary" id="rekrutuj_wojownika">
                    Rekrutuj wojownika
                </button>
            @else
                <p>Osiągnięto limit wojowników</p>
            @endif
            @if($army->archers < $barrack->archers)
                </br>
                <button class="btn-primary mt-1" id="rekrutuj_lucznika">
                    Rekrutuj łucznika
                </button>
            @else
                <p>Osiągnięto limit łuczników</p>
            @endif
      @else
          </p>Koszt rekrutacji jednostki wynosi 700 sztuk zboża</p>
      @endif
@endif
