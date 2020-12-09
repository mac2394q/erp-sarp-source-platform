<?php

/* 
 * Copyright (C) 2012 jacquel jerome <icfr.eirl@free.fr>
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
 *   	\file       htdocs\ticket\tickets.php
 * 		\ingroup    ticket
 * 		\brief      page d accueil du module de tickets
 * 		\version    
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


$langs->load("ticket@ticket_free");
$userid = $user->id;
$ticket = new ticket($db);
$soap = new soap($db, $ticket->GetHeskOwnerId($userid));



// Protection if external user
if ($user->societe_id > 0 || !$user->rights->ticket_free->lire) {
    accessforbidden();
}
if (empty($soap->session))
    accessforbidden ($langs->trans('nolink'));


/* * *************************************************
 * PAGE
 *
 * Put here all code to build page
 * ************************************************** */


$transAreaType = $langs->trans("ticket");
$css = array($dol_url_root . '/ticket_free/css/custom.css');
llxHeader("", $langs->trans("Ticket"), $helpurl, '', '', '', '', $css, '');

print_fiche_titre($transAreaType);

print '<table border="0" width="100%" class="notopnoleftnoright">';
$ticket = array();
$total = 0;
$allticket = $soap->get_all_ticket('all');

for ($t = 0; $t < count($allticket); $t++) {
    if ($allticket[$t]['status'] != 3) {
        $ticket[$allticket[$t]['category']]++;
        $priotity[$allticket[$t]['priority']]++;
        $status[$allticket[$t]['status']]++;
        $total++;
    }
}


print '<tr><td valign="top" width="30%" class="notopnoleft">';
$rowspan = 2;

/*
 * Statistics area
 */
$categories = $soap->get_categories();
$categories_count = count($categories['CATEGORIES']);
$cat = 0;
for ($c = 0; $c < $categories_count; $c++) {

    $categorie[$categories['CATEGORIES'][$c]['id']] = strlen($categories['CATEGORIES'][$c]['name']) > 15 ? substr($categories['CATEGORIES'][$c]['name'], 0, 20) . '...' : $categories['CATEGORIES'][$c]['name'];
    $cat++;
}


print '<table class="stat" width="100%">';
print '<tr class="liste_titre"><td colspan="2">' . $langs->trans("Statistics") . '</td></tr>';
if ($conf->use_javascript_ajax && ( count($ticket) >= 2) && (count($ticket) < 10)) {


    print '<tr><td align="center">' . $langs->trans('par categories');
    $dataseries = array();

    for ($i = 0; $i <= $cat + 4; $i++) {
        if (round($ticket[$i]) > 0) {


            $dataseries[] = array('label' => $categorie[$i], 'data' => round($ticket[$i]));
        }
    }
    $data = array('series' => $dataseries);
    dol_print_graph('stats', 300, 180, $data, 1, 'pie', 0);
    print '</td></tr>';
} else {
    
}

if ($conf->use_javascript_ajax && ( count($status) >= 2)) {


    print '<tr><td align="center">' . $langs->trans('par status');
    $dataseries3 = array();

    for ($i = 0; $i <= 10; $i++) {
        if (round($status[$i]) > 0) {


            $dataseries3[] = array('label' => $langs->trans($status_options[$i]), 'data' => round($status[$i]));
        }
    }
    $data3 = array('series' => $dataseries3);
    $theme_datacolor = array(array(255, 0, 0), array(255, 153, 51), array(0, 0, 255), array(0, 100, 0), array(0, 0, 0));
    dol_print_graph('stats3', 300, 180, $data3, 2, 'pie', 2);
    print '</td></tr>';
} else {
    
}

if ($conf->use_javascript_ajax && ( count($priotity) >= 2)) {


    print '<tr><td align="center">' . $langs->trans('par priorite');
    $dataseriesp = array();

    for ($i = 0; $i <= 5; $i++) {
        if (round($priotity[$i]) > 0) {


            $dataseriesp[] = array('label' => $langs->trans($options_priority[$i]), 'data' => round($priotity[$i]));
        }
    }
    $data2 = array('series' => $dataseriesp);
    $theme_datacolor = array(array(240, 147, 234), array(255, 0, 0), array(246, 234, 15), array(0, 170, 0), array(0, 0, 170));
    dol_print_graph('stats2', 300, 180, $data2, 2, 'pie', 2);
    print '</td></tr>';
} else {
    
}


print '<tr class="liste_total"><td>' . $langs->trans("total des tickets ouvert") . '</td><td align="right">';
print $total;
print '</td></tr>';
print '</table>';

//print '</td><td valign="top" width="70%" class="notopnoleftnoright">';
//end stat

print "</td><td style=\"vertical-align:top\">";


//plus urgent

$allticket = $soap->get_all_ticket('all', "priority", "asc");
//print_r($allticket);
$max = $conf->global->ticketfree_nbre_lignes;

$num1 = $num = count($allticket);
if ($num > $max)
    $num = $max;

$i = 0;
$j = 0;

print '<table class="noborder" width="100%" >';

print '<tr class="liste_titre"><td colspan="3">' . $langs->trans('les') . ' ' . $max . ' ' . $langs->trans('ticket les plus urgents') . '</td></tr>';
while ($j < $num) {


    if ($allticket[$i]['status'] != 3 && ($soap->check_view_ticket($allticket[$i]))) {
        $var = !$var;

        print "<tr $bc[$var]>";

            print '<td ><p class="' . $options_priority[$allticket[$i]['priority']] . '"><a href="ticket.php?id=' . $allticket[$i]['id'] . '">' . $allticket[$i]['trackid'] . '</a></p>';

            print "</td>";
            print '<td>' . dol_trunc($allticket[$i]['subject'], 32) . '</td>';
            print '<td class="type">' . $categories['CATEGORIES'][$allticket[$i]['category']-1]['name'] . '</td>';
        
        print "</tr>\n";
        $j++;
    }$i++;
    if ($i >= $num1)
        break;
}
print "</table>";
print "<br />";

//plus recent

$allticket = $soap->get_all_ticket('all', "lastchange", "desc");
$max = $conf->global->ticketfree_nbre_lignes;
$num1 = $num = count($allticket);
if ($num > $max)
    $num = $max;
$i = 0;
$j = 0;


print '<table class="noborder" width="100%" >';
print '<tr class="liste_titre"><td colspan="3">' . $langs->trans('les') . ' ' . $max . ' ' . $langs->trans('derniers ticket modifié') . '</td></tr>';
while ($j < $num) {


    if ($allticket[$i]['status'] != 3 && ($soap->check_view_ticket($allticket[$i]))) {

        $var = !$var;
        print "<tr $bc[$var]>";
       
            print '<td ><p class="' . $options_priority[$allticket[$i]['priority']] . '"><a href="ticket.php?id=' . $allticket[$i]['id'] . '">' . $allticket[$i]['trackid'] . '</a></p>';
            print "</td>";
            print '<td>' . dol_trunc($allticket[$i]['subject'], 32) . '</td>';
            print '<td class="type">' . $categories['CATEGORIES'][$allticket[$i]['category']-1]['name'] . '</td>';
        
        print "</tr>\n";
        $j++;
    }
    $i++;
    if ($i >= $num1)
        break;
}
print "</table>";
print "<br />";


$allticket = $soap->get_all_ticket('all', "lastchange", "asc");
$max = $conf->global->ticketfree_nbre_lignes;
$num1 = $num = count($allticket);
if ($num > $max)
    $num = $max;
$i = 0;
$j = 0;

print '<table class="noborder" width="100%" >';
print '<tr class="liste_titre"><td colspan="3">' . $langs->trans('les') . ' ' . $max . ' ' . $langs->trans('ticket les plus anciens') . '</td></tr>';
while ($j < $num) {


    if ($allticket[$i]['status'] != 3 && ($soap->check_view_ticket($allticket[$i]))) {

        $var = !$var;

        print "<tr $bc[$var]>";
      
      
            print '<td ><p class="' . $options_priority[$allticket[$i]['priority']] . '"><a href="ticket.php?id=' . $allticket[$i]['id'] . '">' . $allticket[$i]['trackid'] . '</a></p>';

            print "</td>";
            print '<td>' . dol_trunc($allticket[$i]['subject'], 32) . '</td>';
           print '<td class="type">' . $categories['CATEGORIES'][$allticket[$i]['category']-1]['name'] . '</td>';
        
        print "</tr>\n";
        $j++;
    }$i++;
    if ($i >= $num1)
        break;
}
print "</table>";



// Put here content of your page
// ...


/* * *************************************************
 * LINKED OBJECT BLOCK
 *
 * Put here code to view linked object
 * ************************************************** */


// End of page
$db->close();
llxFooter();
?>
