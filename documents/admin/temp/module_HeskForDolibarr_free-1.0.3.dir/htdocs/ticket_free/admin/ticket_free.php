<?php

/* Copyright (C) 2004      Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2005-2011 Laurent Destailleur  <eldy@users.sourceforge.org>
 * Copyright (C) 2013      Jerome JACQUEL <icfr.eirl@free.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
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
 *   \file       htdocs/admin/ticket.php
 *   \ingroup    ticket
 *   \brief      page de configuration du module de hesk pour dolibarr 
 *   \version    $Id: clicktodial.php,v 1.24 2011/07/31 22:23:24 eldy Exp $
 */
$res = 0;
if (!$res && file_exists("../main.inc.php"))
    $res = @include("../main.inc.php");
if (!$res && file_exists("../../main.inc.php"))
    $res = @include("../../main.inc.php");
if (!$res && file_exists("../../../main.inc.php"))
    $res = @include("../../../main.inc.php");
if (!$res)
    die("Include of main fails");
require_once(DOL_DOCUMENT_ROOT . "/core/lib/admin.lib.php");
$res = 0;
if (!$res && file_exists(DOL_DOCUMENT_ROOT . "/ticket_free/class/soap.class.php"))
    $res = @include(DOL_DOCUMENT_ROOT . "/ticket_free/class/soap.class.php");
if (!$res && file_exists("../class/soap.class.php"))
    $res = @include("../class/soap.class.php");
if (!$res)
    die("Include of soap class fails");

$res = 0;
if (!$res && file_exists(DOL_DOCUMENT_ROOT . "/ticket_free/class/ticket.class.php"))
    $res = @include(DOL_DOCUMENT_ROOT . "/ticket_free/class/ticket.class.php");
if (!$res && file_exists("../class/ticket.class.php"))
    $res = @include("../class/ticket.class.php");
if (!$res)
    die("Include of soap class fails");

$langs->load("ticket@ticket_free");
$langs->load("admin");
$userid = $user->id;
$ticket = new ticket($db);
$soap = new soap($db, 'admin');

if (!$user->admin && $users->rights->ticket_free->parametre)
    accessforbidden();

if ($_POST['action'] == 'external') {

    $listofmodulesforexternal = explode(',', $conf->global->MAIN_MODULES_FOR_EXTERNAL);

    if (in_array('ticket', $listofmodulesforexternal)) {
        foreach ($listofmodulesforexternal as $module) {
            if ($module != 'ticket')
                $listofmodules [] = $module;
        }
        $listofmodulesforexternal = implode(',', $listofmodules);
        dolibarr_set_const($db, "MAIN_MODULES_FOR_EXTERNAL", $listofmodulesforexternal, 'chaine', 0, '', $conf->entity);
    }else {
        dolibarr_set_const($db, "MAIN_MODULES_FOR_EXTERNAL", $conf->global->MAIN_MODULES_FOR_EXTERNAL . ',ticket', 'chaine', 0, '', $conf->entity);
    }
        
        
        
}
       if($_POST['action']=='datatable'){

     if (!empty($conf->global->MAIN_USE_JQUERY_DATATABLES)) {
         
         dolibarr_del_const($db,'MAIN_USE_JQUERY_DATATABLES' , $conf->entity);
         
     }  else {
         
         dolibarr_set_const($db, 'MAIN_USE_JQUERY_DATATABLES', '1', 'chaine', 0, '', $conf->entity);
     }
        
        
        
    }
    


if ($_POST["action"] == 'setvalue' && $user->admin) {



    if (isset($_POST['url'])) {

        if (substr($_POST['url'], 0, 6) == 'http://') {
            $url = $_POST['url'];
        } else {
            $url = 'http://' . $_POST['url'];
        }

        $result = dolibarr_set_const($db, "ticketfree_HESK_BASE", $url, 'chaine', 0, '', $conf->entity);
        if ($result >= 0) {
            $mesg = '<div>' . $langs->trans("liens vers hesk") . ' ' . $langs->trans("RecordModifiedSuccessfully") . '</div>';
        } else {
            dol_print_error($db);
        }
    }
    if (isset($_POST['soap'])) {
        $result = dolibarr_set_const($db, "ticketfree_HESK_SOAP", $_POST["soap"], 'chaine', 0, '', $conf->entity);
        if ($result >= 0) {
            $mesg = '<div>' . $langs->trans("liens vers hesk") . ' ' . $langs->trans("RecordModifiedSuccessfully") . '</div>';
        } else {
            dol_print_error($db);
        }
    }
    if (isset($_POST['nbre'])) {
        $result = dolibarr_set_const($db, "ticketfree_nbre_lignes", $_POST["nbre"], 'chaine', 0, '', $conf->entity);
        if ($result >= 0) {
            $mesg = '<div>' . $langs->trans("Nombre de lignes") . ' ' . $langs->trans("RecordModifiedSuccessfully") . '</div>';
        } else {
            dol_print_error($db);
        }
    }
}

if ($_POST["action"] == 'setuser' && $user->admin) {

    $user_hesk = $soap->GetUsers();
    foreach ($user_hesk as $v) {

        if ($v['id'] = $_POST['hesk']) {
            
        }
    }

    $sql = "insert into " . MAIN_DB_PREFIX . "ticketfree_users_join (id,id_dolibarr,id_hesk) VALUE(''," . $_POST['dolibarr'] . "," . $_POST['hesk'] . ")";
    $resql = $db->query($sql);

    if ($resql) {
        $db->commit();
    }
}

if ($_POST["action"] == 'removeuser' && $user->admin) {
    $sql = "delete from " . MAIN_DB_PREFIX . "ticketfree_users_join where id=" . $_POST['id'];
    $resql = $db->query($sql);

    if ($resql) {
        $db->commit();
    }
}




/*
 *
 *
 */

llxHeader('', $langs->trans("ticket"));

$linkback = '<a href="' . DOL_URL_ROOT . '/admin/modules.php">' . $langs->trans("BackToModuleList") . '</a>';
print_fiche_titre($langs->trans("ticket"), $linkback, 'setup');

//print $langs->trans("ticket")."<br>\n";


dol_htmloutput_mesg($mesg);
dol_htmloutput_errors($mesgerror);
switch ($_POST['action']) {


    case 'set_login':

        print $html;
        print 'merci de vous connecter avec un compte hesk administrateur';
        print '<form method="post" action="ticket_free.php">';
        print '<table class="nobordernopadding">';
        print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
        print '<input type="hidden" name="action" value="selectadmin">';
        print '<tr><td>login:</td><td><input size="20" type="text" name="login" value=""></td></tr>';
        print '<tr><td>password:</td><td><input size="20" type="password" name="pass" value=""></td></tr>';
        print '<tr><td><input type="submit" class="button" value="' . $langs->trans("login") . '"></td></tr>';
        print '</form>';

        break;

    case 'selectadmin':
        if ($_POST['login'] != '' && $_POST['pass'] != '') {

            if ($_POST['login'] != '') {

                $result = dolibarr_set_const($db, "ticketfree_login_admin", $_POST['login'], 'chaine', 0, '', $conf->entity);
                if ($result >= 0) {
                    //print '<div class="ok">login'.$langs->trans("RecordModifiedSuccessfully").'</div>';
                } else {
                    dol_print_error($db);
                }
            }

            if ($_POST['pass'] != '') {
                $result = dolibarr_set_const($db, "ticketfree_pass_admin", $_POST['pass'], 'chaine', 0, '', $conf->entity);
                if ($result >= 0) {
                    //print '<div class="ok">'.$langs->trans("RecordModifiedSuccessfully").'</div>';
                } else {
                    dol_print_error($db);
                }
            }
            $result = dolibarr_set_const($db, "ticketfree_pass_hash", 0, 'chaine', 0, '', $conf->entity);
            if ($result >= 0) {
                //print '<div class="ok">'.$langs->trans("RecordModifiedSuccessfully").'</div>';
            } else {
                dol_print_error($db);
            }


            $soap->user = $conf->global->ticketfree_login_admin;
            $soap->pass = $conf->global->ticketfree_pass_admin;
            $soap->hash = $conf->global->ticketfree_pass_hash;


            if ($soap->user != '')
                $userhesk = $soap->GetUsers();
            // print_r($userhesk);

            print $html;

            print '<form method="post" action="ticket_free.php">';
            print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
            print '<input type="hidden" name="action" value="setadmin">';
            foreach ($userhesk as $v) {

                if ($v['isadmin'])
                    print '<input type="radio" name="admin" value="' . $v['id'] . '">' . $v['name'] . '<br>';
            }

            print '<input type="submit" class="button" value="' . $langs->trans("selectionner comme administrateur") . '"></form>';
        } else {
            print 'merci de vous connecter avec un compte hesk administrateur';
            print '<form method="post" action="ticket_free.php">';
            print '<table class="nobordernopadding">';
            print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
            print '<input type="hidden" name="action" value="selectadmin">';
            print '<tr><td>login:</td><td><input size="20" type="text" name="login" value=""></td></tr>';
            print '<tr><td>password:</td><td><input size="20" type="password" name="pass" value=""></td></tr>';
            print '<tr><td><input type="submit" class="button" value="' . $langs->trans("login") . '"></td></tr>';
            print '</form>';
        }


        break;

    case 'setadmin':
        if (isset($_POST['admin'])) {
            $soap->user = $conf->global->ticketfree_login_admin;
            $soap->pass = $conf->global->ticketfree_pass_admin;
            $soap->hash = $conf->global->ticketfree_pass_hash;
            $userhesk = $soap->GetUsers();

            foreach ($userhesk as $v) {

                //print '<input type="radio" name="admin" value="'.$v['id'].'">'.$v['name'].'<br>';
                if ($v['id'] == $_POST['admin']) {
                    $userh = $v['user'];
                    $passadmin = $v['pass'];
                    $name = $v['name'];
                }
            }

            if ($userh != '') {

                $result = dolibarr_set_const($db, "ticketfree_login_admin", $userh, 'chaine', 0, '', $conf->entity);
                if ($result >= 0) {
                    //print '<div class="ok">login'.$langs->trans("RecordModifiedSuccessfully").'</div>';
                } else {
                    dol_print_error($db);
                }
            }
            if ($name != '') {

                $result = dolibarr_set_const($db, "ticketfree_name_admin", $name, 'chaine', 0, '', $conf->entity);
                if ($result >= 0) {
                    //print '<div class="ok">login'.$langs->trans("RecordModifiedSuccessfully").'</div>';
                } else {
                    dol_print_error($db);
                }
            }

            if ($passadmin != '') {
                $result = dolibarr_set_const($db, "ticketfree_pass_admin", $passadmin, 'chaine', 0, '', $conf->entity);
                if ($result >= 0) {
                    //print '<div class="ok">'.$langs->trans("RecordModifiedSuccessfully").'</div>';
                } else {
                    dol_print_error($db);
                }

                $result = dolibarr_set_const($db, "ticketfree_pass_hash", 1, 'chaine', 0, '', $conf->entity);
                if ($result >= 0) {
                    //print '<div class="ok">'.$langs->trans("RecordModifiedSuccessfully").'</div>';
                } else {
                    dol_print_error($db);
                }
            }

            @Header("Location: ticket_free.php");
            print '<a href="./ticket_free.php">' . $langs->trans('retour a la configuration') . '</a>';
        } else {
            print $html;
            print $langs->trans('aucun utilisateur selectione') . '<br><a href="./ticket_free.php">' . $langs->trans('retour a la configuration') . '</a>';
        }


        break;

    default:
        print $html;
        print '<br>';


        $var = true;
        try {
            print '<table class="nobordernopadding" width="100%">';
            print '<tr class="liste_titre">';
            print '<td width="120px">' . $langs->trans("Name") . '</td>';
            print '<td width="720px">' . $langs->trans("Value") . '</td><td></td><td></td>';
            print "</tr>\n";
            $var = !$var;

            print '<form method="post" action="ticket_free.php">';
            print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
            print '<input type="hidden" name="action" value="setvalue">';
            print '<tr ' . $bc[$var] . '><td >';
            print $langs->trans("hesk_url") . '</td><td>';
            print '<input size="60" type="text" name="url" value="' . $conf->global->ticketfree_HESK_BASE . '"> / ';
            print '<input size="30" type="text" name="soap" value="' . $conf->global->ticketfree_HESK_SOAP . '">';
            print '</td><td>version du web service: ' . $soap->get_service_version() . '</td>';
            print '<td align="right"><input type="submit" class="button" value="' . $langs->trans("Modify") . '"></td></tr></form>';
            $var = !$var;

            print '<form method="post" action="ticket_free.php">';
            print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
            print '<input type="hidden" name="action" value="setvalue">';
            print '<tr ' . $bc[$var] . '><td >';
            print $langs->trans("Nombre de lignes sur pages d accueil") . '</td><td>';
            print '<input size="20" type="text" name="nbre" value="' . $conf->global->ticketfree_nbre_lignes . '"><td></td></td>';
            print '<td align="right"><input type="submit" class="button" value="' . $langs->trans("Modify") . '"></td></tr></form>';
            $var = !$var;
            print '<form method="post" action="ticket_free.php">';
            print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
            print '<input type="hidden" name="action" value="external">';
            print '<tr ' . $bc[$var] . '><td >';
            $listofmodulesforexternal = explode(',', $conf->global->MAIN_MODULES_FOR_EXTERNAL);

            if (in_array('ticket', $listofmodulesforexternal)) {
                $etat_external = $langs->trans('activer');
            } else {
                $etat_external = $langs->trans('desactiver');
            }
            print $langs->trans("activer pour utilisateur externe") . '</td><td>' . $etat_external . '</td><td></td>';
            print '<td align="right"><input type="submit" class="button" value="' . $langs->trans("Modify") . '"></td></tr></form>';
                   $var = !$var;

            print '<form method="post" action="ticket_free.php">';
            print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
            print '<input type="hidden" name="action" value="datatable">';
            print '<tr ' . $bc[$var] . '><td >';


        if (!empty($conf->global->MAIN_USE_JQUERY_DATATABLES)){
            $etat_datatable = $langs->trans('activer');
        }else{
            $etat_datatable = $langs->trans('desactiver');
        }
            print $langs->trans("AdminDatatable") . '</td><td>'.$etat_datatable.'</td><td></td>';
            print '<td align="right"><input type="submit" class="button" value="' . $langs->trans("Modify") . '"></td></tr></form>';
            
            $var = !$var;
            print '<tr ' . $bc[$var] . '><td >';
            print $langs->trans("login admnistrateur") . ':</td><td>';
            print $conf->global->ticketfree_name_admin;

            print '<form method="post" action="ticket_free.php">';
            print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
            print '<input type="hidden" name="action" value="set_login"><td></td>';
            print '<td align="right"><input type="submit" class="button" value="' . $langs->trans("Modify") . '"></td></tr></form>';
            print '</form>';
//print '</td><td></td></tr>';
        } catch (Exception $e) {
            print 'connection à hesk impossible</td>';
            print '<td align="right"><input type="submit" class="button" value="' . $langs->trans("Modify") . '"></td></tr></form>';
exit();
        }


        print '</table>';
        if ($soap->user != ''){
        print '<h2>' . $langs->trans("liaisons des utilisateur") . '</h2>';
        print '<table class="nobordernopadding" width="100%">';
        print '<tr class="liste_titre">';
        print '<td width="50%">' . $langs->trans("utilisateur dolibarr") . '</td>';
        print '<td>' . $langs->trans("utlisateur hesk") . '</td><td></td>';
        print "</tr>\n";
        $heskuser = $soap->GetUsers();
        $var = !$var;
        $usehesk = array();
        $usedolibarr = array();
        $i = 0;

        $sql = 'select t.id,t.id_dolibarr,t.id_hesk,' . MAIN_DB_PREFIX . 'user.firstname,' . MAIN_DB_PREFIX . 'user.`name` from ' . MAIN_DB_PREFIX . 'ticketfree_users_join as t
left outer join ' . MAIN_DB_PREFIX . 'user on t.id_dolibarr=' . MAIN_DB_PREFIX . 'user.rowid';
        $result = $db->query($sql);
        if ($result) {

            while ($obj2 = $db->fetch_object($result)) {

                $var = !$var;
                print '<tr ' . $bc[$var] . '><td>' . $obj2->firstname . ' ' . $obj2->name . '</td><td>' . $heskuser[$obj2->id_hesk - 1]['name'] . '</td><td align="right"><form method="post" action="ticket_free.php"><input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '"><input type="hidden" name="action" value="removeuser"><input type="hidden" name="id" value="' . $obj2->id . '"><input type="submit" class="button" value="' . $langs->trans("remove") . '"></form></tr>';
                $usehesk[$i] = $obj2->id_hesk;
                $usedolibarr[$i] = $obj2->id_dolibarr;
                $i++;
            }
        } else {
            echo '<br>le module n est pas configurer corectement';
            echo '<br>dolibarr ne peut acceder a hesk';
            exit;
        }


        $counthesk = count($usehesk);
        $countdolibarr = count($usedolibarr);

        $var = !$var;
        $html = '<tr ' . $bc[$var] . '><td>';
        $html .= '<form method="post" action="ticket_free.php">';
        $html .= '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
        $html .= '<input type="hidden" name="action" value="setuser">';
        $html .= '<select name="dolibarr">';
        $dolibarr_user = 0;
        $sql = 'select rowid, `name`, firstname, statut,admin from ' . MAIN_DB_PREFIX . 'user';
        $result = $db->query($sql);
        if ($result) {


            while ($obj2 = $db->fetch_object($result)) {

                $use = 0;

                for ($i = 0; $i < $countdolibarr; $i++) {

                    if ($usedolibarr[$i] == $obj2->rowid)
                        $use = 1;
                }
                if ($use == 0) {
                    $html .= '<option value="' . $obj2->rowid . '">' . $obj2->firstname . ' ' . $obj2->name . '</option>';
                }
                $dolibarr_user++;
            }
        }




        $html .= '</select></td><td>';
        $html .= '<select name="hesk">';



        $countheskuser = count($heskuser);
        $countdolibarr = count($usedolibarr);

        for ($h = 0; $h < $countheskuser; $h++) {



            $use = 0;
            for ($i = 0; $i < $countdolibarr; $i++) {
                if ($usehesk[$i] == $heskuser[$h]['id'])
                    $use = 1;
            }

            if ($use == 0) {
                @$html .= '<option value="' . $heskuser[$h]['id'] . '">' . $heskuser[$h]['name'] . '</option>';
                $select = 1;
            }
        }



        $html .= '</select>';
        $html .= '<td colspan="3" align="right"><br><input type="submit" class="button" value="' . $langs->trans("add") . '"></td>';
        $html .= '</td></tr>';
        $diffdol = $dolibarr_user - $countdolibarr;
        $diffhesk = $countheskuser - $counthesk;

        if (($diffdol >> 0) && ($diffhesk >> 0))
            print $html;
        print '</table></form>';


        break;
}
}

$db->close();

llxFooter();
?>
