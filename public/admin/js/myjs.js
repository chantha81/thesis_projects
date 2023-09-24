
$(function () {
    $('.datetimepicker').datetimepicker({
        format:'YYYY/MM/DD',
        icons:{
            up:"fa fa-angle-up",
            down:"fa fa-angle-down",
            next:'fa fa-angle-right',
            previous:'fa fa-angle-left'
        }
    }); 
});
$(function () {
    $('#myModal').on('btn-add_room', function () {
        $('#myInput').trigger('focus')
    })
})


