<template>
    <div class="container max-w-full h-full">
        <router-view />
    </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
    name: 'App',
    computed: {
        ...mapState('user', ['authorized']),
        nextRoute() {
            return this.$route.query.redirect || '/'
        },
        currentRoute() {
            return this.$route.path
        },
    },
    mounted() {
        this.$store.dispatch('user/load_current_account')
    },
}
</script>

<style scoped>

</style>
