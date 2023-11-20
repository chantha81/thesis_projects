@extends('admin.layout')
@section('content')
{{-- {{dd($data)}} --}}
<div class="page-wrapper">
  <div class="content container-fluid">
    <div class="page-header">
      <div class="row align-items-center">
          <div class="col-md-12 header-titile bg-light text-dark">
              <h4><i class="fa-solid fa-file-lines"></i> Report</h4>
          </div>
      </div>
  </div>
  <div class="div_form_search">
    <button class="btn btn-primary btn_search"><i class="fa-solid fa-up-long"></i> Show form </button>
    <button class="btn btn-primary btn_hide"><i class="fa-solid fa-down-long"></i> Hide form </button>
    <form action="" id="frm_search" method="GET">
      <div class="row">
        <div class="col-md-6">
          <input type="text" class="form-control search_date d_from datetimepicker" placeholder="form date" name="d_from" value="">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control search_date d_to datetimepicker" placeholder="to date" name="d_to" value="">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"><button class="btn btn-success btn_submit" style="margin: 10px 0 10px 10px">submit</button></div>
      </div>
    </form>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <table id="tReport" class="table-hover table table-bordered text-center" style =" top:20px; ">
    <thead>
      <tr id="trhead">
        <th>Name</th>
        <th>Phone</th>
        <th>Check In Date</th>
        <th>Check Out Date</th>
        <th>Book Advance</th>
        <th>Total</th>
        <th>Unpaid</th>
        <th>Status</th> 
        <th>Date</th> 
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table> 
  </div>
</div>

<script type="text/javascript">


 
  $(document).ready(function () {

    var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};
  // var d_from = getUrlParameter('d_from');
  // var d_to = getUrlParameter('d_to');
  // var table ;

    $('#frm_search').hide();
    $('.btn_search').click(function () {
      $('#frm_search').show();
    });
    $('.btn_hide').click(function () {
      $('#frm_search').hide();
    });
    $('.btn_submit').click(function () {
      // const d_from = $('.d_from').val();
      // var d_to = $('.d_to').val();
      
    })
  });

  let d_from = $('.d_from').val();
  $(function () {
    table = $('#tReport').DataTable({
      paging: true,
      processing: true,
      serverSide: true,
      columnDefs: [
        {targets: [2, 3,8], render: DataTable.render.datetime('Do MMM YYYY')},
        {targets: [0,1,2,3,7], className: "text-center", width: "15%"},
        {targets: [8], className: "text-center", width: "15%"},
        {targets: [4], className: "text-center", width: "10%"},
        {
        targets: 7,
          render: function(status, type, row, meta) {
            if (status == 'Pending') {
            status = '<td><span class="pending status">' + status + '</span></td>'
            } else if (status == 'Confirmed') {
            status = '<td><span class="approved status">' + status + '</span></td>'
            } else if (status == 'Reject') {
            status = '<td><span class="rejected status">' + status + '</span></td>'
            } else if (status == 'Success') {
            status = '<td><span class="success status">' + status + '</span></td>'
            }
            return status;
          }
        },
        {width: 90, targets:[4, 5, 6],className: "text-center"}	
      ],
      dom: 'Bfrtip',
      lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
      buttons: [
        'pageLength', 'csv', 'excel'
      ],
      
      ajax: `{{url("report")}}` ,
      columns: [
        {data: 'name', name: 'name'},
        {data: 'phone', name: 'phone'},
        {data: 'check_in_date', name: 'check_in_date'},
        {data: 'check_out_date', name: 'check_out_date'},
        {data: 'book_advance', name: 'book_advance',render: $.fn.dataTable.render.number( ',', '.', 2)},
        {data: 'total_price', name: 'total_price',render: $.fn.dataTable.render.number( ',', '.', 2)},
        {data: 'balance', name: 'balance',render: $.fn.dataTable.render.number( ',', '.', 2)},
        {data: 'status', name: 'status'},
        {data: 'created_at', name: 'created_at'},
      ]
    });
  });

</script>
@endsection