<?php
use App\Models\User;
use App\Models\Field;
use App\Models\Village;

$user = User::find(Auth::user()->id);
$village = Village::where('id_user', Auth::user()->id)->get();
$village = $village[0];
$field = Field::find($village->id_field);

if($user->wood - $field->wood >= 0 && $user->stone - $field->stone >= 0) {
    $user->wood = $user->wood - $field->wood;
    $user->stone = $user->stone - $field->stone;
    $user->update();

    $village->id_field = Field::where('level', $field->level + 1)
        ->first()
        ->id;
    $village->update();
}
