@extends('admin.app')
@section('title', 'Dasboard')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-12">
                    <div class="card" style="height: 80vh">
                        <div class="header">
                            <div class="form-group">
                                <label>Channel</label>
                                <select class="form-control" id="channels" onchange="action()">
                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->channel }}">{{ $channel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="body social_counter">
                            <ul class=" list-unstyled basic-list" id='fields'>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="card" style="height: 80vh">
                        <div class="header bline">
                            <div class="form-row col-lg-6 col-6">
                                <div class="col">
                                    <select class="form-control" id="typeChart" onchange="changeType()">
                                        <option value='line' {{ !empty($_GET['type']) && $_GET['type'] == 'line' ? 'selected ' : ''}}>Line</option>
                                        <option value='bar' {{ !empty($_GET['type']) && $_GET['type'] == 'bar' ? 'selected ' : ''}}>Bar</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-primary" onclick="showDefaultField('')">All
                                        data</button>
                                </div>
                            </div>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li>
                                    <h3 id="time"></h3>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



@section('javascript')
    <script>
        var dataMonitoring = [];
        var dataset = [];
        var defaultField = '';
        var typeChart = {!! json_encode(!empty($_GET['type']) ? $_GET['type'] : "line") !!};


        window.addEventListener('resize', function() {
            location.reload();
        });
        action();

        function changeType() {
            typeChart = $("#typeChart").val();
            setParam("type", typeChart);
            location.reload();
        }

        function action() {
            const id = $('#channels').val();
            const apiURL = 'https://api.thingspeak.com/channels/' + id + '/fields/1.json';
            const apiKey = 'M18ETIVKUBNO8P5I';
            const results = 10;

            // Gọi fetchDataFromApi và sau đó sử dụng dữ liệu trả về
            fetchDataFromApi(apiURL, apiKey, results)
                .then(response => {
                    // Sắp xếp mảng feeds theo thứ tự tăng dần của entry_id
                    response.feeds.sort(function(a, b) {
                        return a.entry_id - b.entry_id;
                    });

                    dataMonitoring = response;
                    console.log(response);
                    // Gọi các hàm sử dụng dữ liệu ở đây
                    renderFields();
                    console.log("Channel Info:", dataMonitoring.channel);
                    console.log("Feeds:", dataMonitoring.feeds);
                })
                .catch(error => {
                    toastr.error('Không thể tải dữ liệu ');
                    console.error('Error:', error);
                });
        }

        // Hàm để gọi API và trả về một promise
        function fetchDataFromApi(apiURL, apiKey, results) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: apiURL,
                    method: 'GET',
                    data: {
                        api_key: apiKey,
                        results: results
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

        function renderFields() {
            var feed = getLatestFeed(dataMonitoring.feeds);
            renderHtml = ``;
            for (var key in dataMonitoring.channel) {
                if (dataMonitoring.channel.hasOwnProperty(key) && key.startsWith('field')) {
                    getDatasetChannel(key)

                    renderHtml +=
                        `<li><i class=" m-r-5"></i> ${dataMonitoring.channel[key]}: <span class="badge badge-primary" onclick="showDefaultField('${dataMonitoring.channel[key]}')"><a href="javascript:void(0);">${feed[key] ?? null}</a></span></li>`
                }
            }
            $('#fields').html(renderHtml);
            console.log(dataset);
            if (defaultField == '') {
                updateChart(dataset, typeChart, arrayField("created_at", 'time'))
            } else {
                showDefaultField(defaultField);
            }
        }

        function getLatestFeed(feeds) {
            // Sắp xếp mảng feeds theo entry_id, giảm dần
            feeds.sort(function(a, b) {
                return b.entry_id - a.entry_id;
            });

            // Lấy mảng đầu tiên của feeds, tức là mảng có entry_id lớn nhất
            return feeds[0];
        }

        function arrayField(targetField, dataType = 'text') {
            return dataMonitoring.feeds.map(function(entry) {
                if (dataType == 'time') {
                    return formatISO8601Date(entry[targetField])
                } else {
                    return entry[targetField];
                }
            });
        }

        function getDatasetChannel(key) {
            color = getRandomColor();
            dataset.push({
                label: dataMonitoring.channel[key],
                backgroundColor: color,
                borderColor: color,
                data: arrayField(key),
                tension: 0.3
            });
        }

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function random() {
            return Math.floor(Math.random() * 100) + 1
        }

        function formatISO8601Date(isoString, type = "D/M/YYYY - H:mm:ss") {
            // Chuyển đổi chuỗi thời gian từ định dạng ISO 8601 sang "d/m/Y - H:i:s"
            return moment(isoString).format(type);
        }
        function setParam(key, value) {
            // Lấy tham số từ URL
            var currentUrl = window.location.href;
            var paramValueFromUrl = getParameterByName(key, currentUrl);

            // Tạo URL mới dựa trên việc thêm hoặc cập nhật tham số
            var newUrl;
            if (paramValueFromUrl !== null) {
                // Tham số đã tồn tại, cập nhật giá trị
                newUrl = currentUrl.replace(new RegExp('(' + key + '=)[^&]+'), '$1' + value);
            } else {
                // Tham số chưa tồn tại, thêm mới
                var separator = currentUrl.includes('?') ? '&' : '?';
                newUrl = `${currentUrl}${separator}${key}=${value}`;
            }

            // Cập nhật URL
            window.history.replaceState({}, document.title, newUrl);
        }
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
    </script>

    <script>
        function showDefaultField(field) {
            defaultField = field;
            if (defaultField == '') {
                updateChart(dataset, typeChart, arrayField("created_at", 'time'))
            } else {
                datasetField = dataset.filter(function(entry) {
                    return entry.label === defaultField;
                });
                updateChart(datasetField, typeChart, arrayField("created_at", 'time'))
            }
        }

        function updateChart(dataset, typeChart, time) {
            // Xóa dữ liệu cũ
            myChart.data.labels = [];
            myChart.data.datasets = [];

            // Thêm dữ liệu mới
            myChart.type = 'bar';
            myChart.data.labels = time;
            myChart.data.datasets = dataset;

            // Cập nhật biểu đồ
            myChart.update();
        }
        // Ví dụ về cách sử dụng
        const myChart = new Chart($('#myChart'), {
            type: typeChart,
            data: {
                labels: ["Label 1", "Label 2", "Label 3"],
                datasets: [{
                    label: [],
                    data: [],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        //  time 

        setInterval(this.displayCurrentTime, 1000);

        function displayCurrentTime() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var ampm = hours >= 12 ? 'PM' : 'AM';

            if (hours < 10) {
                hours = '0' + hours;
            }

            if (minutes < 10) {
                minutes = '0' + minutes;
            }
            $('#time').text(hours + ':' + minutes + ' ' + ampm);
        }
    </script>
@endsection
