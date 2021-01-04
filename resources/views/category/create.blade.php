@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{{$title}}</div>
        <div class="card-body">
            {!! form_start($form,['url'=>route('category.store'),'url'=>route('category.store')]) !!}
            {!! form_rest($form) !!}
            <button class="btn btn-outline-primary" type="submit">Create</button>
            <a href="{{route('category.index')}}" class="btn btn-outline-secondary" type="submit">All Categories</a>
            {!! form_end($form) !!}
        </div>
        <div class="card-footer">{{config('app.name')}}</div>
    </div>

@endsection
