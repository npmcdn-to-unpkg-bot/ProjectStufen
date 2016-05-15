<?php
require_once "require/header.php";
?>

<button class="btn btn-primary btn-add" type="button" data-toggle="modal" data-target="#add-modal"><span class="glyphicon glyphicon-plus"></span></button>

<div class="container">
    <div class="grid">
        <div class="grid-item color-red">
            <h2>Job 1</h2>
            <p>Kurze Beschreibung des Jobs?</p>
            <hr>
            <ul>
                <li>Max Mustermann<a class="btn btn-default btn-xs" aria-label="Left Align" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
                <li>Max Mustermann<a class="btn btn-default btn-xs" aria-label="Left Align" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
                <li>Max Mustermann<a class="btn btn-default btn-xs" aria-label="Left Align" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
                <li>Max Mustermann<a class="btn btn-default btn-xs" aria-label="Left Align" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
                <li>Max Mustermann<a class="btn btn-default btn-xs" aria-label="Left Align" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
                <li>Max Mustermann<a class="btn btn-default btn-xs" aria-label="Left Align" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
            </ul>
            <hr>
            <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#modal" data-job="Job 1">Eintragen <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
        </div>

        <div class="grid-item color-green">
            <h2>Job 2</h2>
            <p>Kurze Beschreibung des Jobs?</p>
            <hr>
            <ul>
                <li><i>Noch nicht vergeben</i><a class="btn btn-default btn-xs" aria-label="Left Align" href="#" disabled="disabled"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
                <li><i>Noch nicht vergeben</i><a class="btn btn-default btn-xs" aria-label="Left Align" href="#" disabled="disabled"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
                <li><i>Noch nicht vergeben</i><a class="btn btn-default btn-xs" aria-label="Left Align" href="#" disabled="disabled"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
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
                        <textarea class="form-control" name="beschreibung"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Anzahl der Teilnehmer:</label>
                        <input type="number" name="quantity" min="1" max="99">
                    </div>
                    <input type="hidden" id="modal-job" name="job">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary">Job hinzufügen</button>
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
