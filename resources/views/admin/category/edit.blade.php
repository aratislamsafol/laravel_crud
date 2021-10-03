@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Category Add
                </div>
                <div class="card-body">
                    <form action="{{url('Category/item/edit/'.$category_id->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category1" class="form-label">Category Name</label>
                            <input type="text" name="category_name"
                             class="form-control @error('category_name') is-invalid

                            @enderror" id="category1"
                            value="{{$category_id->categories_name}}"
                            >
                            @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-sm">Change</button>
                    <form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
