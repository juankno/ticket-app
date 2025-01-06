import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import axios from 'axios';

import App from './App.vue'
import router from './router'
import { useAuthStore } from './stores/auth.store';

axios.defaults.baseURL = 'http://localhost:8000'
axios.defaults.withCredentials = true
axios.defaults.withXSRFToken = true

const app = createApp(App)

app.use(createPinia())
const authStore = useAuthStore();
await authStore.user();
app.use(router)

app.mount('#app')
