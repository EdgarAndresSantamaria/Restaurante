<html>
    <head>
        <link href="css/estilos.css" rel="stylesheet" type="text/css">      
        <link rel="shortcut icon" href="imagenes/icono.ico">
        <title>Curriculum - Restaurante Puzzle</title>
    </head>
    <body>
        <div id="contenedor">
            <div id="general">
                <div id="principal">
                    <?php
                    print "<div >";
                    if ($_FILES['archivo']["error"] > 0) {
                        print"<h1 id='resultado'>Error: " . $_FILES['archivo']['error'] . "</h1>";
                    } else {
                        print"<h1 id='resultado'>El archivo se ha subido correctamente.</h1>";
                        move_uploaded_file($_FILES['archivo']['tmp_name'], "subidas/" . $_FILES['archivo']['name']);
                    }
                    print"<input id='atras' type=\"button\" value=\"Volver al Menú\" onclick=\"history.back(-1)\" />";
                    print "</div>";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>


