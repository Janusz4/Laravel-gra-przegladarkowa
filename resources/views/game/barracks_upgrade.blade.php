<?php
use App\Models\User;
use App\Models\Barrack;
use App\Models\Village;

$user = User::find(Auth::user()->id);
$village = Village::where('id_user', Auth::user()->id)->get();
$village = $village[0];
$barrack = Barrack::find($village->id_barracks);

if($user->wood - $barrack->wood >= 0 && $user->stone - $barrack->stone >= 0) {
    $user->wood = $user->wood - $barrack->wood;
    $user->stone = $user->stone - $barrack->stone;
    $user->update();

    $village->id_barracks = Barrack::where('level', $barrack->level + 1)
        ->first()
        ->id;
    $village->update();
}
