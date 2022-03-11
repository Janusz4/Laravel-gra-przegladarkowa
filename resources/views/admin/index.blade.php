@extends('layouts.app')

@section('content')

<h1 class="logo">Osadnicy</h1>
<h3 class="text-center">Panel administratora</h3>
<div class="menu row">
    <div class="col-md-2">Witaj {{Auth::user()->name}}</div>
    <div class="col-md-8"></div>
    <div class="col-md-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <span class="glyphicon glyphicon-log-out"
            style="position:relative;
            top:3px;
            margin-right:5px;
            font-size:18px;">
            </span>
            <a href="logout.php"><button type="submit">Wyloguj się</button></a>
        </form>
    </div>
</div>
	<div class="container" style="min-height: 92vh;">
    <div class="text-light row justify-content-center">
        <div class="col-0 col-md-2"></div>
        <div class="main-div col-12 col-md-8 bg-primary text-center">
            <input type="text" placeholder="Nick" name="nick" id="search">

            <table>
                <thead>
                    <tr>
                        <th>Nick</th>
                        <th>E-mail</th>
                        <th>Administrator</th>
                        <th>Zablokowany</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>

    </div>

</div>

@endsection

@section('script')
<script type="text/javascript">
    $.ajax({
        type : 'GET',
        url : '{{URL::to('search')}}',
        data:{'search':''},
        success:function(data) {
            $('tbody').html(data);
        }
    });

    $(document).ready(function() {
        $('#search').keyup(function() {
            $value=$(this).val();
            $.ajax({
                type : 'GET',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data) {
                    $('tbody').html(data);
                }
            });
        })
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection
