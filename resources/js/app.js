import './bootstrap';
import { createApp } from 'vue';
import BookList from './components/BookList.vue';

const app = createApp({});
app.component('book-list', BookList);
app.mount('#app');