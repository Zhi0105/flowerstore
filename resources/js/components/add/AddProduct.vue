<template>
    <div class="main">
        <div class="container">
            <div class="header text-center p-2 text-white bg-primary mt-5">
                <h2>Add product</h2>
            </div>
            <form class="row g-3 mb-5" id="validateForm" @submit.prevent="submitProduct" enctype="multipart/form-data" novalidate>
                <div class="alert alert-danger mt-5" v-if="errors.length">
                    <ul class="error_list mb-0">
                        <li v-for="(error, index) in errors" :key="index">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Product name</label>
                    <input type="text" class="form-control" id="inputName" v-model="form.product_name">
                </div>
                <div class="col-md-6">
                    <label for="inputDescription" class="form-label">Product description</label>
                    <input type="text" class="form-control" id="inputDescription" v-model="form.product_description">
                </div>
                <div class="col-12">
                    <label for="inputQuantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="inputQuantity" v-model="form.quantity">
                </div>
                <div class="col-12">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" min="0" value="0" step="any" id="inputPrice" v-model="form.price">
                </div>
                <div class="col-12">
                    <label for="inputStatus" class="form-label">Status</label>
                    <input type="text" class="form-control" id="inputStatus" v-model="form.status">
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
    data(){
        return{
            url: document.head.querySelector('meta[name="url"]').content,
            product:{},
            form: {
                product_name: '',
                product_description: '',
                quantity: '',
                price: '',
                status: ''
            },
            errors:[],
            // success:[]             
        }
    },
    methods:{
        submitProduct(){
            let url =  this.url + '/api/products';
            this.errors = [];
                axios.post(url, this.form)
                    .then((res) => {
                        console.log(res.data.data.message);
                        this.$router.push('Product');
                    // this.success.push(res.data.data.message);

                    })
                    .catch((error) => {
                        let data = error.response.data.data.error;
                        for(const i in data){
                            this.errors.push(data[i][0]);
                        }
                    })
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
