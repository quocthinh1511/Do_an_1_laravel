<template>
    <div class="content-wrapper" style = "padding-top:12px !important; padding-bottom: 12px; padding-left: 12px; padding-right: 12px"> 
          <div>
            <div class='center_form '>
              <h2>Upload<span class="badge bg-secondary">Single Customer</span></h2>
              <label for="first_name">Customer Name</label>
              <input  v-model="customer.name" placeholder="Name" class="form-control w-50 text-black bg-body-secondary"/>
            </div>
            <div class='center_form'>
              <label for="first_name">Customer Phone</label>
              <input   v-model="customer.phone" placeholder="Phone" class="form-control w-50 text-black " />
            </div>
            <div class='center_form'>
              <label for="first_name">Customer Image</label>
              <input type="file" class="form-control w-50 " v-on:change="uploadFile" enctype ="multipart/form-data">
            </div>
            <div class="center_form mt-2 text-black">
              <button @click = 'submitOne' class="btn btn-primary"> Submit
              </button>
            </div>
          </div>
        </div>
    </template>
    
    
    <script>
    export default{
      data(){
        return {
          customer: {
          name: "",
          phone: "",
          img_path: ""
        }
        }
        
      },
      methods: {
        async uploadFile(event){
            this.customer.img_path = event.target.files[0];
            console.log(this.customer.img_path);
          } ,
        async submitOne() {
          let data = new FormData();
            data.append('_method', 'POST');
            data.append('img_path', this.customer.img_path)
            data.append('name', this.customer.name)
            data.append('phone', this.customer.phone);
            await axios.post('/create_customer', 
            data,{ headers: {
                            'content-type': 'multipart/form-data'
                        } }
          ).then(response => [
            ]
            );
        }
      }
    }
  </script>