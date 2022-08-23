<template>
    <main class="flex-1 pb-8">
        <!-- Page header -->
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <h1 class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">Streams</h1>
            </div>
        </div>

        <div class="mt-8">
            <!-- Activity table (small breakpoint and up) -->
            <stream-list
                :streams="streamsArr"
                :loader="streamLoader"
                :pagination-meta="paginationMeta"
                @onOrderBy="handleSorting"
                @onPaginate="trackPagination" />
        </div>
    </main>
</template>

<script setup>
import {onMounted, ref} from 'vue'
import StreamList from './StreamList.vue'

import {streams} from "../services/requests";


const streamsArr = ref([]);
const streamLoader = ref(true)
const paginationMeta = ref({})
const currentPage = ref(1);
async function getStreams(page, sort_order, sort_by){
    const res = await streams({page, sort_order, sort_by});
    streamsArr.value = res.data.data;
    paginationMeta.value = res.data.meta;
    streamLoader.value = false;
}
async function trackPagination(val){
    currentPage.value = val
    await getStreams(val)
}

async function handleSorting(data){
    await getStreams(currentPage, data.order, data.sortBy )
}

onMounted( async ()=>{
    await getStreams()
})
</script>
<script>
export default {
    name : 'Streams'
}
</script>
