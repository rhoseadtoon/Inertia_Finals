<script setup>
import { Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
</script>
<template>
    <div class="flex min-h-screen bg-gray-100">
        <div class="navbar w-[250px] bg-blue-400 text-white flex flex-col items-center py-6">
            <img src="https://img.icons8.com/?size=100&id=pqgiQTl9Spvk&format=png&color=000000" alt="logo" class="rounded-full w-32 h-32">
            <nav class="mt-10 w-full text-center">
                <h1 class="text-center text-4xl font-bold mb-6">フィットネス</h1>
                <Link href="/index" class="block py-2 px-5 text-center rounded mt-3 flex items-center justify-center hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 22V12h6v10" />
                    </svg>Home</Link>
                <Link href="/portfolios" class="block py-2 px-5 text-center rounded mt-3 flex items-center justify-center hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path d="M12 14l9-5-9-5-9 5 9 5zM5 12l7 4m-7-4v4m0-4h7" />
                    </svg>My Exercises</Link>
                <Link href="/activity" class="block py-2 px-5 text-center rounded mt-3 flex items-center justify-center hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12h2M3 12h2" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l4-4-4-4" />
                    </svg>Activities</Link>
            </nav>
        </div>
        <div class="content flex-grow">
            <div class="min-h-screen">
                <nav class="bg-blue-400 border-b border-gray-100">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="text-white hover:text-gray-300">
                                    Dashboard
                                </NavLink>
                            </div>
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <div class="ml-3 relative">
                                    <Dropdown align="right" width="48">
                                        <template #trigger>
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-700 hover:bg-blue-600 focus:outline-none transition ease-in-out duration-150">
                                                    {{ $page.props.auth.user.name }}
                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </template>
                                        <template #content>
                                            <DropdownLink :href="route('logout')" method="post" as="button">
                                                Log Out
                                            </DropdownLink>
                                        </template>
                                    </Dropdown>
                                </div>
                            </div>
                            <div class="-mr-2 flex items-center sm:hidden">
                                <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-300 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-gray-300 transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{ 'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{ 'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }" class="sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')" class="text-white hover:bg-blue-800 transition">
                                Dashboard
                            </ResponsiveNavLink>
                        </div>
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="px-4">
                                <div class="font-medium text-base text-gray-800">
                                    {{ $page.props.auth.user.name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                            </div>
                            <div class="mt-3 space-y-1">
                                <ResponsiveNavLink :href="route('logout')" method="post" as="button" class="text-white hover:bg-blue-800 transition">
                                    Log Out
                                </ResponsiveNavLink>
                            </div>
                        </div>
                    </div>
                </nav>
                <header class="bg-white shadow" v-if="$slots.header">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>
                <main>
                    <Transition name="page-trans" mode="out-in">
                        <slot />
                    </Transition>
                </main>
            </div>
        </div>
    </div>
</template>

<style scoped>
.logo {
    height: 40px;
    width: 40px;
}
img {
    border-radius: 50%;
}
.about {
    color: white;
    margin-left: 45px;
    margin-bottom: 20px;
    font-weight: bold;
    width: 150px;
}
.about:hover {
    background-color: #fff;
    border-color: #4a90e2;
    color: #000000;
}
h1 {
    margin-bottom: 40px;
    background: linear-gradient(45deg, #4a4949, #4a4949, #4a4949);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-text-stroke: 0.2px #000000;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.navbar {
    width: 35vh;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.navbar nav {
    display: flex;
    flex-direction: column;
    width: 100%;
    align-items: center;
}
.navbar a {
    text-decoration: none;
    color: inherit;
}
.content {
    flex-grow: 1;
}
</style>
