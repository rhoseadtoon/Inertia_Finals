<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { ref, onMounted } from 'vue';


defineOptions({
  layout: MyLayout
});

const initialCards = [
  {
    imageUrl: 'https://th.bing.com/th/id/R.12e726aea6ed394949b7a38b5bb20c7d?rik=grzo2o2ZifHa6A&riu=http%3a%2f%2f2.bp.blogspot.com%2f-hB-R_V2dxpU%2fViN4XLZyy6I%2fAAAAAAAAAkw%2fK2EgevuYzlw%2fs1600%2faerobic-dance-exercise.jpg&ehk=XcfCtADBd11otFn2eRQIZVONMdgodrBMEj%2bN0FidPx4%3d&risl=&pid=ImgRaw&r=0',
    title: 'Aerobic exercise',
    description: 'Aerobic exercise, which speeds up your heart rate and breathing, is important for many body functions. It gives your heart and lungs a workout and increases endurance.'
  },
  {
    imageUrl:'https://th.bing.com/th/id/OIP.dj6SO7qT1OwjnuBPadVAygHaFR?rs=1&pid=ImgDetMain',
    title: 'Strength training',
    description: 'Strengthening your muscles not only makes you stronger, but also stimulates bone growth, lowers blood sugar, assists with weight control, improves balance and posture, and reduces stress and pain in the lower back and joints.',
  },
];

const cards = ref(JSON.parse(localStorage.getItem('cards')) || initialCards);

// Form data
const imageUrl = ref('');
const projectTitle = ref('');
const projectDescription = ref('');
const editIndex = ref(-1);

// Toggle form visibility
const showForm = ref(false);
function toggleForm() {
  showForm.value = !showForm.value;
}

// Function to add a new card
function addOrUpdateCard() {
  if (editIndex.value !== -1) {
    // Update existing card
    cards.value[editIndex.value] = { title: projectTitle.value, description: projectDescription.value, imageUrl: imageUrl.value };
    editIndex.value = -1;
  } else {
    // Add new card
    cards.value.push({ title: projectTitle.value, description: projectDescription.value, imageUrl: imageUrl.value });
  }
  // Clear form fields
  imageUrl.value = '';
  projectTitle.value = '';
  projectDescription.value = '';
  // Store updated cards in localStorage
  localStorage.setItem('cards', JSON.stringify(cards.value));
}

// Function to remove a card
function removeCard(index) {
  cards.value.splice(index, 1);
  // Update localStorage after removing a card
  localStorage.setItem('cards', JSON.stringify(cards.value));
}

// Function to edit a card
function editCard(index) {
  const card = cards.value[index];
  imageUrl.value = card.imageUrl;
  projectTitle.value = card.title;
  projectDescription.value = card.description;
  editIndex.value = index;
  toggleForm();
}

// Form submit handler
function handleSubmit() {
  toggleForm();
  addOrUpdateCard();
}

// Clear localStorage on first load for testing purposes
// localStorage.removeItem('cards');
</script>


<template>
  <div class="container1">
    <div class="portfolio">
      <div class="portfolio-header">
        <h2>Exercises</h2>
        <button class="portfolio-button" @click="toggleForm">Add Here</button>
      </div>
      <hr class="hr" />
      <div id="card-container">
        <!-- Render cards dynamically -->
        <div class="card" v-for="(card, index) in cards" :key="index">
          <div class="remove-button-container" @mouseover="showRemoveButton(index)" @mouseleave="hideRemoveButton(index)">
            <button class="remove-button" @click="removeCard(index)">x</button>
          </div>
          <div class="edit-button-container">
            <button class="edit-button" @click="editCard(index)">Edit</button>
          </div>
          <div class="card-content">
            <img :src="card.imageUrl" alt="Project Image" class="small-image" />
            <div class="text-content">
              <h3 class="card-title">{{ card.title }}</h3>
              <p>{{ card.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Form overlay -->
  <div class="overlay" v-if="showForm">
    <div class="form-container" style="text-align: center;">
      <form @submit.prevent="handleSubmit">
        <label for="imageUrl">Image URL:</label>
        <input type="text" id="imageUrl" v-model="imageUrl" required />
        <label for="projectTitle">Name:</label>
        <input type="text" id="projectTitle" v-model="projectTitle" required />
        <label for="projectDescription">Description:</label>
        <textarea id="projectDescription" v-model="projectDescription" required></textarea>
        <button type="submit">Add</button>
      </form>
    </div>
  </div>
</template>


<style scoped>

.portfolio {
  display: block;
  text-align: left;
  margin-top: 5%;
  margin-left: auto;
  margin-right: auto;
  width: 60%;
}

.portfolio h2 {
  margin-bottom: 10px;
  font-size: xx-large;
}

.hr {
  border-top: 1px solid #000000;
  width: 100%;
}

.portfolio-header {
  display: flex;
  align-items: center;
}

.portfolio-header h2 {
  margin-right: auto;
}

.portfolio-button {
  padding: 5px 20px;
  background-color: transparent;
  color: #000000;
  border: 1px solid #000000;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bolder;
}

.card-title {
  font-weight: bold;
}

.card {
  padding: 10px;
  margin-top: 10px;
  background-color: #ffffff;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.card {
  position: relative;
  border: 1px solid rgb(19, 18, 18);
  border-radius: 10px;
  padding: 10px;
  margin-bottom: 10px;
}

.remove-button {
  position: absolute;
  top: 5px;
  right: 10px;
  background: transparent;
  border: none;
  color: #999;
  cursor: pointer;
  transition: color 0.3s ease;
}

.remove-button:hover {
  color: red;
  font-weight: bold;
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.form-container {
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type="submit"] {
  padding: 10px 20px;
  background-color: #000000;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #69abf1;
}

.form-container {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
}

.card-content {
  display: flex;
}

.small-image {
  width: 100px;
  height: auto;
  margin-right: 10px;
}

.remove-button-container {
  position: absolute;
  top: 5px;
  right: 5px;
  visibility: hidden; 
}
.card:hover .remove-button-container {
  visibility: visible; 
}
</style>
