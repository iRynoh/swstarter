<template>
    <Layout>
        <template #header>
            <h2 class="text-xl text-center font-bold text-app-green">SWStarter</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4">
                    <div class="bg-white rounded drop-shadow-md p-6 text-gray-900">
                        <h2 class="font-semibold text-app-gray-2 text-lg"> {{ person.name }}</h2>

                        <div class="flex justify-between mt-5">
                            <div class="w-1/2 pr-[100px] text-sm">
                                <h3 class="font-bold text-base">Details</h3>
                                <hr class="border-app-gainsboro border my-2.5">
                                <p>
                                    <span>Birth Year: </span><span>{{ person.birth_year}}</span>
                                </p>
                                <p>
                                    <span>Gender: </span><span>{{ person.gender}}</span>
                                </p>
                                <p>
                                    <span>Eye Color: </span><span>{{ person.eye_color}}</span>
                                </p>
                                <p>
                                    <span>Hair Color: </span><span>{{ person.hair_color}}</span>
                                </p>
                                <p>
                                    <span>Height: </span><span>{{ person.height}}</span>
                                </p>
                                <p>
                                    <span>Mass: </span><span>{{ person.mass}}</span>
                                </p>
                            </div>
                            <div class="w-1/2 pr-[100px]">
                                <h3 class="font-bold text-base">Movies</h3>
                                <hr class="border-app-gainsboro border my-2.5">

                                <div v-for="(film, index) in person.films" :key="index" class="inline">
                                    <Link class="text-app-blue hover:underline" :href="route('film', { id: film.id })">{{ film.name }}</Link>
                                    <span v-if="index < person.films.length - 1">, </span>
                                </div>

                            </div>
                        </div>

                        <div class="mt-20 mb-3">
                            <Link class="uppercase rounded-full py-2 px-4 text-sm text-white font-bold bg-app-green" :href="route('home')">Back to search</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import Layout from "@/Layouts/Layout.vue"
import film from "@/Pages/Film.vue";

export default {
    computed: {
        film() {
            return film
        }
    },
    components: {
        Layout,
        Link
    },
    props: {
        person: Object
    }
}
</script>

