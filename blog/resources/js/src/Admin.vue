<template>
<div class="admin">
    <side-bar />
    <div class="content">
        <router-view></router-view>
    </div>
</div>
</template>

<script>
import SideBar from "./components/admin/SideBar";
export default {
    name: "VueAdmin",
    components: {SideBar}
}
</script>

<style scoped>
    vue-header {
        display: none;
    }

    .admin {
        height: 100%;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 5fr;
        background-color: #1a202c;
        color: white;
    }

    .content {
        background-color: white;
        border-radius: 20px;
        margin: 6px 6px 6px 0px;
        color: black;
        text-align: center;
    }
</style>
