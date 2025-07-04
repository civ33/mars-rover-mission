<template>
  <div class="min-vh-100 bg-black d-flex flex-column align-items-center justify-content-start pt-5">
    <h3 class="text-success mb-4">Mars Rover Mission</h3>
    <div class="mb-3">
      <span v-if="mission" class="text-success">
        The rover is currently at (x: {{ mission.rover_coor_x }}, y: {{ mission.rover_coor_y }}) facing {{ mission.rover_z }}
      </span>
      <span v-else class="text-success">
        Loading mission data...
      </span>
    </div>
    <div class="py-3" style="width: 100%; max-width: 500px;">
      <form @submit.prevent="submitCommands" class="mb-3">
        <label for="commands" class="text-success py-3 text-center w-100">Tell the rover where to go (F, L or R):</label>
        <input
          v-model="commands"
          type="text"
          id="commands"
          class="form-control mb-3"
          placeholder="e.g. FFLRF"
          required
        />
        <button type="submit" class="btn btn-success w-100">Send Command</button>
      </form>

      <form @submit.prevent="endMission">
        <button type="submit" class="btn btn-secondary w-100">End Mission</button>
      </form>

      <div v-if="message" class="text-success mt-3" role="alert">
        {{ message }}
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { useRouter } from 'vue-router';
import axios from 'axios';

interface Mission {
  id: number;
  rover_coor_x: number;
  rover_coor_y: number;
  rover_z: string;
  // Add other properties if needed
}

const route = useRoute();

const mission = ref<Mission | null>(null);
const commands = ref('');
const message = ref('');
const router = useRouter();

async function fetchMission(id: string) {
  const response = await axios.get(`/api/missions/${id}`);
  mission.value = response.data;
}

async function submitCommands() {
  if (!mission.value) return;
  const response = await axios.post('/api/travel', {
    commands: commands.value,
    mission_id: mission.value.id,
  });
  mission.value = response.data.mission;
  message.value = response.data.message || '';
}

onMounted(() => {
  const missionId = route.query.missionId;
  if (missionId && typeof missionId === 'string') {
    fetchMission(missionId);
  } else {
    message.value = 'No mission selected.';
  }
});

function endMission() {
  router.push({ name: 'StartMission'});
}
</script>