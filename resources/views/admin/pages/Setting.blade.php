@extends('admin.app')
@section('title', 'Dasboard')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Setting</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboad') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <input type="text" class="form-control col-3" required placeholder="Search ...">
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                            class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#createSetting"><i
                                            class="icon-plus"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Key</th>
                                            <th>Group</th>
                                            <th>value</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="channel">
                                        @foreach ($settings as $key => $setting)
                                            <tr id='channel_{{ $setting->id }}'>
                                                <td>{{ $setting->id }}</td>

                                                <td><span class="text-info">{{ $setting->key }}</span></td>
                                                <td><span class="text-info">{{ $setting->group }}</span></td>
                                                <td><span>{{ $setting->value }}</span></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" title="Edit"
                                                        onclick="editNote({{ $setting->id }})"><i
                                                            class="fa fa-edit"></i></button>
                                                    <button type="button" data-type="confirm"
                                                        class="btn btn-danger js-sweetalert"
                                                        onclick='deleteChannel({{ $setting->id }})' title="Delete"><i
                                                            class="fa fa-trash-o"></i></button>
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
                        <div class="form-group">
                            <label>Key</label>
                            <input type="text" name="key" class="form-control" required>
                        </div>
                        @csrf
                        <div class="form-group">
                            <label>Group</label>
                            <select class="form-control" name='group' id="exampleFormControlSelect1">
                                <option value="INFO">INFO</option>
                                <option value="CONFIG">CONFIG</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <img src="{{asset("storage/config/PBI7HBCnIbAISN6NzN4PoCBn14cCa2uB1kHZ2kGu.jpg")}}" alt="">
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

        <div class="modal fade" id="editNotes" tabindex="-1" role="dialog" aria-labelledby="editNotesTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editNotesTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="hidden" name="id" class="form-control" required>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Channel</label>
                            <input type="number" name="channel" class="form-control" required>
                        </div>
                        <div class="form-check form-switch">
                            <label class="fancy-radio"><input name="status" value="0"
                                    type="radio"><span><i></i>DISCONECT</span></label>
                            <label class="fancy-radio"><input name="status" value="1" type="radio"
                                    checked><span><i></i>CONNECT</span></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="editsubmitForm()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#setting-type').change(function () {
                var selectedType = $(this).val();
                $('#setting_value').attr('type', selectedType);
            });


        $('#createSetting .btn-primary').on('click', function() {

            // Lấy giá trị từ các trường input
            var token = $('input[name="_token"]').val();
            var key = $('input[name="key"]').val();
            var group = $('select[name="group"]').val();
            var title = $('input[name="title"]').val();
            var type = $('select[name="type"]').val();
            if(type == 'file'){
                value = $('input[name="value"]')[0].files[0];
            }else{
                value = $('input[name="value"]').val();
            }

            // Tạo đối tượng FormData để chứa dữ liệu form và file
            var formData = new FormData();
            formData.append('key', key);
            formData.append('group', group);
            formData.append('title', title);
            formData.append('type', type);
            formData.append('value', value);
            formData.append('_token', token);

            // Gửi dữ liệu form và file đến server bằng Ajax
            $.ajax({
                type: 'POST',
                url: 'http://monitoring.test/setting',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Xử lý phản hồi từ server (nếu cần)
                    console.log(response);
                },
                error: function(error) {
                    // Xử lý lỗi (nếu có)
                    console.log(error);
                }
            });
        });

        function submit() {
            // Get form data
            var formData = {
                name: $('#createNotes input[name="name"]').val(),
                channel: $('#createNotes input[name="channel"]').val(),
                status: $('#createNotes input[name="status"]:checked').val()
            };

            // Send Ajax request
            $.ajax({
                    url: '{{ asset('/api/channel') }}',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                })
                .then(function(response) {
                    // Handle success response
                    channels.push(response.data);
                    // Optionally, close the modal or perform other actions
                    toastr.success('Dữ liệu đã được lưu thành công');
                    addData(response.data);
                    $('#createNotes').modal('hide');
                })
                .catch(function(error) {
                    var dataError = error.responseJSON.errors;
                    if (error.status != 500) {
                        for (const key in dataError) {
                            if (dataError.hasOwnProperty(key)) {
                                const messages = dataError[key];
                                messages.forEach(message => {
                                    toastr.error(message);
                                });
                            }
                        }
                    } else {
                        toastr.error('Lỗi khi lưu dữ liệu');
                    }
                });
        }
    </script>


    <script>
        var channels = {!! json_encode($settings) !!};
        console.log('asset', '{{ asset('/api/channel') }}')

        // thêm mới 
        function submitForm() {
            // Get form data
            var formData = {
                name: $('#createNotes input[name="name"]').val(),
                channel: $('#createNotes input[name="channel"]').val(),
                status: $('#createNotes input[name="status"]:checked').val()
            };

            // Send Ajax request
            $.ajax({
                    url: '{{ asset('/api/channel') }}',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                })
                .then(function(response) {
                    // Handle success response
                    channels.push(response.data);
                    // Optionally, close the modal or perform other actions
                    toastr.success('Dữ liệu đã được lưu thành công');
                    addData(response.data);
                    $('#createNotes').modal('hide');
                })
                .catch(function(error) {
                    var dataError = error.responseJSON.errors;
                    if (error.status != 500) {
                        for (const key in dataError) {
                            if (dataError.hasOwnProperty(key)) {
                                const messages = dataError[key];
                                messages.forEach(message => {
                                    toastr.error(message);
                                });
                            }
                        }
                    } else {
                        toastr.error('Lỗi khi lưu dữ liệu');
                    }
                });
        }

        function addData(response) {
            var newRow = '<tr id="channel_' + response.id + '">' +
                '<td>' + response.id + '</td>' +
                '<td><span>' + response.name + '</span></td>' +
                '<td><span class="text-info">' + response.channel + '</span></td>' +
                '<td><span class="badge ' + (response.status ? 'badge-success' : 'badge-danger') + '">' +
                (response.status ? 'Operation' : 'Disconect') + '</span></td>' +
                '<td>' +
                '<button type="button" class="btn btn-info" title="Edit" onclick="editNote(' + response.id +
                ')"><i class="fa fa-edit"></i></button>' +
                '<button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" onclick="deleteChannel(' +
                response.id + ')" title="Delete"><i class="fa fa-trash-o"></i></button>' +
                '</td>' +
                '</tr>';

            // Append the new row to the tbody
            $('#channel').append(newRow);
        }
        $('#createNotes .btn-primary').on('click', function() {
            submitForm();
        });

        // update data
        function editNote(id) {
            $('#editNotes').modal('show');
            var channel = channels.find(function(item) {
                return item.id === id;
            });
            this.renderDataToForm(channel);
        }

        function editsubmitForm() {
            // Get form data
            var formData = {
                id: $('#editNotes input[name="id"]').val(),
                name: $('#editNotes input[name="name"]').val(),
                channel: $('#editNotes input[name="channel"]').val(),
                status: $('#editNotes input[name="status"]:checked').val()
            };

            // Send Ajax request
            $.ajax({
                    url: '{{ asset('/api/channel') }}',
                    type: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                })
                .then(function(response) {
                    // Handle success response
                    updateChannelsById(channels, response.data)
                    // Optionally, close the modal or perform other actions
                    toastr.success('Dữ liệu đã được cập nhật thành công');
                    // addData(response.data);
                    $('#editNotes').modal('hide');
                })
                .catch(function(error) {
                    var dataError = error.responseJSON.errors;
                    if (error.status != 500) {
                        for (const key in dataError) {
                            if (dataError.hasOwnProperty(key)) {
                                const messages = dataError[key];
                                messages.forEach(message => {
                                    toastr.error(message);
                                });
                            }
                        }
                    } else {
                        toastr.error('Lỗi khi lưu dữ liệu');
                    }
                });
        }

        function updateChannelsById(array, newData, key = 'id') {
            channels = array.map(item => (item[key] === newData[key] ? newData : item));
            updateData(newData)
        }

        function updateData(response) {
            var updateRow = '<td>' + response.id + '</td>' +
                '<td><span>' + response.name + '</span></td>' +
                '<td><span class="text-info">' + response.channel + '</span></td>' +
                '<td><span class="badge ' + (response.status ? 'badge-success' : 'badge-danger') + '">' +
                (response.status ? 'Operation' : 'Disconect') + '</span></td>' +
                '<td>' +
                '<button type="button" class="btn btn-info" title="Edit" onclick="editNote(' + response.id +
                ')"><i class="fa fa-edit"></i></button>' +
                '<button type="button" data-type="confirm" class="btn btn-danger js-sweetalert"onclick="deleteChannel(' +
                response.id + ')" title="Delete"><i class="fa fa-trash-o"></i></button>' +
                '</td>';

            // Append the new row to the tbody
            $('#channel_' + response.id).html(updateRow);
        }

        function renderDataToForm(data) {
            // Đặt giá trị cho các trường trong form
            $('#editNotes input[name="id"]').val(data.id);
            $('#editNotes input[name="name"]').val(data.name);
            $('#editNotes input[name="channel"]').val(data.channel);

            // Đặt giá trị cho trường radio status
            $('#editNotes input[name="status"][value="' + data.status + '"]').prop('checked', true);
        }

        // delete data
        function deleteChannel(id) {
            // Gửi Ajax request để xóa dữ liệu
            $.ajax({
                    url: '{{ asset('/api/channel') }}/' + id,
                    type: 'DELETE',
                    dataType: 'json',
                })
                .then(function(response) {
                    // Xóa hàng có id tương ứng nếu xóa thành công
                    $('#channel_' + id).remove();
                    toastr.success(response.message);
                })
                .catch(function(error) {
                    toastr.error('Lỗi khi xóa dữ liệu');
                });
        }
    </script>
@endsection
