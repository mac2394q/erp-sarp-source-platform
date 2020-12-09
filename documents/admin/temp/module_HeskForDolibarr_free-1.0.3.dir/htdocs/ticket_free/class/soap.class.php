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

class soap extends CommonObject {

    var $session;
    var $user;
    var $pass;
    var $hash;
    var $userhesk;

    // list permission.
    /* manage users */

    const PERM_CAN_MAN_USERS = 'can_man_users';
    /* manage kb */
    const PERM_CAN_MAN_KB = 'can_man_kb';
    /* manage categories */
    const PERM_CAN_MAN_CAT = 'can_man_cat';
    /* reply tickets */
    const PERM_CAN_REPLY_TICKETS = 'can_reply_tickets';
    /* delete tickets */
    const PERM_CAN_DEL_TICKETS = 'can_del_tickets';
    /* edit tickets */
    const PERM_CAN_EDIT_TICKETS = 'can_edit_tickets';
    /* view tickets */
    const PERM_CAN_VIEW_TICKETS = 'can_view_tickets';
    /* delete notes */
    const PERM_CAN_DEL_NOTES = 'can_del_notes';
    // reply ticket
    // merge ticket
    const PERM_CAN_MERGE_TICKETS = 'can_merge_tickets';
    // CHANGE CATEGORIE
    const PERM_CAN_CHANGE_CAT = 'can_change_cat';
    // MANAGE CANNED
    const PERM_CAN_MAN_CANNED = 'can_man_canned';
    const PERM_CAN_ADD_ARCHIVE = 'can_add_archive';
    const PERM_CAN_ASSIGN_SELF = 'can_assign_self';
    const PERM_CAN_ASSIGN_OTHERS = 'can_assign_others';
    const PERM_CAN_VIEW_UNASSIGNED = 'can_view_unassigned';
    const PERM_CAN_VIEW_ASS_OTHERS = 'can_view_ass_others';
    const PERM_CAN_VIEW_ONLINE = 'can_view_online';

    function soap($DB, $idhesk) {
        global $conf;
        $this->db = $DB;
        $this->user = $conf->global->ticketfree_login_admin;
        $this->pass = $conf->global->ticketfree_pass_admin;
        $this->hash = $conf->global->ticketfree_pass_hash;
        if ($idhesk != 'admin'){
            $this->userhesk = $this->GetUsers();
        $this->user = '';
        $this->pass = '';
        $this->hash = '';
        if (is_array($this->userhesk)){
        foreach ($this->userhesk as $v) {


            if ($v['id'] == $idhesk) {
                $this->user = $v['user'];
                $this->pass = $v['pass'];
                $this->hash = TRUE;
            }
        }

        $this->login($this->user, $this->pass, $this->hash);
        
    }  else {
    print $userhesk;    
    }
        }
    }
    

    function GetUsers() {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.

            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {
           
                
                $this->login($this->user, $this->pass, $this->hash);
                $response = $client->get_users($this->session);
                
            } catch (SoapFault $e) {

                $response = 'get user: ' . $e->getMessage();
                //$response = $client->__getLastResponse(); //= 
            }


            // echo $client->__getLastResponse();
        } catch (Exception $e) {
            $response = 'Get user Error: ' . $e->getMessage();
        }

        return $response;
    }

    function get_service_version() {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {

                $response = $client->get_service_version();
            } catch (SoapFault $e) {

                throw new SoapFault(__METHOD__, $e); 
            }


            // echo $client->__getLastResponse();
        } catch (Exception $e) {
            throw new SoapFault(__METHOD__, $e);
        }

        return $response;
    }


    function get_question_use() {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {

                $response = $client->get_question_use();
            } catch (SoapFault $e) {

                $response = 'get_question_use Error: ' . $e->getMessage();
            }


            // echo $client->__getLastResponse();
        } catch (Exception $e) {
            $reponse = 'get_question_use Error: ' . $e->getMessage();
        }

        return $response;
    }

 
    function get_custom_fields() {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {

                $response = $client->get_custom_fields();
                return $response;
            } catch (SoapFault $e) {

                return 'get_custom_fields :' . $e->getMessage();
            }


            //echo $client->__getLastResponse();
        } catch (Exception $e) {
            return 'get_custom_fields :' . $e->getMessage();
        }
    }



    function get_priorities() {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {

                $response = $client->get_priorities();

                return $response;
            } catch (SoapFault $e) {

                return 'get priorité :' . $e->getMessage();
            }


            //echo $client->__getLastResponse();
        } catch (Exception $e) {
            return 'get priorité :' . $e->getMessage();
        }
    }

 

    function get_categories($iduser = 0) {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {
                $this->login($this->user, $this->pass, $this->hash);

                $response = $client->get_categories($this->session, $iduser);
                return $response;
            } catch (SoapFault $e) {

                return 'Get gategories :' . $e->getMessage();
            }


            //echo $client->__getLastResponse();
        } catch (Exception $e) {
            return 'Get gategories :' . $e->getMessage();
        }
    }

    function login($userhesk, $passhesk, $hash) {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {

                $response = $client->login($userhesk, $passhesk, $hash);
                $this->session = $response;
                return $response;
            } catch (SoapFault $e) {
                $this->session = NULL;
                return 'Login :' . $e->getMessage();
            }


            //echo $client->__getLastResponse();
        } catch (Exception $e) {
            return 'Login :' . $e->getMessage();
        }
    }

 

    

    function get_ticket_id($id) {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {
                $this->login($this->user, $this->pass, $this->hash);
                $response = $client->get_ticket_id($id, $this->session);
            } catch (SoapFault $e) {

                $response = $e->getMessage();
                //return $client->__getLastResponse();
            }


            //echo $client->__getLastResponse();
        } catch (Exception $e) {
            $response = $e->getMessage();
        }

        return $response;
    }

    function get_all_ticket($idowner = 0, $sortfield = 0, $sortorder = 0) {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {
                $this->login($this->user, $this->pass, $this->hash);
                $response = $client->get_all_ticket($idowner, $sortfield, $sortorder, $this->session);

                return $response;
            } catch (SoapFault $e) {

                //return $e->getMessage() ;
                return 'Get all ticket: ' . $client->__getLastResponse();
            }


            // echo $client->__getLastResponse();
        } catch (Exception $e) {
            return 'Get all ticket :' . $e->getMessage();
        }
    }

    function get_ticket($trackingID) {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {
                $this->login($this->user, $this->pass, $this->hash);
                $response = $client->get_ticket($trackingID, $this->session);
            } catch (SoapFault $e) {

                //$response = $e->getMessage();
                return 'Get ticket ' . $client->__getLastResponse();
            }


            // echo $client->__getLastResponse();
        } catch (Exception $e) {
            $response = 'Get ticket :' . $e->getMessage();
        }

        return $response;
    }

    function search_ticket() {
        
    }

    function get_note($id) {
        global $conf;

        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {

                $response = $client->get_note($id);
                return $response;
            } catch (SoapFault $e) {

                return $e->getMessage();
            }


            // echo $client->__getLastResponse();
        } catch (Exception $e) {
            return 'Get note :' . $e->getMessage();
        }
    }

    

    function get_replies($id) {
        global $conf;
        try {
            if (!defined('IN_SCRIPT')) {
                /**
                 * required by Hesk
                 */
                define('IN_SCRIPT', 1);
            }
            //todo dinamic location
            // configuration.
            $ConfigSoap = array(
                'soap_version' => SOAP_1_2,
                'encoding' => 'UTF-8',
                'location' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'uri' => $conf->global->ticketfree_HESK_BASE .'/'. $conf->global->ticketfree_HESK_SOAP,
                'wsdl_cache' => 0,
                'trace' => 1
            );
            // create SOAP client.
            $client = new SoapClient(null, $ConfigSoap);
            // required to store authentication to the service.
            $client->__setCookie('session_id', session_id());
            try {
                $this->login($this->user, $this->pass, $this->hash);
                $response = $client->get_replies($id, $this->session);
            } catch (SoapFault $e) {

                return 'Get replies :' . $e->getMessage();
            }


            // echo $client->__getLastResponse();
        } catch (Exception $e) {
            return 'Get replies :' . $e->getMessage();
        }

        return $response;
    }


    private function check_permission($permission) {

        if (!$this->session['isadmin'] && (strpos($this->session['heskprivileges'], $permission) === false)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_categorie($idcat) {
        global $soap;
        if (($this->session['isadmin']) || (in_array($idcat, $this->session['categories'])))
            return TRUE;
    }

    /* check if ticket is visible for user
     *
     * @return true if visible
     * 
     */

    function check_view_ticket($ticket) {

        $view = $view_other = $view_unassigned = true;

        $view = $this->check_permission(self::PERM_CAN_VIEW_TICKETS);

        if ($ticket['owner'] == 0)
            $view_unassigned = $this->check_permission(self::PERM_CAN_VIEW_UNASSIGNED);

        if ($ticket['owner'] != $this->session['id'] && $ticket['owner'] != 0)
            $view_other = $this->check_permission(self::PERM_CAN_VIEW_ASS_OTHERS);

        $cat = $this->check_categorie($ticket['category']);


        if ($this->session['isadmin'] || ($view && $view_other && $view_unassigned && $cat))
            return TRUE;
    }

}

?>
