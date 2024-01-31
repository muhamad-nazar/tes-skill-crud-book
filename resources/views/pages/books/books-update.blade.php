@extends('partials.template')

@section('content')
<div class="container mt-4">

    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/categories" style="text-decoration: none">Categories</a></li>
          <li class="breadcrumb-item"><a href="/categories/{{ $books->categories_id }}/books" style="text-decoration: none">{{ $books->category->name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $books->title }}</li>
          <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>
    <!--End Breadcrumb-->

    <form action="/books/{{ $books->id }}/update" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="text-center">
            <img class="img-fluid mt-2 mb-2" src="{{ asset('img/Books/' . $books->image_url) }}" alt="Image Preview" style="width: 120px;">
        </div>

        <!--Category-->
        <select class="form-select mb-3" aria-label="Category" id="categorySelect" name="categories_id" required>
            <option value="{{ $books->categories_id }}">{{ $books->category->name }}</option>
            @foreach ($category as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>

        <!-- Title Input -->
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="title" id="floatingInput" placeholder="Title" required value="{{ $books->title }}">
            <label for="floatingInput">Title</label>
        </div>

        <!-- Description Input -->
        <div class="mb-3">
            <label for="description" class="form-label font-weight-bold">Description</label>
            <textarea class="form-control mb-3" name="description" required>{{ $books->description }}</textarea>
        </div>


        <!-- Image Input -->
        <div class="mb-3">
            <img id="image-preview" class="img-fluid mt-2" alt="Image Preview" style="display: none; width: 120px;">
            <label for="uploadimage" class="form-label">Image</label>
            <input type="file" class="form-control" value="{{ $books->image_url }}" name="image_url" id="uploadimage" onchange="previewImage(this);">
        </div>

        <!-- Release Years -->
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="release_year" id="floatingInput" placeholder="Release Years" required value="{{ $books->release_year }}">
            <label for="floatingInput">Release Years</label>
        </div>

        <!-- Price -->
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="price" id="floatingInput" placeholder="Price" required value="{{ $books->price }}">
            <label for="floatingInput">Price</label>
        </div>


        <!-- Price -->
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="total_page" id="floatingInput" placeholder="Total Page" required value="{{ $books->total_page }}">
            <label for="floatingInput">Total Page</label>
        </div>

        <div class="mb-3">
            <button style="background-color: #1D3557;color: #fff;" type="submit" class="btn">
            Update
            </button>
        </div>

    </form>



</div>

<!-- JavaScript to preview the selected image -->
<script>
    function previewImage(input) {
        var preview = document.getElementById('image-preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block'; // Show the image preview
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = 'none'; // Hide the image preview
        }
    }
</script>


@endsection
