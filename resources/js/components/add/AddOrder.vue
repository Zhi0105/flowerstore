<template>
    <div class="main">
        <div class="container">
            <div class="header text-center p-2 text-white bg-primary mt-5">
                <h2>Add Order</h2>
            </div>
            <form class="row g-3 mb-5" id="validateForm" @submit.prevent="submitOrder" enctype="multipart/form-data" novalidate>
                <div class="alert alert-danger mt-5" v-if="errors.length">
                    <ul class="error_list mb-0">
                        <li v-for="(error, index) in errors" :key="index">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <label for="inputProduct" class="form-label">Product</label>
                    <select class="form-select" id="inputProduct" aria-label="Default select example" @change="handlePrice($event)" v-model="form.product_id">
                        <option selected value=''>...</option>
                        <option v-for="product in products" :key="product.id" :value="product.id">
                            {{ product.product_name }}
                        </option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="inputCustomer" class="form-label">Customer</label>
                    <select class="form-select" id="inputCustomer" aria-label="Default select example" 
                    v-model="form.customer_id"
                    >
                        <option selected value=''>...</option>
                        <option v-for="customer in customers" :key="customer.id" :value="customer.id">{{ `${customer.first_name} ${customer.last_name}` }}</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" min="0" step="any" id="inputPrice" disabled>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {

    name: 'Order',
    created(){
        this.loadProduct();
        this.loadCustomer();
        
    },
    methods: {
        loadProduct(){
            let url = this.url + '/api/products';
            this.axios.get(url).then(res => {
                this.products = res.data.data
            });
        },
        loadCustomer(){
            let url = this.url + '/api/customers';
            this.axios.get(url).then(res => {
                this.customers = res.data.data
            });
        },
        handlePrice(event){
            let url = this.url + `/api/products/${event.target.value}`;
            this.axios.get(url).then(res => {
                this.price = res.data.data.price
                document.querySelector(`#inputPrice`).value = this.price
                this.form.price = this.price
            });
        },
        submitOrder(){
            let url =  this.url + '/api/orders';
            this.errors = [];
                axios.post(url, this.form)
                    .then((res) => {
                        console.log(res.data.data.message);
                        this.$router.push('Order');
                    })
                    .catch((error) => {
                        let data = error.response.data.data.error;
                        for(const i in data){
                            this.errors.push(data[i][0]);
                        }
                    })
        }
        
    },
    data(){
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            products:[],
            customers:[],
            price:[],
            form: {
                product_id: '',
                customer_id: '',
                price: ''
            },
            errors:[]
            
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
}

.error_list li{
    list-style-type: none;
}

</style>
