@extends('partials.template')

@section('content')
<div class="container mt-4">

    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/categories" style="text-decoration: none">Categories</a></li>
          <li class="breadcrumb-item"><a href="/categories/{{ $books->categories_id }}/books" style="text-decoration: none">{{ $books->category->name }}</a></li>
        </ol>
    </nav>
    <!--End Breadcrumb-->
    <div class="col-md-12">

        <div class="text-center">
            <h5 class="books-title">{{ $books->title }}</h5>

            <img src="{{ asset('img/Books/' . $books->image_url) }}" class="books-img mt-2 mb-4" alt="">
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <p class="books-description">{{ $books->description }}</p>

                <table class="table table-stripped mt-3">
                    <tr>
                        <th>Category</th>
                        <th>:</th>
                        <td>{{ $books->category->name }}</td>
                    </tr>
                    <tr>
                        <th>Release Year</th>
                        <th>:</th>
                        <td>{{ $books->release_year }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <th>:</th>
                        <td>{{ $books->price }}</td>
                    </tr>
                    <tr>
                        <th>Total Page</th>
                        <th>:</th>
                        <td>{{ $books->total_page }}</td>
                    </tr>
                    <tr>
                        <th>Thickness</th>
                        <th>:</th>
                        <td>{{ $books->thickness }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>



</div>



@endsection
