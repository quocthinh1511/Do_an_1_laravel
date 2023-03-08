<template>
<div style="width: 60%; margin-left: 300px; padding: 100px 0;"> 
      <div >
        <div class='center_form'>
          <h2>Upload<span class="badge bg-secondary">Single Customer</span></h2>
          <label class='black' for="first_name">Customer Name</label>
          <input  v-model="customer.name"   placeholder="Name" class="form-control " />
        </div>
        <div class='center_form'>
          <label class='black' for="first_name">Customer Phone</label>
          <input   v-model="customer.phone" placeholder="Phone" class="form-control " />
        </div>
        <div class='center_form'>
          <label class='black' for="first_name">Customer Image</label>
          <input type="file" class="form-control l " v-on:change="uploadFile" enctype ="multipart/form-data">
        </div>
        <div class="centerr">
          <button @click = 'submitOne' class="btn btn-primary "> Submit
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
          // this.details = response.data[0],
          // this.subject = response.data[1]
        ]
        );
    }
  }
}


</script>