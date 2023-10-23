

<form method="post" action="{{ route('store.player',$table->id) }}">
    @csrf
    <label>სახელი</label><br>
    <input type="text" name="name"><br>
    <button type="submit">დამატება</button>
</form>
