@extends('admin.app')
@section('title', 'create user')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>create user</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboad') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">List users</i></a></li>
                        <li class="breadcrumb-item active">create user</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <form class="d-flex justify-content-between" action="" method="POST" enctype="multipart/form-data">
                                    <div class="card shadow mb-4  col-8">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label for="fullname">Họ và tên<span class="text-danger">(*)</span></label>
                                                        <input type="text" class="form-control form-control-user" id="fullname" value="{{ old('fullname') }}" name="fullname" placeholder="Họ và tên ...">
                                                        @error('fullname')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="slugCategories">E-mail<span class="text-danger">(*)</span></label>
                                                        <input type="email" class="form-control form-control-user " id="email" value="{{ old('email') }}" name="email" id="emailCategories" placeholder="Email ...">
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
                                                        <input type="phone" class="form-control form-control-user" id="phone" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Số điện thoại liên hệ ...">
                                                        @error('phone')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label for="slugCategories">Địa chỉ<span class="text-danger">(*)</span></label>
                                                        <input type="text" class="form-control form-control-user " id="address" value="{{ old('address') }}" name="address" id="addressCategories" placeholder="Địa chỉ thường trú ...">
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
                                                        <select class="form-control" name='is_admin' id="exampleFormControlSelect1">
                                                            @foreach (App\Models\User::ROLE as $key => $role)
                                                                <option value="{{ $key }}">{{ $role }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('is_admin')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="slugCategories">Trạng thái<span class="text-danger">(*)</span></label>
                                                        <select class="custom-select" name="status" id="inputGroupSelect01">
                                                            <option selected value="1">Đang hoạt động</option>
                                                            <option value="0">Ngưng hoạt động</option>
                                                        </select>
                                                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <div class="col-sm-12">
                                                        <label for="slugCategories"> Ảnh đại diện<span class="text-danger">(*)</span></label>
                                                        <input onchange="previewFile(this)" id="avatar_image" type="file" id="image" name="avatar" class="form-control" require>
                                                        @error('avatar')<span class="text-danger">{{$message}}</span>@enderror
                                                    </div>
                                
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">Lưu lại</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card  col-3">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                    <div class="col-sm-12">
                                                        <div class="mt-3 " style="width: 100%; height: 150px; text-align: center;">
                                                            <img style="width: 100%; height: 100%;  border-radius: 5%; border: 2px solid #a1a1a1;" id="previewimgavatar" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    function previewFile(input) {
        var file = $("#avatar_image").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewimgavatar').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection