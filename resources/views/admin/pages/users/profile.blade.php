@extends('admin.app')
@section('title', 'Yor Profile')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Yor Profile</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboad') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Yor Profile</li>
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
                                <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                                <li><a href="{{route('admin.user-update',['id'=> $users->id ])}}"><i
                                            class="icon-pencil"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between">

                                    <div class="card  col-3">
                                        <div class="mt-3 " style="width: 100%; text-align: center; display: block; " id="imgavatar1">
                                            <img src="{{ asset('storage/' . $users->avatar) }}" style=" width: 100%;  border: 2px solid #a1a1a1;" >
                                        </div>
                                    </div>
                                    <div class="card shadow mb-4  col-8">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label for="fullname">Họ và tên<span class="text-danger">(*)</span></label>
                                                        <input type="text" class="form-control form-control-user"  disabled ="fullname" value="{{ old('fullname', $users->fullname ?? null) }}" name="fullname" placeholder="Họ và tên ...">
                                                        @error('fullname')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="slugCategories">E-mail<span class="text-danger">(*)</span></label>
                                                        <input type="email " class="form-control form-control-user " disabled id="email" value="{{ old('email', $users->email ?? null) }}" name="email" id="emailCategories" placeholder="Email ...">
                                                        @error('email')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label for="quantity">Số điện thoại<span class="text-danger">(*)</span></label>
                                                        <input type="phone" class="form-control form-control-user" disabled id="phone" value="{{ old('phone', $users->phone ?? null) }}" name="phone" id="phone" placeholder="Số điện thoại liên hệ ...">
                                                        @error('phone')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label for="slugCategories">Địa chỉ<span class="text-danger">(*)</span></label>
                                                        <input type="text" class="form-control form-control-user " disabled id="address" value="{{ old('address', $users->address ?? null) }}" name="address" id="addressCategories" placeholder="Địa chỉ thường trú ...">
                                                        @error('address')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                
                                                </div>
                                                <div class="form-group row ">
                                                    <div class=" col-sm-6 ">
                                                        <label for="slugCategories">Chức vụ<span class="text-danger">(*)</span></label>
                                                        <select class="form-control" name='is_admin' id="exampleFormControlSelect1"disabled >
                                                            @foreach (App\Models\User::ROLE as $key => $role)
                                                                <option value="{{ $key }}"  {{ $users->is_admin == $key ? "selected": "" }}>{{ $role }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('is_admin')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="slugCategories">Trạng thái<span class="text-danger">(*)</span></label>
                                                        <select class="custom-select" name="status" id="inputGroupSelect01" disabled >
                                                        <option {{ $users->status == 1 ? "selected": "" }} value="1">Đang hoạt động</option>
                                                            <option {{ $users->status == 0 ? "selected": "" }} value="0">Ngưng hoạt động</option>
                                                        </select>
                                                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <div id="accordion">
                                                    <div class="card">
                                                      <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Change password
                                                          </button>
                                                        </h5>
                                                      </div>
                                                  
                                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <form  action="{{ route('admin.changePassword')}}" method="POST">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                                                        <label for="current_password">Mật khẩu hiện tại<span class="text-danger">(*)</span></label>
                                                                        <input type="password" class="form-control form-control-user" id="current_password" name="current_password" placeholder="Mật khẩu hiện tại ...">
                                                                        @error('current_password')
                                                                        <span class="text-danger">
                                                                            {{$message}}
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="new_password">Mật khẩu mới<span class="text-danger">(*)</span></label>
                                                                        <input type="password" class="form-control form-control-user " id="new_password"  name="new_password" id="emailCategories" placeholder="Mật khẩu mới ...">
                                                                        @error('new_password')
                                                                        <span class="text-danger">
                                                                            {{$message}}
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label for="confirm_password">Mật khẩu xác nhận<span class="text-danger">(*)</span></label>
                                                                        <input type="password" class="form-control form-control-user " id="confirm_password"  name="confirm_password" id="confirm_password" placeholder="Mật khẩu xác nhận ...">
                                                                        @error('confirm_password')
                                                                        <span class="text-danger">
                                                                            {{$message}}
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                   
                                                                </div>
                                                                <br>
                                                                <div class="col-12">
                                                                    <button type="submit" class="btn btn-primary col-12">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                 

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@if(session('message'))
<script>
    swal("Hành động", " {!! session('message') !!}", "success", {
        button: "OK",
    })
</script>
@endif
@if(session('error'))
<script>
    swal("Hành động", " {!! session('error') !!}", "error", {
        button: "OK",
    })
</script>
@endif
<script>

</script>

@endsection