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

<body class=" sidebar-mini rtl">
    <section class="vh-100" style=" background: linear-gradient(to top, #0000ff 0%, #00ccff 100%);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    {{-- allert notification --}}
                    @if (session('notification'))
                        <div id="notification" class="alert dg alert-danger">
                            {{ session('notification') }}
                        </div>
                    @endif
                    {{-- allert notification end --}}
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="{{route ('admin.account_update', $Person->id)}}" method="POST">
                            @csrf
                            <div class="card-body p-5">
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="company_id">Company</label>
                                    <select name="company_id" id="company_id" class="form-control form-control-lg">
                                        @foreach($Company as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $Person->company_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <div class="alert alert-danger cl-red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Old Password</label>
                                    <input type="password" name="password_old" id="typePasswordX-2" class="form-control form-control-lg"
                                        placeholder="Please enter your old password" />
                                </div>
                                @error('password_old')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">New Password</label>
                                    <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg"
                                        placeholder="Please enter your new password" />
                                </div>
                                @error('password')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example4cdg">Re-enter new password</label>
                                    <input type="password" name="confirmpassword" id="form3Example4cdg" placeholder="Please Re-enter your new password"
                                        class="form-control form-control-lg" />
                                        @error('confirmpassword')
                                        <div class="alert alert-danger cl-red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-success btn-lg btn-block" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
        }, 10000); // 10 giây
    </script>
    <script src="{{ url('assets-admin') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ url('assets-admin') }}/js/popper.min.js"></script>
    <script src="{{ url('assets-admin') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('assets-admin') }}/js/main.js"></script>
    <script src="{{ url('assets-admin') }}/js/plugins/pace.min.js"></script>
    @yield('src')
</body>

</html>
