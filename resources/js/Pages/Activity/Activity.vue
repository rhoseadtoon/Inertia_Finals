<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { ref, computed } from 'vue';

defineOptions({
    layout: MyLayout
});

const searchQuery = ref('');

const activities = [
    {
        activityImage: 'https://i.pinimg.com/originals/e4/6c/04/e46c04c7cfa1d721df4798dd7c4ab187.jpg',
        activityName: 'Aerobic exercise',
        activityDescription: 'Aerobic exercise, which speeds up your heart rate and breathing, is important for many body functions. It gives your heart and lungs a workout and increases endurance. ',
        activityLink: 'https://www.youtube.com/watch?v=a44ayeoSfKM',
    },
    {
        activityImage: 'https://th.bing.com/th/id/OIP.dj6SO7qT1OwjnuBPadVAygHaFR?rs=1&pid=ImgDetMain',
        activityName: 'Strength training',
        activityDescription: 'Strengthening your muscles not only makes you stronger, but also stimulates bone growth, lowers blood sugar, assists with weight control, improves balance and posture, and reduces stress and pain in the lower back and joints.',
        activityLink: 'https://www.youtube.com/watch?v=H1F-UfC8Mb8&t=2s',
    },
    {
        activityImage: 'https://www.mentalup.co/img/blog/stretching-exercises-for-kids-2.jpg',
        activityName: 'Stretching',
        activityDescription: 'Stretching helps maintain flexibility. We often overlook that in youth when our muscles are healthier. But aging leads to a loss of flexibility in the muscles and tendons.',
        activityLink: 'https://www.youtube.com/watch?v=Sl6q1igrxpk&t=7s',
    },
    {
        activityImage: 'https://beachsidetherapy.optimumcareprovider.com/wp-content/uploads/2018/03/focused-group-training-squats-on-half-ball-at-PE7F77J-reduce.jpg',
        activityName: 'Balance exercises',
        activityDescription: 'Improving your balance makes you feel steadier on your feet and helps prevent falls. Its especially important as we get older, when the systems that help us maintain balance—our vision, our inner ear, and our leg muscles and joints—tend to break down.',
        activityLink: 'https://www.youtube.com/watch?v=uth_9K3EmDI&t=4s',
    },
];

const filteredActivities = computed(() => {
    return activities.filter(activity => 
        activity.activityName.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});
</script>

<template>
    <main id="page-trans">
        <div class="container">
            <header class="text-4xl font-bold mb-4 py-2 px-4 pt-10">Mostly Important Type of Exercises</header>
            <div class="card-container p-4 mt-5">
                <a v-for="(activity, index) in filteredActivities" :key="index" :href="activity.activityLink" target="_blank" class="card">
                    <div class="card-body">
                        <img :src="activity.activityImage" alt="" class="activity-image">
                    </div>
                    <div class="card-body font-bold text-2xl text-center rounded">
                        <p>{{ activity.activityName }}</p>
                    </div>
                    <div class="card-body">
                        <p class="des">{{ activity.activityDescription }}</p>
                    </div>
                </a>
            </div>
        </div>
    </main>
</template>

<style scoped>
.container {
    max-height: 100vh;
    overflow: hidden; 
}

.card {
    background-color: #c1dbfb; 
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
    padding: 15px;
    transition: transform 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 360px; 
    
}

.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
    max-height: calc(100vh - 200px); 
    overflow-y: auto; 
    overflow-x: none;
}


.button {
    display: flex;
    justify-content: center;
    align-items: center;
}


header {
    font-weight: bold;
    text-align: center;
}

.card:hover {
    transform: translateY(-5px);
}

.card-header {
    border-bottom: 1px solid #c2c2c2;
    padding-bottom: 8px;
    margin-bottom: 8px;
}

.card-body p {
    background: linear-gradient(45deg, #353535, #414141, #727272);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin: 5px 0;
    word-wrap: break-word;
}

.activity-image {
    width: 100%;
    height: auto;
    border-radius: 8px;
    object-fit: cover;
}
.des{
    font-size: 12px;
}
</style>
