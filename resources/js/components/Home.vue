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
                    <li><router-link class="" to="/CampingPack">Home</router-link></li>
                    <li><router-link class="" to="/Room">Room</router-link></li>
                    <li><router-link class="" to="/ThingtoDo">Things To Do</router-link></li>
                    <li><router-link class="" to="/Gallery">Gallery</router-link></li>
                    <li><router-link class="" to="/Contact">Contact</router-link></li>
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