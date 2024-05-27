<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineOptions({
    layout: MyLayout
});

const users = ref(props.users);

const deleteUser = async (userId) => {
    // Assuming you have a delete method in your backend
    const response = await fetch(`/users/${userId}`, {
        method: 'DELETE',
    });

    if (response.ok) {
        // Remove the deleted user from the list
        users.value = users.value.filter(user => user.id !== userId);
    } else {
        // Handle error
        console.error('Failed to delete user');
    }
}
</script>

<template>
    <main id="page-trans">
        <div class="container">
            <header class="text-4xl font-bold mb-4 py-2 px-4">Users</header>
            <p class="text-xl text-gray-600 font-bold py-2 px-4">List of active users:</p>
            <div class="card-container p-4">
                <Link v-for="(user, index) in users" :key="index" :href="'/users/' + user.id" class="btn card-link">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-xl font-semibold">User ID: {{ user.id }}</h2>
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ user.name }}</p>
                            <p><strong>Email:</strong> {{ user.email }}</p>
                        </div>
                        <div class="card-footer">
                            <button @click="deleteUser(user.id)" class="delete-btn">Delete</button>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </main>
</template>

<style scoped>

.card-container {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 10px;
    height: 500px;
    overflow-y: auto;
}

header {
    font-weight: bold;
}

.card {
    background-color: #2a2b2c;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 15px;
    transition: transform 0.2s;
    width: 200px;
    height: 160px; 
    display: flex;
    flex-direction: column;
}

.card h2 {
    background: linear-gradient(45deg, #ff6b6b, #f8e8a2, #6bff95);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.card:hover {
    transform: translateY(-5px);
}

.card-header {
    border-bottom: 1px solid #c2c2c2;
    padding-bottom: 8px;
    margin-bottom: 8px;
}

.card-body p {
    background: linear-gradient(45deg, #ff6b6b, #f8e8a2, #6bff95);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin: 5px 0;
    word-wrap: break-word;
}

.card-link {
    text-decoration: none;
    color: inherit; 
}

.delete-btn {
    background-color: #ff0000;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.delete-btn:hover {
    background-color: #cc0000;
}
</style>
