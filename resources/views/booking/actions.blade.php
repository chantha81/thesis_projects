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
</style>

<a href="/package-edit/{{$id}}" data-toggle="tooltip" data-original-title="Edit">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="/delete/{{ $id }}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete">
    <i class="fa-solid fa-trash-can"></i>
</a>
<div class="dropdown" style="float:right;">
    <i class="fa-solid fa-sliders dropbtn"></i>
    <div class="dropdown-content">
        <a href="#"><i class="fa-solid fa-eye"></i> Detail Booking</a>
    </div>
</div>

    