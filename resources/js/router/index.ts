import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import StartMission from '../pages/StartMission.vue';
import PlayMission from '../pages/PlayMission.vue';

// Import other pages as needed
// import PlayMission from '../pages/PlayMission.vue';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'StartMission',
    component: StartMission,
  },
  {
    path: '/play-mission',
    name: 'PlayMission',
    component: PlayMission,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;