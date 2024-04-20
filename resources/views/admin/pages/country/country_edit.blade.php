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
                    <form action="{{route ('admin.country_update', $Country->id)}}" class="row" method="POST">
                        @csrf
                      
                        <div class="form-group col-md-12">
                            <label class="control-label">Code</label>
                            <input class="form-control" type="text" name="code" value="{{$Country->code}}">
                            @error('code')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$Country->name}}">
                            @error('name')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Description</label>
                            <input class="form-control" type="text" name="description" value="{{$Country->description}}">
                        </div>
                        <div class="form-group col-md-12">
                            <td class="table-td-center">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{route('admin.country')}}" type="submit" class="btn btn-danger">Cancel</a>
                            </td>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
