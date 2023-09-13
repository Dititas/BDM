
document.addEventListener("DOMContentLoaded", function () {
    var btnAdd = document.getElementById("addWL");

    btnAdd.addEventListener("click", function () {
        $('#newWLModal').modal('show');
    });

    var btnCancel = document.querySelector('#newWLModal .btn-secondary');

    btnCancel.addEventListener('click', function () {
        $('#newWLModal').modal('hide');
    });

    var btnConfirm = document.querySelector('#newWLModal .btn-primary');

    btnConfirm.addEventListener('click', function () {
        alert("Lista creada satisfactoriamente");
        $('#newWLModal').modal('hide');
    });

});
