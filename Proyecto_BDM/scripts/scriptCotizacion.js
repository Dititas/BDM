document.addEventListener("DOMContentLoaded", function () {
    var btnAdd = document.getElementById("buttonCotizar");
    var btnConfirmNew = document.querySelector('#newCotModal .btn-primary');
    var btnCancelNew = document.querySelector('#newCotModal .btn-secondary');

    btnAdd.addEventListener("click", function () {
        $('#newCotModal').modal('show');
    });

    btnCancelNew.addEventListener('click', function () {
        $('#newCotModal').modal('hide');
    });

    btnConfirmNew.addEventListener('click', function () {
        alert("Lista creada satisfactoriamente");
        $('#newCotModal').modal('hide');
    });

    var btnConfirmEdit = document.querySelector('#editWLModal .btn-primary');
    var btnCancelEdit = document.querySelector('#editWLModal .btn-secondary');

    btnConfirmEdit.addEventListener('click', function () {
        console.log("Botón de editar clickeado");
        alert("Lista editada satisfactoriamente");
        $('#editWLModal').modal('hide');
    });
    
    btnCancelEdit.addEventListener('click', function () {
        console.log("Botón de cancelar edición clickeado");
        $('#editWLModal').modal('hide');
    });
    
});

function confirmDelete(listName) {
    if (confirm('¿Estás seguro de que quieres eliminar la lista ' + listName + '?')) {
        // Aquí puedes poner la lógica para eliminar la lista
        alert('Lista eliminada');
    }
}

function editList(listName, listDescription) {
    // Llenar el modal con los datos de la lista
    $('#editWLModal .modal-title').text('Editar Lista: ' + listName);
    $('#editWLModal #editListName').val(listName);
    $('#editWLModal #editListDescription').val(listDescription);
    
    // Abrir el modal
    $('#editWLModal').modal('show');
}
