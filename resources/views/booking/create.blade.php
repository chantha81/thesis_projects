@extends('admin.layout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-md-12 header-titile bg-light text-dark">
                        <h4><i class="fa-solid fa-circle-plus"></i> Add Booking</h4>
                    </div>
                </div>
            </div>
            @if (Session::has('book_created'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong></strong>{!! session('book_created') !!}
                </div>
            @endif
            @if (count($errors) > 0)
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>Something is Wrong</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <form enctype="multipart/form-data" name="package-create-form" id="add-blog-post-form"
                        action="{{ url('/booking_store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group start-date">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa-solid fa-calendar-days"></i></span>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control datetimepicker check_in_date"
                                                    name="check_in_date" placeholder="Check In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group end-date">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa-solid fa-calendar-days"></i></span>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control datetimepicker check_out_date"
                                                    name="check_out_date" placeholder="Check Out" 
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="container">
                                        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                    href="#pills-stay" role="tab" aria-controls="pills-stay"
                                                    aria-selected="true">Stay</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                    href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                    aria-selected="false">Event</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                    href="#pills-contact" role="tab" aria-controls="pills-contact"
                                                    aria-selected="false">Entertainment</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            {{-- TabStay --}}
                                            <div class="tab-pane fade show active" id="pills-stay" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <button type="button" class="btn btn-primary btn-add_room"
                                                            data-toggle="modal" data-target="#RoomModal">Select Room <i
                                                                class="fa-solid fa-plus"></i></button>
                                                        <table id="room"
                                                            class="table table-bordered table-hover table-room">
                                                            <thead class="thead-room">
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Room</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col" style="width: 20px"><i
                                                                            class="fa-solid fa-trash"></i></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody-room">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- Tent --}}
                                                    <div class="col-md-4">
                                                        <button type="button" class="btn btn-primary btn-add_tent"
                                                            data-toggle="modal" data-target="#tent-modal">Select Tent <i
                                                                class="fa-solid fa-plus"></i></button>
                                                        <table id="table-tent" class="table table-bordered table-room">
                                                            <thead class="thead-room">
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">name</th>
                                                                    <th scope="col">Type</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col" style="width:20px"><i
                                                                            class="fa-solid fa-trash"></i></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="place_camping text-center">
                                                            <label for="" style="margin-top: 5px">Place
                                                                Camping</label>
                                                            {{-- <input class="form-control" type="text" name="" id=""> --}}
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card board1 fill remaining-cp">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-4 qty_place">
                                                                                {{-- <h3 class="card_widget_header qty_available"> </h3> --}}
                                                                                {{-- <h6 class="text-muted">Remaining</h6> --}}
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <input class="check_pace"
                                                                                            type="checkbox"
                                                                                            name="place_camping"
                                                                                            id="">
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <input type="number"
                                                                                            min="1"
                                                                                            class="form-control input_place"
                                                                                            placeholder="How Many"
                                                                                            name="place_camping">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">.2.</div>
                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                                aria-labelledby="pills-contact-tab">.3.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary submit-all"data-toggle="modal"
                                data-target="#custommer-info">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="custommer-info" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Information Custommer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Name" name="name"
                                            aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa-solid fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="phone"
                                                name="phone" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Make Booking</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="RoomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All Room Active</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Bed</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-room-modal">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary selectRoom">Select Room</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tent-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All Tent Active</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                        </thead>
                        <tbody class="tbody_tent_modal"></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary selectTent">Select Tent</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        let booked_code = Math.floor((Math.random() * 1000000) + 1);
        var room_data = [];
        var tent_data = [];
        var room_id_arr = [];
        var tent_id_arr = [];
        // console.log(tent_data);
        
        $(document).ready(function() { 
            $(".btn-add_room").click(function() {
                const check_in_date = $(".check_in_date").val() , check_out_date = $(".check_out_date").val();
                    $.ajax({
                    type: "GET",
                    url: '/room?date_in=' + check_in_date + '&date_out=' + check_out_date,
                    success: function(data, status) {
                        console.log("data-room", data);
                        var tboby = $('.tbody-room-modal');
                        tboby.empty();
                        data.forEach(function(element) {
                            var tr =
                                `<tr>
                        <td id="td-check"><input type="checkbox" data-room="${element.id}" class="form-check-input clickBox" style="width:20px; height:20px"/></td>
                        <td> ${element.name}</td>
                        <td> ${element.type} </td>
                        <td> ${element.bed} </td>
                        <td> ${element.price} </td>
                    </tr>`
                            tboby.append(tr);

                        });
                        $(".clickBox").click(function() {
                            var room_id = $(this).attr('data-room');
                            if ($(this).is(":checked") == true) {
                                room_id_arr.push(room_id);
                            }
                            if ($(this).is(":checked") == false) {
                                var indexuncheck = room_id_arr.findIndex(indexUncheck);

                                function indexUncheck(roomId) {
                                    return roomId == room_id;
                                }
                                room_id_arr.splice(indexuncheck, 1);
                            }
                        });
                    }
                });
            })
            $("#code-random").val(booked_code);
            $(".selectRoom").click(function() {
                $.ajax({
                    type: "GET",
                    url: '/select-room?room=' + room_id_arr,
                    data: room_id_arr,
                    success: function(data, status) {
                        // console.log("data",data);
                        data.forEach(function(element) {
                            var indexuncheck = room_data.findIndex(function(room) {
                                return element.id == room.id;
                            });
                            // console.log('123', room);
                            if (indexuncheck < 0) {
                                // console.log(indexuncheck);
                                room_data.push(element);
                            }
                        });
                        console.log('room-data', room_data);
                        render_room_table(room_data);
                    }
                });
                $('#RoomModal').modal('toggle');
                $(".clickBox").prop("checked", false);
            });
            $(".btn-add_tent").click(function() {
                const check_in_date = $(".check_in_date").val() , check_out_date = $(".check_out_date").val();
                $.ajax({
                    type: "GET",
                    url: '/get-tent?date_in=' + check_in_date + '&date_out=' + check_out_date,
                    // data: tent_id_arr,
                    success: function(data, status) {
                        console.log('tent', data);
                        data.forEach(function(element) {
                            var tboby = $('.tbody_tent_modal');
                            tboby.empty();
                            data.forEach(function(tent) {
                                var tr =
                                    `<tr>
                                <td><input type="checkbox" data-tent="${tent.id}" class="form-check-input tent_checkbox"
                                    style="width:20px; height:20px; margin-left:0.5rem;"/></td>
                                <td> ${tent.name}</td>
                                <td> ${tent.type}</td>
                                <td> ${tent.price} </td>
                            </tr>`
                                tboby.append(tr);
                            });
                            $(".tent_checkbox").click(function() {
                                var tent_id = $(this).attr('data-tent');
                                if ($(this).is(":checked") == true) {
                                    tent_id_arr.push(tent_id);
                                }
                                if ($(this).is(":checked") == false) {
                                    var indexuncheck = tent_id_arr.findIndex(indexUncheck);

                                    function indexUncheck(tentId) {
                                        return tentId == tent_id;
                                    }
                                    tent_id_arr.splice(indexuncheck, 1);
                                }
                            });
                        });
                    }
                });
            })
            $(".selectTent").click(function() {
                $.ajax({
                    type: "GET",
                    url: '/select-tent?tent=' + tent_id_arr,
                    data: tent_id_arr,
                    success: function(data, status) {
                        data.forEach(function(element) {
                            var indexuncheck = tent_data.findIndex(function(tent) {
                                return element.id == tent.id;
                            });
                            if (indexuncheck < 0) {
                                tent_data.push(element);
                            }
                        });
                        console.log('tent-data', tent_data);
                        render_tent_table(tent_data);
                    }
                });
                $('#tent-modal').modal('toggle');
                $(".tent_checkbox").prop("checked", false);
            });
            
            $(".check_pace").change(function() {
                var check_in_date = $(".check_in_date").val() , check_out_date = $(".check_out_date").val();
                if (this.checked) {
                    $('.input_place').show();
                    $('.qty_place').show();
                    $.ajax({
                    type: "GET",
                    url: '/get-place_camping?date_in=' + check_in_date + '&date_out=' + check_out_date,
                    success: function(data, status) {
                        var qty_available = $('.qty_place');
                        qty_available.empty();
                            var qty = ` <h3 class="card_widget_header">${data}</h3>
                                        <h6 class="text-muted">Remaining</h6> `
                        qty_available.append(qty);
                    }
                });
                } else {
                    $('.input_place').hide();
                    $('.qty_place').hide();
                }
            });
        });
        function remove_room(room_id) {
            var index = room_data.findIndex(function(room) {
                return room_id == room.id
            });
            var index_room_id_arr = room_id_arr.findIndex(function(room) {
                return room_id == room.id
            });
            room_data.splice(index, 1);
            room_id_arr.splice(index, 1);
            render_room_table(room_data);
        }

        function render_room_table(room_data_render) {
            var tboby = $('#room tbody');
            tboby.empty();
            room_data_render.forEach(function(element) {
                // console.log("each",room_data_render);
                var tr =
                    `<tr>
                <td>${element.id} <input type="hidden" name="room_ids[]" value="${element.id}"/></td>
                <td> ${element.room_number}</td>
                <td> ${element.room_name} </td>
                <td> ${element.price} </td>
                <td> <i class="fa-solid fa-trash remove_room_from_append" style="cursor:pointer;" onclick="remove_room(${element.id})"></i></td>
             </tr>`
                tboby.append(tr);
            });
        }

        function render_tent_table(tent_data_render) {
            var tboby = $('#table-tent tbody');
            tboby.empty();
            tent_data_render.forEach(function(tent) {
                // console.log("each",room_data_render);
                var tr =
                    `<tr>
                <td>${tent.id} <input type="hidden" name="tent_ids[]" value="${tent.id}"/></td>
                <td> ${tent.type}</td>
                <td> ${tent.price} </td>
                <td> <i class="fa-solid fa-trash remove_room_from_append" style="cursor:pointer;" onclick="remove_tent(${tent.id})"></i></td>
             </tr>`
                tboby.append(tr);
            });
        }

        function remove_tent(tent_id) {
            var index = tent_data.findIndex(function(tent) {
                return tent_id == tent.id
            });
            var index_tent_id_arr = tent_data.findIndex(function(tent) {
                return tent_id == tent.id
            });
            tent_data.splice(index, 1);
            tent_id_arr.splice(index_tent_id_arr, 1);
            render_tent_table(tent_data);
        }
    </script>
@endsection
