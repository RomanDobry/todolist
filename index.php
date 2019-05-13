<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link id="favicon" rel="icon" type="image/png" sizes="64x64" href="../img/favicon.png">
    <link rel="mask-icon" href="../img/favicon.svg" color="#0079BF">
    <link rel="stylesheet" href="css/datepicker.material.css">
</head>
<body>
    <div class="header">
        <div class="container-fluid">
                <div class="logotip">
                    <a href="/"><div class="logo"></div></a>
                </div>
                <a href="/"><h1>To Do List</h1></a>
        </div>
    </div>
    <?php require_once ('php/function.php');?>
    <section class="namedosk">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h3>Задания по университету</h3>
                </div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addlist">Создать заметку</button>
                </div>
            </div>
        </div>
    </section>
    <?php printList($connect);?>
    <!-- <input type="text" id='test'>
    <p class="ptest"></p> -->
    <!-- Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method='POST' class="updatelist">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content" id="selectonelist"></div>
            </div> 
        </form>
         
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addlist" tabindex="-1" role="dialog" aria-labelledby="addlist" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title">Добавление новой заметки</h3>
                <!-- <textarea class="mod-card-back-title js-card-detail-title-input" dir="auto" style="overflow: hidden; overflow-wrap: break-word; height: 32px;">Позвонить в ПХ</textarea> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body addzametiki">
                <form method="post">
                <input type="text" name="titlezam" placeholder="Заголовок *" required>
                <textarea name="desczam" placeholder="Описание заметки"></textarea>
                <input type="text" name='deadline' class="deadline" placeholder='Крайний срок'>
                <select  name="statuszam">
                <option disabled selected>Статус заметки</option>
                <option value="В ожидании">В ожидании</option>
                <option value="В работе">В работе</option>
                <option value="Выполнено">Выполнено</option>
                </select>
                </div>
                <div class="modal-footer">
                <input type="submit" name="add" value="Добавить в базу" class="btn btn-success" >
                <button type="button" class="btn btn-danger cancel_add">Отменить</button>
                </div>
                </form>
            </div>
        </div>  
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/main.js"></script>
    <?php
 //закрываем соединение с БД
 $connect->close();
 ?>
</body>
</html>