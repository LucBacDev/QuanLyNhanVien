@extends('master')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#">Create Company</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Create Company</h3>
                <div class="tile-body">
                    <form action="{{route ('admin.company_store')}}" class="row" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name">
                            @error('name')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Code</label>
                            <input class="form-control" type="text" name="code">
                            @error('code')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Address</label>
                            <input class="form-control" type="text" name="address">
                        </div>
                        <div class="form-group col-md-12">
                            <td class="table-td-center">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{route('admin.company')}}" type="submit" class="btn btn-danger">Cancel</a>
                            </td>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
