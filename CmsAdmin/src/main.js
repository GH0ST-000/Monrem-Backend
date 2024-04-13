import { createApp } from 'vue'
import './index.css'
import App from './App.vue'
import router from './router'
import store from './store'
import CKEditor from '@ckeditor/ckeditor5-vue';


const app = createApp(App)

app.use(store)
app.use(router)
app.use(CKEditor)

app.mount('#app')
