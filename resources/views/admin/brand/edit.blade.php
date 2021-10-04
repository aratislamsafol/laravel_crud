@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Brand Add
                </div>
                <div class="card-body">
                    <form action="{{url('Brand/item/edit/'.$brand_edit->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Brand1" class="form-label">Brand Name</label>
                            <input type="text" name="brand_name"
                             class="form-control @error('brand_name') is-invalid

                            @enderror" id="Brand1"
                            value="{{$brand_edit->Brand_name}}"
                            >
                            @error('brand_name')
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
