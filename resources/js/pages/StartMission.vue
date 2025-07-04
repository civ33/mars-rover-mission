<template>
  <div class="min-vh-100 bg-black d-flex flex-column align-items-center justify-content-start pt-5">
    <h3 class="text-success mb-4">Mars Rover Mission</h3>
    <div style="width: 100%; max-width: 500px;">
      <form @submit.prevent="submit" class="mb-3">
        <div>
          <label for="mission_name" class="text-success py-3 text-center w-100">Enter mission's name:</label>
          <input
            v-model="form.mission_name"
            type="text"
            id="mission_name"
            class="form-control mb-3"
            placeholder="e.g. Explore Mars"
            required
          />
        </div>
        <div>
          <button type="submit" class="btn btn-success w-100 my-3">Save Mission</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import { reactive } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();

const form = reactive({
  mission_name: '',
});

async function submit() {
  try {
    const response = await axios.post('/api/startMission', {
      mission_name: form.mission_name,
    });
    router.push({ name: 'PlayMission', query: { missionId: response.data.mission.id } });
  } catch (error) {
    console.error('Error starting mission:', error);
    alert('Error al iniciar la misión.');
  }
}
</script>