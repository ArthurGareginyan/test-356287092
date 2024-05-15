<template>
    <div>
        <h2>User List</h2>
        <ul>
            <li v-for="user in users" :key="user.id">
                {{ user.name }} ({{ user.email }}) - Skills: {{ user.skills.join(', ') }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: []
        };
    },
    mounted() {
        this.fetchUsers();
    },
    methods: {
        fetchUsers() {
            axios.get('/api/users')
                .then(response => {
                    this.users = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>
