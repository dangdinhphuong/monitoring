@extends('admin.app')
@section('title', 'Dasboard')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Table</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboad') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Table</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="d-flex flex-wrap mt-2">
                                <div class="mr-2 mt-1 float-left">
                                    <select class="form-control form-control-sm" name="fot_id" id='channels'>
                                        @foreach ($channels as $channel)
                                            <option value="{{ $channel->channel }}">{{ $channel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mr-2 mt-1 float-left">
                                    <div class="input-daterange input-group" data-provide="datepicker">
                                        <input type="text" class="input-sm form-control" name="start"
                                            placeholder="Start day">
                                        <span class="input-group-addon range-to">to</span>
                                        <input type="text" class="input-sm form-control" name="end"
                                            placeholder="End day">
                                    </div>
                                </div>
                                <div class="mr-2 mt-1 float-left">
                                    <input type="number" id ="results-input" class="form-control form-control-sm"
                                        name="result" value="20" placeholder="Row">
                                </div>
                                <div class="mr-2 mt-1 float-left">
                                    <a class="btn btn-sm btn-primary" href="#" onclick="action()" role="button">
                                        Tìm kiếm &nbsp; <i class="fa fa-search"></i>
                                    </a>
                                </div>
                                <div class="mr-2 mt-1 float-left">
                                    <a class="btn btn-sm btn-success" href="#" id="saveAsExcel" role="button">
                                        Tải file &nbsp; <i class="fa fa-download"></i>
                                    </a>
                                </div>
                                <div class="mr-2 mt-1 float-left">
                                    <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                        <li><a href="javascript:void(0);" data-toggle="cardloading"
                                                data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                        <li><a href="javascript:void(0);" class="full-screen"><i
                                                    class="icon-size-fullscreen"></i></a></li>
                                        <li><a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#createSetting"><i class="icon-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table m-b-0" id="mytable">
                                    <thead>
                                        <tr id="table-header">
                                        </tr>
                                    </thead>
                                    <tbody id="table-data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $("#results-input").on("keypress", function(event) {
            var key = event.which;
            if (key < 48 || key > 57) {
                event.preventDefault();
            }
        });
        action();
        // Hàm để gọi API và trả về một promise
        function fetchDataFromApi(apiURL, apiKey, results) {
            return new Promise((resolve, reject) => {
                const startValue = $("input[name='start']").val();
                const endValue = $("input[name='end']").val();

                $.ajax({
                    url: apiURL,
                    method: 'GET',
                    data: {
                        api_key: apiKey,
                        results: $("input[name='result']").val() ?? results,
                        start: startValue ? formatDate(startValue, "YYYY-MM-DD") + " 00:00:00" : '',
                        end: endValue ? formatDate(endValue, "YYYY-MM-DD") + " 23:59:59" : ''
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Gọi resolve khi dữ liệu thành công được tải
                        resolve(response);
                    },
                    error: function(error) {
                        // Gọi reject khi có lỗi xảy ra
                        reject(error);
                    }
                });
            });
        }

        function action() {
            const id = $('#channels').val();
            const apiURL = `https://api.thingspeak.com/channels/${id}/fields/1.json`;
            const apiKey = 'M18ETIVKUBNO8P5I';
            const results = 10;
            // Gọi fetchDataFromApi và sau đó sử dụng dữ liệu trả về
            fetchDataFromApi(apiURL, apiKey, results)
                .then(response => {

                    dataMonitoring = response;
                    dataMonitoring.feeds.sort(function(a, b) {
                        return new Date(b.entry_id) - new Date(a.entry_id);
                    });
                    renderFields();
                    renderData()
                })
                .catch(error => {
                    toastr.error('Không thể tải dữ liệu ');
                });
        }

        function renderFields() {
            renderHtml = `<th>#</th>`;
            for (var key in dataMonitoring.channel) {
                if (dataMonitoring.channel.hasOwnProperty(key) && key.startsWith('field')) {
                    renderHtml += `<th>${dataMonitoring.channel[key]}</th>`;
                }
            }
            renderHtml += `<th>Date</th>`
            $('#table-header').html(renderHtml);
        }

        function renderData() {
            index = 0;
            renderDataHtml = ``;
            data = dataMonitoring.feeds;
            for (let i = 0; i < data.length; i++) {
                const entry = data[i];
                renderDataHtml += `<tr><td>${i + 1}</td>`;
                for (var key in dataMonitoring.channel) {
                    if (dataMonitoring.channel.hasOwnProperty(key) && key.startsWith('field')) {
                        if (typeof entry[key] == 'undefined') {
                            res = "null";
                        } else if (entry[key] == null || entry[key] == '') {
                            // yourVariable is empty
                            res = 0;
                        } else {
                            res = entry[key];
                        }
                        renderDataHtml += `<td><span class="text-info">${res}</span></td>`;
                    }
                }
                renderDataHtml += `<td>${formatDate(entry['created_at'])}</td></tr>`;
            }
            $('#table-data').html(renderDataHtml);
        }

        function formatDate(isoString, type = "D/M/YYYY - H:mm:ss") {
            // Chuyển đổi chuỗi thời gian từ định dạng ISO 8601 sang "d/m/Y - H:i:s"
            return moment(isoString).format(type);
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.12.13/xlsx.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#saveAsExcel").click(function() {
                var workbook = XLSX.utils.book_new();

                //var worksheet_data  =  [['hello','world']];
                //var worksheet = XLSX.utils.aoa_to_sheet(worksheet_data);

                var worksheet_data = document.getElementById("mytable");
                var worksheet = XLSX.utils.table_to_sheet(worksheet_data);

                workbook.SheetNames.push("Test");
                workbook.Sheets["Test"] = worksheet;

                exportExcelFile(workbook);


            });
        })

        function exportExcelFile(workbook) {
            return XLSX.writeFile(workbook, "data-"+ $.now()+ ".xlsx");
        }
    </script>
@endsection
