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
                        <div class="form-group" id="image">
                            <input type="file" disabled dis id="dropify-event"
                                data-default-file="../assets/images/image-gallery/1.jpg">
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
    <script src="{{ asset('assets/vendor/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
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
            var type = $('select[name="type"]').val();
            var value;

            if (type == 'file') {
                value = $('input[name="value"]')[0].files[0];
            } else {
                value = $('input[name="value"]').val();
            }

            // Kiểm tra nếu biến value đã được định nghĩa
            if (typeof value !== 'undefined') {
                // Tạo đối tượng FormData để chứa dữ liệu form và file
                var formData = new FormData();
                formData.append('key', $('input[name="key"]').val());
                formData.append('group', $('select[name="group"]').val());
                formData.append('title', $('input[name="title"]').val());
                formData.append('type', type);
                formData.append('value', value);
                formData.append('_token', $('input[name="_token"]').val());
                console.log('formData', formData);

                submitForm('{{ asset('/setting') }}', 'POST', formData);
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
                '<button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" onclick="deleteChannel(' +
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
            var formData = {
                id: $('#editSetting input[name="id"]').val(),
                name: $('#editSetting input[name="name"]').val(),
                channel: $('#editSetting input[name="channel"]').val(),
                status: $('#editSetting input[name="status"]:checked').val()
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
            $('#editSetting input[name="id"]').val(data.id);
            $('#editSetting input[name="key"]').val(data.key);
            $('#editSetting select[name="group"]').val(data.group);
            $('#editSetting input[name="title"]').val(data.title);
            $('#editSetting input[name="type"]').val(data.type);


            if (data.type === 'file') {
                $('#image').addClass('hidden');
                $('#editSetting #setting_value').attr('type', 'file');
            } else {
                $('#editSetting input[name="value"]').val(data.value);
                $("#image").hide();
            }
            console.log('setting_value', data)
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
