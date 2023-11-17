
<script>
    import Slider from './Slider.vue';
    import Gallery from './Gallery.vue';

    export default {
        components: {
            Slider,Gallery,
        },            
    }
</script>
<template>
    <section class="home">
    <div class="content">
        <div class="item">
            <Slider/>
        </div>
    </div>
</section> 
<section class="gallery1">
    <div class="container-fluid top">
        <Gallery/>
    </div>
</section>
<section class="about top">
    <div class="container flex">
        <div class="left">
            <div class="heading">
                <h1>Welcome</h1>
                <h2>My Hotel</h2>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam unde neque eaque corporis tenetur, consequuntur impedit, tempore optio voluptatum earum obcaecati cupiditate eligendi, nihil aliquid commodi fugit incidunt ab nisi.</p>
            <a href="book.html"> <button class="primary-btn">Book Now</button></a>
        </div>
        <div class="right">
            <img src="images/accommodation3.jpg" alt="" width="450px" height="400px">
        </div>
    </div>
</section>
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
            <p>Lorem ipsum dolor sit,Lorem ipsum dolor sit,Lorem ipsum dolor sit,</p>
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
                        <h3>Inhouse Restuarant</h3>
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
                <i class="fa-solid fa-quote-right"></i>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium officiis laboriosam libero nulla repellendus cupiditate distinctio, tempora id eaque laborum doloremque illo sapiente itaque nobis labore iure totam corrupti beatae.</p>
                <h3>Som Socheat</h3>
                <label for=""> Som Socheat</label>
            </div>
            <div class="items">
                <i class="fa-solid fa-quote-right"></i>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium officiis laboriosam libero nulla repellendus cupiditate distinctio, tempora id eaque laborum doloremque illo sapiente itaque nobis labore iure totam corrupti beatae.</p>
                <h3>Som Socheat</h3>
                <label for=""> Som Socheat</label>
            </div>
            <div class="items">
                <i class="fa-solid fa-quote-right"></i>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium officiis laboriosam libero nulla repellendus cupiditate distinctio, tempora id eaque laborum doloremque illo sapiente itaque nobis labore iure totam corrupti beatae.</p>
                <h3>Som Socheat</h3>
                <label for=""> Som Socheat</label>
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

<section  class="news top rooms">
    <div class="container">
        <div class="heading">
            <h1>NEWS</h1>
            <h2>Our News</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae cupiditate velit sunt magni laborum. sit amet consectetur adipisicin.</p>
        </div>
        <div class="content flex">
            <div class="left grid2">
                <div class="items">
                    <div class="image">
                        <img src="images/accommodation3.jpg" alt="" width="350px" height="250px">
                    </div>
                    <div class="text">
                        <h2>Finibush bonorom malrom.</h2>
                        <div class="admin flex">
                            <i class="fa fa-user"></i>
                            <label for="">Admin</label>
                            <i class="fa fa-heart"></i>
                            <label for="">500</label>
                            <i class="fa fas fa-comments"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.reiciendis soluta vitae amet earum explicabo autem eligendi expedita voluptates accusamus dolore.</p>
                    </div>
                </div>
                <div class="items">
                    <div class="image">
                        <img src="images/Having-Picnic.png" alt="" width="350px" height="250px">
                    </div>
                    <div class="text">
                        <h2>Finibush bonorom malrom.</h2>
                        <div class="admin flex">
                            <i class="fa fa-user"></i>
                            <label for="">Admin</label>
                            <i class="fa fa-heart"></i>
                            <label for="">500</label>
                            <i class="fa fas fa-comments"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.reiciendis soluta vitae amet earum explicabo autem eligendi expedita voluptates accusamus dolore.</p>
                    </div>
                </div>
            </div>

            <div class="right">
                <div class="box flex">
                    <div class="img">
                        <img src="images/food.png" alt="" >
                    </div>
                    <div class="stext">
                        <h2>Food time</h2>
                        <p>Lorem, ipsumr adipisicing elit. Quia, atque deleniti labore.</p>
                    </div>
                </div>
                <div class="box flex">
                    <div class="img">
                        <img src="images/Having-Picnic.png" alt="">
                    </div>
                    <div class="stext">
                        <h2>Food time</h2>
                        <p>Lorem, ipsumr adipisicing elit. Quia, atque deleniti labore.</p>
                    </div>
                </div>
                <div class="box flex">
                    <div class="img">
                        <img src="images/mountain.png" alt="">
                    </div>
                    <div class="stext">
                        <h2>Food time</h2>
                        <p>Lorem, ipsumr adipisicing elit. Quia, atque deleniti labore.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

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
            <img src="images/logo.png" alt="" width="80px" height="60px">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem accusantium quae eius velit a. Nesciunt facilis consequatur, dolor delectus enim alias rem ex qui rerum laboriosam dolorem officiis at. Distinctio!</p>

            <div class="icon">
                <i class="fa fab fa-facebook-square"></i>
                <i class="fa fab fa-instagram-square"></i>
                <i class="fa fab fa-twitter-square"></i>
                <i class="fa fab fa-youtube"></i>
                <i class="fa fab fa-tiktok"></i>
            </div>
        </div>

        <div class="box">
            <h2>Links</h2>
            <ul>
                <li>Company</li>
                <li>About US</li>
                <li>Contact US</li>
                <li>Services</li>
                <li>Pravicy Policy</li>
            </ul>
        </div>

        <div class="box">
            <h2>Contact US</h2>
            <p>Lorem Magnam numquam delectus doloremque vel corporis!</p>
            <i class="fa fa-location-dot"></i>
            <label for="">1201 Park Street, Pnom Srouch, Kampong Spue.</label>
            <i class="fa fa-phone"></i>
            <label for="">+855 96 522 423 5</label>
            <i class="fa fa-envelope"></i>
            <label for="">info@gmail.com</label>
        </div>

        <div class="legal">
            <p class="container">Copyright (C) 2023 Copyright Holder All Rights Reserved</p>
        </div>

    </div>
</footer>
</template>