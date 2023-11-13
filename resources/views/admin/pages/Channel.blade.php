@extends('admin.app')
@section('title', 'Dasboard')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2> Channel Stations</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
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
                            <input type="text" class="form-control col-3" required placeholder="Search ...">
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
                                    @foreach($channel as $key => $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td><span>{{ $item->name }}</span></td>
                                            <td><span class="text-info">{{ $item->channel }}</span></td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $item->status ? 'Operation' : 'Disconect'  }}
                                                </span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info" title="Edit"><i
                                                        class="fa fa-edit"></i></button>
                                                <button type="button" data-type="confirm"
                                                        class="btn btn-danger js-sweetalert" title="Delete"><i
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
    <script>

        function submitForm() {
            // Get form data
            var formData = {
                name: $('#createNotes input[name="name"]').val(),
                channel: $('#createNotes input[name="channel"]').val()
            };

            // Send Ajax request
            $.ajax({
                url: 'http://monitoring.test/api/channel',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(formData),
            })
                .then(function (response) {
                    // Handle success response
                    console.log(response.data);
                    // Optionally, close the modal or perform other actions
                    toastr.success('Dữ liệu đã được lưu thành công');
                    addData(response.data);
                    $('#createNotes').modal('hide');
                })
                .catch(function (error) {
                    console.log(error)
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
                    }else{
                        toastr.error('Lỗi khi lưu dữ liệu');
                    }
                });
        }

        function addData(response){
            var newRow = '<tr>' +
                '<td>' + response.id + '</td>' +
                '<td><span>' + response.name + '</span></td>' +
                '<td><span class="text-info">' + response.channel + '</span></td>' +
                '<td><span class="badge ' + (response.status ? 'badge-success' : 'badge-danger') + '">' +
                (response.status ? 'Operation' : 'Disconect') + '</span></td>' +
                '<td>' +
                '<button type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>' +
                '<button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>' +
                '</td>' +
                '</tr>';

            // Append the new row to the tbody
            $('#channel').append(newRow);
        }


        $('#createNotes .btn-primary').on('click', function () {
            submitForm();
        });

    </script>
@endsection
