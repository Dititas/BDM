<?php
if (isset($_SESSION["AUTH"])) {
    $userInfo = $_SESSION["AUTH"];
    $userName = $userInfo["user_userName"];
    $userRole = $userInfo["user_rol"];
    if ($userRole === 'buyer') {
        $userRole = 'Comprador';
    } else if ($userRole === 'seller') {
        $userRole = 'Vendedor';
    } else {
        $userRole = 'Administrador';
    }
    $imagenCodificada = base64_encode($userInfo["user_image"]);
    $urlImagen = 'data:image/jpeg;base64,' . $imagenCodificada;
} else {
    $userInfo = "";
    $userName = "";
    $userRole = "";
}
?>
<div class="sidebar">
    <div class="logo-details">
        <img src="./img/logo.jpg" class="imgSideBar">
    </div>
    <ul class="nav-links">
        <li>
            <form action="">
                <div class="buscar">
                    <input type="text" name="search" placeholder="Buscar">
                    <button type="submit">
                        <i class="bx bxs-search buscar-btn-sb"></i>
                    </button>
                </div>
            </form>
        </li>
        <li>
            <form action="../index.php">
                <button type="submit" class="bg-dark border-0 boton">
                    <i class='bx bxs-home'></i>
                    <span class="link_name">Inicio</span>
                </button>
            </form>
        </li>
        <li>
            <form action="./myWishlists.php">
                <button type="submit" class="bg-dark border-0 boton">
                    <i class='bx bx-list-ul'></i>
                    <span class="link_name">Mis listas</span>
                </button>
            </form>
        </li>
        <li>
            <form action="./categories.php">
                <button type="submit" class="bg-dark border-0">
                    <i class='bx bxs-category-alt'></i>
                    <span class="link_name">Categorias</span>
                </button>
            </form>
        </li>
        <li>
            <form action="./myChats.php">
                <button type="submit" class="bg-dark border-0 boton">
                    <i class='bx bx-conversation'></i>
                    <span class="link_name">Mis Chats</span>
                </button>
            </form>
        </li>
        <li>
            <form action="./myShoppingCart.php">
                <button type="submit" class="bg-dark border-0 boton">
                    <i class='bx bxs-cart-download'></i>
                    <span class="link_name">Mi Carrito</span>
                </button>
            </form>
        </li>
        <li>
            <form action="./myShopping.php">
                <button type="submit" class="bg-dark border-0 boton">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="link_name">Mis Compras</span>
                </button>
            </form>
        </li>
        <li>
            <form action="<?php echo $myProfileURL; ?>">
                <button type="submit" class="bg-dark border-0 boton">
                    <i class='bx bxs-user'></i>
                    <span class="link_name">Mi Perfil</span>
                </button>
            </form>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img class="img-profile" src="<?php echo  $urlImagen; ?>" alt="FotoDePerfil">
                </div>
                <div class="name-job">
                    <div class="profile_name"><?php echo $userName ?></div>
                    <div class="rol"><?php echo $userRole ?></div>
                </div>
                <form action="../backend/controllers/closeSession.php">
                    <button type="submit" class="bg-dark-x border-0">
                        <i class='bx logout bxs-log-out'></i>
                    </button>
                </form>

            </div>
        </li>
        <?php
        /*
        if ($isSessionActive != 0 && $isSessionActive != 3) {

        ?>
            <li>
                <form action="../index.php">
                    <button type="submit" class="bg-dark border-0">
                        <i class='bx bxs-book-content'></i>
                        <span class="link_name">Mis Cursos</span>
                    </button>
                </form>

            </li>

            <li>
                <form action="../index.php">
                    <button type="submit" class="bg-dark border-0">
                        <i class='bx bxs-chat'></i>
                        <span class="link_name">Chats</span>
                    </button>
                </form>

            </li>

            <li>
                <form action="./views/myProfile.php">
                    <button type="submit" class="bg-dark border-0">
                        <i class='bx bxs-user'></i>
                        <span class="link_name">Mi Perfil</span>
                    </button>
                </form>
            </li>

        <?php
        }
        if ($isSessionActive === 3) {
        ?>
            <li>
                <form action="../index.php">
                    <button type="submit" class="bg-dark border-0">
                        <i class='bx bxs-user'></i>
                        <span class="link_name">Usuarios</span>
                    </button>
                </form>
            </li>

            <li>
                <form action="../index.php">
                    <button type="submit" class="bg-dark border-0">
                        <i class='bx bxs-chat'></i>
                        <span class="link_name">Comentarios</span>
                    </button>
                </form>

            </li>

            <li>
                <form action="../views/myProfile.php">
                    <button type="submit" class="bg-dark border-0">
                        <i class='bx bxs-report'></i>
                        <span class="link_name">Reportes</span>
                    </button>
                </form>
            </li>
        <?php
        }

        if ($isSessionActive === 0) {
        ?>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../img/profilePicture.png" alt="FotoDePerfil">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">Usuario</div>
                        <div class="rol"> Sin Iniciar Sesión</div>
                    </div>
                    <form action="./login.php">
                        <button type="submit" class="bg-dark-x border-0">
                            <i class='bx logout bxs-log-in'></i>
                        </button>
                    </form>

                </div>
            </li>
        <?php
        } else if ($isSessionActive === 1) {
        ?>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="<?php echo $urlImagen; ?>" alt="FotoDePerfil">
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><?php echo $activeSesion["name_userInstructor"]; ?></div>
                        <div class="rol">Profesor</div>
                    </div>
                    <form action="./backend/controllers/closeSession.php">
                        <button type="submit" class="bg-dark-x border-0">
                            <i class='bx logout bxs-log-out'></i>
                        </button>
                    </form>

                </div>
            </li>
        <?php
        } else if ($isSessionActive === 2) {
        ?>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="<?php echo $urlImagen ?>" alt="FotoDePerfil">
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><?php echo $activeSesion["name_userestudiante"]; //NOMBRE DEL ALUMNO 
                                                    ?></div>
                        <div class="rol">Alumno</div>
                    </div>
                    <form action="./backend/controllers/closeSession.php">
                        <button type="submit" class="bg-dark-x border-0">
                            <i class='bx logout bxs-log-out'></i>
                        </button>
                    </form>

                </div>
            </li>
        <?php
        } else if ($isSessionActive === 3) {
        ?>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../img/profilePicture.png" alt="FotoDePerfil">
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><?php echo "ADMIN"; //NOMBRE DEL ALUMNO 
                                                    ?></div>
                        <div class="rol">Admin</div>
                    </div>
                    <form action="./backend/controllers/closeSession.php">
                        <button type="submit" class="bg-dark-x border-0">
                            <i class='bx logout bxs-log-out'></i>
                        </button>
                    </form>

                </div>
            </li>
        <?php
        }
        */ ?>
    </ul>
</div>