<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản trị Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets-admin') }}/css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

    <section class="h-100 bg-image" style="background-color: #eee;">
        <div class="mask d-flex align-items-center h-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h2 class="text-uppercase text-center mb-2">Create Account</h2>
                                <form action="{{ route('admin.register_create')}}" method="post">
                                    @csrf
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                        <input type="text" name="email" id="form3Example3cg"
                                            class="form-control form-control-lg" />
                                            @error('email')
                                            <div class="alert alert-danger cl-red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="company_id">Company</label>
                                        <select name="company_id" id="company_id" class="form-control form-control-lg">
                                            @foreach($Company as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <div class="alert alert-danger cl-red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        <input type="password" name="password" id="form3Example4cg"
                                            class="form-control form-control-lg" />
                                            @error('password')
                                            <div class="alert alert-danger cl-red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example4cdg">Re-enter password</label>
                                        <input type="password" name="confirmpassword" id="form3Example4cdg"
                                            class="form-control form-control-lg" />
                                            @error('confirmpassword')
                                            <div class="alert alert-danger cl-red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   
                                    <div class="d-flex flex-column justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-2 text-body">Register
                                        </button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">If you have account ?
                                        <a href="{{route('admin.login')}}" class="fw-bold text-body"><u>Login here !</u></a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="{{ url('assets-user') }}/css/style.css">
    <script src="{{ url('assets-admin') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ url('assets-admin') }}/js/popper.min.js"></script>
    <script src="{{ url('assets-admin') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('assets-admin') }}/js/main.js"></script>
    <script src="{{ url('assets-admin') }}/js/plugins/pace.min.js"></script>
    @yield('src')
</body>

</html>
