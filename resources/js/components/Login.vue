<template>
    <div class="min-h-full flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <h2 class="mt-6 text-3xl tracking-tight font-bold text-gray-900">Sign in to your account</h2>
                </div>
                <div class="mt-8">
                    <div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Sign in with Twitch</p>

                            <div class="mt-1 grid grid-cols-3 gap-3">
                                <div class="col-span-3">
                                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Sign in with Twitch</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M0 0v24h24v-24h-24zm19.642 14.791l-4.179 4.179h-3.104l-2.031 2.03h-2.149v-2.03h-3.821v-11.224l1.075-2.746h14.209v9.791zm-9.672 3.701l2.03-2.03h3.821l2.388-2.388v-7.641h-11.463v10.03h3.224v2.029zm4.418-9.313h1.433v4.175h-1.433v-4.175zm-3.821 0h1.433v4.175h-1.433v-4.175z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="" />
        </div>
    </div>
</template>