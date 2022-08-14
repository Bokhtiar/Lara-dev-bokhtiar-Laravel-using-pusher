<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>index</th>
            <th>title</th>
            <th>Body</th>
            <th>Comment</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(blog, key) in getblog">
            <td>{{ ++key }}</td>
            <td>{{ blog.title }}</td>
            <td>{{ blog.body }}</td>
            <td>
                <form  @submit.prevent = "addComment(blog.id)">
                    {{ comment }}
                    <input type="text" v-model="comment" name="comment" placeholder="comment" class="form-control" id="">
                    <input type="submit" name="" value="submit" class="btn btn-sm btn-success" id="">
                </form>
            </td>
            
        </tr>
        </tbody>
    </table>
</template>



<script>
    export default {

        data() {
            return {
                blogs: [],
                comment: ''
            }
        },
        created() {
            this.fetchBlog();
            this.listenForChanges();
            this.fetchComment();
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
            },

            fetchBlog() {
                axios.get('/blog/commnet/list').then((response) => {
                    this.blogs = response.data;
                    console.log("test",response.data)
                })
            },
            /**add comment */
            addComment(id){
                let formData = new FormData()
                formData.append("comment", this.comment)
                axios.post(`/blog/comment/${id}`, formData)
                    .then((response)=> {
                        console.log(response)
                    }).catch((error)=> {
                        console.log(error)
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