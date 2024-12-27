<html>

<head>
    <title>
        Mi pagina
    </title>
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>
    <header>
        <img src="imagenes/banner.png" width="40%" height="150px"></img>
    </header>
    <nav>
        <ul>
            <li><a href="index.php?action=inicio">Inicio</a></li>
            <li><a href="index.php?action=nosotros">Nosotros</a></li>
            <li><a href="index.php?action=servicios">Servicios</a></li>
            <li><a href="index.php?action=contactanos">Contactanos</a></li>
        </ul>
    </nav>
    <section>
        <?php
        require_once "controllers/controller.php";
        require_once "models/model.php";
        $mvc=new MvcController();
        $mvc->enlacesPaginasController();
        ?>
    </section>

  
   <section>
    <footer>
        Derechos Reservados @cuarto Software
    </footer>
</section>
</body>



</html>