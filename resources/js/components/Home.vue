<style>
    body{
        font-size: 14px;
    }
</style>
<template>
    <header>
        <div class="content flex_space">
            <div class="logo">
            </div>
            <div class="navlinks">
                <ul id="menulist">
                    <li><a href="/CampingPack">Home</a></li>
                    <li><a href="/Room">Room</a></li>
                    <li><a href="/ThingToDo">Things to do</a></li>
                    <li><a href="/Gallery">Gallery</a></li>
                    <li><a href="/Contact">Contact</a></li>
                    <!-- <li><i class="fa fa-search"></i></li> -->
                    <router-link class="book_btn" to="/Booking">Book Now</router-link>
                </ul>
                <span class="fa fa-bars" onclick="menutoggle()"></span>
            </div>
        </div>
    </header>
    <router-view></router-view>
    <datepicker></datepicker>
</template>