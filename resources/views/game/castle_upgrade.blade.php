<?php
use App\Models\User;
use App\Models\Castle;
use App\Models\Village;

$user = User::find(Auth::user()->id);
$village = Village::where('id_user', Auth::user()->id)->get();
$village = $village[0];
$castle = Castle::find($village->id_castle);

if($user->wood - $castle->wood >= 0 && $user->stone - $castle->stone >= 0) {
    $user->wood = $user->wood - $castle->wood;
    $user->stone = $user->stone - $castle->stone;
    $user->update();

    $village->id_castle = Castle::where('level', $castle->level + 1)
        ->first()
        ->id;
    $village->update();
}
