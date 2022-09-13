@extends('layouts.index')

@section('content')

<form action="/{{ $edit->id }}/update" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

<input type="text" name='nom' value="{{ $edit->nom }}">

<input type="number" name="age"value="{{ $edit->age}}" >

<input type="file" value="{{ $edit->image}}" name="image" id="">

<select name="genre_id"  id="">
    <option value="{{ $edit->genre_id }}"> {{ $edit->genre->genre }}</option>
@foreach ( $genres as $genre)
@if ($genre->id !=  $edit->genre_id )
<option value="{{ $genre->id }}">{{ $genre->genre }}</option
@endif>
@endforeach
</select>
<input type="submit" value="addddd">
</form>

@endsection
