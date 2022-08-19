<template>
    <div class="hidden sm:block">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col mt-2">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900" scope="col">Stream Title</th>
                            <th class="px-6 py-3 bg-gray-50 text-right text-sm font-semibold text-gray-900" scope="col">Game name</th>
                            <th class="hidden px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900 md:block" scope="col">Viewers</th>
                            <th class="px-6 py-3 bg-gray-50 text-right text-sm font-semibold text-gray-900" scope="col">Started At</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="stream in streams" :key="stream.id" class="bg-white">
                            <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="flex">
                                    <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                        <CashIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                                        <p class="text-gray-500 truncate group-hover:text-gray-900">
                                            {{ stream.stream_title }}
                                        </p>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                <span class="text-gray-900 font-medium">{{ stream.game_name }} </span>
                            </td>
                            <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                          <span :class="[statusStyles['success'], 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize']">
                            {{ stream.viewers_count }}
                          </span>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                <time :datetime="stream.date_started">{{ moment(stream.date_started).format('lll') }}</time>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <nav v-if="paginationMeta" class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
                        <div class="hidden sm:flex sm:block">
                            <p class="text-sm text-gray-700 mr-10">
                                Showing
                                {{ ' ' }}
                                <span class="font-medium">{{paginationMeta.current_page}}</span>
                                {{ ' ' }}
                                to
                                {{ ' ' }}
                                <span class="font-medium">{{paginationMeta.last_page}}</span>
                                {{ ' ' }}
                                of
                                {{ ' ' }}
                                <span class="font-medium">{{paginationMeta.total}}</span>
                                {{ ' ' }}
                                results
                            </p>
                            <p class="text-sm text-gray-700">Per page <span class="font-medium">{{paginationMeta.per_page}}</span></p>
                        </div>
                        <div class="flex-1 flex justify-between sm:justify-end">

                            <a v-if="paginate > 1" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50" @click="paginate--"> Previous </a>
                            <a v-if="paginate < paginationMeta.last_page" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50" @click="paginate++"> Next </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import moment from 'moment'
import {ref, watch, watchEffect} from 'vue'
import {
    CashIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    OfficeBuildingIcon,
    SearchIcon,
} from '@heroicons/vue/solid'
import {computed} from "vue";
defineProps({
    streams: {
        type: Array,
        required: true
    },
    paginationMeta:{
        type: Object,
    },
})
const emit = defineEmits(['onPaginate'])
const paginate = ref(1)
watch(paginate, ()=>emit('onPaginate', paginate.value))

const statusStyles = {
    success: 'bg-green-100 text-green-800',
    processing: 'bg-yellow-100 text-yellow-800',
    failed: 'bg-gray-100 text-gray-800',
}
</script>
<script>
export default {
    name : 'StreamList'
}
</script>

<style scoped>

</style>
