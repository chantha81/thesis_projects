<style>
    .bg{
        background-color:aliceblue;
    }
    .bg label{
        font-size: 14px;
        margin-left: 10px;
    }
    .dp__pointer{
        height: 40px;
        font-size: 14px !important;
    }
    .dp__icon{
        width: 20px;
        height: 20px;
    }
    .btn-search{
        margin-top: 25px;
        font-size: 14px;
        padding: 8px;
    }
    .body_room{
       /* height: 300px; */
       /* background-color: chocolate; */
       border-radius: 4px;
       margin-top: 5px;
       height: 300px
       
    }
    .header_items{
        margin-top: 20px;
        margin-bottom: 0px;
        font-size: large;
        background-color: rgb(122, 122, 122);
        color: white;
        border-radius: 4px;
    }
    .items{
        box-shadow: 0 2px 0 0 rgb(157, 157, 156);
    }
    .img_card{
    width: 350px;
    height: 200px;
    object-fit: fill;
    }
    .room{
        height: 200px;
        margin-top: 20px;
    } 
    .card_b{
        margin-top: 20px;
        box-shadow: 10px 10px 5px lightblue;
    } 
    .btn_b{
        margin-top: 25px;
    }
    .btn_b p{
        margin-right: 10px;
        font-size: 16px;
    }
    .btn_cart{
        font-size: 14px;
        text-align: justify;
        height: 40px;
        padding: 0px 15px;
    }
    .st_items{
        background-color:white; 
        padding: 10px;
        border-radius: 4px;
        height: 35px;
        font-size: 14px;
    }
    
    .header {
        height: 74px;
        background-color: #eee;
        width: 100%;
        margin-bottom: 15px;
        box-shadow: 2px 2px 5px #999;
    }
    .header button {
        margin-top: 20px;
    }
    .image_in_cart{
        width: 80px;
        height: 80px;
    }
    .thead_in_cart{
        border-radius: 10px;
    }
    .items_in_cart{
        background-color:rgb(157, 249, 246);
        border-radius: 5px;
        margin: 2px;
        padding: 5px;
    }
    .cus_name{
        border-radius: 4px;
        height: 40px;
    }
    #cus_frm{
        background-color: rgb(191, 217, 243);
        padding: 10px 20px;
        border-radius: 4px;
    }
    #p_cus{
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    }
    .btn_book{
        padding: 5px 8px;
        border-radius: 4px;
        color: white;
        background-color:rgb(63, 63, 243);
        width: auto;
        height: 40px;
    }


   
</style>

<template>
    <!-- <div v-if="page === 'booking'"> -->
        
        <div class="container bg">
            <div class="sticky-top">
                <!-- <button class="btn btn-primary" @click="add">click me</button> -->
                <div class="row">
                    <div class="header">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12 st_items" ><Strong><i class="fa-solid fa-cart-flatbed"></i> Rooms ({{ RoomItems.length }})</Strong></div>
                            </div>
                            <div class="row" style="margin-top: 2px;">
                                <div class="col-md-12 st_items"><Strong><i class="fa-solid fa-cart-flatbed"></i> Tents ({{ TentItems.length }})</Strong></div>
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <button class="btn btn-primary btn_cart" style="margin-right: 10px;" @click="navigatTo('booking')">Back To Book</button>
                            <button class="btn btn-primary btn_cart" @click="navigatTo('cart')">View All Book</button>
                        </div>
                    </div> 
                </div>
            </div>
            <div v-if="page === 'booking'">
                <div class="row">
                    <div class="col-lg-12 stay">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Check In -- Check Out</label>
                                <VueDatePicker class="input-date" v-model="date"
                                    :enable-time-picker="false" range 
                                    :multi-calendars="{ solo: true }"
                                    :clearable="false" no-disabled-range 
                                />
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-success btn-search" @click="search">Update <i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="search">
                                    <label for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
                                    <input
                                        type="search"
                                        id="inputSearch"
                                        v-model="input_search"
                                        placeholder="Search"
                                        aria-label="Search through site content" />
                                    <button class="btn_search" @click="SearchRoom">Search</button>
                                </div> 
                            </div> -->
                        </div>
                        <div class="row items">
                            <p class="header_items"><strong>Room</strong></p>
                        </div>
                        
                        <div class="row">
                                <div class="col-md-2 filter_room sticky-top">
                                    <div class="row"><h4>Filter Room By:-</h4></div>
                                    <!-- <div class="row" style="text-decoration-line: overline">------------------</div> -->
                                    <div class="row">
                                        <h4>Type:</h4>
                                    </div>
                                    <div class="row" v-for="room_type in allRoomType">
                                        <div class="col-md-2 check_type">
                                            <input type="radio"
                                            :value="room_type.id"
                                            v-model="type_room"
                                            @change="checkType">
                                        </div>
                                        <div class="col-md-10">{{ room_type.name_type }}</div>
                                    </div>
                                    <div class="row">
                                        <h4>Bed:</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 boxbed">
                                            <input v-model="bed"
                                            style="height: 20px;" type="text" placeholder="Bed"
                                            @input="checkBed">
                                          
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <h4>Price:</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <label for="">{{ price_min }}</label> -->
                                            <input style="height: 20px;" type="text" placeholder="Min"
                                            v-model="price_min">
                                        </div>
                                        <div class="col-md-6">
                                            <input style="height: 20px;" type="text" placeholder="Max"
                                            v-model="price_max">
                                        </div>
                                    </div>
                                    <div class="row"><button type="button" class="btn btn-primary"
                                        @click="checkPrice">Submit Price</button></div>
                                </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4" v-for="room in free_room" :key="room.id">
                                        <div class="card card_b" style="width: 90%;">
                                            <img :src=" '/img/room/' + room.image" class="card-img-top" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Name: {{ room.name }}</h5>
                                                <p class="card-text"><strong>Bed :</strong> {{ room.bed }}</p>
                                                <p class="card-text"><Strong>Type :</Strong> {{ room.name_type }}</p>
                                                <p class="card-text"><strong>Price/Day :</strong> {{ room.price }} <strong>$</strong></p>
                                                <p class="btn btn-success"
                                                @click="addRoomTobooking(room)"><i class="fa-solid fa-plus"></i> Add To Booking</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p class="header_items"><strong>Tents</strong></p>
                        </div>
                        <div class="row">
                            <div class="col-md-4" v-for="tent in free_tent" :key="tent.id">
                                <div class="card card_b" style="width: 90%;">
                                    <img class="card-img-top" :src="'/img/tent/' + tent.image" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Name: {{ tent.name }}</h5>
                                        <p class="card-text"><Strong>Type :</Strong> {{ tent.type }}</p>
                                        <p class="card-text"><strong>Price/Day :</strong> {{ tent.price }} <strong>$</strong></p>
                                        <p class="btn btn-success"
                                        @click="addTentTobooking(tent)"><i class="fa-solid fa-plus"></i> Add To Booking</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="page === 'cart'">
                <div class="container">
                    <div class="row"><p class="header_items"><strong>Room</strong></p></div>
                    <div class="row">
                        <div class="col-md-3 items_in_cart" v-for="room in RoomItems">
                            <div class="row">
                                <div class="col-6">
                                    <img class="card-img-top" :src="'/img/room/' + room.image " alt="Card image cap">
                                </div>
                                <div class="col-6">
                                    <div class="row">Name: {{ room.name }}</div>
                                    <div class="row">Type: {{ room.name_type }}</div>
                                    <div class="row">Bed: {{ room.bed }}</div>
                                    <div class="row">Price/Day:{{ room.price }} $</div>
                                    <div class="row"><button class="btn btn-danger" style="width: 80px !important;" @click="removeRoomFromcart(room)"><i class="fa-solid fa-trash"></i> Remove</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"><p class="header_items"><strong>Tent</strong></p></div>
                    <div class="row">
                        <div class="col-md-3 items_in_cart" v-for="tent in TentItems">
                            <div class="row">
                                <div class="col-6">
                                    <img class="card-img-top" :src="'/img/tent/' + tent.image " alt="Card image cap">
                                </div>
                                <div class="col-6">
                                    <div class="row">Name: {{ tent.name }}</div>
                                    <div class="row">Type: {{ tent.type }}</div>
                                    <div class="row">Price/Day:{{ tent.price }} $</div>
                                    <div class="row" style="margin-top: 60px;"><button class="btn btn-danger" style="width: 80px !important; " @click="removeTentFromcart(tent)"><i class="fa-solid fa-trash"></i> Remove</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="header">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-right">
                                <button class="btn btn-success btn_cart" @click="navigatTo('customer_info')">Book Now !</button>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="page === 'customer_info'">
                <div class="row justify-content-center" >
                    <div class="col-md-6 text-center">
                        <p id="p_cus">Your Infomation</p>
                        <form id="cus_frm" @submit.prevent="AddBooking(RoomItems,TentItems,cus_info)">
                            <!-- <label for="">name:{{ cus_info.name }}</label> -->
                            <input class="cus_name" type="text" placeholder='Name' v-model="cus_info.name">
                            <input class="cus_name" type="text" placeholder="Phone" v-model="cus_info.phone">
                            <button class="btn_book">Book Now!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <footer>
        <div class="container grid">
            <div class="box">
                <img src="images/logo.png" alt="" width="140px" height="70px">

                <div class="icon">
                    <a href="https://www.facebook.com/CampingParkKirirom"><i class="fa fab fa-facebook-square"></i></a>
                    <a href="https://instagram.com/campingpark_?igshid=MzMyNGUyNmU2YQ=="><i
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
    
</template>

<script setup>
    import $ from 'jquery';

    import { onMounted, ref } from 'vue';

    const date = ref();
    let free_room = ref([])
    let free_tent = ref([])
    let RoomItems = ref([])
    let TentItems = ref([])
    let page = ref('booking')
    let cus_info = ref({name:'',phone:''})
    let input_search = ref();
    const type_room = ref();
    const allRoomType = ref([]);
    const bed = ref();
    const price_min = ref();
    const price_max = ref();
    // console.log(type_room,'type');
    
onMounted(() => {
  const startDate = new Date();
  const endDate = new Date(new Date().setDate(startDate.getDate() + 1));
  date.value = [startDate, endDate];
  search();
});
async function search() {
    const dateformat_start = format(date.value[0])
    const dateformat_end = format(date.value[1])
    await fetch('/room?date_in=' + dateformat_start + '&date_out=' + dateformat_end)
    .then((response) => response.json())
    .then((data) => { free_room.value = data, console.log(data,'data'),console.log(free_room.value)})
    await fetch('/get-tent?date_in=' + dateformat_start + '&date_out=' + dateformat_end)
    .then((response) => response.json())
    .then((data) => { free_tent.value = data, console.log(free_tent.value,'data_tent')})
    await fetch('/type_room')
    .then((response) => response.json())
    .then((data) => { allRoomType.value = data })
}
const format = (date) => {
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    return `${year}/${month}/${day}`;
}
function addRoomTobooking(room_data) {
    let index = this.RoomItems.findIndex(free_room => free_room.id === room_data.id);
    if (index !== -1) {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Room alreay add to booking",
            showConfirmButton: false,
            timer: 2500
        }); 
    } else {
    this.RoomItems.push(room_data);
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Room has been add to booking",
            showConfirmButton: false,
            timer: 2500
        })
        console.log(booking,'booking');
    }  
}
function addTentTobooking(tent_data) {
    let index = this.TentItems.findIndex(free_tent => free_tent.id === tent_data.id);
    if (index !== -1) {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Tent alreay add to booking",
            showConfirmButton: false,
            timer: 2500
        });
    } else {
        this.TentItems.push(tent_data);
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Tent has been add to booking",
            showConfirmButton: false,
            timer: 2500
        })
        console.log(booking,'booking');
    }
}
function navigatTo(page) {
    this.page = page;
}
function removeRoomFromcart(room_data) {
    let index = this.RoomItems.findIndex(RoomItems => RoomItems.id === room_data.id);
    this.RoomItems.splice(index,1)
}

function removeTentFromcart(tent_data) {
    let index = this.TentItems.findIndex(TentItems => TentItems.id === tent_data.id);
    this.TentItems.splice(index,1)
}

async function AddBooking (data_room,data_tent,info) {
    let room_ids = [];
    let tent_ids = [];
    let name = info.name;
    let phone = info.phone;
    let check_in_date = format(date.value[0])
    let check_out_date = format(date.value[1])
    data_room.forEach(element => {
        room_ids.push(element.id);
    });
    data_tent.forEach(element => {
        tent_ids.push(element.id);
    });

    Swal.fire({
            title: "Booking success",
            text: "We will call confirm you a little more !",
            icon: "success",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            // cancelButtonColor: "OK",
            confirmButtonText: "Yes"
            }).then( async (result) => {
                if(result.isConfirmed) {
                    await fetch("/booking_store", {
                            method: "post",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                "Content-Type": "application/json",
                            },
                            //make sure to serialize your JSON body
                            body: JSON.stringify({ 
                                    check_in_date,
                                    check_out_date,
                                    name,
                                    phone,
                                    room_ids,
                                    tent_ids,
                            })
                        })
                        .then(() => {
                            this.page = "booking";
                            this.RoomItems = [];                   
                        }) 
                }
            });
   
}

async function SearchRoom () {
    const dateformat_start = format(date.value[0])
    const dateformat_end = format(date.value[1])
    await fetch('/search_room?type=' + input_search.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
    .then((response) => response.json())
    .then((data) => free_room.value = data)
    await fetch('/search_tent?type=' + input_search.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end)
    .then((response) => response.json())
    .then((data) => free_tent.value = data)
}

async function checkType(){
    // console.log(type_room);
    if (type_room.value) {
        const dateformat_start = format(date.value[0])
        const dateformat_end = format(date.value[1])
        await fetch('/search_room_bycheck?type=' + type_room.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
        .then((response) => response.json())
        .then((data) => free_room.value = data)
    }  else{
        search();
    }
    if (bed.value) {
        console.log('2value');
        const dateformat_start = format(date.value[0])
        const dateformat_end = format(date.value[1])
        await fetch('/multi_check?type=' + type_room.value + '&bed=' + bed.value  + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
        .then((response) => response.json())
        .then((data) => free_room.value = data)
    }

    // {
    //     console.log('2value');
    //     // const dateformat_start = format(date.value[0])
    //     // const dateformat_end = format(date.value[1])
    //     // await fetch('/search_room_bycheck?type=' + type_room.value[0] + '&bed=' + bed.value[0]  + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
    //     // .then((response) => response.json())
    //     // .then((data) => free_room.value = data)
    // } else{
    //     search();
    // }

    // const dateformat_start = format(date.value[0])
    // const dateformat_end = format(date.value[1])
    // await fetch('/search_room?type=' + type_room.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
    // .then((response) => response.json())
    // .then((data) => free_room.value = data)

    // if (type_room === true) {
    // console.log('checkbox');
    // // const dateformat_start = format(date.value[0])
    // // const dateformat_end = format(date.value[1])
    // // await fetch('/search_room?type=' + type_room.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
    // // .then((response) => response.json())
    // // .then((data) => free_room.value = data)
    // } else {
    //     console.log('nocheckbox');

    // }
    
}
async function checkBed(){
    console.log(bed.value);
    if (bed.value) {
        const dateformat_start = format(date.value[0])
        const dateformat_end = format(date.value[1])
        await fetch('/search_room_bycheck?bed=' + bed.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
        .then((response) => response.json())
        .then((data) => free_room.value = data)
    } else {
        search();
    }
    if (type_room.value) {
        const dateformat_start = format(date.value[0])
        const dateformat_end = format(date.value[1])
        await fetch('/multi_check?type=' + type_room.value + '&bed=' + bed.value  + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
        .then((response) => response.json())
        .then((data) => free_room.value = data)
    }
    if (price_min.value && price_max.value) {
        const dateformat_start = format(date.value[0])
        const dateformat_end = format(date.value[1])
        await fetch('/multi_check?bed=' + bed.value + '&min=' + price_min.value + '&max=' + price_max.value  + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
        .then((response) => response.json())
        .then((data) => free_room.value = data)
    }
}
async function checkPrice(){
    if (type_room.value) {
        const dateformat_start = format(date.value[0])
        const dateformat_end = format(date.value[1])
        await fetch('/check_price?min=' + price_min.value + '&max=' + price_max.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end + '&type=' + type_room.value )
        .then((response) => response.json())
        .then((data) => free_room.value = data)
    }
    else {
        const dateformat_start = format(date.value[0])
        const dateformat_end = format(date.value[1])
        await fetch('/search_room_bycheck?min=' + price_min.value + '&max=' + price_max.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end )
        .then((response) => response.json())
        .then((data) => free_room.value = data)
    }
    if (bed.value) {
        const dateformat_start = format(date.value[0])
        const dateformat_end = format(date.value[1])
        await fetch('/check_price?min=' + price_min.value + '&max=' + price_max.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end + '&bed=' + bed.value )
        .then((response) => response.json())
        .then((data) => free_room.value = data)
    }
    if (type_room.value && bed.value) {
        const dateformat_start = format(date.value[0])
        const dateformat_end = format(date.value[1])
        await fetch('/check_price_multiP?min=' + price_min.value + '&max=' + price_max.value + '&date_in=' + dateformat_start + '&date_out=' + dateformat_end + '&type='+type_room.value+ '&bed=' + bed.value )
        .then((response) => response.json())
        .then((data) => free_room.value = data)
    }
    
}


</script>



