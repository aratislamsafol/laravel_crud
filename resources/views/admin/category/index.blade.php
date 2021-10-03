@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>{{Auth::user()->name}}</b>

                </div>

                <div class="card-body">
                    @if (session('Success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('Success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">User Id</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $categories)
                          <tr>
                            <th scope="row">{{$category->firstItem()+$loop->index}}</th>
                            <td>{{$categories->user_id}}</td>
                            <td>{{$categories->user_join->name}}</td>
                            <td>{{$categories->categories_name}}</td>
                            @if ($categories==Null)
                            <span>No Time Set</span>
                            @else
                            <td>{{$categories->created_at->diffForHumans()}}</td>
                            @endif
                            <td>
                                <a href="" class="btn btn-success btn-sm">View</a>
                                <a href="{{url('Category/item/edit/'.$categories->id)}}" class="btn btn-primary btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#category_edit">Edit</a>
                                <a href="{{url('Category/delete/'.$categories->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>

                    </table>
                    {{ $category->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Category Add
                </div>
                <div class="card-body">
                    <form action="{{route('store.add')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category1" class="form-label">Category Name</label>
                            <input type="text" name="category_name"
                             class="form-control @error('category_name') is-invalid

                            @enderror" id="category1"
                            placeholder="Please Add Category!!!"
                            >
                            @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-sm">ADD</button>
                    <form>
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>Trush List</b>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">User Id</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($trust_cat as $categories)
                          <tr>
                            <th scope="row">{{$category->firstItem()+$loop->index}}</th>
                            <td>{{$categories->user_id}}</td>
                            <td>{{$categories->user_join->name}}</td>
                            <td>{{$categories->categories_name}}</td>
                            @if ($categories==Null)
                            <span>No Time Set</span>
                            @else
                            <td>{{$categories->created_at->diffForHumans()}}</td>
                            @endif
                            <td>
                                <a href="{{url('Category/restore/'.$categories->id)}}" class="btn btn-primary btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#category_edit">Restore</a>
                                <a href="{{url('Category/p_delete/'.$categories->id)}}" class="btn btn-danger btn-sm">P-Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>

                    </table>
                    {{ $trust_cat->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
@endsection
