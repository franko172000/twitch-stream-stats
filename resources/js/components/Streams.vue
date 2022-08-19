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
            <stream-list :streams="streamsArr" :pagination-meta="paginationMeta" @onPaginate="trackPagination" />
        </div>
    </main>
</template>

<script setup>
import {onMounted, ref} from 'vue'
import StreamList from './StreamList.vue'

import {streams} from "../services/requests";


const streamsArr = ref([]);
const paginationMeta = ref({})
async function getStreams(page){
    const res = await streams(page);
    streamsArr.value = res.data.data;
    paginationMeta.value = res.data.meta;
}
async function trackPagination(val){
    await getStreams(val)
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
