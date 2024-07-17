<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE TRATAMIENTOS
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
            <a class="active" href="tratamiento-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE TRATAMIENTOS</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL ?>tratamiento-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR TRATAMIENTO</a>
        </li>
    </ul>
</div>

<div class="container-fluid">
	<?php
        require_once "./controladores/tratamientoControlador.php";
        $ins_tratamiento = new tratamientoControlador();

        echo $ins_tratamiento->paginador_tratamiento_controlador($pagina[1],3,$_SESSION['privilegio_siscost'],$pagina[0],"");
    ?>
</div>