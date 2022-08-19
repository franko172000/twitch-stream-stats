<template>
    <main class="flex-1 pb-8">
        <!-- Page header -->
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <h1 class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">Followed Streams in Top 1k Streams</h1>
            </div>
        </div>

        <div class="mt-8">
            <!-- Activity table (small breakpoint and up) -->
            <stream-list :streams="streamsArr"/>
        </div>
    </main>
</template>

<script setup>
import {onMounted, reactive, ref} from 'vue'
import StreamList from './StreamList.vue'
import moment from 'moment'
import {
    CashIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    OfficeBuildingIcon,
    SearchIcon,
} from '@heroicons/vue/solid'
import {followedStreams, streams} from "../services/requests";

const statusStyles = {
    success: 'bg-green-100 text-green-800',
    processing: 'bg-yellow-100 text-yellow-800',
    failed: 'bg-gray-100 text-gray-800',
}

const streamsArr = ref([]);
onMounted( async ()=>{
    const res = await followedStreams();
    streamsArr.value = res.data.data;
})
</script>
<script>
export default {
    name : 'FollowedStreams'
}
</script>
