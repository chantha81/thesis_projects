
import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';





import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
// import VueSweetalert2 from 'vue-sweetalert2';
// import 'sweetalert2/dist/sweetalert2.min.css';
import Home from './components/Home.vue';
import HomeBody from './components/BodyHome.vue';
import Booking from './bookings/Booking.vue';
import Contact from './components/Contact.vue';
import Room from './components/Room.vue';
import ThingToDo from './components/ThingToDo.vue';
import Gallery from './components/Gallery.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/CampingPack',
          component:HomeBody 
        },
        { 
        path: '/Booking', 
        component:Booking
        },
        { 
          path: '/Contact', 
          component:Contact
        },
        { 
          path: '/Room', 
          component:Room
        },
        { 
          path: '/ThingToDo', 
          component:ThingToDo
        },
        { 
          path: '/Gallery', 
          component:Gallery
        },            
    ],
});



const app = createApp(Home)

app.component('VueDatePicker', VueDatePicker);
// app.use(VueSweetalert2);

// app.use(router);

app.use(router).mount("#app");
