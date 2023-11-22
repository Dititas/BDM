const checkPass = document.getElementById('privacySelect');

document.addEventListener("DOMContentLoaded", function () {
    var btnAdd = document.getElementById("addWL");
    var btnCancelNew = document.querySelector('#newWLModal .btn-secondary');
    btnAdd.addEventListener("click", function () {
        $('#newWLModal').modal('show');
    });

    btnCancelNew.addEventListener('click', function () {
        $('#newWLModal').modal('hide');
    });

    const name = document.getElementById('listName');
    const description = document.getElementById('listDescription');
    //const listImg = document.getElementById('listImage');

    (function () {

        const formAddWL = document.getElementById('addWLForm');
        formAddWL.onsubmit = function (e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('name', name.value);
            formData.append('description', description.value);
            //formData.append('listImage', listImg.textContent);
            formData.append('isPublic', checkPass.checked ? 1 : 0);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '../backend/controllers/addWishLists.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        if (xhr.response) {
                            try {
                                let res = JSON.parse(xhr.response);
                                if (res.success != true) {
                                    alert(res.msg);
                                    return;
                                } else {
                                    alert(res.msg);
                                    name.value = "";
                                    description.value = "";
                                    $('#newWLModal').modal('hide');
                                    return;
                                }
                            } catch (error) {
                                console.error("Error parsing JSON: ", error);
                            }
                        } else {
                            console.error("Server response is empty");
                        }
                    } else {
                        console.error("Error in AJAX request: " + xhr.status);
                    }
                }
            }

            xhr.send(formData);
        }

    })();

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


function toggleInput(){
	if(checkPass.checked){
		return true;
	}else{
		return false;
	}
}
