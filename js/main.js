var deadline = new Datepicker('.deadline');
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
                var id=$('#idshow').val(); //получаю значение ID из модульного окна
                var namefind =$("#titlezammodal").val(); //получаю значение title из модульного окна
                var deskfind =$("#descriptionmodal").val(); //получаю значение Описания из модульного окна
                var statusfind =$("#statusnode").val(); //получаю значение Состояние из модульного окна
                var deadlinefind =$("#deadlinenode").val(); //получаю значение Состояние из модульного окна
                posttitle=$("#titlelist-"+id).text(namefind); // передаю значение в нужную мне карточку
                postdescript=$("#desclist-"+id).text(deskfind); // передаю значение в нужную мне карточку
                postdedline=$("#deadlinelist-"+id).text(deadlinefind); // передаю значение в нужную мне карточку
                poststatus=$("#statuslist-"+id).text(statusfind); // передаю значение в нужную мне карточку
                

            }
        });
    });
});
$('.edittextareaopis').on('input', function(e) {
    this.style.height = '1px';
    this.style.height = (this.scrollHeight) + 'px'; 
});
// function myFunc() {
//     let  newElem = document.createElement( "div" );
//     let  adda = document.createElement( "a" );
//     let  timeicon = document.createElement( "div" );
//     let  deadlined = document.createElement( "div" );
//     var id=$('#idshow').val(); //получаю значение ID из модульного окна
//     iddesczam=document.getElementById('card-body-'+id);
//     newElem.classList.add("badges");
//     iddesczam.appendChild( newElem );
//     newElem.appendChild(adda);
//     adda.classList.add("btn", "btn-secondary"); 
//     adda.appendChild(timeicon);
//     timeicon.classList.add("badges-timeicon");
//     adda.appendChild(deadlined);
//     deadlined.classList.add("badges-time");
//     const text = document.createTextNode( "Mybutton" ); // создаем текстовое содержимое
//     deadlined.appendChild( text ); // добавляем текстовое содержимое элементу <button>
//   }
  

$('.cancel_add').click(function(){
    $(this).find("input").val("");
    $('#addlist').modal('hide');
    $("#addlist").reset();
}); 
