<?php
//Подключаемся к БД Хост, Имя пользователя MySQL, его пароль, имя нашей базы
$connect = new mysqli("127.0.0.1", "root", "", "todolist" );

//Кодировка данных получаемых из базы
$connect->query("SET NAMES 'utf8' ");
$sysMessages = "Нет системных сообщений";
// --------------------------------- Добавление пользователей
//Функция добавления пользователей
function addUser($titlezam, $desczam, $datezam, $connect)
{
    $add = $connect->query("INSERT INTO all_list (id, titlezam, desczam, datezam) VALUES  (NULL, '$titlezam', '$desczam', $datezam)");
    if($add){$GLOBALS['sysMessages'] = "Добавлен новый пользователь"; } else{ $GLOBALS['sysMessages'] = "Ошибка добавления";}
}

//Если было добавление пользователя, то занести все данные в базу
if($_POST['add'])
{
    $titlezam = $_POST['titlezam'];
    $desczam = $_POST['desczam'];
    $datezam = $_POST['datezam'];
    addUser($titlezam, $desczam, $datezam, $connect);
}
// --------------------------------- Вывод информации и удаление

function printList($connect)
{
    $list = $connect->query("SELECT * FROM all_list");
    $num = 0;
    //засовываем все записи в ассоциативный массив и перебираем их
    echo '<section class="todolist"><div class="row">';
    while(($row = $list->fetch_assoc()) != FALSE){
        $id = $row['id'];
        echo '<div class="col-12 col-md-4 col-lg-4"><div class="card"><div class="card-header">',
        "<h5>".$row['titlezam']."</h5>",
        '<div style="float: right;">',
        '<div class="card-header_edit">';
        echo '
              <form method="get">
                <input type="hidden" name="id" value="'.$id.'">
                <input name="red" type="submit" value="&nbsp" title="Редактировать">
              </form>
        ';
        echo'</div>', // Кнопка редактирвоания
        '<div class="card-header_del">';
        echo '
              <form method="get">
                <input type="hidden" name="id" value="'.$id.'">
                <input name="del" type="submit" value="&nbsp" title="Удалить заметку">
              </form>
        ';
        echo '</div>',  //кнопка удаления пользователя
        '</div></div>',
        '<div class="card-body">',
        "<p class='card-text'>".$row['desczam']."</p>",
        '<div class="badges">',
        "<a href='#' class='btn btn-secondary'><div class='badges-timeicon'></div>",
        "<div class='badges-time'>".$row['datezam']."</div></a>",
        '</div>',
        "<div class='badges'><a href='#' class='btn btn-info'>В работе</a></div>", //Изменить
        '</div></div></div>';
    }
    echo "</div></div>";
}

// отслеживаем нажатие кнопки удаления и удалаем пользователя по id
if($_GET['del']){
    $id = $_GET['id'];
    $del = $connect->query("DELETE FROM all_list WHERE id = $id");
    if($del){
        $GLOBALS['sysMessages'] = "Пользователь удален. <a href='/'>Обновить Страницу</a>";
    }else{
        $GLOBALS['sysMessages'] = " Ошибка удаления";
    }
}
//вывод системных сообщений
// echo "<p style='color: darkgreen; font-size: 18px;'>".$sysMessages."</p>" ;
?>