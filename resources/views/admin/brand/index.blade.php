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
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $brands)
                          <tr>
                            <th scope="row">{{$brand->firstItem()+$loop->index}}</th>
                            <td>{{$brands->Brand_name}}</td>
                            <td><img src="{{asset($brands->Brand_image)}}" style="height: 40px; width:90px" alt=""></td>
                            @if ($brands==Null)
                            <span>No Time Set</span>
                            @else
                            <td>{{$brands->created_at->diffForHumans()}}</td>
                            @endif
                            <td>
                                <a href="" class="btn btn-success btn-sm">View</a>
                                <a href="{{url('Brand/item/edit/'.$brands->id)}}" class="btn btn-primary btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#brand_edit">Edit</a>
                                <a href="{{url('Brand/delete/'.$brands->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>

                    </table>
                    {{ $brand->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Brand Add
                </div>
                <div class="card-body">
                    <form action="{{route('Brand.Add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="brand1" class="form-label">Brand Name</label>
                            <input type="text" name="brand_name"
                             class="form-control @error('brand_name') is-invalid

                            @enderror" id="brand1"
                            placeholder="Want to Add Brand!!!"
                            >
                            @error('brand_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="brand_image1">Brand Image</label>
                            <input type="file" name="Brand_image" class="form-control
                            @error('Brand_image') is-invalid
                            @enderror" id="brand_image1" placeholder="Enter Brang Image"
                            >

                            @error('Brand_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-sm">ADD</button>
                    <form>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
