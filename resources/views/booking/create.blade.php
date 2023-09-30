@extends('admin.layout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-md-12 header-titile bg-light text-dark">
                        <h4><i class="fa-solid fa-circle-plus"></i>   Add Booking</h4>
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
                                                <input type="text" class="form-control form-control datetimepicker"
                                                    name="arrival_date" placeholder="Check In" aria-label="Username"
                                                    aria-describedby="basic-addon1">
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
                                                <input type="text" class="form-control form-control datetimepicker"
                                                    name="depature_date" placeholder="Check Out" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="btn-submit">
                                            <button type="" class="btn btn-primary find">Search    <i class="fa-solid fa-magnifying-glass"></i></button>
                                            {{-- <a class="btn btn-primary buttonedit" href="{!! url('/all_booking')!!}" style= "margin-left:10px;">Back</a> --}}
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="tap-cate">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item tap-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#home">Stay</a>
                                                </li>
                                                <li class="nav-item tap-item">
                                                    <a class="nav-link" data-toggle="tab" href="#menu1">Event</a>
                                                </li>
                                                <li class="nav-item tap-item">
                                                    <a class="nav-link" data-toggle="tab" href="#menu2">Entertainment</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div id="home" class="container tab-pane active"><br><br>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <button type="button" class="btn btn-primary btn-add_room"
                                                            data-toggle="modal" data-target="#exampleModal">Add <i
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Place Camping</label>
                                                            <input class="form-control" type="text" name="place_camping"
                                                                placeholder="Place Camping">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tent</label>
                                                            <input class="form-control" type="text" name="tent_id"
                                                                placeholder="Tent">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="menu1" class="container tab-pane fade"><br>
                                                <h3>Menu 1</h3>
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                    ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                            <div id="menu2" class="container tab-pane fade"><br>
                                                <h3>Menu 2</h3>
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                    accusantium doloremque laudantium, totam rem aperiam.</p>
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
                                    {{-- <button type="submit" class="btn btn-primary submit-all">Submit</button> --}}
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
                                                <input type="text" class="form-control" placeholder="Name"
                                                    name="name" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="fa-solid fa-phone"></i></span>
                                                    </div>
                                                    <input type="phone" class="form-control" placeholder="phone"
                                                        name="phone" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <th scope="col">Room</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        @foreach ($rooms as $room)
                            <tbody class="tbody-room-modal">
                                <tr>
                                    <td class="text-center" id="td-check"><input type="checkbox" data-room="{{ $room->id }}"
                                            class="form-check-input clickBox"
                                            style="width:20px; height:20px"></td>
                                    <td>{{ $room->room_number }}</td>
                                    <td>{{ $room->room_name }}</td>
                                    <td>{{ $room->price }}</td>
                                    <td>{{ $room->status }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary addRoom">Add Room</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        let booked_code = Math.floor((Math.random() * 1000000) + 1);
        var room_data = [];
        $(document).ready(function() {
            $("#code-random").val(booked_code);
            var room_id_arr = [];
            $(".clickBox").click(function() {
                // console.log('checked', checked);
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


            $(".addRoom").click(function() {
                // console.log(room_data);
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
                            console.log('123', room);
                            if (indexuncheck < 0) {
                                // console.log(indexuncheck);
                                room_data.push(element);
                            }
                        });
                        console.log('room-data', room_data);
                        render_room_table(room_data);
                    }
                });
                $('#exampleModal').modal('toggle');
                $(".clickBox").prop("checked", false);
            });
        });

        function remove_room(room_id) {
            var index = room_data.findIndex(function(room) {
                return room_id == room.id
            });
            room_data.splice(index, 1);
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
    </script>
@endsection
