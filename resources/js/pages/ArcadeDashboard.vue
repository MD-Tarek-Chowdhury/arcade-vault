<script setup>
import { Link, router, useForm } from '@inertiajs/vue3';

const props = defineProps(['game']);
console.log(props.game);

const deleteGame = (id) => {
    if (confirm('Are you sure you want to delete this game?')) {
        router.delete(`/game/${id}`, {
            onFinish: () => {
                /* optional cleanup */
            },
            preserveScroll: true, // Keeps the user's scroll position
        });
    }
};

const editGame = (item) => {
    form.id = item.id;
    form.title = item.title;
    form.emulator = item.emulator;
};

// Initialize the form with default values
const form = useForm({
    id: null,
    title: '',
    emulator: '',
});

// Define the submit handler
const submit = () => {
    if (form.id) {
        // If an ID exists, we are UPDATING an existing record
        form.put(`/game/${form.id}`, {
            onSuccess: () => {
                form.reset(); // Clear the form fields
                form.id = null; // Reset the ID so the form goes back to "Create" mode
            },
            preserveScroll: true, // Keep the user at the same spot on the page
        });
    } else {
        // If no ID exists, we are CREATING a new record
        form.post('/game', {
            onSuccess: () => form.reset(),
            preserveScroll: true,
        });
    }
};
</script>

<template>
    <main>
        <header>
            <Link href="/dashboard">Arcade Dashboard</Link>
        </header>
        <article>
            <ul>
                <li v-for="item in game" :key="item.id">
                    <strong> {{ item.title }} </strong> - {{ item.emulator }}

                    <button
                        @click="deleteGame(item.id)"
                        style="color: red; margin-left: 20px"
                    >
                        Delete
                    </button>

                    <button
                        @click="editGame(item)"
                        style="color: blue; margin-left: 20px"
                    >
                        Edit
                    </button>
                </li>
            </ul>

            <hr />

            <h3>
                {{ form.id ? 'Edit Game' : 'Add New Game' }}
            </h3>

            <form @submit.prevent="submit">
                <!-- Bind inputs using v-model -->
                <input
                    v-model="form.title"
                    type="text"
                    placeholder="Game Name"
                />
                <div v-if="form.errors.title">{{ form.errors.title }}</div>

                <input
                    v-model="form.emulator"
                    type="text"
                    placeholder="Emulator Name"
                />
                <div v-if="form.errors.emulator">
                    {{ form.errors.emulator }}
                </div>

                <!-- Use helper properties like 'processing' to disable button -->
                <button type="submit" :disabled="form.processing">
                    {{ form.id ? 'Update Game' : 'Create Arcade Game' }}
                </button>

                <button
                    v-if="form.id"
                    type="button"
                    @click="
                        form.reset();
                        form.id = null;
                    "
                >
                    Cancel
                </button>
            </form>
        </article>
    </main>
</template>
