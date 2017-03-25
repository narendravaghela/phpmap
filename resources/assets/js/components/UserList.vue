<template>
    <div class="row">
        <div class="col-md-2 text-center" v-for="user in users">
            <img v-bind:src="user.avatar" v-bind:alt="user.username" class="img img-circle">
            <br><br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>@{{ user.username }}</h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                users: []
            }
        },

        mounted() {
            this.fetchUsers()
        },

        methods: {
            fetchUsers() {
                axios.get('/api_public/users_latest').then(response => {
                    this.users = response.data;
                });
            }
        }
    }
</script>
