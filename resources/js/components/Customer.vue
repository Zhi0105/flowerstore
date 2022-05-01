<template>
    <div class="main">
        <div class="container">
            <div class="header text-center p-2 text-white bg-primary mt-5">
                <h2>Add Customer</h2>
            </div>
            <form class="row g-3 mb-5" id="validateForm" @submit.prevent="submitCustomer" enctype="multipart/form-data" novalidate>
                <div class="alert alert-danger mt-5" v-if="errors.length">
                    <ul class="error_list mb-0">
                        <li v-for="(error, index) in errors" :key="index">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <label for="inputFirstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="inputFirstname" v-model="form.first_name">
                    
                </div>
                <div class="col-md-6">
                    <label for="inputLastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="inputLastname" v-model="form.last_name">
                </div>
                <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" v-model="form.email_address">
                </div>
                <div class="col-12">
                    <label for="inputMobile" class="form-label">Mobile No.</label>
                    <input type="number" class="form-control" id="inputMobile" v-model="form.mobile_number">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" v-model="form.address">
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
    name: 'Customer',
    data(){
        return{
            url: document.head.querySelector('meta[name="url"]').content,
            customer:{},
            form: {
                first_name: '',
                last_name: '',
                email_address: '',
                mobile_number: '',
                address: '',
                status: ''
            },
            errors:[],            
        }
    },
    methods:{
        submitCustomer(){
            let url =  this.url + '/api/customers';
            this.errors = [];
                axios.post(url, this.form)
                    .then((res) => {
                        console.log(res);
                        alert(res.data.data.message);
                        this.$router.push('Order');
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
