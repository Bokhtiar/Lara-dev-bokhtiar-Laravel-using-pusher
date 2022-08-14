<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>index</th>
            <th>title</th>
            <th>Body</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(blog, key) in getblog">
            <td>{{ ++key }}</td>
            <td>{{ blog.title }}</td>
            <td>{{ blog.body }}</td>
        </tr>
        </tbody>
    </table>
</template>



<script>
    export default {

        data() {
            return {
                blogs: []
            }
        },
        created() {
            this.fetchBlog();
            this.listenForChanges();
        },
        methods: {
            fetchBlog() {
                axios.get('/blog').then((response) => {
                    this.blogs = response.data;
                    console.log("test",response.data)
                })
            },
            listenForChanges() {
                Echo.channel('blogChannel')
                .listen('BlogUpdate', (e) => {
                    console.log("test blog eee", e)
                        this.blogs.push(e)
                    })
            }
        },
        computed: {
            getblog() {
                return this.blogs
            }
        }
    }
</script>