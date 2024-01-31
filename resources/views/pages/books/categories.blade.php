@extends('partials.template')

@section('content')
<div class="container mt-4">

    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" style="text-decoration: none">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
    </nav>
    <!--End Breadcrumb-->

    <button type="button" class="btn my-3" style="background-color: #1D3557;color:#fff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create Category
    </button>

    <!--Modal Create Category-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" style="color: #1D3557;font-weight:600;" id="exampleModalLabel">Create Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/categories/add" method="POST">
                @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <input type="text" class="form-control" name="category" required id="Categories" placeholder="Category Name">
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background-color: #1D3557;color:#fff;">Create</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!--End Modal Create Category-->



    <!-- DataTales Categories -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #1D3557;font-weight:600;">Books Categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th style="border-bottom: 1px solid #dee2e6">Category Name</th>
                            <th style="border-bottom: 1px solid #dee2e6">Update</th>
                            <th style="border-bottom: 1px solid #dee2e6">View</th>
                            <th style="border-bottom: 1px solid #dee2e6">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Looping and Update Categories -->
                        @foreach ($category as $c)
                        <tr class="text-center">
                            <form action="/categories/update/{{ $c->id }}" method="POST">
                                @csrf
                                <td style="border-bottom: 1px solid #dee2e6">
                                    <input type="text" required value="{{ $c->name }}" name="category" class="form-control">
                                    <span style="display: none">{{ $c->name }}</span>
                                </td>
                                <td style="border-bottom: 1px solid #dee2e6"><button class="btn text-warning" type="submit"><i class="bi bi-pencil-square"></i></button></td>
                                <td style="border-bottom: 1px solid #dee2e6"><a class="btn text-primary" href="/categories/{{ $c->id }}/books"><i class="bi bi-table"></i></a></td>
                                <td style="border-bottom: 1px solid #dee2e6"><a class="btn text-danger" onclick="return confirm('Sure to Delete This Categories From List Category?')" href="/categories/delete/{{ $c->id }}"><i class="bi bi-trash-fill"></i></a></td>
                            </form>
                        </tr>
                        @endforeach
                        <!--Looping and Update Categories -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
