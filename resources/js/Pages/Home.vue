<template>
    <Layout>
        <template #header>
            <h2 class="text-xl text-center font-bold text-app-green">SWStarter</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden flex justify-between p-4">
                    <div class="bg-white rounded drop-shadow-md w-2/5 p-6 text-gray-900 space-y-5 h-[230px]">
                        <div class="font-semibold text-app-gray-2">What are you searching for?</div>
                        <div>
                            <label class="text-sm font-bold">
                                <input class="mr-1" type="radio" value="people" v-model="selected" /> People
                            </label>
                            <label class="text-sm font-bold">
                                <input class="mr-1 ml-3" type="radio" value="films" v-model="selected" /> Movies
                            </label>
                        </div>
                        <div>
                            <input class="text-sm font-bold w-full rounded border border-app-border placeholder-bold shadow-inner focus:outline-none focus:border-app-gray-2 focus:ring-0 focus:ring-app-gray-2" v-model="query" type="text" :placeholder="placeholder">
                        </div>
                        <div>
                            <button class="uppercase w-full rounded-full py-2 text-white font-bold text-sm" :disabled="query === ''" @click="search" :class="query === '' ? 'bg-app-border' : 'bg-app-green'">
                                {{ isLoading ? 'Searching...' : 'Search' }}
                            </button>
                        </div>
                    </div>
                    <div class="bg-white rounded drop-shadow-md w-3/5 p-6 text-gray-900 ml-3 h-[582px]">
                        <h2 class="text-lg font-bold text-black">Results</h2>
                        <hr class="border-app-gainsboro border my-2.5">

                        <div v-if="results && results.length > 0">
                            <div class="font-bold text-base text-black" v-for="(result, index) in results" :key="index">
                                <div class="flex justify-between py-1.5">
                                    <div class="text-base">{{ result.title || result.name }}</div>
                                    <div>
                                        <Link class="uppercase rounded-full py-2 px-4 text-sm text-white font-bold bg-app-green" :href="route(selected === 'people' ? 'person' : 'film', { id: getIdFromUrl(result.url) })">See Details</Link>
                                    </div>
                                </div>
                                <hr class="border-app-gainsboro border my-2.5">
                            </div>
                        </div>
                        <div v-else class="flex items-center justify-center h-[470px] font-bold text-app-border text-center text-sm">
                            <div v-if="isLoading">
                                Searching...
                            </div>
                            <div v-else>
                                <p>There are zero matches.</p>
                                <p>Use the form to search for People or Movies.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import {computed, ref} from 'vue'
import { Link } from '@inertiajs/vue3'
import axios from 'axios'
import Layout from "@/Layouts/Layout.vue"

export default {
    components: {
        Link,
        Layout
    },
    setup() {
        const selected = ref('people')
        const query = ref('')
        const results = ref([])
        const isLoading = ref(false)

        const placeholders = {
            people: 'e.g. Chewbacca, Yoda, Boba Fett',
            films: 'e.g. Revenge of the Sith',
        }

        const placeholder = computed(() => placeholders[selected.value])

        function search() {
            results.value = []
            if (query.value !== '') {
                isLoading.value = true
                axios.get(`/search/${selected.value}`, { params: { query: query.value } })
                    .then(response => {
                        results.value = response.data.results
                        isLoading.value = false
                    })
            }
        }

        function getIdFromUrl(url) {
            const urlSegments = url.split('/')
            return urlSegments[urlSegments.length - 2]
        }

        return {
            selected,
            query,
            results,
            isLoading,
            search,
            getIdFromUrl,
            placeholder,
        }
    }
}
</script>

