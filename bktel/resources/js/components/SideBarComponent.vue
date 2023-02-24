<template>
    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 ftco-section img js-fullheight" style="background-image: url(https://img1.kienthucvui.vn/uploads/2019/10/27/hinh-nen-dep-cho-dien-thoai_111220841.jpg);">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class= 'text-side-bar' >BK Smart </span>
     
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" style="display: inline-block !important; width: 200px;" >
          <img  @click="$bvModal.show('bv-modal-example')"  v-bind:src="img.path" alt="user                                                                                                `      "
          style="  width: 50px;
          height: 50px;
          border: 0.1875em solid #0F1C3F;
          border-radius: 50%;
          box-shadow: 0.375em 0.375em 0 0 rgba(15, 28, 63, 0.125);" >
         <a style = "margin-left: 20px" href="#" class="">Tri Thuc</a>
        </div>
        <!-- <div class="image">
          <img :src="image" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <b-modal id="bv-modal-example" hide-footer>
    <template #modal-title>
      Upload Avatar
    </template>
    <div class="d-block text-center">
      <input type="file" class=" " v-on:change="uploadFile" enctype ="multipart/form-data">
        <button type="button" class="btn btn-primary" @click = 'submitAvatar'> Upload </button>
    </div>
    <b-button class="mt-3" block @click="$bvModal.hide('bv-modal-example')">Close Me</b-button>
  </b-modal>
</div>
         
 
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
    <a href="#" class="nav-link active">
      <i class="fa fa-tachometer" aria-hidden="true"></i>
      <p>
        Features
        <i class="right fa fa-arrow-down" aria-hidden="true"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="upload_report" class="nav-link" >
          <i class="fa fa-circle-thin nav-icon" aria-hidden="true"></i>
          <p>Upload report</p>
        </a>
      </li>
    </ul>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="/detect_face" class="nav-link">
          <i class="fa fa-circle-thin nav-icon" aria-hidden="true"></i>
          <p>Detect Face</p>
        </a>
      </li>
    </ul>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="/take_photo " class="nav-link">
          <i class="fa fa-circle-thin nav-icon" aria-hidden="true"></i>
          <p>Take Photo</p>
        </a>
      </li>
    </ul>
  </li>
  </ul>
  </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
   </aside>
</template>

<script>

export default {
  mounted(){
        axios.post('show_img')
        .then(response => {
            this.img.path = response.data;
            console.log(response.data);
        })
      },
data(){ 
  return{
    img: {
    path: ""
  }
  }
  
},
methods: {
  async uploadFile(event){
        this.img.path = event.target.files[0];
        console.log(this.img.path);
      } ,
      async submitAvatar(){
      this.errors = [];
        if (!this.img.path) {
        this.errors.push("Path is required.");
        }
        if (!this.errors.length) {
        let data = new FormData();
        data.append('_method', 'POST');
        data.append('path', this.img.path);
  
          console.log(data)
        await axios.post('/upload_img',
                    data,{ headers: {
                        'content-type': 'multipart/form-data'
                    } }, 
                    ).then(response => [
                      this.img.path = response.data ]
        );;
                    window.location.reload();
        }
    }
  }
}


</script>