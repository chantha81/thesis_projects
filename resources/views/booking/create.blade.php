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
                <div class = 'row'>
                    <div class= "col-md-6">
                        <div class = 'row'>
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
                        </div>
                    <div class= "col-md-6">
                    <button type="button" class="btn btn-primary">Add Room</button>
                    <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                </tr>
                            </tbody>
                            </table>
                    </div>

                </div>
                    <div class="row formtype">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Arrival Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" name = "arrival_date" placeholder="Check In">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Depature Date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" name = "depature_date" placeholder="Check Out"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row formtype">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name = "name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Aduls</label>
                                <input  type="number" name ="aduls" min="1" class="form-control" placeholder="Aduls">
                            </div>
                        </div>
                    </div>
                    <div class="row formtype">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="room_name">Ph.Number</label>
                                <input  type="text" name ="phone" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Place Camping</label>
                                <input class="form-control" type="text" name = "place_camping" placeholder="Place Camping">
                            </div>
                        </div>
                    </div>
                    <div class="row formtype">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tent</label>
                                <input class="form-control" type="text" name = "tent_id" placeholder="Tent">
                            </div>
                        </div>
                    </div>
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                               
                                {!! Form::label('room_id', 'Room') !!}
                                {!! Form::select('room_id', $rooms,null , array('class'=>'form-select', 'class'=>'form-control')) !!}

                               
                            </div>
                        </div> -->
                        
                       
                        <div class = 'col-md-12'>
                            <button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
                            <a class="btn btn-primary buttonedit" href="{!! url('/all_room')!!}">Back</a>
                        </div>
                    
                    
                </form>
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