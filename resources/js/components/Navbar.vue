<template>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <router-link class="nav-link" to="/">Home</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/customer">Customer</router-link>
            </li>
        </ul>
        </div>
    </div>
</nav>

</template>

<script>
export default {
    name: 'Navbar'
}
</script>
