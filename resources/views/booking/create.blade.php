@extends('admin.layout')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">Add Booking</h3> </div>
            </div>
        </div>
        @if(Session::has('book_created'))
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
                <form enctype="multipart/form-data" name="package-create-form" id="add-blog-post-form" action="{{url('/booking_store')}}" method="post">
                @csrf
                <div class = "row">
                    <div class= "col-md-6">
                        <div class = "row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arrival Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" name = "arrival_date" placeholder="Check In">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Depature Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name = "depature_date" placeholder="Check Out"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class ="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name = "name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="room_name">Phone</label>
                                    <input  type="text" name ="phone" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class= "row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tent</label>
                                    <input class="form-control" type="text" name = "tent_id" placeholder="Tent">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Place Camping</label>
                                    <input class="form-control" type="text" name = "place_camping" placeholder="Place Camping">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary buttonedit ml-4">Save</button>
                            <a class="btn btn-primary buttonedit" href="{!! url('/all_room')!!}" style= "margin-left:10px;">Back</a>
                        </div>
                    </div>
                    <div class= "col-md-6">
                        <button type="button" class="btn btn-primary btn-add_room" data-toggle="modal" data-target="#exampleModal" style= "margin-bottom:10px; margin-top:-20px;">Add Room</button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>    
                    <!-- <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('room_id', 'Room') !!}
                            {!! Form::select('room_id', $rooms,null , array('class'=>'form-select', 'class'=>'form-control')) !!}
                        </div>
                    </div> -->  
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">All Room Active</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Room</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    @foreach($rooms as $room)
                        <tbody>
                            <tr>
                            
                                <td><input type="checkbox" value="{{$room->id}}" class="form-check-input" id="check_10" style="width:20px; height: 20px;"></td>
                                <td>{{$room->room_number}}</td>
                                <td>{{$room->room_name}}</td>
                                <td>{{$room->price}}</td>
                                <td>{{$room->status}}</td>
                                
                            </tr>
                            
                        </tbody>
                    @endforeach
                </table> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Room</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
    $("#test").click(function(){
    alert('123');
  }); 
});
</script>
@endsection