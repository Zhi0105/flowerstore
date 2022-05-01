<template>
    <div class="main">
        <div class="container">
            <div class="header text-center p-2 text-white bg-primary mt-5">
                <h2>Add product</h2>
            </div>
            <form class="row g-3" id="validateForm" @submit.prevent="saveProduct" enctype="multipart/form-data" novalidate>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Product name</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputDescription" class="form-label">Product description</label>
                    <input type="text" class="form-control" id="inputDescription">
                </div>
                <div class="col-12">
                    <label for="inputQuantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="inputQuantity">
                </div>
                <div class="col-12">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" min="0" value="0" step="any" id="inputPrice">
                </div>
                <div class="col-12">
                    <label for="inputStatus" class="form-label">Status</label>
                    <input type="text" class="form-control" id="inputStatus">
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
    
}
</script>

<style scoped>
.main {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.header {
    display: flex;
}


</style>
