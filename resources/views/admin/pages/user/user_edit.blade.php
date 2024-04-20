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
                    <form action="{{ route('admin.user_create') }}" class="row" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="control-label">Full Name</label>
                            <input class="form-control" type="text" name="full_name" value="{{$User->full_name}}">
                            @error('full_name')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="0"{{ $User->gender == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="1" {{ $User->gender == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            @error('gender')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control" type="text" name="phone_number" value="{{$User->phone_number}}">
                            @error('phone_number')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Birthday</label>
                            <input class="form-control" type="date" name="birthdate" value="{{$User->birthdate}}">
                            @error('birthdate')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Address</label>
                            <input class="form-control" type="text" name="address" value="{{$User->address}}">
                            @error('address')
                                <div class="alert alert-danger cl-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Role</label>
                            @foreach ($Role as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="roles[]" id="role_{{ $item->role }}" value="{{ $item->role }}" {{ in_array($item->role, $User->roles->pluck('role')->toArray()) ? 'checked' : '' }} >
                                <label class="form-check-label" for="role_{{ $item->role }}">{{ $item->description}}</label>
                            </div>
                        @endforeach

                          
                        </div>
                        <div class="form-group col-md-12">
                            <td class="table-td-center">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('admin.user') }}" type="submit" class="btn btn-danger">Cancel</a>
                            </td>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
