@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{{$title}}</div>
        <div class="card-body">
            {!! form_start($form) !!}
            {!! form_rest($form) !!}
            @method('PUT')
            <button class="btn btn-outline-danger" type="submit">Update</button>
            <a href="{{route('category.index')}}" class="btn btn-outline-secondary" type="submit">All Categories</a>
            {!! form_end($form) !!}
        </div>
        <div class="card-footer">{{config('app.name')}}</div>
    </div>

@endsection
