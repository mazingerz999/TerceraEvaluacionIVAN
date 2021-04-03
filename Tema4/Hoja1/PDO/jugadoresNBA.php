<?php
require_once('funciones.php');

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body class="jumbotron">

    <h1>Jugadores de la NBA</h1>
    <hr>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <p><label for="equipos">Equipos</label>
            <select name="equipos" id="equipos">
                <?php foreach (getEquipo() as  $value) : ?>
                    <option value="<?= $value['nombre'] ?>"><?= $value['nombre'] ?></option>
                <?php endforeach ?>
            </select>
        </p>
        <p><input type='submit' value='Enviar' id='enviar' name='enviar'> </p>

    </form>

    <?php if (isset($_POST['enviar'])) : ?>

        <table border='1'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Peso</th>
                    <th>Equipo</th>
                    <th>Codigo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (getJugadores($_POST['equipos']) as $value) : ?>

                    <tr>
                        <td><?= $value['nombre'] ?></td>
                        <td><?= $value['peso'] ?></td>
                        <td><?= $value['nombre_equipo'] ?></td>
                        <td><?= $value['codigo'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- ESTA ES LA PARTE A REVISAR -->
    <!-- -->
    <!--  -->
    <H1>Traspaso de Jugadores</H1>
    <hr>

    <!-- FORMULARIO -->
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <p><label for="equipos2">Equipos</label>
            <select name="equipos2" id="equipos2">
                <?php foreach (getEquipo() as  $value) : ?>
                    <option value="<?= $value['nombre'] ?>"><?= $value['nombre'] ?></option>
                <?php endforeach ?>
            </select>
        </p>
        <p><input type='submit' value='Enviar' id='enviar2' name='enviar2'> </p>
        <hr>
    </form>

    <!-- FORMULARIO DE CREACION DE INPUTS Y SELECTS  -->
    <?php if (isset($_POST['enviar2'])) :  ?>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <h1>Baja y Alta de Jugadores</h1>
            <hr>
            <input type="hidden" name="equipohidden" value="<?= $_POST['equipos2']; ?>">
            <p> <label for='jugador'>Baja de jugador:</label>
                <select name="jugador" id="jugador">
                    <?php foreach (getJugadores($_POST['equipos2']) as  $value) : ?>
                        <option value="<?= $value['nombre'] ?>"><?= $value['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            <p> <label for='Nombre'>Nombre: </label> <input type='text' name='Nombre' id='Nombre'></p>
            <p> <label for='Procedencia'>Procedencia: </label> <input type='text' name='Procedencia' id='Procedencia'></p>
            <p> <label for='Altura'>Altura: </label> <input type='number' name='Altura' id='Altura'></p>
            <p> <label for='Peso'>Peso: </label> <input type='number' name='Peso' id='Peso'></p>
            <p><label for='Posicion'>Posicion: </label>
                <select name="Posicion" id="Posicion">
                    <?php foreach (getPosicion() as $value) : ?>
                        <option value="<?= $value['posicion'] ?>"><?= $value['posicion'] ?></option>
                    <?php endforeach ?>
                </select>
            </p>
            <p><input type='submit' value='Realizar Traspaso' id='Traspaso' name='Traspaso'> </p>
        </form>
    <?php endif; ?>

    <!-- FUNCION TRASPASO -->
    <?php
    if (isset($_POST['Traspaso'])) {


        if (setTraspaso($_POST['jugador'], $_POST['Nombre'], $_POST['Procedencia'], $_POST['Altura'], $_POST['Peso'], $_POST['Posicion'], $_POST['equipohidden']) ) {
            
            echo $_POST["jugador"]. " fue traspasado correctamente";
        }
    };
    ?>
    <!-- HASTA AQUI LA PARTE A REVISAR -->
    <!-- -->
    <!--  -->

    <h1>Modificar Peso de los Jugadores</h1>
    <hr>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <p><label for="equipos3">Equipos</label>
            <select name="equipos3" id="equipos3">
                <?php foreach (getEquipo() as  $value) : ?>
                    <option value="<?= $value['nombre'] ?>"><?= $value['nombre'] ?></option>
                <?php endforeach ?>
            </select>
        </p>
        <p><input type='submit' value='Mostrar' id='enviar3' name='enviar3'> </p>

    </form>

    <?php if (isset($_POST['enviar3'])) : ?>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <table border='1'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Peso</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach (getJugadores($_POST['equipos3']) as $value) : ?>
                        <tr>
                            <td><?= $value["nombre"] ?></td>
                            <td><input type="text" name="pesoActual[]" value="<?= $value["peso"] ?>"></td>
                            <input type="hidden" name="nombreActual[]" value="<?= $value["nombre"] ?>">
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <p><input type='submit' value='Actualizar' id='Actualizar' name='Actualizar'> </p>
        </form>
    <?php endif; ?>

    <?php if (isset($_POST['Actualizar'])) {

        $pesoactual = $_POST['pesoActual'];
        $nombrehidden = $_POST['nombreActual'];
        $_POST['nombreActual'];

        for ($i = 0; $i < count($nombrehidden); $i++) {
            updatePeso($pesoactual[$i], $nombrehidden[$i]);
        }
        echo "Se actualizaron los pesos";
    };  ?>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>