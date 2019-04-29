<?php
include("../php/database.php");
    $onelist = $connect->query("SELECT * FROM all_list WHERE id = ".$_REQUEST['id']);
    while(($row = $onelist->fetch_assoc()) != FALSE){
        echo '<div class="modal-header">';
        echo '<input type="hidden" id="idshow" name="id" value="'.$row['id'].'">';
        print '<textarea name="titlezam" class="mod-card-back-title js-card-detail-title-input">'.$row['titlezam'].'</textarea>';
        echo '
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">';
        echo '<textarea  name="desczam" id="desczam12" class="edittextareaopis" placeholder="Описание">'.$row["desczam"].'</textarea>';
        echo '<input type="date" name="deadline" id="deadline2" class="deadline21" placeholder="Крайний срок" value="'.$row["deadline"].'">';
        echo '
        <select name="statuszam" id="statusnode">';
        if($row["statuszam"] == "Выполнено")
        {
            echo '
            <option disabled>Статус заметки</option>
            <option value="В ожидании">В ожидании</option>
            <option value="В работе">В работе</option>
            <option selected value="Выполнено">Выполнено</option></select>'; 
        }
        if($row["statuszam"] == "В ожидании")
        {
            echo '
            <option disabled>Статус заметки</option>
            <option selected value="В ожидании">В ожидании</option>
            <option value="В работе">В работе</option>
            <option value="Выполнено">Выполнено</option></select>'; 
        }
        if($row["statuszam"] == "В работе")
        {
            echo '
            <option disabled>Статус заметки</option>
            <option  value="В ожидании">В ожидании</option>
            <option selected value="В работе">В работе</option>
            <option value="Выполнено">Выполнено</option></select>'; 
        }
        if($row["statuszam"] == "")
        echo '
            <option disabled selected>Статус заметки</option>
            <option  value="В ожидании">В ожидании</option>
            <option value="В работе">В работе</option>
            <option value="Выполнено">Выполнено</option></select>';

        echo '
        <div class="modal-footer">
                <button type="submit" name="updatelistall" class="btn btn-success">Сохранить</button>
                <button type="button" class="btn btn-danger">Отменить</button>
                </div>';
    }
?>