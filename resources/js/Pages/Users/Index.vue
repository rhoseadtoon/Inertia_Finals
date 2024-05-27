<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';

defineOptions({
    layout: MyLayout
});
</script>

<template>
    <main id="page-trans">
        <div class="container py-4">
            <div class="image-container">
                <img src="https://64.media.tumblr.com/3c0f9aa8bf7f2237fb700ca11ab8ce63/tumblr_inline_pc6cdobv5l1qilw9u_400.gifv" alt="">
            </div>
            <header class="py-2 px-4 text-center font-bold text-4xl">Keep Your Body Healthy!</header>
        </div>
    </main>
</template>

<style scoped>
.container{
    background-color: #acdcf4;
    height: 91.5vh;
}
img {
    height: 30%;
    width: 30%;
    border-radius: 50px;
    margin-top: 240px;
}
.image-container {
    display: flex;
    justify-content: center;
    align-items: center;

}

.link:hover {
    color: #000;
    background-color: rgb(179, 179, 179);
}
</style>
