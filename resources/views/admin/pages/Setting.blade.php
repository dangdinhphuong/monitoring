@extends('admin.app')
@section('title', 'Dasboard')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Environment</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboad') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Environment</li>
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
                                    <tbody id="setting-config">
                                        @foreach ($settings as $key => $setting)
                                            <tr id='setting_{{ $setting->id }}'>
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
                                                        onclick='deleteSetting({{ $setting->id }})' title="Delete"><i
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
        <div class="modal fade" id="editSetting" tabindex="-1" role="dialog" aria-labelledby="editSettingTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSettingTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Key</label>
                            <input type="hidden" name="id" class="form-control" required>
                            <input type="text" name="key" class="form-control" required>
                        </div>
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
                        <div class="form-group" id="file-upload">

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
        var settings = {!! json_encode($settings) !!};

        $('#createSetting #setting-type').change(function() {
            var selectedType = $(this).val();
            $('#createSetting #setting_value').attr('type', selectedType);
        });
        $('#editSetting #setting-type').change(function() {
            var selectedType = $(this).val();
            $('#editSetting #setting_value').attr('type', selectedType);
        });

        $('#createSetting .btn-primary').on('click', function() {
            var type = $('#createSetting select[name="type"]').val();
            var value;

            if (type == 'file') {
                value = $('#createSetting input[name="value"]')[0].files[0];
            } else {
                value = $('#createSetting input[name="value"]').val();
            }

            // Kiểm tra nếu biến value đã được định nghĩa
            if (typeof value !== 'undefined') {
                // Tạo đối tượng FormData để chứa dữ liệu form và file
                var formData = new FormData();
                formData.append('key', $('#createSetting input[name="key"]').val());
                formData.append('group', $('#createSetting select[name="group"]').val());
                formData.append('title', $('#createSetting input[name="title"]').val());
                formData.append('type', type);
                formData.append('value', value);
                formData.append('_token', $('input[name="_token"]').val());
                console.log('formData', formData);

                submitForm('{{ asset('api/setting') }}', 'POST', formData);
            }
        });

        function submitForm(Url, method, formData) {
            // Gửi Ajax request
            $.ajax({
                    url: Url,
                    type: method,
                    data: formData,
                    contentType: false,
                    processData: false,
                })
                .then(function(response) {
                    // Xử lý kết quả thành công
                    console.log('response', response);

                    // Thêm xử lý của bạn ở đây nếu cần
                    settings.push(response.data);

                    toastr.success('Dữ liệu đã được lưu thành công');
                    addData(response.data);
                    $('#createSetting').modal('hide');
                })
                .catch(function(error) {
                    // Xử lý lỗi
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

        function addData(data) {
            console.log('addData', data)
            var newRow = '<tr id="setting_' + data.id + '">' +
                '<td>' + data.id + '</td>' +
                '<td><span class="text-info">' + data.key + '</span></td>' +
                '<td><span class="text-info">' + data.group + '</span></td>' +
                '<td><span>' + data.value + '</span></td>' +
                '<td>' +
                '<button type="button" class="btn btn-info" title="Edit" onclick="editNote(' + data.id +
                ')"><i class="fa fa-edit"></i></button>' +
                '<button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" onclick="deleteSetting(' +
                data.id + ')" title="Delete"><i class="fa fa-trash-o"></i></button>' +
                '</td>' +
                '</tr>';

            // Append the new row to the tbody
            $('#setting-config').append(newRow);
        }
    </script>

    {{-- ============================== END ====================================== --}}
    <script>
        // update data

        function editNote(id) {
            $('#editSetting').modal('show');
            var setting = settings.find(function(item) {
                return item.id === id;
            });
            this.renderDataToForm(setting);
        }

        function editsubmitForm() {
            // Get form data
            id = $('#editSetting input[name="id"]').val();
            var type = $('#editSetting select[name="type"]').val();
            var value;

            if (type == 'file') {
                value = $('#editSetting input[name="value"]')[0].files[0];
            } else {
                value = $('#editSetting input[name="value"]').val();
            }
            console.log('value', type);
            value = typeof value == 'undefined' ? '' : value

            var formData = new FormData();
            formData.append('key', $('#editSetting input[name="key"]').val());
            formData.append('group', $('#editSetting select[name="group"]').val());
            formData.append('title', $('#editSetting input[name="title"]').val());
            formData.append('type', type);
            formData.append('value', value);
            console.log('formData', formData);



            // Send Ajax request
            $.ajax({
                    url: '{{ asset('api/setting') }}/' + id,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                })
                .then(function(response) {
                    // Handle success response
                    updateSettingsById(settings, response.data)
                    // Optionally, close the modal or perform other actions
                    toastr.success('Dữ liệu đã được cập nhật thành công');
                    // addData(response.data);
                    $('#editSetting').modal('hide');
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

        function updateSettingsById(array, newData, key = 'id') {
            settings = array.map(item => (item[key] === newData[key] ? newData : item));
            updateData(newData)
        }

        function updateData(data) {
            console.log('addData', data)
            var newRow = '<td>' + data.id + '</td>' +
                '<td><span class="text-info">' + data.key + '</span></td>' +
                '<td><span class="text-info">' + data.group + '</span></td>' +
                '<td><span>' + data.value + '</span></td>' +
                '<td>' +
                '<button type="button" class="btn btn-info" title="Edit" onclick="editNote(' + data.id +
                ')"><i class="fa fa-edit"></i></button>' +
                '<button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" onclick="deleteSetting(' +
                data.id + ')" title="Delete"><i class="fa fa-trash-o"></i></button>' +
                '</td>';

            // Append the new row to the tbody
            $('#setting_' + data.id).html(newRow);
        }

        function renderDataToForm(data) {
            // Đặt giá trị cho các trường trong form
            $('#editSetting input[name="id"]').val(data.id);
            $('#editSetting input[name="key"]').val(data.key);
            $('#editSetting select[name="group"]').val(data.group);
            $('#editSetting input[name="title"]').val(data.title);
            $('#editSetting select[name="type"]').val(data.type);
            $('#editSetting #setting_value').attr('type', data.type);
            if (data.type == 'file') {
                fileHtml = '<a class="badge badge-danger" target="_blank" href="{{ asset('') }}' + data.value +
                    '"><i class="fa fa-cloud-download"></i> File download</span></a>';
                $('#file-upload').html(fileHtml);
            } else {
                $('#file-upload').html('');
                $('#editSetting input[name="value"]').val(data.value);
            }
            console.log('setting_value', data)
        }
        // delete data
        function deleteSetting(id) {
            Swal.fire({
                title: "Bạn có chắc không?",
                text: "Bạn sẽ không thể hoàn nguyên điều này!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: '{{ asset('/api/setting') }}/' + id,
                    type: 'DELETE',
                    dataType: 'json',
                })
                .then(function(response) {
                    // Xóa hàng có id tương ứng nếu xóa thành công
                    $('#setting_' + id).remove();
                    toastr.success(response.message);
                    // Swal.fire({
                    //     title: "Đã xóa!",
                    //     text: "Tập tin của bạn đã bị xóa.",
                    //     icon: "success"
                    // });
                })
                .catch(function(error) {
                    toastr.error('Lỗi khi xóa dữ liệu');
                });

                }
            });
            // Gửi Ajax request để xóa dữ liệu

        }
    </script>
@endsection
