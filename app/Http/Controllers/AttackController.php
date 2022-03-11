<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Army;
use App\Models\User;

class AttackController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('game.attack_info');
    }

    public function store(Request $request) {
        $player1 = $request->post('wojownicy') + 4 * $request->post('lucznicy');

        $army = Army::find($request->post('przeciwnik'));

        $player2 = $army->worriors + 4 * $army->archers;

        if($player1 > $player2) {
            $user = auth()->user();
            $user->glory = $user->glory + 1;
            $user->update();
        }

        $user = auth()->user();
        $army = Army::find($user->id);
        $army->worriors = $army->worriors - $request->post('wojownicy');
        $army->archers = $army->archers - $request->post('lucznicy');
        $army->update();

        return redirect('/game');
    }
}
