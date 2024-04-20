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
                            <a class="btn btn-add btn-sm" href="{{ route('admin.role_create') }}" title="Create"><i
                                    class="fas fa-plus"></i>
                                Create Role</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Description</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Role as $item)
                                <tr>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ $item->description}}</td>
                                    <td class="table-td-center">
                                        <a href="{{ route('admin.role_edit', $item->id) }}" type="submit"
                                            class="btn btn-success">Sửa</a>
                                        <a href="{{ route('admin.role_delete', $item->id) }}" type="submit"
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
