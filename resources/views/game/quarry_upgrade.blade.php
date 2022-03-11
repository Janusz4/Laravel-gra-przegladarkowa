<?php
use App\Models\User;
use App\Models\Quarry;
use App\Models\Village;

$user = User::find(Auth::user()->id);
$village = Village::where('id_user', Auth::user()->id)->get();
$village = $village[0];
$quarry = Quarry::find($village->id_quarry);

if($user->wood - $quarry->wood >= 0 && $user->stone - $quarry->stone >= 0) {
    $user->wood = $user->wood - $quarry->wood;
    $user->stone = $user->stone - $quarry->stone;
    $user->update();

    $village->id_quarry = Quarry::where('level', $quarry->level + 1)
        ->first()
        ->id;
    $village->update();
}
