@extends('master')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#">Create Country</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Create Country</h3>
                <div class="tile-body">
                    <form action="{{route ('admin.role_store')}}" class="row" method="POST">
                        @csrf
                       
                        <div class="form-group col-md-12">
                            <label class="control-label">Role</label>
                            <input class="form-control" type="number" name="role">
                            @error('role')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Description</label>
                            <input class="form-control" type="text" name="description">
                            @error('description')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <td class="table-td-center">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{route('admin.role')}}" type="submit" class="btn btn-danger">Cancel</a>
                            </td>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
