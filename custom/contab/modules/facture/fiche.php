<?php
/* Copyright (C) 2007-2010 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) ---Put here your own copyright and developer email---
* 					JPFarber - jfarber55@hotmail.com
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
*
* code pour créer le module 106, 117, 97, 110, b, 112, 97, 98, 108, 11, b, 102, 97, 114, 98, 101, 114
*/

/* JPFarber - Módulo inicial en el cual se muestran los periodos contables, así como la facilidad de crear uno que no se haya creado automaticamente y el listado de periodos que existen en la BD y que se pueden controlar desde este panel de control. */

/**
 *   	\file       dev/Contabpolizass/Contabpolizas_page.php
*		\ingroup    mymodule othermodule1 othermodule2
*		\brief      This file is an example of a php page
*					Initialy built by build_class_from_table on 2015-02-26 02:24
*/

//if (! defined('NOREQUIREUSER'))  define('NOREQUIREUSER','1');
//if (! defined('NOREQUIREDB'))    define('NOREQUIREDB','1');
//if (! defined('NOREQUIRESOC'))   define('NOREQUIRESOC','1');
//if (! defined('NOREQUIRETRAN'))  define('NOREQUIRETRAN','1');
//if (! defined('NOCSRFCHECK'))    define('NOCSRFCHECK','1');			// Do not check anti CSRF attack test
//if (! defined('NOSTYLECHECK'))   define('NOSTYLECHECK','1');			// Do not check style html tag into posted data
//if (! defined('NOTOKENRENEWAL')) define('NOTOKENRENEWAL','1');		// Do not check anti POST attack test
//if (! defined('NOREQUIREMENU'))  define('NOREQUIREMENU','1');			// If there is no need to load and show top and left menu
//if (! defined('NOREQUIREHTML'))  define('NOREQUIREHTML','1');			// If we don't need to load the html.form.class.php
//if (! defined('NOREQUIREAJAX'))  define('NOREQUIREAJAX','1');
//if (! defined("NOLOGIN"))        define("NOLOGIN",'1');				// If this page is public (can be called outside logged session)

// Change this following line to use the correct relative path (../, ../../, etc)

date_default_timezone_set("America/Mexico_City");

$res=0;
if (!$res && file_exists("../main.inc.php"))
	$res = @include '../main.inc.php';     // to work if your module directory is into dolibarr root htdocs directory
if (!$res && file_exists("../../main.inc.php"))
	$res = @include '../../main.inc.php';   // to work if your module directory is into a subdir of root htdocs directory
if (!$res && file_exists("../../../main.inc.php"))
	$res = @include '../../../main.inc.php';     // Used on dev env only
if (!$res && file_exists("../../../../main.inc.php"))
	$res = @include '../../../../main.inc.php';   // Used on dev env only
if (! $res) die("Include of main fails");

// Change this following line to use the correct relative path from htdocs
require_once DOL_DOCUMENT_ROOT.'/core/lib/company.lib.php';

if (file_exists(DOL_DOCUMENT_ROOT.'/contab/core/lib/contab.lib.php')) {
	include_once DOL_DOCUMENT_ROOT.'/contab/core/lib/contab.lib.php';
} else {
	include_once DOL_DOCUMENT_ROOT.'/custom/contab/core/lib/contab.lib.php';
}

if (file_exists(DOL_DOCUMENT_ROOT.'/contab/class/poliza_generator.class.php')) {
	include_once DOL_DOCUMENT_ROOT.'/contab/class/poliza_generator.class.php';
} else {
	include_once DOL_DOCUMENT_ROOT.'/custom/contab/class/poliza_generator.class.php';
}
if (file_exists(DOL_DOCUMENT_ROOT.'/contab/admin/Configuration.class.php')) {
	require_once DOL_DOCUMENT_ROOT.'/contab/admin/Configuration.class.php';
} else {
	require_once DOL_DOCUMENT_ROOT.'/custom/contab/admin/Configuration.class.php';
}
require_once DOL_DOCUMENT_ROOT.'/compta/facture/class/facture.class.php';
if (! $user->rights->contab->cont) {
	accessforbidden();
}

//dol_syslog("=============Hola");

// Load traductions files requiredby by page
$langs->load("companies");
$langs->load("other");

// Get parameters
$id			= GETPOST('id','int');
$action		= GETPOST('action','alpha');
$socid		= GETPOST("socid", "int");

//dol_syslog("Action = $action Id = $id");

// Protection if external user
if ($user->societe_id > 0)
{
	//No dar acceso
}

/*******************************************************************
 * ACTIONS
*
* Put here all code to do according to value of "action" parameter
********************************************************************/
if($action=="errorna"){
	$errors = "Para contabilizar una factura no pagada debe ser del tipo Credito o 50/50";
	$error ++;
}else{
	if($action=="errorna2"){
		$errors = "Para contabilizar una factura del tipo Contado debe haberse pagado por completo";
		$error++;
	}else{
		if($action=="errorna3"){
			$errors= "Para contabilizar una factura con partidas con tasas de impuestos diferentes, el pago debe realizarse al contado y en una sola exhibicion";
			$error++;
		}
	}
}
if ($action == "proc_one") {
	$error = 0;
	$fac = new Facture($db);
	$fac->fetch(GETPOST("facid"));
	if ($fac->type != $fac::TYPE_CREDIT_NOTE) {
		//dol_syslog($fac->id."::TIPO::".$fac->cond_reglement_id." - ".$fac->fk_cond_reglement);
		if ($fac->cond_reglement_id == 0) {
			$errors = "La Factura, al momento de ser generada, no se le especifico una Condicion de Pago (Contado, Credito, 50/50, etc).";
			$error ++;
		}
	}
	if ($error == 0) {
		$pg = new PolizaGenerator($db);
		$pg->facid = GETPOST("facid");
		$pg->tipo_fac = GETPOST("tf");
		if($fac->statut==1){
			$config = new Configuration($db);
			$cond_pago = $config->getCondiciones_de_Pago();
			$name = "cond_pago_".$fac->cond_reglement_id;
			$cp = $cond_pago[$name];
			$sqlv="SELECT sum(amount) as total
							FROM ".MAIN_DB_PREFIX."paiement_facture
							WHERE fk_facture=".$fac->id;
			$rv=$db->query($sqlv);
			$rsv=$db->fetch_object($rv);
			if(($cp==2 && $rsv->total>0 && $fac->cond_reglement_id==7)||($cp==4 && $rsv->total>0)||($cp==2 && $rsv->total>0)){
				$err = $pg->Crear_Polizas_Clientes($user);
			}else{
				$pol = new Contabpolizas($db);
				$err = $pol->Venta_a_Credito2($fac->id, $user, $conf);
			}
		}else{
			$err = $pg->Crear_Polizas_Clientes($user);
		}
		//var_dump($err);
		if ($err >=0 ) {
			$mesg = "La(s) Poliza(s) relacionada(s) con la Factura: ".$fac->ref.", Fue(ron) generada(s).";
		} else if ($err == -1) {
			$errors = "La factura de Pago de Anticipo debe estar especificada con Condicion de Pago Al Contado";
		}
	}
} else if ($action == "process_all") {
	$chkFacture = $_POST["chkFacture"];
	$tf = GETPOST("tf");
	if ($chkFacture) {
		foreach ($chkFacture as $i => $facid) {
			//var_dump("i=$i, facid=$facid");
			$error = 0;
			$fac = new Facture($db);
			$fac->fetch($facid);
			dol_syslog("Factype = ".$fac->type.", cond=".$fac->cond_reglement_id);
			if ($fac->type != $fac::TYPE_CREDIT_NOTE) {
				//dol_syslog($fac->id."::TIPO2::".$fac->cond_reglement_id." - ".$fac->fk_cond_reglement);
				if ($fac->cond_reglement_id == 0) {
					$errors = "La Factura, al momento de ser generada, no se le especifico una Condicion de Pago (Contado, Credito, 50/50, etc).";
					$error ++;
				}
			}
			if ($error == 0) {
				$pg = new PolizaGenerator($db);
				$pg->facid = $facid;
				$pg->tipo_fac = $tf;
				if($fac->statut==1){
					$config = new Configuration($db);
					$cond_pago = $config->getCondiciones_de_Pago();
					$name = "cond_pago_".$fac->cond_reglement_id;
					$cp = $cond_pago[$name];
					$sqlv="SELECT sum(amount) as total
									FROM ".MAIN_DB_PREFIX."paiement_facture
									WHERE fk_facture=".$fac->id;
					$rv=$db->query($sqlv);
					$rsv=$db->fetch_object($rv);
					if(($cp==2 && $rsv->total>0 && $fac->cond_reglement_id==7)||($cp==4 && $rsv->total>0)||($cp==2 && $rsv->total>0)){
						$err = $pg->Crear_Polizas_Clientes($user);
					}else{
						$pol = new Contabpolizas($db);
						$err = $pol->Venta_a_Credito2($fac->id, $user, $conf);
					}
				}else{
					$err = $pg->Crear_Polizas_Clientes($user);
				}
				//var_dump($err);
				if ($err >=0 ) {
					$mesg = "La(s) Poliza(s) relacionada(s) con la Factura: ".$fac->ref.", Fue(ron) generada(s).";
				} else if ($err == -1) {
					$errors = "La factura de Pago de Anticipo debe estar especificada con Condicion de Pago Al Contado";
					break;
				}
			} else {
				break;
			}
		}
	}
}
/***************************************************
 * VIEW
*
* Put here all code to build page
****************************************************/

if (file_exists(DOL_DOCUMENT_ROOT.'/contab/js/functions.js')) {
	$arrayofjs = array('/contab/js/functions.js');
} else {
	$arrayofjs = array('/custom/contab/js/functions.js');
}

$form = new Form($db);

llxHeader('','Fact.Ctes. s/Polizas','','','','',$arrayofjs,'',0,0);

$head=array();
$head = contab_prepare_head($object, $user);
dol_fiche_head($head, '3', 'Contabilidad', 0, '');

/*MV*/
if ($action == "simulador") {
	/* $form2 = new Form($db);
	$formconfirm2 = $form2->formconfirm($_SERVER["PHP_SELF"] . '?facid=' . GETPOST("facid"), "Confirmar","TEXTO", 'confirm_paid', '', "yes", 1);
	print $formconfirm2; */
	$error = 0;
	 $fac = new Facture($db);
	 $fac->fetch(GETPOST("facid"));
	 if ($fac->type != $fac::TYPE_CREDIT_NOTE) {
		//dol_syslog($fac->id."::TIPO::".$fac->cond_reglement_id." - ".$fac->fk_cond_reglement);
		if ($fac->cond_reglement_id == 0) {
		$errors = "La Factura, al momento de ser generada, no se le especifico una Condicion de Pago (Contado, Credito, 50/50, etc).";
		$error ++;
		}
		}
	if ($error == 0) {
		$pg = new PolizaGenerator($db);
		$pg->facid = GETPOST("facid");
		$pg->tipo_fac = GETPOST("tf");
		print '<p></p>
				<div>
				<div style="width:900px; border:solid 1px; background-color:#FFC; padding-top:10px, color:#C00">
				<strong><table><tr><td>Se generara la poliza con la siguiente afectacion de cuentas.</td>
				<td></td>
				<td></td></tr></table><br></strong><div style="padding-right: 10px; padding-left: 10px;">';
		if($fac->statut==1){
			$config = new Configuration($db);
			$cond_pago = $config->getCondiciones_de_Pago();
			$name = "cond_pago_".$fac->cond_reglement_id;
			$cp = $cond_pago[$name];
			$sqlv="SELECT sum(amount) as total
							FROM ".MAIN_DB_PREFIX."paiement_facture
							WHERE fk_facture=".$fac->id;
			$rv=$db->query($sqlv);
			$rsv=$db->fetch_object($rv);
			if(($cp==2 && $rsv->total>0 && $fac->cond_reglement_id==7)||($cp==4 && $rsv->total>0)||($cp==2 && $rsv->total>0)){
				$err = $pg->Simulacion_Polizas_Clientes($user);
			}else{
				$pol = new Contabpolizas($db);
				$err = $pol->Simula_Venta_a_Credito2($fac->id, $user, $conf);
			}
		}else{
			$err = $pg->Simulacion_Polizas_Clientes($user);
		}
		print '</div><p><strong><table><tr><td><strong>Desea continuar?</strong></td>
				<td><form method="POST" action="'.$_SERVER["PHP_SELF"].'?facid='.GETPOST("facid").'&action=proc_one&tf=1"><input type="submit" value="Si"></form></td>
				<td><form method="POST" action="'.$_SERVER["PHP_SELF"].'"><input type="submit" value="No"></form></td></tr></table><br></strong></p>';
		print '
				</div></div><p></p>';
		//var_dump($err);
		if ($err >=0 ) {
			//$mesg = "La(s) Poliza(s) relacionada(s) con la Factura: ".$fac->ref.", Fue(ron) generada(s).";
		} else if ($err == -1) {
			$errors = "La factura de Pago de Anticipo debe estar especificada con Condicion de Pago Al Contado";
		}
	}
}
if ($action == "simulador_all") {
	$chkFacture = $_POST["chkFacture"];
	$tf = GETPOST("tf");
	$m=0;
	if ($chkFacture) {
		print '<p></p>
				<div>
				<div style="width:900px; border:solid 1px; background-color:#FFC; padding-top:10px, color:#C00">
				<strong><table><tr><td>Se generara la poliza con la siguiente afectacion de cuentas.</td>
				<td>';
		print '</td>
				<td></td></tr></table><br></strong><div style="padding-right: 10px; padding-left: 10px;">';
		foreach ($chkFacture as $i => $facid) {
			//var_dump("i=$i, facid=$facid");
			$error = 0;
			$fac = new Facture($db);
			$fac->fetch($facid);
			dol_syslog("Factype = ".$fac->type.", cond=".$fac->cond_reglement_id);
			if ($fac->type != $fac::TYPE_CREDIT_NOTE) {
				//dol_syslog($fac->id."::TIPO2::".$fac->cond_reglement_id." - ".$fac->fk_cond_reglement);
				if ($fac->cond_reglement_id == 0) {
					$errors = "La Factura ".$fac->ref.", al momento de ser generada, no se le especifico una Condicion de Pago (Contado, Credito, 50/50, etc).";
					$error ++;
				}
			}
			if ($error == 0) {
				$pg = new PolizaGenerator($db);
				$pg->facid = $facid;
				$pg->tipo_fac = $tf;
				if($fac->statut==1){
					$config = new Configuration($db);
					$cond_pago = $config->getCondiciones_de_Pago();
					$name = "cond_pago_".$fac->cond_reglement_id;
					$cp = $cond_pago[$name];
					$sqlv="SELECT sum(amount) as total
									FROM ".MAIN_DB_PREFIX."paiement_facture
									WHERE fk_facture=".$fac->id;
					$rv=$db->query($sqlv);
					$rsv=$db->fetch_object($rv);
					if(($cp==2 && $rsv->total>0 && $fac->cond_reglement_id==7)||($cp==4 && $rsv->total>0)||($cp==2 && $rsv->total>0)){
						$err = $pg->Simulacion_Polizas_Clientes($user);
					}else{
						$pol = new Contabpolizas($db);
						$err = $pol->Simula_Venta_a_Credito2($fac->id, $user, $conf);
					}
				}else{
					$err = $pg->Simulacion_Polizas_Clientes($user);
				}
				print "<hr>";
				//var_dump($err);
				/* if ($err >=0 ) {
					$mesg = "La(s) Poliza(s) relacionada(s) con la Factura: ".$fac->ref.", Fue(ron) generada(s).";
				} else if ($err == -1) {
					$errors = "La factura de Pago de Anticipo debe estar especificada con Condicion de Pago Al Contado";
					break;
				} */
			} 
		}
		print '</div><p><table><tr><td><strong>Desea continuar?</strong></td>
				<td><form method="POST" action="'.$_SERVER["PHP_SELF"].'?action=process_all&tf=1"><input type="submit" value="Si">';
		foreach ($chkFacture as $j => $facid2) {
			echo '<input type="hidden" name="chkFacture['.$m.']" value="'.$facid2.'">';
			$m++;
		}
		print '</form></td>
				<td><form method="POST" action="'.$_SERVER["PHP_SELF"].'"><input type="submit" value="No"></form></td></tr></table><br></strong></p>';
		print '
				</div></div><p></p>';
	}
}
/*MV*/
//Aqui inicia la programación para mostrar las facturas que no se han contabilizado.
?>
	<br>
	<h3>Facturas a Clientes de las cuales no se tiene registro de poliza:</h3>
	<br>
	Seleccione las facturas a Clientes, de las cuales, desea que el modulo genere automaticamente las polizas contables.
	<br>
	Si no aparecen facturas listadas abajo, esto significa que todas sus facturas a clientes cuentan actualmente, por lo menos con una poliza relacionada.
	<br>
<?php 

//dol_fiche_end();
print "<br>";
?>
<?php 
$a1="";
$a2="";
$a3="";
$a4="";
$a5="";
$a6="";
if(GETPOST('btipo')=='t'){$a1=" SELECTED";}
if(GETPOST('btipo')=='1'){$a2=" SELECTED";}
if(GETPOST('btipo')=='2'){$a3=" SELECTED";}
if(GETPOST('btipo')=='3'){$a4=" SELECTED";}
if(GETPOST('btipo')=='4'){$a5=" SELECTED";}
if(GETPOST('btipo')=='5'){$a6=" SELECTED";}
?>
<form>
Filtrar por: Tercero: <input type="text" name="btercero" value="<?=GETPOST('btercero')?>">
Fecha Fact: <input type="date" name="bfecha" value="<?=GETPOST('bfecha')?>">
Factura: <input type="text" name="bfactura" value="<?=GETPOST('bfactura')?>">
Tipo: <select name="btipo">
	<option value='t' <?=$a1?>>Todos</option>
	<option value='1' <?=$a2?>>Contado</option>
	<option value='2' <?=$a3?>>Credito</option>
	<option value='3' <?=$a4?>>Anticipo</option>
	<option value='4' <?=$a5?>>50/50</option>
	<option value='5' <?=$a6?>>Sin Tipo</option>
	</select>
	<input type="submit" value="Filtrar">
</form>
<?php 
print "<br>";
?>
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
	<input type="hidden" name="action" value="simulador_all" />
	<input type="hidden" name="tf" value="1" />
	<table class="noborder" width="100%">
		<tr class="liste_titre">
			<td>Tercero</td>
			<td>Factura</td>
			<td style="text-align: center;">
				<a href="" onclick="select_all_factures()">Todos</a> / 
				<a href="" onclick="unselect_all_factures()">Ninguno</a>
				<br>
				<input type="submit" class="button" name="btnProcessAll" value="Contabilizar" />
			</td>
			<td>Fecha Fact.</td>
			<!--<td>Pago No.</td> -->
			<td>Fecha Pago</td>
			<td>Tipo Factura</td>
			<td>Polizas Relacionadas</td>
			<td style="text-align: right;">Importe Total</td>
			<td style="text-align: right;">Importe Pagado</td>
			<td style="text-align: center">
				<!-- Seleccionar
				<br>
				<input type="checkbox" name="select_all" id="select_all" onclick="fac_change_chk()" />   -->
			</td>
			<td style="text-align: center">
				Contabilizar
			</td>
		</tr>
<?php
	/* $sql = "SELECT f.rowid, s.nom, f.facnumber, f.datef, b.dateo, pf.amount, pa.code, pa.libelle, pf.rowid as paimid ";
	$sql .= " FROM ".MAIN_DB_PREFIX."facture as f ";
	$sql .= " INNER JOIN ".MAIN_DB_PREFIX."paiement_facture as pf ON f.rowid = pf.fk_facture ";
	$sql .= " INNER JOIN ".MAIN_DB_PREFIX."societe as s ON f.fk_soc = s.rowid ";
	$sql .= " INNER JOIN ".MAIN_DB_PREFIX."paiement as pai ON pf.fk_paiement = pai.rowid ";
	$sql .= " INNER JOIN ".MAIN_DB_PREFIX."bank as b on pai.fk_bank = b.rowid ";
	$sql .= " INNER JOIN ".MAIN_DB_PREFIX."c_paiement pa ON pai.fk_paiement = pa.id ";
	$sql .= " LEFT JOIN (Select * From ".MAIN_DB_PREFIX."contab_polizas Where societe_type = 1) as cp ON f.rowid = cp.fk_facture ";
	$sql .= " WHERE f.entity = ".$conf->entity." AND cp.rowid is null ";  // AND f.paye = 1 AND f.fk_statut = 2
	$sql .= " ORDER BY f.facnumber "; */
	$sql="SELECT f.rowid, s.nom, f.facnumber, f.datef, b.dateo, pf.amount, f.total_ttc,
       		pa.code, pa.libelle, pf.rowid as paimid ,@a:=f.rowid,@b:=pf.amount,f.fk_cond_reglement
		 FROM ".MAIN_DB_PREFIX."facture as f 
     		LEFT JOIN ".MAIN_DB_PREFIX."paiement_facture as pf ON f.rowid = pf.fk_facture 
     		INNER JOIN ".MAIN_DB_PREFIX."societe as s ON f.fk_soc = s.rowid 
     		LEFT JOIN ".MAIN_DB_PREFIX."paiement as pai ON pf.fk_paiement = pai.rowid 
     		LEFT JOIN ".MAIN_DB_PREFIX."bank as b on pai.fk_bank = b.rowid 
     		LEFT JOIN ".MAIN_DB_PREFIX."c_paiement pa ON pai.fk_paiement = pa.id 
     		LEFT JOIN (Select a.*,sum(debe) as sumadebe From ".MAIN_DB_PREFIX."contab_polizas a,".MAIN_DB_PREFIX."contab_polizasdet 
				Where societe_type = 1 AND tipo_pol='I' 
          AND a.rowid=fk_poliza AND debe!=0 GROUP BY fk_facture) as cp ON f.rowid = cp.fk_facture AND round(cp.sumadebe,2)>=f.total_ttc 
		WHERE f.entity = ".$conf->entity." AND cp.rowid is NULL AND (f.fk_statut=1 || f.fk_statut=2)  ";
	if(GETPOST('btercero')!=''){
		$sql.=" AND s.nom LIKE '%".GETPOST('btercero')."%' ";
	}
	if(GETPOST('bfecha')!=''){
		$sql.=" AND f.datef='".GETPOST('bfecha')."' ";
	}
	if(GETPOST('bfactura')!=''){
		$sql.=" AND f.facnumber LIKE '%".GETPOST('bfactura')."%' ";
	}
	$sql.=" ORDER BY f.facnumber";
	//print $sql;
	dol_syslog("Se muestran las facturas sin pólizas en base al sql=$sql");
	if ($res = $db->query($sql)) {
		$var = true;
		while ($obj = $db->fetch_object($res)) {
			$config = new Configuration($db);
			$cond_pago = $config->getCondiciones_de_Pago();
			$name = "cond_pago_".$obj->fk_cond_reglement;
			$cp = $cond_pago[$name];
			
			$mostrar='SI';
			if(GETPOST('btipo')=='t'){$mostrar='SI';}
			if(GETPOST('btipo')=='1'){
				if($cp==1){
					$mostrar='SI';
				}else{
					$mostrar='NO';
				}
			}
			if(GETPOST('btipo')=='2'){
				if($cp==2){
					$mostrar='SI';
				}else{
					$mostrar='NO';
				}
			}
			if(GETPOST('btipo')=='3'){
				if($cp==3){
					$mostrar='SI';
				}else{
					$mostrar='NO';
				}
			}
			if(GETPOST('btipo')=='4'){
				if($cp==4 && $obj->fk_cond_reglement!=0){
					$mostrar='SI';
				}else{
					$mostrar='NO';
				}
			}
			if(GETPOST('btipo')=='5'){
				if($obj->fk_cond_reglement==0){
					$mostrar='SI';
				}else{
					$mostrar='NO';
				}
			}
			if($mostrar=='SI'){
			$var = !$var;
?>
			<tr <?php print $bc[$var]; ?>>
				<td><?php print substr($obj->nom, 0, 40);?></td>
				<td><a href="<?=DOL_URL_ROOT;?>/compta/facture.php?facid=<?=$obj->rowid;?>"><?php print $obj->facnumber;?></a></td>
				<?php 
				$sqlr="SELECT fk_facture, tva_tx
					FROM ".MAIN_DB_PREFIX."facturedet
					WHERE fk_facture=".$obj->rowid." GROUP BY tva_tx";
				//print $sqlr;
				$rrs=$db->query($sqlr);
				$nrr=$db->num_rows($rrs);
				$sqlv2="SELECT sum(amount) as total
							FROM ".MAIN_DB_PREFIX."paiement_facture
							WHERE fk_facture=".$obj->rowid;
				$rv2=$db->query($sqlv2);
				$rsv2=$db->fetch_object($rv2);
				if($nrr>1 && $rsv2->total<$obj->total_ttc){
					$na=3;
				}else{
					if(($cp==1 || $cp==3) && $obj->amount==0){
						$na=1;
					}else{
						if($cp==1 && $obj->amount<$obj->total_ttc){
							$sqlv="SELECT sum(amount) as total
								FROM ".MAIN_DB_PREFIX."paiement_facture
								WHERE fk_facture=".$obj->rowid;
							$rv=$db->query($sqlv);
							$rsv=$db->fetch_object($rv);
							if($rsv->total<$obj->total_ttc){
								$na=2;
							}else{
									$na=0;
							}
						}else{
						$na=0;
						}
					}
				}
				?>
				<?php 
				if($na==1 || $na==2 || $na==3){
				?>
				<td style="text-align: center;"><input type="checkbox" name="chkFacture[]" value="<?=$obj->rowid;?>" disabled></td>
				<?php }else{?>
				<td style="text-align: center;"><input type="checkbox" name="chkFacture[]" value="<?=$obj->rowid;?>"></td>
				<?php }?>
				<td><?php print $obj->datef;?></td>
				<!-- <td><?php print $obj->paimid;?></td>-->
				<td><?php print $obj->dateo;?></td>
				<td><?php if($obj->fk_cond_reglement==0){
					}else{
						if($cp==1){
							print "Contado";
						}
						if($cp==2){
							print "Credito";
						}
						if($cp==3){
							print "Anticipo";
						}
						if($cp==4){
							print "50/50";
						}
					}
				?>
				</td>
				<td align="center">
					<?php
					 $sqlp="SELECT count(*) as numf
						FROM ".MAIN_DB_PREFIX."contab_polizas
						WHERE entity=".$conf->entity." AND fk_facture=".$obj->rowid." AND societe_type=1 "; 
					 $np=$db->query($sqlp);
					 $nps=$db->fetch_object($np);
					 if($nps->numf>0){
					 	print "<a href='../../polizas/fiche.php?fc=1&facid=".$obj->rowid."'>".$nps->numf."</a>";
					 }
					?>
				</td>
				<td style="text-align: right;"><?php print number_format($obj->total_ttc, 2);?></td>
				<td style="text-align: right;"><?php print number_format($obj->amount, 2);?></td>
				<td style="text-align: center">
					<!-- <input type="checkbox" name="chk_<?php //$obj->rowid;?>" id="chk_<?php//$obj->rowid;?>" />-->
				</td>
				<td style="text-align: center" id="tdprocessnow<?=$obj->rowid;?>">
					<?php 
					if($na==1){
					?>
						<a href="?action=errorna" title="Para contabilizar una factura no pagada debe ser del tipo Credito o 50/50">NA</a>
					<?php 
					}else{
						if($na==2){
							?>
							<a href="?action=errorna2" title="Para contabilizar una factura del tipo Contado debe haberse pagado por completo">NA</a>
							<?php
						}else{
							if($na==3){
								?>
								<a href="?action=errorna3" title="Para contabilizar una factura con partidas con tasas de impuestos diferentes, el pago debe realizarse al contado y en una sola exhibicion">NA</a>
								<?php
							}else{
								?>
									<a href="<?= $_SERVER["PHP_SELF"]; ?>?facid=<?=$obj->rowid;?>&action=simulador&tf=1">Contabilizar</a>
								<?php 
							}
						}
					}
					?>
				</td>
			</tr>
<?php 
		  }
		}
	}
	$var = !$var;
?>
		<tr <?php print $bc[$var]; ?>><td colspan="10">&nbsp;</td></tr>
		<!-- <tr>
			<td colspan="5">&nbsp;</td>
			<td style="text-align: center"><input type="submit" name="btnprocesar" value="Generar Pólizas" /></td>
		</tr> -->
	</table>
</form>
<?php 

dol_htmloutput_mesg($mesg);
dol_htmloutput_errors($errors);
dol_htmloutput_events();
	
llxFooter();

$db->close();
?>