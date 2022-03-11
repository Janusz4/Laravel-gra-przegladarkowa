<?php
use App\Models\User;
use App\Models\Sawmill;
use App\Models\Village;

$user = User::find(Auth::user()->id);
$village = Village::where('id_user', Auth::user()->id)->get();
$village = $village[0];
$sawmill = Sawmill::find($village->id_sawmill);

if($user->wood - $sawmill->wood >= 0 && $user->stone - $sawmill->stone >= 0) {
    $user->wood = $user->wood - $sawmill->wood;
    $user->stone = $user->stone - $sawmill->stone;
    $user->update();

    $village->id_sawmill = Sawmill::where('level', $sawmill->level + 1)
        ->first()
        ->id;
    $village->update();
}
