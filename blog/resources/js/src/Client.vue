<template>
    <div class="con">
        <vue-header v-bind:active-class="$route.path === '/admin' ? 'isActive' : ''"/>
        <router-view />
        <vue-footer />
    </div>
</template>

<script>
import VueHeader from "./components/layout/Header";
import VueFooter from "./components/layout/Footer";
export default {
    name: 'VueClient',
    components: {
        VueFooter,
        VueHeader
    }
}
</script>

<style scoped>

</style>
