<template>
<div class="con-admin">
    <div class="cont">
        <div class="logo">
            <h1>Logo</h1>
        </div>
        <hr />
        <div class="links">
            <div class="link">
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <router-link :to="{name: 'home'}">Blogs</router-link>
            </div>
            <div class="link">
                <i class="fa fa-tags" aria-hidden="true"></i>
                <router-link :to="{name: 'home'}">Categories</router-link>
            </div>
            <div class="link">
                <i class="fa fa-tags" aria-hidden="true"></i>
                <router-link :to="{name: 'home'}">Tags</router-link>
            </div>
            <div class="link">
                <i class="fa fa-user"></i>
                <router-link :to="{name: 'home'}">Users</router-link>
            </div>
            <div class="link">
                <i class="fa fa-comments" aria-hidden="true"></i>
                <router-link :to="{name: 'home'}">Comments</router-link>
            </div>
        </div>
        <hr />
    </div>
</div>
</template>

<script>
export default {
name: "AdminHeader"
}
</script>

<style scoped>
    .con-admin {
        background-color: #1a202c;
        height: 100%;
        max-width: 20%;
        color: white;
    }
    .cont {
        padding: 7%;
    }
    .link {
        display: flex;
        color: white;
    }

    .link i {
        margin: auto 5px auto 0;
    }
</style>
