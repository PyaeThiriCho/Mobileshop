@extends('backend.layout')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header text-center py-3">
                <h4 class="m-0 font-weight-bold text-primary">Edit Brands</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('brands.update',$brand->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="brandName" class="form-control @error('brandName') is-invalid @enderror" id="brandName" value="{{ old('brandName', $brand->name ?? '') }}">
                            
                            @error('brandName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('brands.index') }}" class="btn btn-secondary me-2">Back</a>
                        <button type="submit" class="btn btn-primary px-4">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
