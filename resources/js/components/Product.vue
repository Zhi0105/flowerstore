<template>
<div class="main">
        <div class="container">
        <div class="header text-center p-2 text-white bg-primary mt-5">
            <h2>Product List</h2>
            <router-link class="nav-link" to="/add_product">➕</router-link>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>    
                    <th scope="col">Product name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody v-for="product in products" :key="product.id">
                <tr>
                <th scope="row">{{ product.id }}</th>
                <td>{{ product.product_name }}</td>
                <td>{{ product.product_description }}</td>
                <td>{{ product.price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
export default {
    name: 'Product',
    created(){
        this.loadData();
    },
    methods: {
        loadData(){
            let url = this.url + '/api/products';
            this.axios.get(url).then(res => {
                this.products = res.data.data
                console.log(this.products);
            });
        }
    },
    mounted() {
            console.log('product list Component Mounted');
    },
    data(){
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            products:[]
        }
    }
}
</script>

<style scoped>
.main {
    height: 90vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.header {
    display: flex;
    justify-content: space-between;
}

</style>
