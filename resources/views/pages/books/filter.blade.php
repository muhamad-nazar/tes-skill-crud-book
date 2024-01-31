@extends('partials.template')

@section('content')

<div class="container mt-4">

    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" style="text-decoration: none">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $title }} Books</li>
        </ol>
    </nav>
    <!--End Breadcrumb-->

    <!-- Pemberitahuan Filter -->
    @if($filterParams)
    <div class="alert alert-info mt-3">
        <p>Filtered by:</p>
        <ul>
            @foreach($filterParams as $key => $value)
            <li>{{ ucfirst($key) }}: {{ $value }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row mb-5">
        <!-- Looping Buku -->
        @forelse ($books as $book)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="books-title">{{ $book->title }}</h5>
                        <img src="{{ asset('img/Books/' . $book->image_url) }}" class="mt-2 mb-2" style="width: 150px; height: 150px; object-fit: contain;" alt="">
                        <p class="books-description">Category: {{ $book->category->name }}</p>
                        <p class="books-description">Release Year: {{ $book->release_year }}</p>
                        <p class="books-description">Total Pages: {{ $book->total_page }}</p>
                        <a class="btn mt-2" style="background-color: #1D3557; color: #fff;">Views</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No books found.</p>
        @endforelse
        <!-- End Looping Buku -->

    </div>
</div>

@endsection
