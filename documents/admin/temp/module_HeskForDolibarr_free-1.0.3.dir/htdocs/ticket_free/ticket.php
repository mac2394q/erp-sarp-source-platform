<?php

/*
 * Copyright (C) 2012 jacquel jerome <icfr.eirl@free.fr>
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
 *   	\file       htdocs/ticket_free/ticket.php
 * 		\ingroup   ticket
 * 		\brief      This file is an example of a php page
 * 		\version    $Id: ticket.php,v 1 2012/07/31 
 * 		\author		jacquel jerome		
 */
// Change this following line to use the correct relative path (../, ../../, etc)
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
@include ('./lib/ticket.lib.php');
@include ('./lib/options.php');
$langs->load("ticket@ticket_free");


// Load traductions files requiredby by page
// Get parameters
$id = GETPOST("id") ? GETPOST("id") : '';
$id = GETPOST("track") ? GETPOST("track") : $id;
if ($id == '')
    $message = 'aucun ticket trouvé';
// Protection if external user
if ($user->societe_id > 0 || $id == '') {
    accessforbidden($message);
} else {




    $iduser = $user->id;
    $ticket = new ticket($db);
    $soap = new soap($db, $ticket->GetHeskOwnerId($iduser));
if (empty($soap->session))
    accessforbidden ($langs->trans('nolink'));
    $ticket->fletch($id);
    $msg = '';
    if (is_string($id))
        $id = $ticket->id;
    if ($ticket->err_message != '')
        $msg = $ticket->err_message;

    $ticketarray = $soap->get_ticket_id($id);



    /*     * *****************************************************************
     * ACTIONS
     *
     * Put here all code to do according to value of "action" parameter
     * ****************************************************************** */

    /*     * *************************************************
     * PAGE
     *
     * Put here all code to build page
     * ************************************************** */
  
    $js = array($dol_url_root . '/ticket_free/js/join.js');
    $css = array($dol_url_root . '/ticket_free/css/custom.css');
    llxHeader('', 'details ticket', '', '', '', '', $js, $css, '');

    $h = 0;
    $head = array();

    $head[$h][0] = DOL_URL_ROOT . "/ticket_free/ticket.php?id=" . $id;
    $head[$h][1] = $langs->trans("card");
    $head[$h][2] = 'card';
    $h++;

    print_fiche_titre($langs->trans("ticket"));
    $html = new Form($db);
    $ticket->fletch($id);

    $titre = $langs->trans("cardticket");

    dol_fiche_head($head, 'Ticket', $titre, 0, $picto);
    if ($ticket->err_message == '') {

        print '<table class="borderticket" width="100%"><tr>';

        // Ref
        print '<td width="10%" >' . $langs->trans("Ref") . '</td><td class="' . $options_priority[$ticket->priority] . '" colspan="4">';
        print $ticket->trackid;
        print '</td>';

        print '</tr>';

        // subject
        print '<tr><td colspan="1">' . $langs->trans("subject") . '</td><td colspan="4">' . $ticket->subject . '</td>';

        //nom email
        print '<tr><td colspan="1">' . $langs->trans("name") . '</td><td colspan="2">' . $ticket->name . '</td><td>' . $langs->trans("email") . '</td><td><a href=mailto:' . $ticket->email . '>' . $ticket->email . '</a></td></tr>';

        //Owner //piority
        //
                         print '<tr><td colspan="1">' . $langs->trans("owner") . '</td><td colspan="2">' . $ticket->GetOwner($ticket->owner) . '</td>';

        print'   <td colspan="1">' . $langs->trans("category") . '</td><td colspan="2">' . $ticket->category . '</td></tr>';
        //status 
        print '<tr><td class="statut">' . $langs->trans("statut") . '</td><td width="180px">' . ticket_img_action($alt, $ticket->status) . $langs->trans($status_options[$ticket->status]) . '</td><td>' . $langs->trans("lastchange") . ': ' . dol_print_date($ticket->lastchange, 'daytext') . '</td><td>' . $langs->trans("creation") . ': ' . dol_print_date($ticket->dt, 'daytext') . '</td></tr>';
        $var = TRUE;

        $custom_field = $soap->get_custom_fields();

        foreach ($custom_field as $k => $v) {
            if ($ticketarray[$k] != '') {
                if ($var)
                    print "<tr><td class=\"nobordernopadding\"></td>";

                print "<td colspan=\"2\">" . $custom_field[$k]['name'] . ": " . $ticketarray[$k] . "</td>";
                if (!$var)
                    print "</tr>";
                $var = !$var;
            }
        }

        if ($var)
            print "</tr>";



        //message

        print '<tr><td colspan="1">' . $langs->trans("message") . '</td><td colspan="4">' . $ticket->message . '</td></tr>';
      

        print "</table></div>\n";



        print "<div class=mess_act>";
        print "<div class=action>";
        print "";
        print '<div class="notes">';

        $note = $soap->get_note($id);

        foreach ($note as $n) {
            print '<div class="note"><div class="reply">' . $ticket->GetOwner($n['who']) . " " . $langs->trans('le') . " " . dol_print_date($n['dt'], 'daytext') . ' à ' . dol_print_date($n['dt'], '%H:%M') . '<br><br>' . $n['message'] . '</div></div>';
        }


        print '</div class="notes">';

        print '<div class="histo">';
        print $langs->trans("history") . ':<br>' . utf8_encode($ticket->history_utf8);
        print '</div>';
        print '</div>';
        print "<div class=messages>";

        $reply = $soap->Get_replies($id);
        if (is_array($reply)) {
            foreach ($reply as $rep) {
                print '<div class="cont_mess">' . $ticket->GetOwner($rep['staffid']) . '(' . $rep['name'] . ") " . $langs->trans('le') . " " . dol_print_date($rep['dt'], 'daytext') . " à " . dol_print_date($rep['dt'], '%H:%M') . "<div class=\"reply\">" . $rep['message'] . "</div>";
                if (strlen($rep['attachments']) > 0) {
                    if ($conf->global->HESK_BASE == 'not configured') {

                        echo $langs->trans("lien vers hesk non configurer lien vers fichier joint non afficher");
                    } else {


                        $att = explode(',', substr($rep['attachments'], 0, -1));

                        foreach ($att as $myatt) {
                            list($att_id, $att_name) = explode('#', $myatt);


                            echo '
		<a href="' . $conf->global->HESK_BASE . '/download_attachment.php?att_id=' . $att_id . '&track=' . $ticket->trackid . '&e=' . $ticket->email . '"><img src="./img/clip.png" width="16" height="16" alt="' . $langs->trans("dnl") . ' ' . $att_name . '" title="' . $langs->trans("dnl") . ' ' . $att_name . '"/></a>
		<a href="' . $conf->global->HESK_BASE . '/download_attachment.php?att_id=' . $att_id . '&track=' . $ticket->trackid . '&e=' . $ticket->email . '">' . $att_name . '</a><br />
        ';
                        }
                    }
                }

                if (!$rep['read'])
                    print '<p class="rate">reponse non lu</p>';
                print "</div>";
            }
        }else {
            $msg .= $reply . '<br>';
        }




        print "</div>";
        print "</div class=mess_act>";
    }


    dol_htmloutput_errors($msg);

// End of page
    $db->close();
    llxFooter('$Date: 2011/07/31 22:21:57 $ - $Revision: 1.19 $');
}
?>
