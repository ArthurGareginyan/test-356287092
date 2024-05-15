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
        async fetchUsers() {
            try {
                const response = await fetch('/users');
                if (!response.ok) {
                    throw new Error('Failed to fetch users');
                }
                const data = await response.json();
                this.users = data;
            } catch (error) {
                console.error('Error fetching users:', error.message);
            }
        }
    }
};
</script>
