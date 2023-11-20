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
                            
                        </div>
                        <div class="row items">
                            <p class="header_items"><strong>Room</strong></p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4" v-for="room in free_room" :key="room.id">
                                <div class="card card_b" style="width: 90%;">
                                    <img :src=" '/img/room/' + room.image" class="card-img-top" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Name: {{ room.name }}</h5>
                                        <p class="card-text"><strong>Bed :</strong> {{ room.price }}</p>
                                        <p class="card-text"><Strong>Type :</Strong> {{ room.type }}</p>
                                        <p class="card-text"><strong>Price/Day :</strong> {{ room.price }} <strong>$</strong></p>
                                        <p class="btn btn-success"
                                        @click="addRoomTobooking(room)"><i class="fa-solid fa-plus"></i> Add To Booking</p>
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
                                    <img class="card-img-top" src="/images//b.jpg" alt="Card image cap">
                                </div>
                                <div class="col-6">
                                    <div class="row">Name: {{ room.name }}</div>
                                    <div class="row">Type: {{ room.type }}</div>
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
                                    <img class="card-img-top" src="/images/camping/camping1.png" alt="Card image cap">
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
    <!-- </div> -->
    
</template>

<script setup>
    import $ from 'jquery';
    
    import { onMounted, ref } from 'vue';
    // import { Swal } from 'sweetalert2';

    const date = ref();
    let free_room = ref([])
    let free_tent = ref([])
    let RoomItems = ref([])
    let TentItems = ref([])
    let page = ref('booking')
    let cus_info = ref({name:'',phone:''})
    console.log(free_tent, 'free tent');
    
    
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
                        }) 
                }
            });
   
}
async function add() {
}
</script>



