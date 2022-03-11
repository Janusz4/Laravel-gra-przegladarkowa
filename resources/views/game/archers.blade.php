<?php
use App\Models\User;
use App\Models\Army;

$user = User::find(Auth::user()->id);
$army = Army::find($user->id_army);

//koszt rekrutacji jednostki wynosi 700
if($user->creral >= 700) {
    $user->creral = $user->creral - 700;
    $user->update();

    $army->archers = $army->archers + 1;
    $army->update();
}
