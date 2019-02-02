<template>
<div class="container">
  <button class="btn btn-success mt-5 mb-5" @click="cancel">Home</button>

 <div class="card mb-3">
    <div class="card-body">
        <span class="float-right" style="cursor:pointer">x</span>
        <h4 class="card-title">Add item  </h4>

        <p class="alert alert-danger" v-if="errors['name']">{{ errors['name'] }}</p>
        <input tpye="text" class="form-control mb-2" placeholder="name" v-model="item.name" />
        <p class="alert alert-danger" v-if="errors['price']">{{ errors['price'] }}</p>
        <input tpye="text" class="form-control mb-2" placeholder="price" v-model="item.price"/>
        <input type="submit" @click="addItem" style="float: right" class="btn btn-success mb-2">
         <button  style="float: right; margin-right: 10px;" class="btn btn-success" @click="cancel">Cancel</button>
    </div>
</div>
</div>
</template>

<script>
import apiObject from '../api/api.js'
export default{

  data (){
    return {
      item : {
        name: '',
        price: ''
      },
      errors: []
    }
  },
   methods: {
     addItem () {
       var validate = this.checkForm();
       console.log(validate);

       if(validate){
      apiObject.addItem(this.$http,{name: this.item.name , price: this.item.price}).then(function(response){
         this.$router.push('/');
       });
          }
     },
     cancel(){
       this.$router.push('/');
     },
      checkForm: function () {

        this.errors = [];
      if (!this.item.name)
        this.errors['name'] =  'Name required.';
      if (!this.item.price)
        this.errors['price'] = 'price required.';
      if(isNaN(this.item.price) ){
        console.log( Number(this.item.price));
       this.errors['price'] = 'price must be number.';
      }
      return  !this.errors['name']&&!this.errors['price'];

    }
  }
   }
</script>
