<?php
require_once "require/headerACP.php";
require_once "require/mysql.php";
?>

<button class="btn btn-primary btn-add" type="button" data-toggle="modal" data-target="#add-modal"><span class="glyphicon glyphicon-plus"></span></button>

<div class="container">
    <div class="grid">
        <?php

        $sql = "SELECT * FROM jobs";
        $result = $mysqli->query($sql) or die($mysqli->error);

        while ($row = $result->fetch_assoc()) {

            $name = $row["name"];
            $needed = $row["needed"];
            $description = $row["description"];

            $sql_member = "SELECT * FROM members WHERE job = '$name' ORDER BY id";
            $result_member = $mysqli->query($sql_member) or die($mysqli->error);

            $color = "color-green";

            $remaining_members = $needed - $result_member->num_rows;

            if ($result_member->num_rows == $needed) {
                $color = "color-red";
            }

            echo '<div class="grid-item '.$color.'">';
            echo '<button class="delete_job" type="button" data-toggle="delete-job-modal"
                      data-target="#delete-job-modal" data-job="'.$name.'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span ></button >';
            echo '<h2>' . $name . '</h2>';
            echo '<p>' . $description . '</p>';
            echo '<hr><ul>';
            while ($row_member = $result_member->fetch_assoc()) {
                echo '<li>' . $row_member["name"] . '<a class="btn btn-default btn-xs" aria-label="Left Align" href="actions/delete-action.php?job='.$name.'&name='.$row_member["name"].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>';
            }
            for ($i = 0; $i < $remaining_members; $i++) {
                echo '<li><i>Noch nicht vergeben</i><a class="btn btn-default btn-xs" aria-label="Left Align" href="#" disabled="disabled"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>';
            }
            echo '</ul><hr>';
            if ($result_member->num_rows == $needed) {
                echo '<button class="btn btn-default btn-block" type="button" disabled="disabled">Eintragen <span class="glyphicon glyphicon-edit" aria-hidden="true"></span ></button >';
            } else {
                echo '<button class="btn btn-default btn-block" type="button" data-toggle="modal"
                      data-target="#modal" data-job="'.$name.'">Eintragen <span class="glyphicon glyphicon-edit" aria-hidden="true"></span ></button >';
            }
            echo "</div>";
        }
        ?>
    </div>
</div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Für Job eintragen</h4>
            </div>
            <form action="actions/register-action.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Vor -und Nachname:</label>
                        <input type="text" class="form-control" name="name" placeholder="Max Mustermann">
                    </div>
                    <input type="hidden" id="modal-job" name="job">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary">Eintragen</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Neuen Job hinzufügen</h4>
            </div>
            <form action="actions/addJob-action.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Jobname:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Beschreibung:</label>
                        <textarea class="form-control" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Anzahl der Teilnehmer:</label>
                        <input type="number" name="quantity" min="1" max="99">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary">Job hinzufügen</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="delete-job-modal" tabindex="-1" role="dialog" aria-labelledby="delete-job-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Soll der Job wirklich gelöscht werden?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Nein</button>
                <a href="#" id="delete-job-button" class="btn btn-primary">Ja</a>
            </div>
        </div>
    </div>
</div>


<?php
require_once "require/javascript.php";
echo "<script src='js/grid.js'></script>";
require_once "require/footer.php";
?>
