$('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: 325,
    gutter: 50,
    isFitWidth: true
});

$('#modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var job = button.data('job');
    var modal = $(this);
    modal.find('.modal-title').text('Für Job "' + job + '" eintragen');
    //modal.find('.modal-job').text = job;
    document.getElementById("modal-job").value = job;
});


$('#delete-job-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var job = button.data('job');
    var modal = $(this);
    modal.find('.modal-title').text('Soll der Job "' + job + '" wirklich gelöscht werden?');
    document.getElementById("delete-job-button").href = "actions/delete-job-action.php?job=" + job;
});