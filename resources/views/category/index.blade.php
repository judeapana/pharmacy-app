@extends('layouts.app')
@section('content')
    <div class="col-md">
        @if (count($cats) > 0)
            <div class="col-md-12 p-4 ">
                <a href="{{route('category.create')}}" class=" btn-outline-secondary btn">Create New Category</a>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cats as $cat)
                    <tr>
                        <td>{{$cat->cat_name}}</td>
                        <td>{{$cat->description}}</td>
                        <td>
                            <a href="{{route('category.edit',$cat->id)}}"
                               class="btn btn-outline-primary">Edit</a>
                            <a href="{{route('category.destroy',$cat->id)}}" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-md-12 text-center">
                {{$cats->links()}}
            </div>
        @else
            <div class="col-md-9 text-center mt-lg-5">
                <h4>No Categories Available </h4>
                <p>
                    <a href="{{route('category.create')}}" class="btn btn-outline-secondary">Create New
                        Category
                    </a>
                </p>
            </div>
    @endif

@endsection



