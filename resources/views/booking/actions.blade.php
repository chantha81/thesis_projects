
<script type="text/javascript">
  $(document).ready(function(){
    var booking_id;
    $('.add_paid').click(function () {
      // console.log(table.page);
      var booking_ids = $(this).attr('data-paid');
      var id = {{ $id }};
      if (booking_ids==id) {
        booking_id = (booking_ids=id);
        // console.log(booking_id,'id');
        $.ajax({
          type: "GET",
          url: '/getstatus?booking_id=' + booking_id,
          success: function(data, status) {
            // console.log(data);
            if (data[0].status == 'Pending') {
              $("#add_paid").modal("show");
              // console.log(status,'st');
            } else if (data[0].status == "Success"){
              $("#mssuccess").modal("show");
            } else if (data[0].status == "Confirmed"){
              $("#msconfirm").modal("show");
            }
            $('.paid-btn').click(function(){    
                var booking_id = data[0].id;
                var paid = $('.paid_input').val(); 
                  $.ajax({
                  type: "GET",
                  url: '/paid_booking?booking_id=' + booking_id + '&paid=' + paid,
                  success: function(data, status) {   
                    if (data == true) {
                      $('.notpaid').show();
                      setTimeout(function() { $(".notpaid").hide(); }, 4000);
                    } else {
                      $("#add_paid").modal("hide");
                      Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your work has been saved",
                        showConfirmButton: false,
                        timer: 1500
                      });
                    }
                  }
              }); 
            });
          }
        })
        booking_id = '';
      } //endif
    });
    $(".add_payment").click(function () {
      var booking_ids = $(this).attr('data-pay');
      var id = {{ $id }};
      if (booking_ids==id) {
        booking_id = (booking_ids=id);
        $.ajax({
          type: "GET",
          url: '/getstatus?booking_id=' + booking_id,
          success: function(data, status, resp) {
            if (data[0].status == 'Confirmed') {
              booking_id  = data[0].id;
              $.ajax({
                  type: "GET",
                  url: '/payment_booking?booking_id=' + booking_id,
                  success: function(data, status) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Payment Success",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
              });
              // $("#payment").modal("show");
            } else if (data[0].status == "Pending"){
              $("#payconfirm").modal("show");
            } else if (data[0].status == "Success"){
              $("#mssuccess").modal("show");
            }
          }
        });
      booking_id = '';
      } //end if
    });
    $('.cancel_booking').click(function () {
      var booking_ids = $(this).attr('data-id');
      var id = {{ $id }};
      if (booking_ids==id) {
        booking_id = (booking_ids=id);
        $.ajax({
          type: "GET",
          url: '/getstatus?booking_id=' + booking_id,
          success: function(data, status, resp) {
            if (data[0].status == 'Confirmed') {
              $("#modal_notcancel").modal("show");
            } else if (data[0].status == "Success"){
              $("#modal_notcancel_suc").modal("show");
            } else if (data[0].status == 'Pending'){
              var booking_id = data[0].id;
              $.ajax({
                  type: "GET",
                  url: '/cancel_booking?booking_id=' + booking_id,
                  success: function(data, status) {
                }
              });
            }  
          }
        });
      booking_id = '';
      } //end if
    });

});

</script>

<style>
    .dropbtn {
      color: rgb(90, 90, 246);
      margin-left: -2rem;
      /* padding: 10px; */
      font-size: 16px;
      border: none;
      cursor: pointer;
    }
    
    .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      right: 0;
      /* min-width: 160px; */
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown-content a:hover {background-color: #f1f1f1;}
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
  .action_booking{
    color: rgb(90, 90, 246);
    cursor: pointer;
  }
</style>

<a href="/package-edit/{{$id}}" data-toggle="tooltip" data-original-title="Edit">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="#" class="print-invoice" data-toggle="modal" data-toggle="tooltip" data-id="{{ $id }}" data-target="#MyModal">
  <i class="fa-solid fa-print"></i>
</a>

<div class="dropdown">
  <i class="fa-solid fa-sliders action_booking" data-toggle="dropdown" data-action-id="{{$id}}"></i>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/detail_booking/{{$id}}">
        <i class="fa-solid fa-eye"></i> Detail Booking
      </a>
      <a class="dropdown-item add_paid" href="#" data-toggle="modal" data-paid="{{$id}}">
        <i class="fa-solid fa-check"></i> Confirm Booking
      </a>
      <a class="dropdown-item add_payment" href="#" data-toggle="modal" data-pay="{{$id}}">
        <i class="fa-solid fa-dollar-sign"></i> Payment
      </a>
      <a class="dropdown-item cancel_booking" href="#" data-toggle="modal" data-id="{{$id}}">
        <i class="fa-solid fa-ban"></i> Cancel Booking
      </a>
    </div>
</div>

{{-- paid --}}
<div class="modal fade in" id="add_paid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paid</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-danger notpaid" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Can't Paid Excess</strong>
      </div>
      <div class="alert alert-danger confirm" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>This booking has confirm</strong>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger show-ms" style="display:none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>This Booking Has Confirm</strong>
        </div>
        <div class="input-group mb-3 input_paid">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" class="form-control paid_input">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary paid-btn">Paid</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mssuccess">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-danger" style="width: 100%">
          <strong>This booking has successfully</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="msconfirm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-danger" style="width: 100%">
          <strong>This booking has confirm allready</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>
{{-- payment --}}
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-danger notpayment" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Can't Payment Excess Amount</strong>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="text" class="form-control payment_input">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary payment-btn">Payment</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="payconfirm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-warning" style="width: 100%">
          <strong>Please confirm befor payment</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_notcancel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-danger" style="width: 100%">
          <strong>Can't cancel this booking has confirmed</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_notcancel_suc">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-danger" style="width: 100%">
          <strong>Can't cancel this booking has success</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>

{{-- modal print --}}

  <div id="MyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-lg">
      
      <!-- Modal Content: begins -->
      <div class="modal-content">
         
        <div class="modal-body">
          <div class="body-message">
            <div id="invoice-POS">
              <center id="top">
                <div>
                  <img src="assets/img/logo-raduis.png" alt="" width="50" height="50" srcset="">
                </div>
                <div class="info"> 
                  <h2>CampingPack</h2>
                  <div id="date"></div>
                </div><!--End Info-->
                
              </center><!--End InvoiceTop-->
              
              <div id="mid">
                <div class="info_c">
                </div>
              </div><!--End Invoice Mid-->
              <div id="bot">  
                    <div id="table">
                      <p class="p_item">Room</p>
                        <table id="room_invice">
                            <thead>
                              <tr>
                                <th>N°</th>
                                <th>Name</th>
                                <th>type</th>
                                <th>bed</th>
                                <th>price</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <p class="p_item">Tent</p>
                        <table id="tent_invice">
                          <thead>
                            <tr>
                              <th>N°</th>
                              <th>Name</th>
                              <th>type</th>
                              <th>price</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                    </div><!--End Table-->
                    <p class="p_item">Place Camping</p>
                    <div class="row p_cam">
                      <div class="col-3">Qty :</div>
                      <div class="col-3">Price :</div>
                      <div class="col-3">Total Price :</div>
                    </div>

                    <div id="total" style="color: white !importain"><p class="p_item">Total :</p></div>
                    
                    <div id="legalcopy">
                        <p class="legal"><strong>Thank you for Come Campingpark!</strong>
                        </p>
                    </div>
                </div><!--End InvoiceBot-->
            </div>
          </div>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
         <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button id="btnPrint" type="button" class="btn btn-default">Print</button>
        </div>
      </div>
      <!-- Modal Content: ends -->

    </div>
</div>
<script>
</script>
<style>
.p_item{
  background-color: #222;
  color: white !important;
  padding: 2px;
}


#date{
  margin-top:1rem;
}
  @media screen {
    #printSection {
        display: block;
    }
  }
  
  @media print {
    body * {
      visibility:hidden;
    }
    #printSection, #printSection * {
      visibility:visible;
    }
    #printSection {
      position:absolute;
      left:0;
      top:0;
    }
  }
  
  
    @media print {
      .page-break { display: block; page-break-before: always; }
  }
        #invoice-POS {
    box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
    padding: 2mm;
    margin: 0 auto;
    width: 80mm;
    background: #FFF;
  }
  #invoice-POS ::selection {
    background: #f31544;
    color: #FFF;
  }
  #invoice-POS ::moz-selection {
    background: #f31544;
    color: #FFF;
  }
  #invoice-POS h1 {
    font-size: 1.5em;
    color: #222;
  }
  #invoice-POS h2 {
    font-size: .9em;
  }

  #invoice-POS h3 {
    font-size: 1.2em;
    font-weight: 300;
    line-height: 2em;
  }
  #invoice-POS p {
    font-size: .7em;
    color: #666;
    line-height: 1.2em;
  }
  #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
    /* Targets all id with 'col-' */
    border-bottom: 1px solid #EEE;
  }
  #invoice-POS #top {
    min-height: 100px;
  }
  /* #invoice-POS #mid {
    min-height: 80px;    //old
  } */
  #invoice-POS #mid {
    height: auto;
  }
  #invoice-POS #mid p{
    margin-bottom: 5px;
  }
  #invoice-POS #bot {
    min-height: 50px;
  }
  #invoice-POS .clientlogo {
    float: left;
    height: 60px;
    width: 60px;
    background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
    background-size: 60px 60px;
    border-radius: 50px;
  }
  #invoice-POS .info {
    display: block;
    margin-left: 0;
  }
  #invoice-POS .title {
    float: right;
  }
  #invoice-POS .title p {
    text-align: right;
  }
  #invoice-POS table {
    width: 100%;
    border-collapse: collapse;
  }
  #invoice-POS .tabletitle {
    font-size: .5em;
    background: #EEE;
  }
  #invoice-POS .service {
    border-bottom: 1px solid #EEE;
  }
  #invoice-POS .item {
    width: 24mm;
  }
  #invoice-POS .itemtext {
    font-size: .5em;
  }
  #invoice-POS #legalcopy {
    margin-top: 5mm;
    width: auto;
  }
  #room_invice thead{
    font-size: .5em;
    background: #EEE;
  }
  #room_invice tbody{
    font-size: .5em;
  }
  #tent_invice thead{
    font-size: .5em;
    background: #EEE;
  }
  #tent_invice tbody{
    font-size: .5em;
  }
  /* #tent_invice {
    margin-top: 5px;
  } */
  .p_cam{
    font-size: 10px;
    padding: 3px;
    margin-left: -5px;
  }
  </style>
  


<script>
  window.console = window.console || function(t) {};
</script>
  
<script type="text/javascript">
  $(document).ready(function () {
    var booking_id;
    var room_data = [];
    var customer_data = [];
    var tent_data =[];
    var place_camping_qty;
    var place_camping_unit_price;
    // var i = 1;
    var total_p;
    $('.print-invoice').click(function () {
      var booking_ids = $(this).attr('data-id');
      var id = {{ $id }};
      if (booking_ids==id) {
        booking_id = (booking_ids=id);
        $.ajax({
          type: "GET",
          url: '/invice?booking_id=' + booking_id,
          success: function(data, status) { 
            console.log(data,'data');
            total_p = data.data.total;
            data.data.room.forEach(r => {
              var indexhas = room_data.findIndex(function(room_id) {
                  return r.id == room_id.id;
                });
                if (indexhas < 0) {
                room_data.push(r);
              }
            });
            render_room_table(room_data);
            data.data.customer_info.forEach(ci => {
              console.log(ci);
              var indexhas = customer_data.findIndex(function(ci_id) {
                  return ci.id == ci_id.id;
                });
                if (indexhas < 0) {
                  customer_data.push(ci);
              }   
            });
            render_customer(customer_data);
            data.data.tent.forEach(t => {
              var indexhas = tent_data.findIndex(function(tent_id) {
                  return t.id == tent_id.id;
                });
                if (indexhas < 0) {
                tent_data.push(t);
              }
            })
            render_tent_table(tent_data);
            if (data.data.data_place.length === 2) {
              place_camping_qty = data.data.data_place[0];
              place_camping_unit_price = data.data.data_place[1];
              place(place_camping_qty,place_camping_unit_price);
            }
            
            var total = $('#total');
            total.empty();
            var p_total = `<p class="p_item"> Total : ${total_p} $</p>`
            total.append(p_total);
          }
        });
      }
    });
  });
  function render_customer(ci_data) {
    var info = $('.info_c');
    var date = $('#date');
    info.empty();
    date.empty();
    ci_data.forEach(function (customer) {
      var c_info = ` <h2>Customer Info</h2>
      <p>
      Name: ${customer.name} <br>
      Phone: ${customer.phone}
    </p>`
    var date_in  = customer.check_in_date;
    var date_out = customer.check_out_date;
    var from_date = formatDate(date_in);
    var to_date   = formatDate(date_out);
    var date_info = ` <p style="float: left;">Form Date: ${from_date} </p> <p>To Date: ${to_date}</p> `
    info.append(c_info);
    date.append(date_info);
    });
  }
  function formatDate(date) {
    var date_new = new Date(date);
      var d = date_new.getDate();
      var m =  date_new.getMonth();
      m += 1;  // JavaScript months are 0-11
      var y = date_new.getFullYear();
      return (d + "." + m + "." + y);
  }
  function render_room_table(room_data_render) {
      var tboby = $('#room_invice tbody');
      var i = 1;
      tboby.empty();
      var subtotal = [];
      room_data_render.forEach(function(element) {
        subtotal.push(element.price);
          var tr = `<tr>
          <td>${i++}</td>
          <td>${element.name} <input type="hidden" name="room_ids[]" value="${element.id}"/></td>
          <td> ${element.type} </td>
          <td> ${element.bed} </td>
          <td> ${element.price} $</td>
        </tr>`
          tboby.append(tr);
      });
      var sub_total = 0;
      for (var i in subtotal) {
        sub_total += subtotal[i];
      }
      var td = $('#room_invice tbody');
      var v_td = `<td colspan="5" style="background-color:#EEE;padding:5px"> RoomTotal: ${sub_total} $</td>`
      td.append(v_td);
      

  }
  function render_tent_table(tent_data_render) {
    var tboby = $('#tent_invice tbody');
      var i = 1;
      tboby.empty();
      var subtotal = [];
      tent_data_render.forEach(function(element) {
        subtotal.push(element.price);
          var tr = `<tr>
          <td>${i++}</td>
          <td>${element.name} <input type="hidden" name="room_ids[]" value="${element.id}"/></td>
          <td> ${element.type} </td>
          <td> ${element.price} $</td>
        </tr>`
          tboby.append(tr);
      });
      var sub_total = 0;
      for (var i in subtotal) {
        sub_total += subtotal[i];
      }
      var td = $('#tent_invice tbody');
      var v_td = `<td colspan="4" style="background-color:#EEE;padding:5px"> TentTotal: ${sub_total} $</td>`
      td.append(v_td);
  }
  function place(qty,unit_prices) {
    console.log(unit_prices.unit_price);
    var p = $('.p_cam');
    var total = qty.quantity * unit_prices.unit_price;
    p.empty();
    var p_result = `<div class="row p_cam">
                      <div class="col-sm-3">Qty : ${qty.quantity}</div>
                      <div class="col-sm-3">Price : ${unit_prices.unit_price}</div>
                      <div class="col-sm-3">Total Price : ${total}</div>
                    </div>
                    `
    p.append(p_result);
  }
</script>

<script>
    document.getElementById("btnPrint").onclick = function () {
      printElement(document.getElementById("invoice-POS"));
  }
  
  function printElement(elem) {
      var domClone = elem.cloneNode(true);
      
      var $printSection = document.getElementById("printSection");
      
      if (!$printSection) {
          var $printSection = document.createElement("div");
          $printSection.id = "printSection";
          document.body.appendChild($printSection);
      }
      
      $printSection.innerHTML = "";
      $printSection.appendChild(domClone);
      window.print();
  }
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


    