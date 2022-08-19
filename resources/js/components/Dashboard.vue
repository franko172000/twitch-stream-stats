<template>
    <main class="flex-1 pb-8">
        <!-- Page header -->
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                    <div class="flex-1 min-w-0">
                        <!-- Profile -->
                        <div class="flex items-center">
                            <img class="hidden h-16 w-16 rounded-full sm:block" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80" alt="" />
                            <div>
                                <div class="flex items-center">
                                    <img class="h-16 w-16 rounded-full sm:hidden" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80" alt="" />
                                    <h1 class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">Hello, {{user.name}}</h1>
                                </div>
                                <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                    <dt class="sr-only">Account status</dt>
                                    <dd class="mt-3 flex items-center text-sm text-gray-500 font-medium sm:mr-6 sm:mt-0 capitalize">
                                        <CheckCircleIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" aria-hidden="true" />
                                        Verified account
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-lg leading-6 font-medium text-gray-900">Overview</h2>
                <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Card -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">

                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Total Streams
                                        </dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">
                                                {{totalStreams}}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <a href="card.href" class="font-medium text-cyan-700 hover:text-cyan-900"> View all </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">

                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Total Games
                                        </dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">
                                                {{totalGames}}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <a href="card.href" class="font-medium text-cyan-700 hover:text-cyan-900"> View all </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">

                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Median number of viewers
                                        </dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">
                                                {{medianStream}}
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <a href="card.href" class="font-medium text-cyan-700 hover:text-cyan-900"> View all </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 gap-4">
                <div class="w-full">
                    <h2 class="max-w-6xl mx-auto mt-8 text-lg leading-6 font-medium text-gray-900">Top Games by Viewers</h2>
                    <!-- Activity table (small breakpoint and up) -->
                    <div class="hidden sm:block">
                        <div class="w-full">
                            <div class="flex flex-col mt-2">
                                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900" scope="col">Game name</th>
                                            <th class="hidden px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900 md:block" scope="col">Viewers</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="game in games" :key="game.id" class="bg-white">
                                            <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <div class="flex">
                                                    <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                                        <CashIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                                                        <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                            {{ game.game_name }}
                                                        </p>
                                                    </a>
                                                </div>
                                            </td>

                                            <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                                          <span :class="[statusStyles['processing'], 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize']">
                                                            {{ game.viewers_count }}
                                                          </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- Pagination -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <h2 class="max-w-6xl mx-auto mt-8 text-lg leading-6 font-medium text-gray-900">Top Streams per Game</h2>

                    <!-- Activity table (small breakpoint and up) -->
                    <div class="hidden sm:block">
                        <div class="max-w-6xl">
                            <div class="flex flex-col mt-2">
                                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900" scope="col">Game name</th>
                                            <th class="hidden px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900 md:block" scope="col">Streams Count</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="game in streamGames" :key="game.game_count" class="bg-white">
                                            <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <div class="flex">
                                                    <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                                        <CashIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                                                        <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                            {{ game.game_name }}
                                                        </p>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                                          <span :class="[statusStyles['failed'], 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize']">
                                                            {{ game.game_count }}
                                                          </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- Pagination -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Top 100 Streams</h2>

            <!-- Activity table (small breakpoint and up) -->
            <stream-list :streams="streamsArr" />
        </div>
    </main>
</template>

<script setup>
import {computed, onMounted, reactive, ref} from 'vue'
import { useStore } from 'vuex'
import StreamList from './StreamList.vue'
import {
    CashIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    OfficeBuildingIcon,
    SearchIcon,
} from '@heroicons/vue/solid'
import {gameStreams, streams, topGames, streamsByTime, syncStreams, followedStreams} from "../services/requests";
const statusStyles = {
    success: 'bg-green-100 text-green-800',
    processing: 'bg-yellow-100 text-yellow-800',
    failed: 'bg-gray-100 text-gray-800',
}
const streamsArr = ref([]);
const games = ref([]);
const streamGames = ref([]);
const totalStreams = ref(0)
const totalGames = ref(0)
const medianStream = ref(0)
const store = useStore()
const user = computed(()=> store.getters["user/user"])
onMounted( ()=>{
    streams().then((res)=>{
        streamsArr.value = res.data.data;
        totalStreams.value = res.data.meta.total
        medianStream.value = res.data.median_views
    })
    topGames()
    .then((res)=>{
        games.value = res.data.data;
    })

    gameStreams()
    .then((res)=>{
        streamGames.value = res.data.data
        totalGames.value = res.data.meta.total
    })

    streamsByTime()
    .then(res => {
        console.log(res.data.data)
    })

    followedStreams().then(res=>{
        console.log(res.data.data)
    });

})
</script>
<script>
export default {
    name : 'Dashboard'
}
</script>
