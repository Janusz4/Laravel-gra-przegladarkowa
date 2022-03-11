@if(isset(Auth::user()->id))
    <div class="row">
        <div class="col-md-3">Drewno {{ Auth::user()->wood }}</div>
        <div class="col-md-3">Kamień {{ Auth::user()->stone }}</div>
        <div class="col-md-3">Zboże {{ Auth::user()->creral; }}</div>
        <div class="col-md-3">Chwała {{ Auth::user()->glory; }}</div>
    </div>
@endif
