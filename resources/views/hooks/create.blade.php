@extends('layout')

@section('content')

    <h1>Create a new webhook for the {{{ $store->name }}} store</h1>

    @foreach ($errors->all() as $message)
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endforeach

    {!! Form::open(['url' => route('stores.hooks.store', [$store->id]), 'role' => 'form']) !!}
        <div class="form-group">
            {!! Form::label('topic', 'Webhook topic:' ) !!}
            {!! Form::text('topic', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Webhook address:' ) !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('stores.hooks.index', [$store->id]) }}" class="btn">Cancel</a>
    {!! Form::close() !!}
@endsection