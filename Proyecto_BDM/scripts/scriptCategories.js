document.addEventListener("DOMContentLoaded", function () {
    var btnAdd = document.getElementById("addWL");
    var btnCancelNew = document.querySelector('#newWLModal .btn-secondary');

    const name = document.getElementById('CategoryName');
    const description = document.getElementById('CategoryDescription');
    const userOwner = document.getElementById('userIdInput');


    btnAdd.addEventListener("click", function () {
        $('#newWLModal').modal('show');
    });

    btnCancelNew.addEventListener('click', function () {
        $('#newWLModal').modal('hide');
    });

    (function () {
        const formAddCategory = document.getElementById('addCategoryForm');
        formAddCategory.onsubmit = function (e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('name', name.value);
            formData.append('description', description.value);
            formData.append('userOwner', userOwner.textContent);

            let xhr = new XMLHttpRequest();
            xhr.open('POST', '../backend/controllers/addCategory.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        if (xhr.response) {
                            try {
                                let res = JSON.parse(xhr.response);
                                if (res.success !== true) {
                                    alert(res.msg);
                                } else {
                                    alert(res.msg);
                                    name.value = "";
                                    description.value = "";
                                    userOwner.textContent = "";
                                    $('#newWLModal').modal('hide');

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
        // Example AJAX request to edit a category
        $.ajax({
            url: 'path_to_your_php_controller/modifyCategory.php', // Update the path accordingly
            type: 'POST',
            data: {
                id: 'category_id', // Replace with the actual category ID
                name: $('#editListName').val(),
                description: $('#editListDescription').val(),
                isEnable: 'true' // You may need to get this value dynamically
            },
            success: function (response) {
                console.log("Category edited successfully");
                alert(response.msg); // Show a success message
                $('#editWLModal').modal('hide');
            },
            error: function () {
                console.log("Error editing category");
                alert('Error editing category'); // Show an error message
            }
        });
    });

    btnCancelEdit.addEventListener('click', function () {
        console.log("Botón de cancelar edición clickeado");
        $('#editWLModal').modal('hide');
    });
});

function confirmDelete(categoryName, categoryId) {
    if (confirm('¿Estás seguro de que quieres eliminar la categoría ' + categoryName + '?')) {
        // Example AJAX request to delete a category
        $.ajax({
            url: 'path_to_your_php_controller/deleteCategory.php', // Update the path accordingly
            type: 'POST',
            data: {
                id: categoryId // Replace with the actual category ID
            },
            success: function (response) {
                alert(response.msg); // Show a success message
                // Perform any additional actions after deletion
            },
            error: function () {
                alert('Error deleting category'); // Show an error message
            }
        });
    }
}

function editCategory(categoryId, categoryName, categoryDescription) {
    // Llenar el modal con los datos de la lista
    $('#editWLModal .modal-title').text('Editar Categoría: ' + categoryName);
    $('#editWLModal #editListName').val(categoryName);
    $('#editWLModal #editListDescription').val(categoryDescription);

    // Set the category ID as a data attribute in the modal for later use
    $('#editWLModal').data('categoryId', categoryId);

    // Abrir el modal
    $('#editWLModal').modal('show');
}

// Additional function to handle category modification after editing
function saveEditedCategory() {
    var categoryId = $('#editWLModal').data('categoryId');

    // Example AJAX request to save the edited category
    $.ajax({
        url: 'path_to_your_php_controller/modifyCategory.php', // Update the path accordingly
        type: 'POST',
        data: {
            id: categoryId,
            name: $('#editListName').val(),
            description: $('#editListDescription').val(),
            isEnable: 'true' // You may need to get this value dynamically
        },
        success: function (response) {
            console.log("Category edited successfully");
            alert(response.msg); // Show a success message
            $('#editWLModal').modal('hide');
        },
        error: function () {
            console.log("Error editing category");
            alert('Error editing category'); // Show an error message
        }
    });
}



// Agregar una categoría
function addCategory(name, description, userOwner) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/controllers/addCategory.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                if (xhr.response) {
                    try {
                        let res = JSON.parse(xhr.response);
                        if (res.success !== true) {
                            alert(res.msg);
                        } else {
                            alert(res.msg);
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

    var data = 'name=' + encodeURIComponent(name) + '&description=' + encodeURIComponent(description) + '&userOwner=' + encodeURIComponent(userOwner);
    xhr.send(data);
}

// Agregar un producto a una categoría
function addProductInCategory(idProduct, idCategory) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/controllers/addProductInCategory.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                if (xhr.response) {
                    try {
                        let res = JSON.parse(xhr.response);
                        if (res.success !== true) {
                            alert(res.msg);
                        } else {
                            alert(res.msg);
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

    var data = 'idProduct=' + encodeURIComponent(idProduct) + '&idCategory=' + encodeURIComponent(idCategory);
    xhr.send(data);
}

// Modificar una categoría
function modifyCategory(id, name, description, isEnable) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/controllers/modifyCategory.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                if (xhr.response) {
                    try {
                        let res = JSON.parse(xhr.response);
                        if (res.success !== true) {
                            alert(res.msg);
                        } else {
                            alert(res.msg);
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

    var data = 'id=' + encodeURIComponent(id) + '&name=' + encodeURIComponent(name) + '&description=' + encodeURIComponent(description) + '&isEnable=' + encodeURIComponent(isEnable);
    xhr.send(data);
}

// Obtener todas las categorías
function getAllCategories() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/controllers/getAllCategories.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                if (xhr.response) {
                    try {
                        let res = JSON.parse(xhr.response);
                        if (res.success !== true) {
                            alert(res.msg);
                        } else {
                            // Handle the response as needed
                            console.log(res.categories);
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

    xhr.send();
}

// Obtener productos por categoría
function getProductByCategory(idCategory) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/controllers/getProductByCategory.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                if (xhr.response) {
                    try {
                        let res = JSON.parse(xhr.response);
                        if (res.success !== true) {
                            alert(res.msg);
                        } else {
                            // Handle the response as needed
                            console.log(res.products);
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

    var data = 'idCategory=' + encodeURIComponent(idCategory);
    xhr.send(data);
}
