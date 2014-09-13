@extends('layout')

@section('content')

    <h1>Create a new store</h1>

    @foreach ($errors->all() as $message)
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endforeach

    {!! Form::open(['url' => route('stores.store'), 'role' => 'form']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Store name:' ) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('stores.index') }}" class="btn">Cancel</a>
    {!! Form::close() !!}
@endsection