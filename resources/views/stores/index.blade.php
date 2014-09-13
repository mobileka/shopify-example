@extends('layout')

@section('content')
    <h1>Stores</h1>
    <a href="{{ route('stores.create')  }}" class="btn btn-primary">Create a new store</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Token</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $store)
                <tr>
                    <td>{{{ $store->id }}}</td>
                    <td><a href="{{ route('stores.hooks.index', [$store->id]) }}">{{{ $store->name }}}</a></td>
                    <td>{{{ $store->getUrl() }}}</td>
                    <td>{{{ $store->token }}}</td>
                    <td>
                        <p>
                        {!! Form::open(['url' => route('stores.destroy', [$store->id]), 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                        </p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


