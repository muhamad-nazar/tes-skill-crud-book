@extends('partials.template')

@section('content')
<div class="container mt-4">

    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" style="text-decoration: none">Home</a></li>
          <li class="breadcrumb-item"><a href="/login" style="text-decoration: none">Login/Register</a></li>
          <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
    <!--End Breadcrumb-->

    <div class="row">

        <div class="col-md-12 mb-5">

            <!--Form Login-->
            <div class="card card-login">
                <div class="card-body mt-3 mb-4">

                    <h5 class="books-title text-center">Register</h5>

                    <div class="line-login mb-4"></div>

                    <form action="/register-account" method="POST" class="mt-4">
                        @csrf

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="name" class="form-control" name="name" placeholder="name" required>
                            <label>Name</label>
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="email" required>
                            <label>Email</label>
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                            <label>Password</label>
                        </div>

                        <button type="submit" class="btn btn-login" style="background-color: #1D3557;color: #fff;">Register</button>


                    </form>
                </div>
            </div>
            <!--End Form Login-->

        </div>

    </div>

</div>

<!--Validation-->
<script>
    @if ($errors->any())
        var errorMessage = "Validation Error:\n";
        @foreach ($errors->all() as $error)
            errorMessage += "- {{ $error }}\n";
        @endforeach
        window.alert(errorMessage);
    @endif
</script>

@endsection
