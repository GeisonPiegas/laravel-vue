<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Painel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link">
                                <router-link to="/">Produtos</router-link>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <router-link to="/categories">Categorias</router-link>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <vue-snotify></vue-snotify>
            <router-view></router-view>
        </div>
    </div>
</div>
</template>

<script>
export default {

}
</script>
