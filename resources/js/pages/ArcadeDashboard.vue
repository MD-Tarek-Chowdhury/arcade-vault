<script setup>
import { Link, router } from "@inertiajs/vue3"

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
                </li>
            </ul>

            <button @click="deleteGame(item.id)" style="color: red; margin-left: 20px">
                Delete
            </button>

        </article>
    </main>
</template>
