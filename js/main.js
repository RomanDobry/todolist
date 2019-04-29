var deadline = new Datepicker('#deadline')
var deadline2 = new Datepicker('#deadline2')
var deadline3 = new Datepicker('.deadline21')
$(function(){
    $(".postonelist").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "php/show.php",
            data: $(this).serialize(),
            success: function(html){
                $('#selectonelist').html(html);
            }
        });
    });
});
$(function(){
    $(".updatelist").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "php/update.php",
            data: $(this).serialize(),
            success: function(){
                $('#editmodal').modal('hide');

            }
        });
    });
});
$('.edittextareaopis').on('input', function(e) {
    this.style.height = '1px';
    this.style.height = (this.scrollHeight) + 'px'; 
});

$('.cancel_add').click(function(){
    $(this).find("input").val("");
    $('#addlist').modal('hide');
    $("#addlist").reset();
});

$(function testing(){
    var id=$('#idshow').val();
    console.log(id);
    var printid=$('.printid').val();
    });
    
