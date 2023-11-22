var btnAdd = document.getElementById("btnAddProduct");
var btnCancelNew = document.querySelector('#addProductModal .btn-secondary');
const name = document.getElementById('nameInput');
const description = document.getElementById('descriptionInput');
const image = document.getElementById('foto');
const quotation = document.getElementById('productQuotation');
const price = document.getElementById('priceInput');
const quantityAvailable = document.getElementById('quantityInput');

document.addEventListener("DOMContentLoaded", function () {


    btnAdd.addEventListener("click", function () {
        $('#addProductModal').modal('show');
    });

    btnCancelNew.addEventListener('click', function () {
        $('#addProductModal').modal('hide');
    });

    const btnUpload = document.getElementById('addProductButton');

    window.onload = function () {
        btnUpload.disabled = true;
    }

    setInterval(function () {
        activateBtn();
    }, 500);

    function activateBtn() {
        if (validatePicture()) {
            btnUpload.disabled = false;
        } else {
            btnUpload.disabled = true;
        }
    }


    (function () {

        const formAddWL = document.getElementById('addProductForm');
        formAddWL.onsubmit = function (e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('name', name.value);
            formData.append('description', description.value);
            formData.append('image', image.files[0]);
            formData.append('quotation', quotation.options[quotation.selectedIndex].value);
            formData.append('price', price.value);
            formData.append('quantityAvailable', quantityAvailable.value);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '../backend/controllers/addProduct.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        console.log(xhr);
                        if (xhr.response) {
                            try {
                                let res = JSON.parse(xhr.response);
                                if (res.success !== true) {
                                    alert(res.msg);
                                } else {
                                    alert(res.msg);
                                    name.value = "";
                                    description.value = "";
                                    $('#addProductModal').modal('hide');

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

    /*var btnConfirmEdit = document.querySelector('#editWLModal .btn-primary');
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
*/
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

function validatePicture() {
    const message = document.getElementById('textWarningFile');
    const files = image.files;
    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (files.length === 0) {
        message.innerText = "Debe colocar una imagen"
        return false;
    } else {
        if (!allowedExtensions.test(image.value)) {
            message.innerText = "EL archivo seleccionado no es una imagen válida";
            return false;
        } else {
            message.innerText = "";
            return true;
        }
    }
}