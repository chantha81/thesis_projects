<template>
    <div>

        <body>

            <div class="text">
                <div style="text-align:center">
                    <h1>Contact Us</h1>
                    <!-- <p>Swing by for a cup of coffee, or leave us a message:</p> -->
                </div>
                <div class="row">

                    <div class="column"  style="width:45%">
                        <form action="">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Your name..">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                            <label for="country">Sex</label>
                            <select id="country" name="country">
                                <option value="australia">Female</option>
                                <option value="canada">Male</option>
                                <option value="usa">Other</option>
                            </select>
                            <label for="message">Message</label>
                            <textarea id="message=" placeholder="Write something.." style="height:170px"></textarea>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                    <div class="column" style="width:45%;margin-top:1.2rem">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d125170.45689203477!2d103.923012!3d11.3655919!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3108e916ce8d630f%3A0x415b7ade62b8f17f!2sKirirom%20National%20Park!5e0!3m2!1sen!2skh!4v1700296609647!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- <img src="images/logo.png" alt=""> -->
                    </div>
                </div>
            </div>
        </body>

        <footer>
            <div class="container grid">
                <div class="box">
                    <img src="images/logo.png" alt="" width="130px" height="70px">

                    <div class="icon">
                        <a href="https://www.facebook.com/CampingParkKirirom"><i class="fa fab fa-facebook-square"></i></a>
                        <a href="https://instagram.com/socheat__som?igshid=MzMyNGUyNmU2YQ=="><i
                                class="fa fab fa-instagram-square"></i></a>
                        <a href="https://youtu.be/ojFBtjvmmEM?si=eW_e1G2R4WdSulWY"><i class="fa fab fa-youtube"></i></a>
                        <a href="https://www.tiktok.com/@aotu_user?_t=8hPhqjiau2c&_r=1"><i class="fa fab fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="box">
                    <h2>Links</h2>
                    <ul>
                        <li><a href="/CampingPack">Home</a></li>
                        <li><a href="/Room">Room</a></li>
                        <li><a href="/ThingToDo">Things to do</a></li>
                        <li><a href="/Gallery">Gallery</a></li>
                        <li><a href="/Contact">Contact</a></li>
                        <li><a href="/Booking">Booking</a></li>
                    </ul>
                </div>

                <div class="box">
                    <h2>Contact US</h2>
                    <p>Please contact us for more information</p>
                    <i class="fa fa-location-dot"></i>
                    <label for="">1201 Park Street, Pnom Srouch, Kampong Spue.</label>
                    <i class="fa fa-phone"></i>
                    <label for="">+855 96 522 423 5</label>
                    <i class="fa fa-envelope"></i>
                    <label for="">info@gmail.com</label>
                </div>
            </div>
            <div class="legal">
                <p class="container">Copyright (C) 2023 Developed by Student Technology</p>
            </div>
        </footer>
    </div>
</template>