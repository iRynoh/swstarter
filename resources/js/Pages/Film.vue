<template>
    <Layout>
        <template #header>
            <h2 class="text-xl text-center font-bold text-app-green">SWStarter</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4">
                    <div class="bg-white rounded drop-shadow-md p-6 text-gray-900">
                        <h2 class="font-semibold text-app-gray-2 text-lg"> {{ film.title }}</h2>

                        <div class="flex justify-between mt-5">
                            <div class="w-1/2 pr-[100px] text-sm">
                                <h3 class="font-bold text-base">Opening Crawl</h3>
                                <hr class="border-app-gainsboro border my-2.5">
                                <div class="text-black text-sm" v-html="processedOpeningCrawl"></div>
                            </div>
                            <div class="w-1/2 pr-[100px]">
                                <h3 class="font-bold text-base">Characters</h3>
                                <hr class="border-app-gainsboro border my-2.5">

                                <div v-for="(character, index) in film.characters" :key="index" class="inline">
                                    <Link class="text-app-blue hover:underline" :href="route('person', { id: character.id })">{{ character.name }}</Link>
                                    <span v-if="index < film.characters.length - 1">, </span>
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
import {computed} from "vue";

export default {
    components: {
        Layout,
        Link
    },
    props: {
        film: Object
    },
    setup(props) {
        const processedOpeningCrawl = computed(() => {
            return props.film.opening_crawl.replace(/(\r\n|\n|\r)/gm, "<br/>");
        });

        return {
            processedOpeningCrawl,
        }
    }
}
</script>

