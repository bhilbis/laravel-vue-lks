import 'bootstrap/dist/css/bootstrap.min.css'
//import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
// import store from './store'
import router from './router'

const app = createApp(App)

// createApp(App)
//   .use(store) // Use the Vuex store
//   .mount('#app')

app.use(createPinia())
app.use(router)

app.mount('#app')

import 'bootstrap/dist/js/bootstrap'