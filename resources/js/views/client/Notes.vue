<template>
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Stations</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Stations</li>
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
                                <li><a href="javascript:void(0);" class="full-screen"><i
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
                                        <th>Model</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item, index) in dataAll" :key="index">
                                        <td>{{ item.id }}</td>
                                        <td><span>{{ item.name }}</span></td>
                                        <td><span class="text-info">{{ item.model }}</span></td>
                                        <td>
                                            <span
                                                class="badge"
                                                :class="{ 'badge-success': item.status, 'badge-danger': !item.status }">
                                            {{ item.status ? 'Operation' : 'Disconect' }}
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Cras mattis consectetur orbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
            dataAll: [
                {
                    "id": "1",
                    "status": true,
                    "model": "KDFSATRMFHDFHM",
                    "name": "Trạm 1",
                },
                {
                    "id": "2",
                    "status": false,
                    "model": "KDFSATRMDFHDF_M",
                    "name": "Trạm 2",
                },
                {
                    "id": "3",
                    "status": true,
                    "model": "KDFSATFDGFDRMM",
                    "name": "Trạm 3",
                },
                {
                    "id": "4",
                    "status": true,
                    "model": "KDFSGDGHD45ATRMM",
                    "name": "Trạm 4",
                },
                {
                    "id": "5",
                    "status": true,
                    "model": "KDFSAT14RMM",
                    "name": "Trạm 5",
                },
            ]
        };
    },
    mounted() {

    },
    methods: {}
}
</script>

<style scoped></style>
