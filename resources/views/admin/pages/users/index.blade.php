@extends('admin.app')
@section('title', 'List users')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>List users</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboad') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">List users</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            {{-- <input type="text" class="form-control col-3" required placeholder="Search ..."> --}}
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                            class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                                <li><a href="{{route('admin.user-create')}}" ><i
                                            class="icon-plus"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="setting-config">
                                        @foreach ($users as $key => $user)
                                            <tr id='user_{{ $user->id }}'>
                                                <td>{{ $user->id }}</td>

                                                <td><span class="">{{ $user->fullname }}</span></td>
                                                <td><span class="">{{ $user->email }}</span></td>
                                                <td><span style="" class="btn {{ $user->status == 1 ?'btn-primary':'btn-danger'}} w-100">{{ App\Models\User::STATUS_ACCOUNT[$user->status] }}</span></td>
                                                <td><span style="" class="btn {{ $user->is_admin ?'btn-primary':'btn-danger'}} w-100">{{ App\Models\User::ROLE[$user->is_admin] }}</span></td>
                                                <td>
                                                    <a  href="{{route('admin.user-update',['id'=> $user->id ])}}" type="button" class="btn btn-info" title="Edit"><i
                                                            class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createSetting" tabindex="-1" role="dialog" aria-labelledby="createSettingTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createSettingTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="address" name="address" class="form-control" required>
                        </div>
                      
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name='status' id="exampleFormControlSelect1">
                                @foreach(App\Models\User::STATUS_ACCOUNT as $key => $status)
                                <option value="{{ $key }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name='status' id="exampleFormControlSelect1">
                                @foreach(App\Models\User::STATUS_ACCOUNT as $key => $status)
                                <option value="{{ $key }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <img src="{{ asset('storage/config/PBI7HBCnIbAISN6NzN4PoCBn14cCa2uB1kHZ2kGu.jpg') }}"
                            alt="">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name='type' id="setting-type">
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                                <option value="date">Date</option>
                                <option value="file">File</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Value</label>
                            <input type="text" name="value" id='setting_value' class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@if(session('message'))
<script>
    toastr.success(" {!! session('message') !!}");
</script>
@endif
@if(session('error'))
<script>
     toastr.error(" {!! session('message') !!}");
</script>
@endif
@endsection
