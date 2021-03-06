<?php
/* 
 * Copyright (c) 2015      Juan Pablo Farbdr	<jfarber55@hotmail.com; jpfarber@hotmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 *	\file       htdocs/contab/periodos/document.php
 *	\ingroup    contab
 *	\brief      Page for attached XML files
 */

require '../../main.inc.php';

require_once DOL_DOCUMENT_ROOT.'/core/lib/files.lib.php';
require_once DOL_DOCUMENT_ROOT.'/core/class/html.formfile.class.php';

if (file_exists(DOL_DOCUMENT_ROOT.'/contab/core/lib/contab.lib.php')){
	require_once DOL_DOCUMENT_ROOT.'/contab/core/lib/contab.lib.php';
} else {
	require_once DOL_DOCUMENT_ROOT.'/custom/contab/core/lib/contab.lib.php';
}

if (file_exists(DOL_DOCUMENT_ROOT.'/contab/class/contabperiodos.class.php')) {
	include_once DOL_DOCUMENT_ROOT.'/contab/class/contabperiodos.class.php';
} else {
	include_once DOL_DOCUMENT_ROOT.'/custom/contab/class/contabperiodos.class.php';
}

$action=GETPOST('action','alpha');
$confirm=GETPOST('confirm', 'alpha');
$anio=GETPOST("anio");
$mes=GETPOST("mes");

$sortfield = GETPOST("sortfield",'alpha');
$sortorder = GETPOST("sortorder",'alpha');
$page = GETPOST("page",'int');
if ($page == -1) { $page = 0; }
$offset = $conf->liste_limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
if (! $sortorder) $sortorder="ASC";
if (! $sortfield) $sortfield="name";

/*
 * Actions
 */
include_once DOL_DOCUMENT_ROOT . '/core/tpl/document_actions_pre_headers.tpl.php';

/*
 * View
 */

llxHeader();

$form = new Form($db);

$head = contab_prepare_head();
dol_fiche_head($head, 'Documentos', 'Contabilidad', 0, '');

$object = new Contabperiodos($db);

?>
<form>
Periodo: 
<select name="anio" onchange="this.form.submit()">
	<option value="0">--Seleccione--</option>
	<?php
	
	$aanios = $object->get_anios_array();
	foreach ($aanios as $i => $a) {
		?><option value="<?=$a;?>" <?=($a == $anio ? "selected='selected'" : "");?>><?=$a;?></option><?php
	}
	?>
</select>

<?php 
$str = "";
if ($anio > 0) {
	$sql = "Select * From ".MAIN_DB_PREFIX."contab_periodos Where anio = ".$anio;
	$res = $db->query($sql);
	while ($obj = $db->fetch_object($res)) {
		$str = "<option value='".$obj->mes."'>".$object->MesToStr($obj->mes)."</option>";
	}
}
?>
<select name="mes" onchange="this.form.submit()">
	<option value="0">--Seleccione--</option>
	<?=$str;?>	
</select>
</form>
<?php 

$upload_dir = DOL_DATA_ROOT. "/contab";
$filearray=dol_dir_list($upload_dir,"files",0,'','(\.meta|_preview\.png)$','date',SORT_DESC,1);

$modulepart = 'contab';
$permission = 1; //$user->rights->contab->creer;
$param = '';
include_once DOL_DOCUMENT_ROOT . '/core/tpl/document_actions_post_headers.tpl.php';
?>