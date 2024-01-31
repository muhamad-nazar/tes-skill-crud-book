@extends('partials.template')

@section('content')
<div class="container mt-4">

    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" style="text-decoration: none">Home</a></li>
          <li class="breadcrumb-item"><a href="/categories" style="text-decoration: none">Categories</a></li>
          <li class="breadcrumb-item active" aria-current="page">Books</li>
        </ol>
    </nav>
    <!--End Breadcrumb-->

    <button type="button" class="btn my-3" style="background-color: #1D3557;color:#fff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Books
    </button>

    <!-- Modal Create Books -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" style="color: #1D3557;font-weight:600;" id="exampleModalLabel">Add Books</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/books/add" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf
                    <div class="modal-body">
                        <!--Category-->
                        <select class="form-select mb-3" aria-label="Category" id="categorySelect" name="categories_id" required>
                            <option selected disabled>== Select Categories ==</option>
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>

                        <!-- Title Input -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" id="floatingInput" placeholder="Title" required>
                            <label for="floatingInput">Title</label>
                        </div>

                        <!-- Description Input -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control mb-3" name="description" required></textarea>
                        </div>

                        <!-- Image Input -->
                        <div class="mb-3">
                            <img id="image-preview" class="img-fluid mt-2" alt="Image Preview" style="display: none; width: 120px;">
                            <label for="uploadimage" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image_url" id="uploadimage" onchange="previewImage(this);">
                        </div>

                        <!-- Release Years -->
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="release_year" id="floatingInput" placeholder="Release Years" required>
                            <label for="floatingInput">Release Years</label>
                        </div>

                        <!-- Price -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="price" id="floatingInput" placeholder="Price" required>
                            <label for="floatingInput">Price</label>
                        </div>


                        <!-- Price -->
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="total_page" id="floatingInput" placeholder="Total Page" required>
                            <label for="floatingInput">Total Page</label>
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
    <!-- End Modal Create Books -->


    <!-- DataTales Books -->
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #1D3557;font-weight:600;">Category: {{ $nameCategory }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th style="border-bottom: 1px solid #dee2e6">Title</th>
                            <th style="border-bottom: 1px solid #dee2e6">Image</th>
                            <th style="border-bottom: 1px solid #dee2e6">Release Year</th>
                            <th style="border-bottom: 1px solid #dee2e6">View</th>
                            <th style="border-bottom: 1px solid #dee2e6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Looping and Update Books -->
                        @foreach ($books as $b)
                        <tr class="text-center">
                                <td style="border-bottom: 1px solid #dee2e6">
                                    {{ $b->title }}
                                </td>
                                <td style="border-bottom: 1px solid #dee2e6">
                                    <img src="{{ asset('img/Books/' . $b->image_url) }}" alt="" style="width: 100px">
                                </td>
                                <td style="border-bottom: 1px solid #dee2e6">
                                    {{ $b->release_year }}
                                </td>
                                <td style="border-bottom: 1px solid #dee2e6"><a class="btn text-primary" href="/books/{{ $b->id }}/{{ $b->title }}"><i class="bi bi-table"></i></a></td>
                                <td style="border-bottom: 1px solid #dee2e6">
                                    <a class="btn text-warning" href="/books/{{ $b->id }}"><i class="bi bi-pencil-square"></i></a> |
                                    <a class="btn text-danger" onclick="return confirm('Sure to Delete This Book From This Category?')" href="/books/{{ $b->id }}/deletes"><i class="bi bi-trash-fill"></i></a></td>
                            </form>
                        </tr>
                        @endforeach
                        <!--Looping and Update books -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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

<!-- JavaScript untuk Validasi -->
<script>
    function validateForm() {
        var selectedCategory = document.getElementById('categorySelect').value;

        if (selectedCategory === "") {
            alert("Mohon pilih kategori sebelum mengirim formulir.");
            return false; // Formulir tidak akan dikirim
        }

        // Jika validasi berhasil, formulir akan dikirim
        return true;
    }
</script>

@endsection
