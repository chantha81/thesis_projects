
<script type="text/javascript">
  $(document).ready(function(){
    var booking_id;
    $('.add_paid').click(function () {
      var booking_ids = $(this).attr('data-paid');
      var id = {{ $id }};
      if (booking_ids==id) {
        booking_id = (booking_ids=id);
        $.ajax({
          type: "GET",
          url: '/getstatus?booking_id=' + booking_id,
          success: function(data, status) {
            if (data[0].status == 'Pending') {
              $("#add_paid").modal("show");
              console.log(status);
            } else if (data[0].status == "Success"){
              $("#mssuccess").modal("show");
            } else if (data[0].status == "Confirmed"){
              $("#msconfirm").modal("show");
            }
            $('.paid-btn').click(function(){    
                var booking_id = data[0].id, paid = $('.paid_input').val(); 
                  $.ajax({
                  type: "GET",
                  url: '/paid_booking?booking_id=' + booking_id + '&paid=' + paid,
                  success: function(data, status) {   
                    if (data == true) {
                      $('.notpaid').show();
                      setTimeout(function() { $(".notpaid").hide(); }, 4000);
                    } else {
                      $("#add_paid").modal("hide");
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
              $("#payment").modal("show");
            } else if (data[0].status == "Pending"){
              $("#payconfirm").modal("show");
            } else if (data[0].status == "Success"){
              $("#mssuccess").modal("show");
            }
            $('.payment-btn').click(function(){
              var payment = $('.payment_input').val(), booking_id  = data[0].id;
              $.ajax({
                  type: "GET",
                  url: '/payment_booking?booking_id=' + booking_id + '&payment=' + payment,
                  success: function(data, status) { 
                    if (data == true) {
                      $('.notpayment').show();
                      setTimeout(function() { $(".notpayment").hide(); }, 4000);
                    } else {
                      $("#payment").modal("hide");
                    }
                }
              });
            });
          }
        });
      booking_id = '';
      } //end if
    });
    $('cancel_booking').click(function () {
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
            }  
          }
        });
      booking_id = '';
      } //end if
    })
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
<a href="/delete/{{ $id }}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete">
    <i class="fa-solid fa-trash-can"></i>
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



    