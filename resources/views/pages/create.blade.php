@extends('layouts.index')

@section('content')

<form action="/store" method="post" enctype="multipart/form-data">
    @csrf

<input type="text" name='nom'>

<input type="number" name="age" >

<input type="file" name="image" id="">

<select name="genre_id"  id="">
@foreach ( $genres as $genre)
<option value="{{ $genre->id }}">{{ $genre->genre }}</option>
@endforeach
</select>
<input type="submit" value="addddd">
</form>

@endsection
