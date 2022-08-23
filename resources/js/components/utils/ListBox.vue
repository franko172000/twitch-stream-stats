<template>
    <div class="w-full">
        <h2 class="max-w-6xl mx-auto mt-8 text-lg leading-6 font-medium text-gray-900">
            <slot name="title"/>
        </h2>

        <!-- Activity table (small breakpoint and up) -->
        <div class="hidden sm:block">
            <div class="w-full">
                <div class="flex flex-col mt-2">
                    <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                        <slot name="content"/>
                        <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListBox"
}
</script>

<style scoped>

</style>
