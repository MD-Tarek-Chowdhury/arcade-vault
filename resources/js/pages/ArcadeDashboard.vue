<script setup>
import { Link, router, useForm } from "@inertiajs/vue3"

const props = defineProps(['game'])
console.log(props.game)

const deleteGame = (id) => {
  if (confirm('Are you sure you want to delete this game?')) {
    router.delete(`/game/${id}`, {
      onFinish: () => { /* optional cleanup */ },
      preserveScroll: true // Keeps the user's scroll position
    })
  }
}

// Initialize the form with default values
const form = useForm({
  title: '',
  emulator: '',
})

// Define the submit handler
const submit = () => {
  form.post('/game', {
    onSuccess: () => form.reset(), // Reset form on successful creation
    preserveScroll: true,          // Maintain scroll position after submission
  })
}

</script>

<template>
    <main>
        <header>
            <Link href="/dashboard">Arcade Dashboard</Link>
        </header>
        <article>
            <ul>
                <li v-for="item in game" :key="item.id"">
                    <strong> {{ item.title }} </strong> - {{ item.emulator }}

                    <button @click="deleteGame(item.id)" style="color: red; margin-left: 20px">
                        Delete
                    </button>
                </li>
            </ul>

            <form @submit.prevent="submit">
                <!-- Bind inputs using v-model -->
                <input v-model="form.title" type="text" placeholder="Game Name" />
                <div v-if="form.errors.title">{{ form.errors.title }}</div>

                <input v-model="form.emulator" type="text" placeholder="Emulator Name" />
                <div v-if="form.errors.emulator">{{ form.errors.emulator }}</div>

                <!-- Use helper properties like 'processing' to disable button -->
                <button type="submit" :disabled="form.processing">
                    Create Arcade Game
                </button>
            </form>

        </article>
    </main>
</template>
