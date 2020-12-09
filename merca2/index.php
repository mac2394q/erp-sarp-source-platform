<?php

/* Para mantenimiento */
//header("Location: resources/public/modules/redireccion/mantenimiento.php");
/* Para ejecucion */
//header("Location: resources/public/views/platform/modules/sesion/login.php");
//header("Location: resources/public/views/web/modules/index.php");

require_once "conf.php";

?>

<a href="<?= PLATFORM_SERVER.'modules/merca2/core/listUser.php' ?>">GENERAR CVS DE USER</a><br><br>
<a href="<?= PLATFORM_SERVER.'modules/merca2/core/listSections.php' ?>">GENERAR CVS DE SECTIONS</a>