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
        const name = document.getElementById('CategoryName');
        const description = document.getElementById('CategoryDescription');
        modifyCategory(id, name, description, isEnable)
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
                                console.log(res.categories);
                                displayCategories(res.categories);
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

    document.addEventListener("DOMContentLoaded", function () {
        getAllCategories();
    });
    function loadCategories() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    displayCategories(response.categories, "allCategories"); // Pasar el id del ul como segundo argumento
                } else {
                    console.error("Error al cargar las categorías");
                }
            }
        };

        xhr.open("GET", '../backend/controllers/getAllCategories.php', true);
        xhr.send();
    }

    function displayCategories(categories, parentListId) {
        var container = document.getElementById(parentListId);
    
        // Verificar si el contenedor existe
        if (!container) {
            console.error("Container not found. Check the parentListId.");
            return;
        }
    
        // Verificar si las categorías existen y no están vacías
        if (!categories || categories.length === 0) {
            console.error("No categories to display.");
            return;
        }
    
        categories.forEach(function (category) {
            var listItem = document.createElement("li");
            listItem.id = "category_" + category.category_id;
    
            var link = document.createElement("a");
            link.href = "#";
            link.textContent = category.category_name;
    
            var editButton = createButton(["bx", "bxs-pencil"], function () {
                fillEditModal(category.category_id, category.category_name, category.category_description);
                $('#editWLModal').modal('show');
            });
    
            var deleteButton = createButton(["bx", "bxs-trash"], function () {
                confirmDelete(category.category_name);
            });
    
            var editIcon = createIcon(["bx", "bxs-pencil", "icon-large"]);
            var deleteIcon = createIcon(["bx", "bxs-trash", "icon-large"]);
    
            editButton.appendChild(editIcon);
            deleteButton.appendChild(deleteIcon);
    
            listItem.appendChild(link);
            listItem.appendChild(editButton);
            listItem.appendChild(deleteButton);
    
            container.appendChild(listItem);
        });
    }

    // Llamada inicial
    loadCategories();

    function createButton(classes, clickHandler) {
        var button = document.createElement("button");
        button.classList.add("bg-transparent", "border-0", "ms-3");
        button.addEventListener("click", clickHandler);

        return button;
    }

    function createIcon(classes) {
        var icon = document.createElement("i");

        classes.forEach(function (className) {
            icon.classList.add(className);
        });

        return icon;
    }


    function fillEditModal(categoryId, categoryName, categoryDescription) {

        document.getElementById('listName').value = categoryName;
        document.getElementById('listDescription').value = categoryDescription;

    }