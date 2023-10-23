
@foreach($tables as $table)
    <a href="{{ route('add.player',$table->id) }}">{{ $table->name }}</a>
@endforeach





