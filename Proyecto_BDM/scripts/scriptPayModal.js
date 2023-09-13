
document.addEventListener("DOMContentLoaded", function () {
    var btnBuy = document.getElementById("btnBuy");

    btnBuy.addEventListener("click", function () {
        $('#buyModal').modal('show');
    });

    var btnCancel = document.querySelector('#buyModal .btn-secondary');

    btnCancel.addEventListener('click', function () {
        $('#buyModal').modal('hide');
    });

    var btnConfirm = document.querySelector('#buyModal .btn-primary');

    btnConfirm.addEventListener('click', function () {
        alert("Compra satisfactoria");
        $('#buyModal').modal('hide');
    });
});
