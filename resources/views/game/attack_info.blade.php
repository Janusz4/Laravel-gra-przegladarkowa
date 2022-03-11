<?php
use App\Models\User;
use App\Models\Army;

$users = DB::table('users')
    ->where('id', '!=', Auth::user()->id)
    ->orderBy(DB::raw('ABS(glory - ' . Auth::user()->glory . ')'), 'ASC')
    ->take(5)
    ->get();

$army = Army::find(Auth::user()->id_army);
?>

@if(isset(Auth::user()->id))
    <form action="/attack" method="post">
    @csrf
    <div class="row">
    <div class="col-sm-11 col-11 budynek-nazwa">Atakuj</div>
    <div class="col-sm-1 col-1">
        <i class="fa fa-window-close zamknij" onclick="closeB('atakuj_info')"></i>
    </div>
    </div>

    @foreach ($users as $user)
      <label for="przeciwnik">{{$user->name}}</label>
      <input type="radio"
      name="przeciwnik"
      value="{{$user->id_army}}"
      checked="checked">
    @endforeach

    <table>
        <tr>
            <td>Wojownicy</td>
            <td>
                <input type="number"
                class="number"
                name="wojownicy"
                value="0"
                min="0"
                max="{{$army->worriors}}"/>
                /{{$army->worriors}}
            </td>
        </tr>
        <tr>
            <td>Łucznicy</td>
            <td>
                <input type="number"
                class="number"
                name="lucznicy"
                value="0"
                min="0"
                max="{{$army->archers}}"/>
                /{{$army->archers}}
            </td>
        </tr>
    </table>
    <input class="btn-primary" type="submit" value="Atakuj"/>

    </form>
@endif
