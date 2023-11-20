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
            <div class="navlinks" style="text-decoration: none;">
                <ul id="menulist">
                    <li><router-link to="/CampingPack">Home</router-link></li> 
                    <li><router-link to="/Room">Room</router-link></li>
                    <li><router-link to="/ThingToDo">Things to do</router-link></li>
                    <li><router-link to="/Gallery">Gallery</router-link></li>
                    <li><router-link to="/Contact">Contact</router-link></li>
                    <router-link class="book_btn" to="/Booking">Book Now</router-link>
                </ul>
                <span class="fa fa-bars" onclick="menutoggle()"></span>
            </div>
        </div>
    </header>
    <router-view></router-view>
    <datepicker></datepicker>
</template>