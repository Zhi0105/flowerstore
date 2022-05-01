<template>
    <div class="main">
        <div class="container mb-5">
            <h1 class="text-center">Full Stack Developer Exam</h1>
            <p class="lead mb-2">Simple crud application made from Vue js as front end and Laravel API as a Back end consist of 3 entities (Customer, Product, Order).kindly cLick the button to get started.</p>
            <center>
                <div class="col-sm-3">
                    <router-link  class="start btn btn-lg blue w-100 mt-5" to="/customer">Get Started</router-link>
                </div>
            </center>
        </div>
        <div class="Developer fs-4">
            <p>By: Argie Barcena</p>
        </div>
    </div>
    
</template>

<script>
export default {
    name: 'Home'
}
</script>

<style scoped>
    .main{
        min-height: 100vh;
        background:#334155; 
        display:flex;
        flex-direction:column;
        justify-content: center;
        align-items:center;
    }
    .main .container {
        padding-top: 5%;
        color:white;
        
    }
    
    .main .Developer {
        color:white;
    }

    .start{
    border: none;
    border-radius: 5px;
    color: #fff;
    text-transform: capitalize;
    padding-bottom: 15px;
    position: relative;
    background-image: linear-gradient(to top, #262626 0px, #404040 10px, #262626 10px, #333 100%);
}
    .start:hover{
        color: #fff;
    }
    .start:after{
        content: "";
        width: 0;
        height: 10px;
        position: absolute;
        bottom: 0;
        left: 0;
        border-radius: 0 0 5px 5px;
        transition: all 0.35s ease 0s;
    }
    .start:hover:after{
        width: 100%;
    }

    .start.blue:after{
        background: #5cbcf6;
    }
    
</style>
