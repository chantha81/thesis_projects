@extends('admin.layout')
@section('content')
<style>
    .page-body{
        margin-top: 50px;
    }
    .table_reservation{
        text-align: center;
    }
    .reservation_body{
        margin-top: 8px;
    }
    .room{
        padding-top: 2px;
        padding-bottom: 2px;
        border-radius: 4px;
        background-color: rgb(115, 182, 237);
    }
    .room h6{
        margin-top: 5px;
    }
    .pc{
        margin-left: 10px;
        margin-top:10px;
    }
    .info_res{
        background-color: rgb(223, 243, 236);
        border-radius: 4px;
    }
    .info_res h5{
        margin-top: 4px;
    }
</style>
<div class="page-wrapper page-body">
    <div class="content container-fluid detail_body">
        <div class="row">
            <div class="col-md-12 text-center">
                <h5>Detail For : {{ $customer_info[0]->name; }}</h5>
                <h5><i class="fa-solid fa-phone"></i>  {{ $customer_info[0]->phone; }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center info_res">
                <h5>Information Reservation</h5>
            </div>
        </div>
        <div class="row reservation_body">
            <div class="col-md-4">
                <div class="text-center room">
                    <h6>Room</h6>
                </div>
                
                <table class="table table-bordered">
                    <thead class="table_reservation">
                      <tr>
                        <th scope="col" style="width: 1rem;">N°</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Bed</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                        @foreach ($rooms as $key => $room)
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->type }}</td>
                                    <td>{{ $room->bed }}</td>
                                    <td>{{ $room->price }}</td>  
                                </tr>
                            </tbody>
                        @endforeach
                  </table> 
            </div>
            <div class="col-md-4">
                <div class="text-center room">
                    <h6>Tent</h6>
                </div>
                <table class="table table-bordered">
                    <thead class="table_reservation">
                      <tr>
                        <th scope="col" style="width: 1rem;">N°</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tents as $key =>$tent)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $tent->name }}</td>
                                <td>{{ $tent->type }}</td>
                                <td>{{ $tent->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table> 
            </div>
            <div class="col-md-4">
                <div class="text-center room">
                    <h6>Place Camping</h6>
                </div>
                <div class="row">
                    <div class="col-md-12 pc">
                        <h5>Quantity : {{ $quantity_place_camping[0]->quantity }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection