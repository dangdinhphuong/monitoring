@extends('admin.app')
@section('title', 'Channel')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2> Channel Stations</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboad') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active"> Channel Stations</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                            class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#createNotes"><i
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
                                            <th>Channel</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="channel">
                                        @foreach ($channel as $key => $item)
                                            <tr id='channel_{{ $item->id }}'>
                                                <td>{{ $item->id }}</td>
                                                <td><span>{{ $item->name }}</span></td>
                                                <td><span class="text-info">{{ $item->channel }}</span></td>
                                                <td>
                                                    <span
                                                        class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">
                                                        {{ $item->status ? 'Operation' : 'Disconect' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info" title="Edit"
                                                        onclick="editNote({{ $item->id }})"><i
                                                            class="fa fa-edit"></i></button>
                                                    <button type="button" data-type="confirm"
                                                        class="btn btn-danger js-sweetalert"
                                                        onclick='deleteChannel({{ $item->id }})' title="Delete"><i
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
        <div class="modal fade" id="createNotes" tabindex="-1" role="dialog" aria-labelledby="createNotesTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createNotesTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
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
        var channels = {!! json_encode($channel) !!};
         console.log('asset','{{asset("/api/channel")}}')

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
                    url: '{{asset("/api/channel")}}',
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

        function submitForm() {
            // Get form data
            var formData = {
                name: $('#createNotes input[name="name"]').val(),
                channel: $('#createNotes input[name="channel"]').val(),
                status: $('#createNotes input[name="status"]:checked').val()
            };

            // Send Ajax request
            $.ajax({
                    url: '{{asset("/api/channel")}}',
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
                    url: '{{asset("/api/channel")}}',
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
                    url: '{{asset("/api/channel")}}/' + id,
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
