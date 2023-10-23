<center>
<h1>{{ $player->name }}</h1>
    <br>
    @if(isset($player->role))
<h1>{{ $player->role->name }}</h1>
    @endif
</center>
