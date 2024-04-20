@extends('master')
@section('content')
    <div class="app-title d-flex justify-content-between">
        <ul class="app-breadcrumb breadcrumb side ">
            <li class="breadcrumb-item active"><a href="#"><b>LIST COUNTRY</b></a></li>
        </ul>
        {{-- allert notification --}}
        @if (session('notification'))
            <div id="notification" class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif
        {{-- allert notification end --}}

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="{{ route('admin.user_create') }}" title="Create"><i
                                    class="fas fa-plus"></i>
                                Create User</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full_name</th>
                                <th>Gender</th>
                                <th>Birthday</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($User as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    @if ($item->gender == 0)
                                        <td>Male</td>
                                    @else
                                        <td>Female</td>
                                    @endif
                                    
                                    <td>{{ $item->birthdate}}</td>
                                    <td>{{ $item->phone_number}}</td>
                                    <td>{{ $item->address}}</td>
                                    <td> 
                                        @foreach ($item->roles as $role)
                                        <p>{{ $role->description }}</p>
                                        @endforeach
                                    </td>

                                    <td class="table-td-center">
                                        <a href="{{ route('admin.user_edit', $item->id) }}" type="submit"
                                            class="btn btn-success">Sửa</a>
                                        <a href="{{ route('admin.user_delete', $item->id) }}" type="submit"
                                            class="btn btn-danger" onclick = "return confirm('Bạn có muốn xóa?')">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                           
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
        }, 10000); // 10 giây
    </script>
    {{-- <div class="d-flex justify-content-center">
        {{ $Categories->appends(request()->input())->links() }}
    </div> --}}
@endsection
