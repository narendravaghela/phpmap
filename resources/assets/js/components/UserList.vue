<template>
    <div class="row">
        <div class="col-md-3" v-for="user in users">
            <div class="thumbnail">
                <img v-bind:src="user.avatar" v-bind:alt="user.username" class="img img-circle img-responsive" style="max-height: 150px;">
                <div class="caption">
                    <h4 class="text-center">@{{ user.username }}</h4>

                    <p v-if="user.company" class="text-center">{{ user.job_title }}</p>
                    <p v-if="user.job_title" class="text-center">{{ user.company }}</p>

                    <a  v-bind:href="'@' + user.username" class="btn btn-default btn-xs btn-block" role="button">View Profile</a>

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
