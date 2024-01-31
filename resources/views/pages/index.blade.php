@extends('partials.template')

@section('content')

<div class="container mt-4">

    <h5 class="books-title mb-2">Filter Books</h5>

    <form action="/filter" method="GET">
        <div class="row">

            <div class="col-md-6">
                <!-- Title Search -->
                <div class="form-floating mb-3">
                    <input type="text" id="searchInput" class="form-control" name="title" placeholder="Title">
                    <label>Search Title</label>
                </div>
            </div>

            <div class="col-md-6">
                <!--Sort By-->
                <select class="form-select mb-3" id="sortDirection" name="sortDirection">
                    <option selected disabled>== Sort By ==</option>
                    <option value="desc">Latest</option>
                    <option value="asc">Longest</option>
                </select>
            </div>

            <div class="col-md-6">
                <!-- Filter Tahun -->
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="minYear" id="floatingInput" placeholder="minYear">
                    <label for="floatingInput">Min Year</label>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Filter Tahun -->
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="maxYear" id="floatingInput" placeholder="maxYear">
                    <label for="floatingInput">Max Year</label>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Filter Halaman -->
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="minPage" id="floatingInput" placeholder="minPage">
                    <label for="floatingInput">Min Page</label>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Filter Tahun -->
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="maxPage" id="floatingInput" placeholder="maxPage">
                    <label for="floatingInput">Max Page</label>
                </div>
            </div>

        </div>

        <button class="btn mt-2 mb-2" style="background-color: #1D3557;color:#fff;" >Filter</button>
    </form>

    <div class="row mb-5 mt-2">

        <!--Looping Buku-->
        @foreach ($books as $b)
        <div class="col-md-4 filter-item">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="books-title">{{ $b->title }}</h5>
                        <img src="{{ asset('img/Books/' . $b->image_url) }}" style="width: 150px;height:150px;object-fit:contain;" class="mt-2 mb-2" alt="">
                        <p class="books-description">Category : {{ $b->category->name }}</p>
                        <a class="btn mt-2" href="/books/{{ $b->id }}/{{ $b->title }}" style="background-color: #1D3557;color:#fff;">Views</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!--End Looping Buku-->

    </div>
</div>

<!--Live Search JS-->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#searchInput").on("input", function () {
            var searchText = $(this).val().toLowerCase();

            $(".filter-item").each(function () {
                var productTitle = $(this).find(".books-title").text().toLowerCase();

                if (productTitle.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endsection
