<template>
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
                                    <tbody>
                                        <tr v-for="(item, index) in dataAll" :key="index">
                                            <td>{{ item.id }}</td>
                                            <td><span>{{ item.name }}</span></td>
                                            <td><span class="text-info">{{ item.model }}</span></td>
                                            <td>
                                                <span class="badge"
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
                            <input type="text" class="form-control" v-model="name" required>
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="number" class="form-control" v-model="model" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="createChannel">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
export default {
    name: "Home",
    data() {
        return {
            name: '',
            model: '',
            dataAll: [
                
            ]
        };
    },
    created() {
    // Gửi yêu cầu GET API khi component được tạo
    axios.get('/api/channel')
      .then(response => {
        this.dataAll = response.data;
        console.log(this.dataAll);
      })
      .catch(error => {
        console.error(error);
      });
  },
    mounted() {
    },
    methods: {
        createChannel() {
            const data = {
                name: this.name,
                model: this.model
            };

            axios.post('/api/channel', data)
                .then(response => {
                    $('#createNotes').modal('hide');
                    $(".modal-backdrop.fade.show").remove();
                    this.dataAll = [...this.dataAll, response.data.data]
                    // Xử lý phản hồi thành công ở đây
                    console.log('Dữ liệu đã được lưu thành công', response.data);
                    console.log('this.dataAll', this.dataAll);
                    // Hiển thị thông báo thành công sử dụng toast
                    toast.success('Dữ liệu đã được lưu thành công');
                })
                .catch(error => {
                    error = error.response;
                   
                     var dataError = error.data.errors;
                    if (error.status != 500) {
                        for (const key in dataError) {
                            if (dataError.hasOwnProperty(key)) {
                                const messages = dataError[key];
                                messages.forEach(message => {
                                    toast.error(message);
                                });
                            }
                        }
                    }else{
                        toast.error('Lỗi khi lưu dữ liệu');
                    }
                   
                });
        },
        getChannel(){

        }
    }
}
</script>

<style scoped></style>
