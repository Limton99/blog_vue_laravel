<template>
<div>
        <div class="tab">

                <md-table md-card>
                    <md-table-toolbar>
                        <h1 class="md-title">Blogs</h1>
                        <button v-on:click="reloadBlogs">reload</button>
                    </md-table-toolbar>
                    <template v-if="!isLoading">
                    <md-table-row>
                        <md-table-head md-numeric>ID</md-table-head>
                        <md-table-head>Title</md-table-head>
                        <md-table-head>User</md-table-head>
                        <md-table-head>Views</md-table-head>
                        <md-table-head>Actions</md-table-head>
                    </md-table-row>

                    <md-table-row v-for="(blog, index) in blogs" :key="index">
                        <md-table-cell md-numeric>{{index + 1}}</md-table-cell>
                        <md-table-cell>{{blog.title}}</md-table-cell>
                        <md-table-cell>{{blog.user.email}}</md-table-cell>
                        <md-table-cell>{{blog.views}}</md-table-cell>
                        <md-table-cell>
                            <button class="btn btn-outline-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            <button class="btn btn-danger" v-on:click="deleteBlog(blog.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </md-table-cell>
                    </md-table-row>
                    </template>
                    <template v-else>
                        <div class="d-flex justify-content-center spinner">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </template>
                </md-table>
        </div>

</div>
</template>

<script>
import {mapState} from "vuex";
import {actionTypes} from "../../store/modules/blogs";

export default {
    name: "AdminBlogs",
    computed: {
        ...mapState({
            blogs: state => state.blogs.blogs,
            isLoading: state => state.blogs.isLoading
        })
    },
    mounted () {
        this.$store.dispatch(actionTypes.getBlogs)
    },
    methods: {
        reloadBlogs () {
            this.$store.dispatch(actionTypes.getBlogs)
        },

        deleteBlog (id) {
            this.$store.dispatch(actionTypes.destroyBlog, id)
            this.$store.dispatch(actionTypes.getBlogs)
        }
    }
}
</script>

<style scoped>
.md-title {
    left: 0;
}
.tab {
    margin: 3%;
}
.spinner {
    margin: 20px;
}
</style>
