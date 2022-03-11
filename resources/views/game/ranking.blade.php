<?php
$players = DB::table('users')
    ->select('glory', 'name')
    ->orderBy('glory', 'DESC')
    ->take(100)
    ->get();
?>

<div class="row">
    <div class="col-sm-11 col-11 budynek-nazwa">
        Ranking
    </div>
    <div class="col-sm-1 col-1">
        <i class="fa fa-window-close zamknij" onclick="closeB('ranking_info')"></i>
    </div>
</div>
<table>
    <tr>
        <td>Miejsce</td>
        <td>Nick</td>
        <td>Chwała</td>
    </tr>
    @php
        $miejsce = 1;
    @endphp
    @foreach ($players as $player)
        <tr>
            <td>{{ $miejsce }}</td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->glory }}</td>
        </tr>
        @php
            $miejsce++;
        @endphp
    @endforeach
</table>
