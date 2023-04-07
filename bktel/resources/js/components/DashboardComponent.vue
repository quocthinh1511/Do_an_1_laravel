<template>

<div class="container text-center mt-5" >    
  <h3>Welcome to our Smart</h3><br>
  <div class="row" style="margin-left: 300px !important;">
    <div class="col-sm-4">
        <div class="card">
        <div class="card-header">
         <p>Current customer Number</p>
         </div>
  <div class="card-body">
    <h5 class="card-title">Customer quantity: {{ customer_quantity }}</h5>

    <a href="#" class="btn btn-primary mt-3">Go to Camera</a>
  </div>
</div>
       

    </div>
    
    <div class="col-sm-4"> 
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>....</p>    
    </div>
    <div class="col-sm-4">
      <div class="well">
       <p>Some text..</p>
      </div>
      <div class="well">
       <p>Some text..</p>
      </div>
    </div>
  </div>
</div>
</template>

<style> 
body{
    margin:auto;
    background-color:#fffffffc !important;
    clear: both; 
    height: 100% !important;

}

</style>

<script>
export default {
    data(){ 
  return{
    customer_quantity : ""
    }},
    mounted(){
        axios.post('/index_quantity_customer')
        .then(response => {
            this.customer_quantity = response.data;
            console.log(response.data);
        })
      }

}

</script>