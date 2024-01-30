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


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #1D3557">Books Categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th style="border-bottom: 1px solid #dee2e6">Name Category</th>
                            <th style="border-bottom: 1px solid #dee2e6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr class="text-center">
                            <td style="border-bottom: 1px solid #dee2e6">Fantasy</td>
                            <td style="border-bottom: 1px solid #dee2e6">12k12</td>
                       </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
