@extends('layouts.index')

@section('content')
<a href="/create"> Add</a>
@foreach ($membres as $membre )

<p>
    {{ $membre->nom }}
</p>
<p>
    {{ $membre->age }}
</p>

<img width="50" src="{{ asset('img/'. $membre->image) }}" alt="">


{{-- //genre qui se trouve dans la function du models membre --}}
<p>

    {{ $membre->genre->genre }}
</p>

<a href="/{{ $membre->id }}/edit">Edit</a>
@endforeach

@endsection
