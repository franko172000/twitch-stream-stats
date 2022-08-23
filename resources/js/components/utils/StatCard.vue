<template>
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            {{title}}
                        </dt>
                        <dd>
                            <loader v-if="loading" class-name="w-5 h-5" />
                            <div v-if="!loading" class="text-lg font-medium text-gray-900">
                                {{stat}}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3">
            <div class="text-sm">
                <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> View all </a>
            </div>
        </div>
    </div>
</template>
<script setup>
import Loader from "./Loader.vue";
defineProps({
    loading: {
        type: Boolean,
    },
    title:{
        type: String,
        required: true,
    },
    stat: {
        type: Number,
        required: true
    }
})
</script>
<script>
export default {
    name: "StatCard"
}
</script>

<style scoped>

</style>
