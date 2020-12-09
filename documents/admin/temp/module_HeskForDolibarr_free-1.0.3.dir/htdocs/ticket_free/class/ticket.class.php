<?php

/**
 * 
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
 *
 *
 * 
 */
class ticket extends CommonObject {

    var $db;
    var $error;
    var $element = 'ticket_free';
    var $soap;
    var $err_message = '';
    var $id;
    var $trackid;
    var $name;
    var $email;
    var $category;
    var $categorie_id;
    var $priority;
    var $subject;
    var $message;
    var $dt;
    var $lastchange;
    var $ip;
    var $status;
    var $owner;
    var $lastreplier;
    var $replierid;
    var $archive;
    var $locked;
    var $attachments;
    var $history;
    var $histoty_utf8;
    var $custom1;
    var $custom2;
    var $custom3;
    var $custom4;
    var $custom5;
    var $custom6;
    var $custom7;
    var $custom8;
    var $custom9;
    var $custom10;
    var $custom11;
    var $custom12;
    var $custom13;
    var $custom14;
    var $custom15;
    var $custom16;
    var $custom17;
    var $custom18;
    var $custom19;
    var $custom20;

    function ticket($DB) {

        global $conf;
        $this->db = $DB;
    }

    function fletch($id) {

        global $conf, $soap;
        
            if (is_numeric($id)) {
                $ticket = $soap->get_ticket_id($id);
            } else {
                $ticket = $soap->get_ticket($id);
            }
            $categories = $soap->get_categories();
         

        if (!is_string($ticket)) {

            $this->id = $ticket['id'];
            $this->trackid = $ticket['trackid'];
            $this->name = $ticket['name'];
            $this->email = $ticket['email'];
            $this->category = $categories['CATEGORIES'][$ticket['category'] - 1]['name'];
            $this->categorie_id = $ticket['category'];
            $this->priority = $ticket['priority'];
            $this->subject = $ticket['subject'];
            $this->message = $ticket['message'];
            $this->dt = $ticket['dt'];
            $this->lastchange = $ticket['lastchange'];
            $this->ip = $ticket['ip'];
            $this->status = $ticket['status'];
            $this->owner = $ticket['owner'];
            $this->lastreplier = $ticket['lastreplier'];
            $this->replierid = $ticket['replierid'];
            $this->archive = $ticket['archive'];
            $this->locked = $ticket['locked'];
            $this->attachments = $ticket['attachements'];
            $this->history = $ticket['history'];
            $this->history_utf8 = utf8_decode($ticket['history']);
            $this->custom1 = $ticket['custom1'];
            $this->custom2 = $ticket['custom2'];
            $this->custom4 = $ticket['custom3'];
            $this->custom5 = $ticket['custom4'];
            $this->custom6 = $ticket['custom6'];
            $this->custom7 = $ticket['custom7'];
            $this->custom8 = $ticket['custom8'];
            $this->custom9 = $ticket['custom9'];
            $this->custom10 = $ticket['custom10'];
            $this->custom11 = $ticket['custom11'];
            $this->custom12 = $ticket['custom12'];
            $this->custom13 = $ticket['custom13'];
            $this->custom14 = $ticket['custom14'];
            $this->custom15 = $ticket['custom15'];
            $this->custom16 = $ticket['custom16'];
            $this->custom17 = $ticket['custom17'];
            $this->custom18 = $ticket['custom18'];
            $this->custom19 = $ticket['custom19'];
            $this->custom20 = $ticket['custom20'];
            return 1;
        } else {
            $this->err_message = $ticket;
        }
    }





    function GetOwner($id) {
        global $conf,$soap,$langs;
        $owner = '';
        
        $sql2 = "select u.rowid as tid ,u.`name`,u.firstname from " . MAIN_DB_PREFIX . "user as u where u.rowid=(select t.id_dolibarr from " . MAIN_DB_PREFIX . "ticketfree_users_join as t where t.id_hesk='" . $id . "')";

        $resql2 = $this->db->query($sql2);
        if ($resql2) {
            while ($obj2 = $this->db->fetch_object($resql2)) {

                $owner = $obj2->firstname . ' ' . $obj2->name;
            }
        }
        
        if ($owner != ''){

        return $owner;
        }  else {
            $owner = $this->GetHeskName($id);
            if ($owner != ''){
            return $owner.' ('.$langs->trans('n\'est pas utilisateur dolibarr').')';
            }  else {
                return $langs->trans('non assigné');
            }
        }
    }

    function GetHeskOwnerId($id) {
        global $conf, $db;
        $owner = '';
        $sql2 = 'select t.id_hesk from ' . MAIN_DB_PREFIX . 'ticketfree_users_join as t where t.id_dolibarr=' . $id;

        $resql2 = $db->query($sql2);
        if ($resql2) {
            while ($obj2 = $db->fetch_object($resql2)) {



                $owner = $obj2->id_hesk;
            }
        }

        return $owner;
    }

    function GetHeskName($id) {
        global $conf, $soap;

        $user = $soap->userhesk;
        if (is_array($user)){
        foreach ($user as $k) {

            if ($k['id'] == $id)
                $username = $k['name'];
        }
                return $username;
        }else {
            return $user;    
        }
    }

    function GetNote($id) {
        global $conf;

        $note = $soap->get_note($id);
        return $note;
    }

}

?>
