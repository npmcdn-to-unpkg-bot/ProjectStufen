<?php
require_once "require/header.php";
require_once "require/db.php";
?>

<h1>Test</h1>

<div class="container">
    <div class="grid">
        <?php
        new MySQLDB("localhost", "root", "hBdapd223VPuazrmVK5Q", "stufen", "3306", "utf8") . connect();
        $mysql = MySQLDB::getInstance();
        $jobs = $mysql->getJobs();


        while ($row = $jobs->fetch_assoc()) {

            $name = $row["name"];
            $needed = $row["needed"];
            $description = $row["description"];

            $members = $mysql->getMembers($name);
            $color = "";
            if (mysqli_num_rows($members) >= $needed) {
                $color = "grid-item color-green";
            } else {
                $color = "grid-item color-red";
            }
            echo '<div class="' . $color . '">';
            echo '<h2>' . $name . '</h2>';
            echo '<p>Braucht: ' . $needed . ' Personen</p>';
            echo '<p>' . $description . '</p>';
            echo '<hr><ul>';
            while ($row2 = $members->fetch_assoc()) {
                echo '<li>' . $row2["name"] . '</li>';
            }
            echo '</ul><hr>';
            echo '<button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#modal"
                    data-job="Job 1" > Eintragen <span class="glyphicon glyphicon-edit" aria-hidden="true" ></span >
            </button >';'
        </div >

    </div >
</div > ';
        }
        ?>
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

