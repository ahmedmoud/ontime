<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<div class="container">
<button class="btn btn-success mt-5 mb-5"
        @click="addNewItem"
>
 New Item
</button>
 <div class="card mb-3"
    v-for="(item, index) in items"
    >
    <div class="card-body">
        <span class="float-right" style="cursor:pointer"
        @click="deleteItem(index)"
        >
            x
        </span>
        <h4 class="card-title">Add item <?php echo"{{ index }}"?> </h4>
        <input tpye="text" class="form-control mb-2" placeholder="name" v-model="item.name"/>
        <input tpye="text" class="form-control mb-2" placeholder="price" v-model="item.price" />
        <input type="submit" style="float: right" class="btn btn-success mb-2">
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.22/vue.js"></script>
<script>
    var app = new Vue({
        el: '.container',
        data: {
            items: [
                {
                    name: '',
                    price: ''
                }
            ]
        },
        methods: {
            addNewItem(){
                this.items.push({
                    name: '',
                    price: ''
                })
            },
            deleteItem(index){
                this.items.splice(index, 1);
            }
        }
    });
</script>
