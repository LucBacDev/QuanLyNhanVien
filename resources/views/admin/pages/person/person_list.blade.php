@extends('master')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>LIST PERSON</b></a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="{{ route('admin.register_create') }}" title="Create"><i
                                    class="fas fa-plus"></i>
                                Create Person</a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0"
                        border="0" id="sampleTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Comnpany</th>
                                <th>Function</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Person as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{$item->email}}</td>
                                    @foreach ($Company as $value)
                                        @if ($item->company_id == $value->id)
                                        <td>{{$value->name}}</td>
                                        @endif
                                    @endforeach
                                    <td class="table-td-center">
                                    <a type="submit" href="{{route('admin.account_edit',$item->id)}}" class="btn btn-success">Edit</a>                               
                                    <a type="submit" href="{{route('admin.account_delete',$item->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
    {{-- <div class="d-flex justify-content-center">
        {{ $Users->links() }}
    </div> --}}
@endsection
