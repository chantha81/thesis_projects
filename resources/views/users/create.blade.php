@extends('admin.layout')
@section('content')
<style>
#show_hide_password, a:hover{
  
}
.eye{
    text-align: center;
    width: 30px;
    background-color: #669999
}
.upload{
    width: 70px;
}


</style>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-md-12 header-titile bg-light text-dark">
                        <h4><i class="fa-solid fa-user"></i> Create Staff</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}" style="padding-left: 0;"><i
                                class="fa-solid fa-users"></i> Lists </a>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong>Something went wrong.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(array('route' => 'users.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
            <div class="row">
                <div class="col-md-3 body_iamge">
                    <h5>Image Staff</h5>
                    <div class="row" style="margin-left: 10px">
                        <div class="image">
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;margin-left:60px">
                       <div class="file btn btn-lg btn-primary divup"><i class="fa-solid fa-upload"></i>  Upload
                            <input type="file" name="staff_img" class="input_img">
                            {{-- <label for="">upload image</label> --}}
                       </div>
							             
                    </div>
                    
                </div>
                
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h4> Staff Infomation </h4>
                        </div>
                    </div>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-6">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-6">
                            <select name="gender" id="" class="form-control">
                                <option value="" disabled selected hidden>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-6">
                            <input type="text" name="address" class="form-control" placeholder="Adress">
                        </div>
                        <div class="col-md-6">
                            <select name="role[]" id="" value="[]" class="form-control">
                                <option value="" disabled selected hidden>Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role}}">{{$role}} </option> 
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="row" style="margin-top:30px">
                        <div class="col-md-6">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" name="confirm-passord" type="password" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
<script>
   $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
    $('#form').on('submit', function(e){
        e.preventDefault();

        var form = this;
        $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:new FormData(form),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(form).find('span.error-text').text('');
            },
            success:function(data){
                if(data.code == 0){
                    $.each(data.error, function(prefix,val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $(form)[0].reset();
                    // alert(data.msg);
                    fetchAllProducts();
                }
            }
        });
    });
    //Reset input file
    $('input[type="file"][name="staff_img"]').val('');
    //Image preview
    $('input[type="file"][name="staff_img"]').on('change', function(){
        var img_path = $(this)[0].value;
        var img_holder = $('.image');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

        if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                if(typeof(FileReader) != 'undefined'){
                    img_holder.empty();
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100%;'}).appendTo(img_holder);
                    }
                    img_holder.show();
                    $('.image').css("background-image",'');
                    reader.readAsDataURL($(this)[0].files[0]);
                }else{
                    $(img_holder).html('This browser does not support FileReader');
                }
        }else{
            $(img_holder).empty();
        }
    });
}); 
</script>
@endsection
   {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> --}}