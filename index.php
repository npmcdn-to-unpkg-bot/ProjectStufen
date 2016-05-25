<?php
require_once "require/header.php";
require_once "require/mysql.php";
?>

<!-- Navigation -->

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Project Stufen</a>
	    <a class="navbar-brand" href="https://github.com/jhdv/ProjectStufen">OpenSource: GitHub</a>

        </div>
    </div>
</nav>

<!-- Navigation ENDE -->

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
            echo '<h2>' . $name . '</h2>';
            echo '<p>' . $description . '</p>';
            echo '<hr><ul>';
            while ($row_member = $result_member->fetch_assoc()) {
                echo '<li>' . $row_member["name"] . '</li>';
            }
            for ($i = 0; $i < $remaining_members; $i++) {
                echo '<li><i>Noch nicht vergeben</i></li>';
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Für Job eintragen</h4>
            </div>
            <form action="actions/register-action.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Vor -und Nachname:</label>
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


<?php
require_once "require/javascript.php";
echo "<script src='js/grid.js'></script>";
require_once "require/footer.php";
?>

