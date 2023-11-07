<template>
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Tables</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12 p-0">
            <div class="card m-0">
                <div class="header">
                    <ul class="header-dropdown dropdown dropdown-animated scale-left">
                        <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                    class="icon-refresh"></i></a></li>
                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another Action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home-withicon"><i
                                    class="fa fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-withicon"><i
                                    class="fa fa-user"></i> Profile</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-withicon"><i
                                    class="fa fa-vcard"></i> Contact</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="Home-withicon">
                            <div class="col-lg-12 p-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>$86,000</td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>$433,060</td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td>$162,700</td>
                                            </tr>
                                            <tr>
                                                <td>Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2012/12/02</td>
                                                <td>$372,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="Profile-withicon">
                            <h6>Profile</h6>
                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic
                                lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork
                                tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica.
                                DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog.
                                Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown.
                                Pitchfork sustainable tofu synth chambray yr.</p>
                        </div>
                        <div class="tab-pane" id="Contact-withicon">
                            <h6>Contact</h6>
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan
                                four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft
                                beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda
                                labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit
                                sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean
                                shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown,
                                tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
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
            totalStations: { number: 0, percent: 0 },
            operatingStation: { number: 0, percent: 0 },
            disconectStation: { number: 0, percent: 0 },
            dataAll: [
                {
                    "name": "Trạm 1",
                    "status": true,
                    "ph": 10,
                    "ntu": 10,
                    "temperature": 10,
                    "latitude": "10° N",
                    'do': 74,
                    "longitude": "10° W"
                },
                {
                    "name": "Trạm 2",
                    "status": true,
                    "ph": 24,
                    "ntu": 24,
                    "temperature": 24,
                    "latitude": "24° N",
                    'do': 14,
                    "longitude": "24° W"
                },
                {
                    "name": "Trạm3",
                    "status": false,
                    "ph": 60,
                    "ntu": 60,
                    "temperature": 60,
                    "latitude": "60° N",
                    'do': 32,
                    "longitude": "60° W"
                },
                {
                    "name": "Trạm 4",
                    "status": true,
                    "ph": 56,
                    "ntu": 56,
                    "temperature": 56,
                    'do': 4,
                    "latitude": `40° 26' 46 N`,
                    "longitude": `79° 58' 56" W`
                }
            ]
        };
    },
    mounted() {

    },
    methods: {

    }
}
</script>

<style scoped></style>
