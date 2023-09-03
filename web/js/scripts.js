const { createApp } = Vue
import lesson from './components/lesson.js';

const app = createApp({});

app.component( 'lesson',  lesson );

app.mount('#lesson-page');