@extends('partials.template')

@section('content')
<div class="container mt-4">

    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" style="text-decoration: none">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
    <!--End Breadcrumb-->

    <div class="row">

        <div class="col-md-12 mb-5">

            <!--Form Login-->
            <div class="card card-login">
                <div class="card-body mt-3 mb-4">

                    <h5 class="books-title text-center">Login</h5>

                    <div class="line-login mb-4"></div>

                    <form action="/login-action" method="POST" class="mt-4">
                        @csrf

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

                        <div class="col-md-12 mb-3 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="remember">
                                <label for="f-option2">Keep me logged in</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-login" style="background-color: #1D3557;color: #fff;">Login</button>


                        <p class="login-register">Don't have an account ?, Please <a href="/register" style="text-decoration: none">Register</a></p>

                    </form>
                </div>
            </div>
            <!--End Form Login-->

        </div>

    </div>

</div>

@endsection
