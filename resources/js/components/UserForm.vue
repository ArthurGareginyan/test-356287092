<template>
<div>
    <h2>Create User</h2>
    <form @submit.prevent="submitForm">
        <div>
            <label for="name">Name:</label>
            <input type="text" v-model="name" id="name">
        </div>
        <div>
            <button type="submit">Create</button>
        </div>
        <div v-if="error" style="color: red;">
            {{ error }}
        </div>
    </form>
</div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            error: ''
        };
    },
    methods: {
        submitForm() {
            axios.post('/api/users', {
                    name: this.name
                })
                .then(response => {
                    this.$emit('user-created');
                    this.name = '';
                    this.error = '';
                })
                .catch(error => {
                    this.error = error.response.data.message || 'An error occurred';
                });
        }
    }
};
</script>
