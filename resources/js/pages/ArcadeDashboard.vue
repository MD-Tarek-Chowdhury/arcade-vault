<script setup>
import { Link } from "@inertiajs/vue3"

const props = defineProps(['game'])
console.log(props.game)

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
        </article>
    </main>
</template>
