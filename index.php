<?php
require_once "require/header.php";
?>

<div class="container">
    <div class="grid">
        <div class="grid-item color-green">
            <h2>Job 1</h2>
            <p>Kurze Beschreibung des Jobs?</p>
            <hr>
            <ul>
                <li>Name Vorname</li>
                <li>Name Vorname</li>
                <li>Name Vorname</li>
                <li>Name Vorname</li>
                <li>Name Vorname</li>
                <li>Name Vorname</li>
                <li>Name Vorname</li>
                <li>Name Vorname</li>
                <li>Name Vorname</li>
            </ul>
            <hr>
            <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#modal" data-job="Job 1">Eintragen <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
        </div>

    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Für Job eintragen</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Vor -und Nachname:</label>
                        <input type="text" class="form-control" id="name" placeholder="Max Mustermann">
                    </div>
                    <input type="hidden" class="modal-job" id="job">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                <button type="button" class="btn btn-primary">Eintragen</button>
            </div>
        </div>
    </div>
</div>


<?php
require_once "require/javascript.php";
echo "<script src='js/grid.js'></script>";
require_once "require/footer.php";
?>

