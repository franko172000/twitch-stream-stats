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
                    <stat-card :stat="totalStreams" :loading="streamLoader" title="Total Streams" />
                    <stat-card :stat="totalGames" :loading="gamesLoader" title="Total Games" />
                    <stat-card :stat="medianStream" :loading="streamLoader" title="Median number of viewers" />
                    <stat-card :stat="streamsNeededCount" :loading="streamsNeededCountLoader" title="Streams need to Make top 1k" />
                </div>
            </div>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 gap-4">
                <list-box>
                    <template v-slot:title>
                        Top Games by Viewers
                    </template>
                    <template v-slot:content>
                        <loader v-if="gamesLoader" class-name="w-8 h-8" />
                        <table v-if="!gamesLoader"  class="min-w-full divide-y divide-gray-200">
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
                    </template>
                </list-box>

                <list-box>
                    <template v-slot:title>
                        Top Streams per Game
                    </template>
                    <template v-slot:content>
                        <loader v-if="streamGamesLoader" class-name="w-8 h-8" />
                        <table v-if="!streamGamesLoader" class="min-w-full divide-y divide-gray-200">
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
                    </template>
                </list-box>
            </div>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 gap-4">
                <list-box>
                    <template v-slot:title>
                        Followed Streams Tags in Top 1k Streams
                    </template>
                    <template v-slot:content>
                        <loader v-if="gamesLoader" class-name="w-8 h-8" />
                        <table v-if="!gamesLoader"  class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900" scope="col">Tag name</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="tag in userTags" :key="tag.id" class="bg-white">
                                <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex">
                                        <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                            <CashIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                                            <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                {{ tag.tag }}
                                            </p>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </template>
                </list-box>
                <list-box>
                    <template v-slot:title>
                        Followed Streams in Top 1k Streams
                    </template>
                    <template v-slot:content>
                        <loader v-if="streamGamesLoader" class-name="w-8 h-8" />
                        <table v-if="!streamGamesLoader" class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900" scope="col">Stream name</th>
                                <th class="hidden px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900 md:block" scope="col">Viewers Count</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="stream in userStreams" :key="stream.id" class="bg-white">
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
                                <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                                          <span :class="[statusStyles['failed'], 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize']">
                                                            {{ stream.viewers_count }}
                                                          </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </template>
                </list-box>
                <list-box>
                    <template v-slot:title>
                        Streams Count By Start Date
                    </template>
                    <template v-slot:content>
                        <loader v-if="gamesLoader" class-name="w-8 h-8" />
                        <table v-if="!gamesLoader"  class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900" scope="col">Start Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900" scope="col">Streams Count</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="(stream,index) in streamsDates" :key="index" class="bg-white">
                                <td class="max-w-0 w-1/2 px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex">
                                        <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                            <CashIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                                            <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                {{ moment(stream.start_date).format('lll') }}
                                            </p>
                                        </a>
                                    </div>
                                </td>
                                <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex">
                                        <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                            <CashIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                                            <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                {{ stream.date_count }}
                                            </p>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </template>
                </list-box>
            </div>
            <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Top 100 Streams</h2>
            <!-- Activity table (small breakpoint and up) -->
            <stream-list
                :streams="streamsArr"
                :loader="streamLoader"
                @onOrderBy="handleSorting"
            />
        </div>
    </main>
</template>

<script setup>
import {computed, onMounted, reactive, ref} from 'vue'
import { useStore } from 'vuex'
import StreamList from './StreamList.vue'
import ListBox from '../components/utils/ListBox.vue'
import StatCard from '../components/utils/StatCard.vue'
import moment from 'moment'
import {
    CashIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    OfficeBuildingIcon,
    SearchIcon,
} from '@heroicons/vue/solid'
import {
    gameStreams,
    streams,
    topGames,
    streamsByTime,
    syncStreams,
    followedStreams,
    filteredFollowedStreams
} from "../services/requests";
import Loader from "./utils/Loader.vue";
const statusStyles = {
    success: 'bg-green-100 text-green-800',
    processing: 'bg-yellow-100 text-yellow-800',
    failed: 'bg-gray-100 text-gray-800',
}
const streamsArr = ref([]);
const streamsDates = ref([]);
const streamLoader = ref(true)
const games = ref([]);
const gamesLoader = ref(true);
const streamGames = ref([]);
const userStreams = ref([]);
const userTags = ref([]);
const streamGamesLoader = ref(true);
const totalStreams = ref(0)
const totalGames = ref(0)
const medianStream = ref(0)
const streamsNeededCount = ref(0)
const streamsNeededCountLoader = ref(true)
const store = useStore()
const user = computed(()=> store.getters["user/user"])
const ascSort = (a,b) => a.viewers_count - b.viewers_count;
const descSort = (a,b) => b.viewers_count - a.viewers_count;
async function handleSorting(data){
    const sort = data.order === 'asc' ? ascSort : descSort;
    streamsArr.value = streamsArr.value.sort(sort);
}
onMounted( ()=>{
    streams({}).then((res)=>{
        streamsArr.value = res.data.data;
        totalStreams.value = res.data.meta.total
        medianStream.value = res.data.median_views
        streamLoader.value = false;
    })
    topGames()
    .then((res)=>{
        games.value = res.data.data;
        gamesLoader.value = false
    })

    gameStreams()
    .then((res)=>{
        streamGames.value = res.data.data
        totalGames.value = res.data.meta.total
        streamGamesLoader.value = false
    })

    filteredFollowedStreams().then(res=>{
        const streams = res.data.data;
        userStreams.value = streams
        streams.forEach(stream=>{
            stream.tags.forEach(tag => userTags.value.push(tag))
        })
    });

    followedStreams().then(res=>{
        streamsNeededCount.value = res.data.needed_views_count;
        streamsNeededCountLoader.value = false;
    })

    streamsByTime().then(res=>{
        streamsDates.value = res.data.data
    })
})
</script>
<script>
export default {
    name : 'Dashboard'
}
</script>
