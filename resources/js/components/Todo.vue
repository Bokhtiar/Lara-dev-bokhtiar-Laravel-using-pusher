<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>index</th>
            <th>title</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(t, key) in getTodo">
            <td>{{ ++key }}</td>
            <td>{{ t.title }}</td>
        </tr>
        </tbody>
    </table>
</template>



<script>
    export default {

        data() {
            return {
                todos: []
            }
        },
        created() {
            this.fetchTodo();
            this.listenForChanges();
        },
        methods: {
            fetchTodo() {
                axios.get('/todo').then((response) => {
                    this.todos = response.data.data;
                    console.log("todo list",this.todos)
                })
            },

            listenForChanges() {
                Echo.channel('todoChannel')
                .listen('TodoUpdate', (e) => {
                    console.log('eee',e.title)
                     this.todos.push(e)
                        
                    })
            }
        },

        computed: {
            getTodo() {
                return this.todos
            }
        }
    }
</script>