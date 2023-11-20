
<script>
import Slider from './Slider.vue';
import Contact from './Contact.vue';
import Gallery from './Gallery.vue';
import Room from './Room.vue';
import ThingToDo from './ThingToDo.vue';

export default {
    components: {
        Slider, Gallery,
        Contact, Room, ThingToDo
    },
}
</script>
<!-- <style>
@import '/public/css/style_frontend.css';
</style> -->
<template>
    <section class="home">
        <div class="content">
            <div class="item">
                <Slider />
            </div>
        </div>
    </section>
    <!-- <section class="gallery1">
    <div class="container-fluid top">
        <Gallery/>
    </div>
</section> -->
<div class="qr">
    <p>QR For payment</p>
    <div class="" style="display: flex;
    justify-content: center;
    align-items: center; text-align:center;
    margin-top:1rem;">
   
        <img src="images/riel_qr.jpg" alt="" style="width: 150px; height:150px;d">
        <img src="images/dollar_qr.jpg" alt="" style="width: 150px; height:150px;">
    </div>
    <div>
        <p>Socheat Som</p>
    </div>
</div>

    <section class="about top">
        <div class="container flex">
            <div class="left">
                <div class="heading">
                    <h1>Welcome</h1>
                    <h2>My Hotel</h2>
                </div>
                <p>Camping Resort is a new resort in the middle of the beautiful forest close to the fabulous valley top of
                    the mountain and located in OBAK RORTES Kirirom National Park. The resort features stunning
                    accommodations, a restaurant, a coffee shop, a tree bar, and especially the fantastic campfires to
                    facilitate you from unbelievable cold weather, it takes approximately 45- 60 minutes to reach by fast
                    road from Phnom Penh Capital City Cambodia. The nearest airport is PhnomPenh Pochentong International
                    Airport which is around 78 kilometers away from Camping Resort.</p>
                <a href="/Booking"> <button class="primary-btn">Book Now</button></a>
            </div>
            <div class="right">
                <img src="images/accommodation3.jpg" alt="" width="450px" height="400px">
            </div>
        </div>
    </section>

    <section class="rooms">
        <div class="container top">
            <div class="heading">
                <h1>EXPLORE</h1>
                <h2>Our Rooms</h2>
                <p>Camping Park Resort features a total of 19 modern tree houses, vacation tents, 46 family tents, and 150
                    Camping each of them is tastefully designed with high-quality and sustainable materials. Each unit is
                    equipped with air-conditioning, a Fan and Fresh Air, a hot shower, and a hair dryer,</p>
            </div>
            <div class="text">
                <div class="row1" style="width: 100%;">
                    <div class="column1" style="width:29.5%; ">
                        <div class="room-img">
                            <img src="images/accommodation3.jpg" alt="" height="180px">
                            <div>
                                <h2>Deluxe Family Tent</h2>
                                <div class="rate flex">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>This Cottage is popular for now</p>
                                <div class="button flex">
                                    <!-- <button class="primary-btn">BOOK NOW</button> -->
                                    <a href="/Booking"> <button class="primary-btn">Booking</button></a>
                                    <h3>75$ <span><br>per nignt</span></h3>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="column1" style="width:29.5%;">
                        <div class="room-img">
                            <img src="images/deluxe.jpg" alt="" height="180px">
                            <div>
                                <h2>Deluxe Double Tent</h2>
                                <div class="rate flex">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>This Cottage is popular for now</p>
                                <div class="button flex">
                                    <!-- <button class="primary-btn">BOOK NOW</button> -->
                                    <a href="/Booking"> <button class="primary-btn">Booking</button></a>
                                    <h3>75$ <span><br>per nignt</span></h3>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="column1" style="width:29.5%;">
                        <div class="room-img">
                            <img src="images/a1.jpg" alt="" height="180px">
                            <div>
                                <h2>Hotel Bus</h2>
                                <div class="rate flex">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>This Cottage is popular for now</p>
                                <div class="button flex">
                                    <!-- <button class="primary-btn">BOOK NOW</button> -->
                                    <a href="/Booking"> <button class="primary-btn">Booking</button></a>
                                    <h3>75$ <span><br>per nignt</span></h3>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- <script>
    $('.owl-carousel1').owlCarousel({
    loop:true,
    margin:40,
    nav:true,
    dots: false,
    navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2,
            margin:10,                     
        },
        1000:{
            items:3
        }
    }
})
</script> -->
    <div class="gallery-i" style="margin-top: 1rem;">
        <img src="images/accommodation3.jpg" alt="">
        <img src="images/camping/camping.png" alt="">
        <img src="images/Cottage/Cottage.png" alt="">
        <img src="images/images (3).jpg" alt="">
        <img src="images/cammm.jpg" alt="">
        <img src="images/food/food.png" alt="">
    </div>
    <!-- <section class="counter top">
    <div class="container grid">
        <div class="box">
            <h1>2500</h1>
            <hr>
            <span>Customer</span>
        </div>
        <div class="box">
            <h1>1250</h1>
            <hr>
            <span>Happy Customer</span>
        </div>
        <div class="box">
            <h1>150</h1>
            <hr>
            <span>Expert Technician</span>
        </div>
        <div class="box">
            <h1>3550</h1>
            <hr>
            <span>Destop reqired</span>
        </div>
    </div>
</section> -->
    <!-- <section class="rooms">
    <div class="container top">
        <div class="heading">
            <h1>EXPLORE</h1>
            <h2>Our Rooms</h2>
            <p>Camping Park Resort features a total of 19 modern tree houses, vacation tents, 46 family tents, and 150 Camping each of them is tastefully designed with high-quality and sustainable materials. Each unit is equipped with air-conditioning, a Fan and Fresh Air, a hot shower, and a hair dryer,</p>
        </div>
        <div class="content mtop">
            <div class="owl-carousel owl-carousel1 owl-theme">
                <div class="items">
                    <div class="image">
                        <img src="images/Accommodation.png" alt="" height="260px">
                    </div>
                    <div class="text">
                        <h2>Accommodation Room</h2>
                        <div class="rate flex">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="button flex">
                            <a href="book.html"> <button class="primary-btn">Book Now</button></a>
                            <h3>75$ <span><br>per nignt</span></h3>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="image">
                        <img src="images/accommodation2.jpg" alt="">
                    </div>
                    <div class="text">
                        <h2>Accommodation Room</h2>
                        <div class="rate flex">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="button flex">
                            <a href="book.html"> <button class="primary-btn">Book Now</button></a>
                            <h3>75$ <span><br>per nignt</span></h3>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="image">
                        <img src="images/accommodation3.jpg" alt="">
                    </div>
                    <div class="text">
                        <h2>Accommodation Room</h2>
                        <div class="rate flex">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="button flex">
                            <a href="book.html"> <button class="primary-btn">Book Now</button></a>
                            <h3>75$ <span><br>per nignt</span></h3>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="image">
                        <img src="images/accommodation4.jpg" alt="">
                    </div>
                    <div class="text">
                        <h2>Accommodation Room</h2>
                        <div class="rate flex">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="button flex">
                            <a href="book.html"> <button class="primary-btn">Book Now</button></a>
                            <h3>75$ <span><br>per nignt</span></h3>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="image">
                        <img src="images/accommodation3.jpg" alt="">
                    </div>
                    <div class="text">
                        <h2>Accommodation Room</h2>
                        <div class="rate flex">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="button flex">
                            <a href="book.html"> <button class="primary-btn">Book Now</button></a>
                            <h3>75$ <span><br>per nignt</span></h3>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="image">
                        <img src="images/accommodation2.jpg" alt="">
                    </div>
                    <div class="text">
                        <h2>Accommodation Room</h2>
                        <div class="rate flex">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="button flex">
                            <a href="book.html"> <button class="primary-btn">Book Now</button></a>
                            <h3>75$ <span><br>per nignt</span></h3>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="image">
                        <img src="images/accommodation3.jpg" alt="">
                    </div>
                    <div class="text">
                        <h2>Accommodation Room</h2>
                        <div class="rate flex">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="button flex">
                            <a href="book.html"> <button class="primary-btn">Book Now</button></a>
                            <h3>75$ <span><br>per nignt</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
    <!-- <section class="gallery">
    <div class="container top">
        <div class="heading">
            <h1>PHOTO</h1>
            <h2>Our Gallery</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit</p>
        </div>
        <div class="content mtop">
            <div class="owl-carousel owl-carousel1 owl-theme">
                <div class="items">
                    <div class="img">
                        <img src="images/accommodation2.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/camping/camping.png" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/Cottage/Cottage.png" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/images (3).jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/cammm.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/camping/camping3.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/camping/camping2.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/Hiking/Hiking.png" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/Trekking/trekking2.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/food/food.png" alt="">
                    </div>
                    <div class="overlay">
                        <span class=" fa fa-plus"></span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
    <section class="services top">
        <div class="container">
            <div class="heading">
                <h1>Best Moments</h1>
                <h2>Our Best Moments</h2>
                <p>Best moments in our place. Coffee, Delious Food, Restaurant Tree, Mountain...</p>
            </div>

            <div class="content flex_space">
                <div class="left grid2">
                    <div class="box">
                        <div class="text">
                            <i class="fa-solid fa-champagne-glasses"></i>
                            <h3>Delious Food</h3>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <i class="fa-solid fa-coffee"></i>
                            <h3>Coffee Shop</h3>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <i class="fa-solid fa-utensils"></i>
                            <h3>Restuarant</h3>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <i class="fa-solid fa-tree-city"></i>
                            <h3>Tree </h3>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <img src="images/Having-Picnic.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="customer top">
        <div class="container">
            <div class="owl-carousel owl-carousel2 owl-theme">
                <div class="items">
                    <h3>Explore the planet together</h3>
                    <i class="fa-solid fa-quote-right"></i>
                    <p>Camping Park Resort features a total of 19 modern tree houses, vacation tents, 46 family tents, and
                        150 Camping each of them is tastefully designed with high-quality and sustainable materials. Each
                        unit is equipped with air-conditioning, a Fan and Fresh Air, a hot shower, and a hair dryer.</p>
                    <label for="">Stay in One of the Top National Parks Kirirom Mountain</label>
                </div>
            </div>
        </div>
    </section>

    <!-- <script>
    $('.owl-carousel2').owlCarousel({
    loop:true,
    margin:0,
    nav:false,
    dots: false,
    navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        768:{
            items:1,                     
        },
        1000:{
            items:1
        }
    }
})
</script> -->
    <section class="newsletter mtop">
        <div class="container flex_space">
            <h1>Please contact us via:</h1>
            <input type="text" placeholder="Your Email">
            <input type="text" value="Subscribe">
        </div>
    </section>

    <footer>
        <div class="container grid">
            <div class="box">
                <img src="images/logo.png" alt="" width="140px" height="70px">

                <div class="icon">
                    <a href="https://www.facebook.com/CampingParkKirirom"><i class="fa fab fa-facebook-square"></i></a>
                    <a href="https://instagram.com/socheat__som?igshid=MzMyNGUyNmU2YQ=="><i
                            class="fa fab fa-instagram-square"></i></a>
                    <a href="https://youtu.be/ojFBtjvmmEM?si=eW_e1G2R4WdSulWY"><i class="fa fab fa-youtube"></i></a>
                    <a href="https://t.me/+855965224235"><i class="fa fab fa-telegram"></i></a>
                </div>
            </div>

            <div class="box">
                <h2>Links</h2>
                <ul>
                    <li><router-link class="" to="/CampingPack">Home</router-link></li>
                    <li><router-link class="" to="/Room">Room</router-link></li>
                    <li><router-link class="" to="/ThingtoDo">Things To Do</router-link></li>
                    <li><router-link class="" to="/Gallery">Gallery</router-link></li>
                    <li><router-link class="" to="/Contact">Contact</router-link></li>
                    <!-- <li><i class="fa fa-search"></i></li> -->
                    <router-link class="" to="/Booking">Book Now</router-link>
                </ul>
            </div>

            <div class="box">
                <h2>Contact US</h2>
                <p>Please contact us for more information</p>
                <i class="fa fa-location-dot"></i>
                <label for="">1201 Park Street, Pnom Srouch, Kampong Spue.</label>
                <i class="fa fa-phone"></i>
                <label for="">+855 96 522 423 5</label><br>
                <i class="fa fa-envelope"></i>
                <label for="">info@gmail.com</label>
            </div>
        </div>
        <div class="legal">
            <p class="container">Copyright (C) 2023 Developed by Student Technology</p>
        </div>
    </footer>
<!-- <script src="https:://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script> --></template>