<template>
<div class="con">
      <router-view />
</div>
</template>

<script>
import VueClient from "./Client";
import {actionTypes} from "./store/modules/auth";
import VueAdmin from "./Admin";
export default {
    components: {
        VueAdmin,
        VueClient,

    },
    mounted () {
        this.$store.dispatch(actionTypes.userCheck)
    }
}
</script>

<style>
.isActive {
    display: none;
}

.con {
    height: 100%;
}
</style>
