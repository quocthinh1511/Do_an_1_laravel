<template>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper "  
:class="{'background-dash': age < 15 
                                                }">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mb-3">BK SMART </h1>
          <p class="m-0" v-if="name_cus != null && name_cus != 'unknown'">Welcome {{ name_cus }} to our Market! What to you want to buy?</p>
          <p class="m-0" v-if="name_cus != null && name_cus === 'unknown'">May be this first time you go to our Market? Do you want to be a member?</p>
          <p class="mt-1"  v-if="name_cus != null && name_cus === 'unknown'">(Being a member, you will receive some coupons and next shopping.)</p>
          <button class="m-0 hover_member" v-if="name_cus != null && name_cus === 'unknown'" @click="take_photo_page">Become a Member now!</button>

        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <!-- <li class="breadcrumb-item active">{{ name_cus }}</li> -->
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card"  v-if="name_cus != null && name_cus !== 'unknown'"  >
            <div class="container mt-5"> <div class="d-flex justify-content-center row"> 
              <div class="col-md-6"> <div class="coupon p-3 bg-white"> 
                <div class="row no-gutters">
                  <div class="col-md-4 border-right"> 
                    <div class="d-flex flex-column align-items-center">
                      <img style= "width: 80px; height: 50px; border-radius: 10px;" src="https://i.pinimg.com/originals/33/fa/e4/33fae413c57d5098f41ccef368012b48.jpg">
                      <span class="d-block">DEE Shop</span>
                      <span class="text-black-50">All items </span>
                    </div> </div>
                     <div class="col-md-8"> <div> 
                      <div class="d-flex flex-row justify-content-end off"> <h1>30%</h1><span>OFF</span></div> 
                      <div class="d-flex flex-row justify-content-between off px-3 p-2"><span>Code:</span><span class="border border-success px-3 rounded code">BBB50</span></div> </div> </div> </div> </div> </div> </div> </div>
                      
                      <div class="container mt-5"> <div class="d-flex justify-content-center row"> 
              <div class="col-md-6"> <div class="coupon p-3 bg-white"> 
                <div class="row no-gutters">
                  <div class="col-md-4 border-right"> 
                    <div class="d-flex flex-column align-items-center">
                      <img style= "width: 80px; height: 50px; border-radius: 10px;" src="https://incucdep.com/wp-content/uploads/2014/12/logo-thoi-trang.jpg">
                      <span class="d-block">BK Shop</span>
                      <span class="text-black-50">All items </span>
                    </div> </div>
                     <div class="col-md-8"> <div> 
                      <div class="d-flex flex-row justify-content-end off"> <h1>50%</h1><span>OFF</span></div> 
                      <div class="d-flex flex-row justify-content-between off px-3 p-2"><span>Code:</span><span class="border border-success px-3 rounded code">DDD15</span></div> </div> </div> </div> </div> </div> </div> </div>
            <!-- <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Online Store Visitors</h3>
                <a href="javascript:void(0);">View Report</a>
              </div>
            </div> -->
            <div class="card-body">
              <!-- <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">820</span>
                  <span>Visitors Over Time</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fa fa-arrow-up"></i> 12.5%
                  </span>
                  <span class="text-muted">Since last week</span>
                </p>
              </div> -->
              
              <!-- /.d-flex -->

              <!-- <div class="position-relative mb-4" style="height:200px !important">
                <canvas id="visitors-chart" height="200" ></canvas>
              </div> -->

              <!-- <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fa fa-square text-primary"></i> Free coupon for next shopping
                </span>

                <span>
                  <i class="fa fa-square text-gray"></i> Last Week
                </span>
              </div> -->
            </div>
            
          </div>
          <!-- /.card -->
          
          <div class="card" v-if=" gender=='female' ">
            <div class="card-header border-0">
              <h3 class="card-title">Products</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fa fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fa fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body table-responsive p-0" >
              <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Sales</th>
                  <th>More</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>
                    <img src="https://down-vn.img.susercontent.com/file/fdd0f78c1416ca34197a97f331099876" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Lipstick
                  </td>
                  <td>$13 USD</td>
                  <td>
                    <small class="text-success mr-1">
                      <i class="fa fa-arrow-up"></i>
                      12%
                    </small>
                    12,000 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="data:image/jpeg;base64,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" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Hair band
                  </td>
                  <td>$29 USD</td>
                  <td>
                    <small class="text-warning mr-1">
                      <i class="fa fa-arrow-down"></i>
                      0.5%
                    </small>
                    123,234 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQT6xjvrURShEbRKlFWUhltEPvnkUugbBVBOA&usqp=CAU" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Skirt
                  </td>
                  <td>$1,230 USD</td>
                  <td>
                    <small class="text-danger mr-1">
                      <i class="fa fa-arrow-down"></i>
                      3%
                    </small>
                    198 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="https://m.media-amazon.com/images/I/91qIRxHh-bL._AC_UY1000_.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                   Peep Toe
                    <span class="badge bg-danger">NEW</span>
                  </td>
                  <td>$199 USD</td>
                  <td>
                    <small class="text-success mr-1">
                      <i class="fa fa-arrow-up"></i>
                      63%
                    </small>
                    87 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card" v-if=" gender=='male' ">
            <div class="card-header border-0">
              <h3 class="card-title">Products</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fa fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fa fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body table-responsive p-0" >
              <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Sales</th>
                  <th>More</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>
                    <img src="data:image/jpeg;base64,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" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Male Shoes
                  </td>
                  <td>$13 USD</td>
                  <td>
                    <small class="text-success mr-1">
                      <i class="fa fa-arrow-up"></i>
                      12%
                    </small>
                    12,000 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="https://salt.tikicdn.com/cache/w1200/ts/product/27/e1/af/5d4372e68ae541c8b469a46790108441.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Belt
                  </td>
                  <td>$29 USD</td>
                  <td>
                    <small class="text-warning mr-1">
                      <i class="fa fa-arrow-down"></i>
                      0.5%
                    </small>
                    123,234 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="https://pazoda.com/wp-content/uploads/2020/06/Mach3.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Shaver 
                  </td>
                  <td>$1,230 USD</td>
                  <td>
                    <small class="text-danger mr-1">
                      <i class="fa fa-arrow-down"></i>
                      3%
                    </small>
                    198 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="data:image/jpeg;base64,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" alt="Product 1" class="img-circle img-size-32 mr-2">
                   Wax
                    <span class="badge bg-danger">NEW</span>
                  </td>
                  <td>$199 USD</td>
                  <td>
                    <small class="text-success mr-1">
                      <i class="fa fa-arrow-up"></i>
                      63%
                    </small>
                    87 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
         
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card" >
            <div class="card-header border-0" >
              <div class="d-flex justify-content-between" >
                <h3 class="card-title">Sales</h3>
              </div>
            </div>
            <div class="card-body" v-if = 'age > 15'>
              <!--  -->
              <img class="card-img-top" src="https://bange.com.vn/wp-content/uploads/2021/07/123-2-1.jpg" alt="Card image cap"> 
  <div class="card-body">
    <h2> Only 50$</h2>
  </div>
            </div>
            <div class="card" style="width: 30rem; margin-left:50px; margin-top: 10px;" v-if = 'age < 15'>
  <img class="card-img-top" src="https://sc04.alicdn.com/kf/H65d1c5fc3c0c4adba74635ce4662b2e4m.jpg" alt="Card image cap"> 
  <div class="card-body">
    <h2> Only 80$</h2>
    <p class="card-text">Robots combine sensors, computation, and motors to interact intelligently with their environment. Robot toys need to be so cheap and robust that they can be used as playthings.</p>
  </div>
</div>

            
          </div>
          <!-- /.card -->

         
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</template>
<style>

.background-dash{
  background-color: white;
}
.hover_member:hover {
  text-decoration: underline;
  color: rgb(0, 29, 143)
}
.coupon{border-radius: 12px;box-shadow: 5px 8px 10px #d6d5d533}body{background: rgb(251, 253, 255)}.code:hover{background: green;color: #fff;cursor: pointer}
</style>
<script>
export default {
  data(){ 
  return{
    name: ""
}
  
},

  props:{
    name_cus: {
            type: String,
            default() {
                return "";
            }
        },
        gender: {
            type: String,
            default() {
                return "";
            }
        },
        age: {
            type: String,
            default() {
                return null;
            }
        },
  },
  methods: {
    take_photo_page(){
      window.location.href = "/take_photo"
    }
  }
}
</script>