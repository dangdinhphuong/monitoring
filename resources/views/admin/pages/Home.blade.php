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
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
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
                                <select class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->model }}">{{ $channel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="body social_counter">
                            <ul class=" list-unstyled basic-list" id='fields'>
                                {{-- <li><i class=" m-r-5"></i> Potenz Hydrogen: <span class="badge badge-primary">10 pH</span></li>
                            <li><i class=" m-r-5"></i> Turbidity : <span
                                    class="badge-purple badge">10 NTU</span></li>
                            <li><i class=" m-r-5"></i> Temperature :<span
                                    class="badge-success badge">10 °C</span></li>
                            <li><i class=" m-r-5"></i>DO :<span
                                    class="badge-info badge">74 mg/L</span></li>
                            <li><i class=" m-r-5"></i> Latitude:<span
                                    class="badge-info badge">10° N</span></li>
                            <li><i class=" m-r-5"></i> Longitude:<span
                                    class="badge-info badge">10° W</span></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="card" style="height: 80vh">
                        <div class="header bline">
                            <div class="form-group col-lg-3 col-3">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option value='line'>Line</option>
                                    <option value='bar'>Bar</option>
                                </select>
                            </div>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li>
                                    <h3 id="time"></h3>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="myChart"
                                style="height: 400px!important; display: block; box-sizing: border-box; width: 1564px;"
                                width="1564" height="400px"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



@section('javascript')
    <script>
        var dataMonitoring = {
            "channel": {
                "id": 2187184,
                "name": "BXD",
                "description": "De tai Bo Xay Dung",
                "latitude": "0.0",
                "longitude": "0.0",
                "field1": "Độ pH",
                "field2": "Độ đục (Turbidity)",
                "field3": "Nhiệt độ",
                "field4": "TDS",
                "field5": "GPRS1",
                "field6": "GPRS2",
                "field7": "Power",
                "created_at": "2023-06-13T10:18:23Z",
                "updated_at": "2023-11-10T08:55:02Z",
                "last_entry_id": 3411
            },
            "feeds": [{
                    "created_at": "2023-11-11T09:14:34Z",
                    "entry_id": 3407,
                    "field1": random(),
                    "field2": random(),
                    "field3": random(),
                    "field4": random(),
                    "field5": random(),
                    "field6": random(),
                    "field7": random(),
                },
                {
                    "created_at": "2023-11-11T09:14:50Z",
                    "entry_id": 3408,
                    "field1": random(),
                    "field2": random(),
                    "field3": random(),
                    "field4": random(),
                    "field5": random(),
                    "field6": random(),
                    "field7": random(),
                },
                {
                    "created_at": "2023-11-11T09:15:05Z",
                    "entry_id": 3409,
                    "field1": random(),
                    "field2": random(),
                    "field3": random(),
                    "field4": random(),
                    "field5": random(),
                    "field6": random(),
                    "field7": random(),
                },
                {
                    "created_at": "2023-11-12T02:08:22Z",
                    "entry_id": 3410,
                    "field1": random(),
                    "field2": random(),
                    "field3": random(),
                    "field4": random(),
                    "field5": random(),
                    "field6": random(),
                    "field7": random(),
                },
                {
                    "created_at": "2023-11-12T03:47:19Z",
                    "entry_id": 3412,
                    "field1": random(),
                    "field2": random(),
                    "field3": random(),
                    "field4": random(),
                    "field5": random(),
                    "field6": random(),
                    "field7": random(),
                }
            ]
        };
        var dataset = [];

        function action() {
            const apiURL = 'https://api.thingspeak.com/channels/2187184/fields/1.json';
            const apiKey = 'M18ETIVKUBNO8P5I';
            const results = 20;

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
                    console.error('Error:', error);
                });
        }
        action();

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

        // Sử dụng promise
        // $(document).ready(function() {
        //     const apiURL = 'https://api.thingspeak.com/channels/2187184/fields/1.json';
        //     const apiKey = 'M18ETIVKUBNO8P5I';
        //     const results = 20;

        //     // Gọi fetchDataFromApi và sau đó sử dụng dữ liệu trả về
        //     fetchDataFromApi(apiURL, apiKey, results)
        //         .then(response => {
        //             dataMonitoring = response;
        //             console.log(response);
        //             // Gọi các hàm sử dụng dữ liệu ở đây
        //             renderFields();
        //             console.log("Channel Info:", dataMonitoring.channel);
        //             console.log("Feeds:", dataMonitoring.feeds);
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //         });
        // });


        function renderFields() {
            var feed = getLatestFeed(dataMonitoring.feeds);
            for (var key in dataMonitoring.channel) {
                if (dataMonitoring.channel.hasOwnProperty(key) && key.startsWith('field')) {
                    getDatasetChannel(key)

                    renderHtml =
                        `<li><i class=" m-r-5"></i> ${dataMonitoring.channel[key]}: <span class="badge badge-primary" id="">${feed[key] ?? null}</span></li>`
                    $('#fields').append(renderHtml);
                }
            }
            console.log(dataset);
            renderChart(dataset, 'line', arrayField("created_at", 'time'))
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
    </script>

    <script>
        // chart
        function renderChart(dataset, typeChart = 'line', time) {
            const ctx = $('#myChart');
            new Chart(ctx, {
                type: typeChart,
                data: {
                    labels: time,
                    datasets: dataset
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

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
