<?php
include("php/database.php");
$sysMessages = "Нет системных сообщений";
// --------------------------------- Добавление пользователей
//Функция добавления пользователей
function addlist($titlezam, $desczam, $deadline,$statuszam, $connect)
{
    $add = $connect->query("INSERT INTO all_list (id, titlezam, desczam, deadline, statuszam) VALUES  (NULL, '$titlezam', '$desczam', '$deadline', '$statuszam')");
    if($add){$GLOBALS['sysMessages'] = "Добавлен новый пользователь"; } else{ $GLOBALS['sysMessages'] = "Ошибка добавления";}
}

//Если было добавление пользователя, то занести все данные в базу
if($_POST['add'])
{
    $titlezam = $_POST['titlezam'];
    $desczam = $_POST['desczam'];
    $deadline = $_POST['deadline'];
    $statuszam = $_POST['statuszam'];
    if ($_POST['desczam']="" && $_POST['deadline']="" && $_POST['statuszam']) {
        addlist($titlezam, NULL, NULL, NULL, $connect);
    }
    if ($_POST['desczam']="" && $_POST['deadline']="" ) {
        addlist($titlezam, NULL, NULL, $statuszam, $connect);
    }
    if ($_POST['desczam']="" ) {
        addlist($titlezam, NULL,$deadline, $statuszam, $connect);
    }
    else {
        addlist($titlezam, $desczam, $deadline, $statuszam, $connect);
    }
    
}
// --------------------------------- Вывод информации и удаление 
function printList($connect)
{
    $list = $connect->query("SELECT * FROM all_list" );
    //засовываем все записи в ассоциативный массив и перебираем их
    print '<section class="todolist"><div class="row listall">';
    while(($row = $list->fetch_assoc()) != FALSE){
        $id = $row['id'];
        $desczamogr = mb_substr($row['desczam'], 0,300, 'UTF-8');
        $titleogr = mb_substr($row['titlezam'], 0,50, 'UTF-8');
        echo '<div class="col-12 col-md-4 col-lg-4"><div class="card">
        <div class="card-header">',
        "<h5 style='width:80%;'>".$titleogr."</h5>",
        '<div style="float: right;">',
        '<div class="card-header_edit">';
        echo '
              <form class="postonelist">
                <input type="hidden" name="id" class="printid" value="'.$id.'">
                <input name="openedit" type="submit" value="&nbsp" title="Редактировать" data-toggle="modal" data-target="#editmodal">
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
        "<p class='card-text ' id='desczam121'>".$desczamogr."</p>";
        
        if ($row['deadline']!="") {
            echo '<div class="badges">',
            "<a href='#' class='btn btn-secondary'><div class='badges-timeicon'></div>",
            "<div class='badges-time'>".$row['deadline']."</div></a>",
            '</div>';
        }
        if ($row['statuszam']!="") {
            echo "<div class='badges'><a href='#' class='btn btn-info'>".$row['statuszam']."</a></div>"; //Изменить
        }
        echo '</div></div></div>';
    }
    echo "</div></div></section>";
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
if ($_POST['updatelistall'])
{
    $titlezam = $_POST['titlezam'];
    $desczam = $_POST['desczam'];
    $deadline = $_POST['deadline'];
    $statuszam = $_POST['statuszam'];
    $update_sql = "UPDATE all_list SET titlezam='$titlezam', desczam='$desczam', deadline='$deadline', statuszam='$statuszam' WHERE id='$id'";
    
}
//вывод системных сообщений
// echo "<p style='color: darkgreen; font-size: 18px;'>".$sysMessages."</p>" ;
?>