<template>
    <div class="main">
        <div class="container">
        <div class="header text-center p-2 text-white bg-primary mt-5">
            <h2>Order List</h2>
            <router-link class="nav-link" to="/add_order">➕</router-link>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>    
                    <th scope="col">Product name</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody v-for="order in orders" :key="order.id">
                <tr>
                    <td>{{ order.id }}</td>
                    <td>{{ products.find((e) => e.product_id === order.product_id)['product_name'] }}</td>
                    <td>{{ order.price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
export default {
    name: 'Order',
    created(){
        this.loadData();
    },
    methods: {
        loadData(){
            let url = this.url + '/api/orders';
            this.axios.get(url).then(res => {
                this.orders = res.data.data
                this.orders.map((i, index) => {
                    this.axios.get(`${this.url}/api/products/${i.product_id}`)
                    .then((res) => {
                        this.products.push({
                            product_id : res.data.data.id,
                            product_name: res.data.data.product_name
                        });
                    });
                });

                
            });
        }
    },
    mounted() {
            console.log('order list Component Mounted');
    },
    data(){
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            orders:[],
            products:[]
        }
    }
}
</script>


<style scoped>
.main {
    display: flex;
    justify-content: center;
    align-items: center;
}

.container{
    margin-top:5%;
}

.header {
    display: flex;
    justify-content: space-between;
}
</style>
