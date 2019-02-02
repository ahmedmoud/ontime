<template>
<div class="container">
  <button class="btn btn-success mt-5 mb-5" @click="addItem">Add item</button>
<table class="table mb-5">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">item name</th>
      <th scope="col">item price</th>
    </tr>
  </thead>
  <tbody class=".items">
    <tr v-for="item in items">
      <th scope="row">{{ item.id }}</th>
      <td>{{ item.name }}</td>
      <td>{{ item.price }}</td>
    </tr>
  </tbody>
</table>

<p>total price : {{ totalPrice }}</p>
</div>
</template>

<script>
import apiObject from '../api/api.js'
export default {
  data(){
   var items = this.test();
   var totalPrice = 0 ;
   return {totalPrice, items }

  },
   methods: {
     test () {
      var items = apiObject.getItems(this.$http);
      items.then(function(response){
         this.items = response.body;
         this.calculateTotalPrice();
         console.log(this.totalPrice);
       })
     },
     addItem(){
       this.$router.push('addItem')
       },
       calculateTotalPrice(){
        let totalPrice = 0;
        var items =this.items;
         for(let i =0; i<items.length; i++ ){
           totalPrice += Number(items[i].price);
         }
         this.totalPrice = totalPrice;
       }
   }
}
</script>
