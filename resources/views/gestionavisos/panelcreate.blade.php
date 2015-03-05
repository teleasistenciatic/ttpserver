@extends('app')

@section('content')

<ul>
    @foreach($errors->all() as $error)
        <li></li>
    @endforeach
</ul>

    {!! Form::open([]) !!}

    {!! Form::text('name', @$name) !!}

    {!! Form::password('password') !!}

    {!! Form::submit('Send') !!}

    {!! Form::close() !!}

@endsection
