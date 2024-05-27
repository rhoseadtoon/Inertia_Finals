<script setup>
import { Link } from '@inertiajs/inertia';
import MyLayout from '@/Layouts/MyLayout.vue';

defineOptions({
    layout: MyLayout
});
</script>

<template>
    <div class="py-12 welcome">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 flex justify-center">
                    <img src="https://i.pinimg.com/originals/59/eb/10/59eb10ef827882e2b709c0603679b73a.gif" alt="me" class="w-[75vh] welcome-img">
                </div>
            </div>
        </div>
    </div>
</template>
