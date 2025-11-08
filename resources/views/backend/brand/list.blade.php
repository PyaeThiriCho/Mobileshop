@extends('backend.layout')

@section('content')

  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   <h1 class="h3 mt-4 text-center text-gray-800">Users List</h1>
                    
            {{-- success code --}}          
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Brands</h6>
        <a href="{{ route('brands.create')}}" class="btn btn-primary">Add User</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td>
                            <a href="{{ route('brands.edit', $brand->id)}}" class="btn btn-sm btn-primary">Edit</a>
                         
                            <form action="{{ route('brands.destroy',$brand->id)}}" method="POST" class="d-inline-block">
                               @method('DELETE')
                               @csrf
                                
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    
                    </tr>
                   
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection