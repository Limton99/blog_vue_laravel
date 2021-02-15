<template>
<div class="sidebar">
    <div class="title">
        Admin Sidebar
    </div>
    <div class="menu-items">
        <router-link :to="{name: 'admin-dashboard'}" active-class="active" exact tag="button" class="side-btn">
            <dib class="link-container">
                Dashboard
            </dib>
        </router-link>
        <router-link :to="{name: 'admin-blogs'}" active-class="active" exact tag="button" class="side-btn">
            <dib class="link-container">
                Blogs
            </dib>
        </router-link>
        <router-link :to="{name: 'admin-categories'}" active-class="active" exact tag="button" class="side-btn">
            <dib class="link-container">
                Categories
            </dib>
        </router-link>
        <router-link :to="{name: 'admin-tags'}" active-class="active" exact tag="button" class="side-btn">
            <dib class="link-container">
                Tags
            </dib>
        </router-link>
        <router-link :to="{name: 'admin-users'}" active-class="active" exact tag="button" class="side-btn">
            <dib class="link-container">
                Users
            </dib>
        </router-link>
        <router-link :to="{name: 'admin-comments'}" active-class="active" exact tag="button" class="side-btn">
            <dib class="link-container">
                Comments
            </dib>
        </router-link>
    </div>
</div>
</template>

<script>
export default {
    name: "SideBar"
}
</script>

<style scoped>
.title {
    color: white;
    font-size: 24px;
    margin-top: 10px;
    text-align: center;
}
.menu-items {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
    margin-left: 6px;
}
.menu-items > * {
    margin-top: 60px;
}
.side-btn {
    border: none;
    padding: 16px 0px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    color: white;
    background-color: transparent;
}
.side-btn:focus {
    outline: none;
}
.side-btn.active {
    position: relative;
    background-color: white;
    color: teal;
    font-weight: 600;
    margin-left: 10px;
    border-radius: 30px 0 0 30px;
}
.side-btn.active::before {
    top: -30px;
}
.side-btn.active::after {
    bottom: -30px;
}
.side-btn.active::before, .side-btn.active::after {
    position: absolute;
    content: "";
    right: 0;
    height: 30px;
    width: 30px;
    background-color: white;
}
.side-btn.active .link-container::before {
    top: -60px;
}
.side-btn.active .link-container::after {
    bottom: -60px;
    z-index: 99;
}
.side-btn.active .link-container::before, .side-btn.active .link-container::after {
    position: absolute;
    content: "";
    right: 0px;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    background-color: #1a202c;
}
</style>
