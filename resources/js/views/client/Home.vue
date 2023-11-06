<template>
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-9">
                                    <h5 class="m-t-0">Total stations: </h5>
                                </div>
                                <div class="col-3 text-right">
                                    <h2 class="m-b-0">{{ this.totalStations.number }}</h2>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                            <div class="progress-bar" role="progressbar" 
                                            :aria-valuenow="totalStations.number" aria-valuemin="0" 
                                            :aria-valuemax="totalStations.number" 
                                            :style="'width: ' + totalStations.percent + '%;'"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-7">
                                    <h5 class="m-t-0">Operation</h5>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="m-b-0">{{ this.operatingStation.number }}</h2>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar progress-bar-success" role="progressbar" 
                                            :aria-valuenow="operatingStation.number" aria-valuemin="0" 
                                            :aria-valuemax="operatingStation.number" 
                                            :style="'width: ' + operatingStation.percent + '%;'"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-7">
                                    <h5 class="m-t-0">Disconect </h5>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="m-b-0">{{ this.disconectStation.number }}</h2>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" 
                                            :aria-valuenow="disconectStation.number" aria-valuemin="0" 
                                            :aria-valuemax="disconectStation.number" 
                                            :style="'width: ' + disconectStation.percent + '%;'"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card weather2">
                        <div class="body city-selected">
                            <div class="row clearfix">
                                <div class="col-12">
                                    <div class="night">VIET NAM</div>
                                </div>
                                <div class="info">
                                    <div class="temp"><b style="font-size: 50px">{{ formattedTime }}</b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix" style="height: 59vh; overflow-y: scroll;">
                                <div class="col-lg-3 col-md-6 col-sm-12" v-for="(item, index) in dataAll" :key="index">
                                    <div class="card" style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>{{ item.name }}</h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li>
                                                    <div class="border rounded-circle"
                                                        :class="{ 'bg-success': item.status, 'bg-danger': !item.status }"
                                                        style="width:15px; height:15px"></div>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                                        aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);" class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">{{ item.ph }} pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);" class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">{{ item.ntu }} NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">{{ item.temperature }} °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">{{ item.do }} mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">{{ item.latitude }}</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">{{ item.longitude }}</div>
                                                    </a>
                                                </li>
                                            </ul>
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
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            formattedTime: '',
            totalStations: {number :0 , percent: 0  },
            operatingStation: {number :0 , percent: 0  },
            disconectStation: {number :0 , percent: 0  },
            dataAll: [
                {
                    "name": "Trạm 1",
                    "status": true,
                    "ph": 10,
                    "ntu": 10,
                    "temperature": 10,
                    "latitude": "10° N",
                    'do':74,
                    "longitude": "10° W"
                },
                {
                    "name": "Trạm 2",
                    "status": true,
                    "ph": 24,
                    "ntu": 24,
                    "temperature": 24,
                    "latitude": "24° N",
                    'do':14,
                    "longitude": "24° W"
                },
                {
                    "name": "Trạm3",
                    "status": false,
                    "ph": 60,
                    "ntu": 60,
                    "temperature": 60,
                    "latitude": "60° N",
                    'do':32,
                    "longitude": "60° W"
                },
                {
                    "name": "Trạm 4",
                    "status": true,
                    "ph": 56,
                    "ntu": 56,
                    "temperature": 56,
                    'do':4,
                    "latitude": `40° 26' 46 N`,
                    "longitude": `79° 58' 56" W`
                }
            ]
        };
    },
    mounted() {
        this.setDataStations();
        this.displayCurrentTime(); // Gọi lần đầu khi component được tạo
        setInterval(this.displayCurrentTime, 1000); // Cập nhật thời gian mỗi giây
    },
    methods: {
        setDataStations(){
            const totalData = this.dataAll.length ;
            const openData = this.getOperatingStation() ;
            const disconectData = this.getDisconectStation() ;

            this.totalStations= {number :totalData , percent: this.calculatePercentage(totalData, totalData)  };
            this.operatingStation= {number :openData , percent: this.calculatePercentage(openData, totalData)  };
            this.disconectStation= {number :disconectData , percent: this.calculatePercentage(disconectData, totalData)  };
            console.log(this.totalStations);
            console.log(this.operatingStation);
            console.log(this.disconectStation);
            console.log(this.dataAll);
     
        },
        getOperatingStation(){
            return this.dataAll.filter((station) => station.status === true).length;
        },
        getDisconectStation(){
            return this.dataAll.filter((station) => station.status === false).length;
        },
        calculatePercentage(openData, totalData) {
          return (openData / totalData) * 100;
        },
        displayCurrentTime() {
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
                // console.log(this.operationStations());
            this.formattedTime = hours + ':' + minutes + ' ' + ampm;
        }
    }
}
</script>

<style scoped></style>