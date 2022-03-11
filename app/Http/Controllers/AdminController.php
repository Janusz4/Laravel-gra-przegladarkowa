<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        $user = Auth::user();

        if($user->admin) {
            $users = User::all();

            return view('admin.index', [
                'users' => $users
            ]);
        }

        return view('index');
    }

    public function search(Request $request) {
        if($request->ajax()) {
            $output = "";

            $users = DB::table('users')
            ->where('name','LIKE','%'.$request->search."%")
            ->get();

            if($users) {
                foreach ($users as $key => $user) {
                    $output.='<tr>'.
                    '<td>'.$user->name.'</td>'.
                    '<td>'.$user->email.'</td>';
                    if($user->admin) {
                        $output.='<td>Tak</td>';
                    }
                    else {
                        $output.='<td>Nie</td>';
                    }
                    if($user->banned) {
                        $output.='<td>Tak</td>
                        <td>
                            <a href="/admin/unban/'.$user->id.'">Odbanuj</a>
                        </td>';
                    }
                    else {
                        $output.='<td>Nie</td>
                        <td>
                            <a href="/admin/ban/'.$user->id.'">Zbanuj</a>
                        </td>';
                    }
                    $output.='</tr>';
                }
                return Response($output);
            }
        }
    }

    public function ban($id) {
        $user = User::find($id);
        $user->banned = 1;
        $user->update();

        return redirect('/admin');
    }

    public function unban($id) {
        $user = User::find($id);
        $user->banned = 0;
        $user->update();

        return redirect('/admin');
    }
}
