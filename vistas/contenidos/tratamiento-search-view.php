
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR TRATAMIENTO
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum delectus eos enim numquam fugit optio accusantium, aperiam eius facere architecto facilis quibusdam asperiores veniam omnis saepe est et, quod obcaecati.
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL ?>tratamiento-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR TRATAMIENTO</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL ?>tratamiento-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE TRATAMIENTOS</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL ?>tratamiento-search"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR TRATAMIENTO</a>
        </li>
    </ul>
</div>

<?php
    if (!isset($_SESSION['busqueda_tratamiento']) && empty($_SESSION['busqueda_tratamiento'])) {
?>

<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off">
        <input type="hidden" name="modulo" value="tratamiento">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="inputSearch" class="bmd-label-floating">¿Qué tratamiento estas buscando?</label>
                        <input type="text" class="form-control" name="busqueda_inicial" id="inputSearch" maxlength="30">
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-raised btn-info"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } else{ ?>
<div class="container-fluid">
    <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/buscadorAjax.php" method="POST" data-form="search" autocomplete="off">
        <input type="hidden" name="modulo" value="tratamiento">
        <input type="hidden" name="eliminar_busqueda" value="eliminar">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-6">
                    <p class="text-center" style="font-size: 20px;">
                        Resultados de la busqueda <strong>“<?php echo $_SESSION['busqueda_tratamiento']; ?>”</strong>
                    </p>
                </div>
                <div class="col-12">
                    <p class="text-center" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-raised btn-danger"><i class="far fa-trash-alt"></i> &nbsp; ELIMINAR BÚSQUEDA</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container-fluid">
	<?php
        require_once "./controladores/tratamientoControlador.php";
        $ins_tratamiento = new tratamientoControlador();

        echo $ins_tratamiento->paginador_tratamiento_controlador($pagina[1],3,$_SESSION['privilegio_siscost'],$pagina[0],$_SESSION['busqueda_tratamiento']);
    ?>
</div>
<?php } ?>