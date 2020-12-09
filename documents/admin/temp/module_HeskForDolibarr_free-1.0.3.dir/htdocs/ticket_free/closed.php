<?php

/* Copyright (C) 2007-2010 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2012-2013 jacquel jerome <icfr.eirl@free.fr>
 *
 *  *This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
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
 *   	\file       ticket_free/closed.php
 * 		\ingroup   ticket
 * 		\brief      liste les ticket fermé
 * 		\version    v 0.1 2012/07/31 
 * 		\author		jacquel jerome icfr eirl
 * 		
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
@include ('./lib/options.php');
$res = 0;
if (!$res && file_exists(DOL_DOCUMENT_ROOT . "/ticket_free/class/soap.class.php"))
    $res = @include(DOL_DOCUMENT_ROOT . "/ticket_free/class/soap.class.php");
if (!$res && file_exists("./class/soap.class.php"))
    $res = @include("./class/soap.class.php");
if (!$res)
    die("Include of soap class fails");

$res = 0;
if (!$res && file_exists(DOL_DOCUMENT_ROOT . "/ticket_free/class/ticket.class.php"))
    $res = @include(DOL_DOCUMENT_ROOT . "/ticket_free/class/ticket.class.php");
if (!$res && file_exists("./class/ticket.class.php"))
    $res = @include("./class/ticket.class.php");
if (!$res)
    die("Include of soap class fails");
@include ('./lib/options.php');
@include ('./lib/ticket.lib.php');


$langs->load("companies");
$langs->load("other");
$langs->load("ticket@ticket_free");

// Get parameters
if (GETPOST('id')) {
    $id = GETPOST('id');
}
if (GETPOST('ticket')) {
    $id = GETPOST('ticket');
}

// Protection if external user
if ($user->societe_id > 0 || !$user->rights->ticket_free->lire) { 
    accessforbidden();
}


$iduser = $user->id;
$view_isset = 0;

$ticket = new ticket($db);
$soap = new soap($db, $ticket->GetHeskOwnerId($iduser));
if (empty($soap->session))
    accessforbidden ($langs->trans('nolink'));


/* * *****************************************************************
 * ACTIONS
 *
 * Put here all code to do according to value of "action" parameter
 * ****************************************************************** */
$redir = '';
if (GETPOST('mode')) {
    if ($_GET['mode'] == 'owner') {
        $modeticket = 0;
        $iduser = $user->id;
        $redir = '?mode=owner';
    }

    if (GETPOST('mode') == 'nonassigne') {
        $modeticket = 1;
        $modesql = " where t.owner ='0'";
        $redir = '?mode=nonassigne';
    }

    if (GETPOST('mode') == 'orphelins') {
        $modeticket = 2;
        $redir = '?mode=orphelins';
    }
}


if (GETPOST('action')) {

    if (GETPOST('action') == 'view') {
        $iduser = GETPOST('element');
        $view_isset = 1;
    }


}

/* * *************************************************
 * PAGE
 *
 * Put here all code to build page
 * ************************************************** */
$css = array($dol_url_root . '/ticket_free/css/custom.css');
llxHeader('', 'ticket', '', '', '', '', '', $css, '');
$form = new Form($db);

print '<table class="noborder"><tr>';
print '<td style="width:120px">' . $langs->trans('voir les tickets de:') . '</td><td style="width:120px"> ';
//
print '<form action="closed.php" method="post">';
print '<input type="hidden" name="token" value="' . $_SESSION['newtoken'] . '">';
print '<input type="hidden" name="action" value="view">';
print'<select name="element" id="select" value="' . $iduser . '">';
print '<option></option>';
$sql = 'select name,firstname,(select id_hesk from ' . MAIN_DB_PREFIX . 'ticketfree_users_join where rowid = id_dolibarr) as id from ' . MAIN_DB_PREFIX . 'user';
$result = $db->query($sql);


if ($result) {
    $num = $db->num_rows($result);
    $i = 0;
    while ($i < $num) {
        $objp = $db->fetch_object($result);
        if ($objp->id != '') {

            if (( $modeticket == 0 ) && ($iduser == $objp->id )) {
                $selected = ' selected="selected"';
            } else {
                $selected = '';
            }
            print '<option value="' . $objp->id . '"' . $selected . '>' . $objp->firstname . ' ' . $objp->name . '</option>';
        }
        $i++;
    }
} else {
    print $langs->trans('le module n est pas configurer corectement');
    print '<br>' . $langs->trans('dolibarr ne peut acceder a hesk');
    print '<br>' . $langs->trans('rendez vous sur') . '<a href="' . $dol_url_root . '/admin/ticket.php">';
    print $langs->trans('la page de configuration du module</a> pour regler ce probleme');
    exit;
}
print'</select>';
print'<div id="textboxsearch"></div>';
print '<td><input type="submit" id="addelementbuton" class="button" value="' . $langs->trans("ok") . '"></td>';
print '</form></td></tr></table>';


if ($view_isset && $iduser != '' || $modeticket == '0') {
    $idowner = $ticket->GetHeskOwnerId($iduser);
    $allticket = $soap->get_all_ticket($idowner);
} elseif ($modeticket == 1) {

    $allticket = $soap->get_all_ticket(0);
} else {
    $allticket = $soap->get_all_ticket('all');
}

$categories = $soap->get_categories();

$num = count($allticket);
$i = 0;
print '<table class="noborder" width="100%" id="ticket">';
print '<thead><tr class="liste_titre"><th>' . $langs->trans('Id du ticket') . '</th><th>' . $langs->trans('nom') . '</th><th>' . $langs->trans('subject') . '</th><th>' . $langs->trans('categorie') . '</th><th>' . $langs->trans('statut') . '</th><th width="210px">' . $langs->trans('assigné à') . '</th></tr></thead>';
while ($i < $num) {
    $objp = $db->fetch_object($result);

    if (($allticket[$i]['status'] == 3) && ($soap->check_view_ticket($allticket[$i]))) {





                        //ticket
                        print '<td ><p class="' . $options_priority[$allticket[$i]['priority']] . '"><a href="ticket.php?id=' . $allticket[$i]['id'] . '">' . $allticket[$i]['trackid'] . '</a></p>';

                        print "</td>";

                        //nom
                        print '<td>' . $allticket[$i]['name'] . '</td>';
                        //sujet
                        print '<td>' . dol_trunc($allticket[$i]['subject'], 32) . '</td>';
                        //categorie
                        print '<td>' . $categories['CATEGORIES'][$allticket[$i]['category'] - 1]['name'] . '</td>';

                        //type
                      print '<td>' . ticket_img_action($alt, $allticket[$i]['status']) . $langs->trans($status_options[$allticket[$i]['status']]) . '</td>';
                        
                        print  '<td >'.$ticket->GetOwner($allticket[$i]['owner']).'</td>';
                       
                        print "</tr>\n";
    
        }
        if ($modeticket != 2) {
            
        
    }

    $i++;
}
print "</table>";


/* * *************************************************
 * LINKED OBJECT BLOCK
 *
 * Put here code to view linked object
 * ************************************************** */

dol_htmloutput_errors($msg);
if (!empty($conf->global->MAIN_USE_JQUERY_DATATABLES)) {



    print '<script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function() {
				jQuery(\'#ticket\').dataTable();
			} );
		</script>';
    print '<link rel="stylesheet" type="text/css" title="default" href="./css/hack_datatable.css">';
}
// End of page
$db->close();
llxFooter('$Date: 2011/07/31 22:21:57 $ - $Revision: 1.19 $');
//phpinfo();
?>
