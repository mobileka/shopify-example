@extends('layout')

@section('content')
    <a href="{{ route('stores.index') }}">Back to a store list</a>
    <h1>Webhooks of the {{ $store->name }} store</h1>
    <a href="{{ route('stores.hooks.create', [$store->id])  }}" class="btn btn-primary">Create a new webhook</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>topic</th>
                <th>address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $hook)
                <tr>
                    <td>{{{ $hook['id'] }}}</td>
                    <td>{{{ $hook['topic'] }}}</td>
                    <td>{{{ $hook['address'] }}}</td>
                    <td>
                        {!! Form::open(['url' => route('stores.hooks.destroy', [$store->id, $hook['id']]), 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


