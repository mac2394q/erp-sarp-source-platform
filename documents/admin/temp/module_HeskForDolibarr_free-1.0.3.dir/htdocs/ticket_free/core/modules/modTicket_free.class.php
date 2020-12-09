<?php

/*
 * Copyright (C) 2003      Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2009 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2010 Regis Houssin        <regis@dolibarr.fr>
 * Copyright (C) 2013      Jerome Jacquel       <contact@icfr.fr>
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
 * 		\defgroup   ticket_free     Module Ticket_free
 *      \brief     gestion des ticket avec hesk
 * 					Such a file must be copied into htdocs/includes/module directory.
 */
/**
 *      \file       htdocs/includes/modules/modMyModule.class.php
 *      \ingroup    mymodule
 *      \brief      Description and activation file for module MyModule
 * 		\version	$Id: modMyModule.class.php,v 1.67 2011/08/01 13:26:21 hregis Exp $
 */
include_once(DOL_DOCUMENT_ROOT . "/core/modules/DolibarrModules.class.php");

/**
 * 		\class      modMyModule
 *      \brief      Description and activation class for module MyModule
 */
class modTicket_free extends DolibarrModules {

    /**
     *   \brief      Constructor. Define names, constants, directories, boxes, permissions
     *   \param      DB      Database handler
     */
    function modTicket_free($DB) {
        global $langs, $conf;

        $this->db = $DB;

        // Id for module (must be unique).
        // Use here a free id (See in Home -> System information -> Dolibarr for list of used modules id).
        $this->numero = 5100090;
        // Key text used to identify module (for permissions, menus, etc...)
        $this->rights_class = 'ticket_free';

        // Family can be 'crm','financial','hr','projects','products','ecm','technic','other'
        // It is used to group modules in module setup page
        $this->family = "other";
        // Module label (no space allowed), used if translation string 'ModuleXXXName' not found (where XXX is value of numeric property 'numero' of module)
        $this->name = preg_replace('/^mod/i', '', get_class($this));
        // Module description, used if translation string 'ModuleXXXDesc' not found (where XXX is value of numeric property 'numero' of module)
        $this->description = "gestions de tickets avec hesk(version gratuite)";
        // Possible values for version are: 'development', 'experimental', 'dolibarr' or version
        $this->version = '1.0.3';
        // Key used in llx_const table to save module status enabled/disabled (where MYMODULE is value of property name of module in uppercase)
        $this->const_name = 'MAIN_MODULE_' . strtoupper($this->name);
        // Where to store the module in setup page (0=common,1=interface,2=others,3=very specific)
        $this->special = 1;
        // Name of image file used for this module.
        // If file is in theme/yourtheme/img directory under name object_pictovalue.png, use this->picto='pictovalue'
        // If file is in module/img directory under name object_pictovalue.png, use this->picto='pictovalue@module'
        $this->picto = 'ticket@ticket_free';

        // Defined if the directory /mymodule/includes/triggers/ contains triggers or not
        $this->triggers = 0;

        // Data directories to create when module is enabled.
        // Example: this->dirs = array("/mymodule/temp");
        $this->dirs = array();
        $r = 0;

        // Relative path to module style sheet if exists. Example: '/mymodule/css/mycss.css'.
        //$this->style_sheet = '/mymodule/mymodule.css.php';
        // Config pages. Put here list of php page names stored in admmin directory used to setup module.
        $this->config_page_url = array("ticket_free.php@ticket_free");

        //$this->style_sheet ='/ticket/css/custom.css';
        // Dependencies
        $this->depends = array();  // List of modules id that must be enabled if this module is enabled
        $this->requiredby = array(); // List of modules id to disable if this one is disabled
        $this->phpmin = array(5, 0);     // Minimum version of PHP required by module
        $this->need_dolibarr_version = array(3, 2); // Minimum version of Dolibarr required by module
        $this->langfiles = array("langfiles@ticket_free");


        // Constants
        // List of particular constants to add when module is enabled (key, 'chaine', value, desc, visible, 'current' or 'allentities', deleteonunactive)
        // Example: $this->const=array(0=>array('MYMODULE_MYNEWCONST1','chaine','myvalue','This is a constant to add',1),
        //                             1=>array('MYMODULE_MYNEWCONST2','chaine','myvalue','This is another constant to add',0) );
        //                             2=>array('MAIN_MODULE_MYMODULE_NEEDSMARTY','chaine',1,'Constant to say module need smarty',1)

        $this->const[0][0] = "ticketfree_HESK_BASE";
        $this->const[0][1] = "chaine";
        $this->const[0][2] = "http://";
        
        $this->const[1][0] = "ticketfree_HESK_BASE";
        $this->const[1][1] = "chaine";
        $this->const[1][2] = "soap";

        $this->const[2][0] = "ticketfree_nbre_lignes";
        $this->const[2][1] = "chaine";
        $this->const[2][2] = "10";

        $this->const[3][0] = "ticketfree_login_admin";
        $this->const[3][1] = "chaine";
        $this->const[3][2] = "";

        $this->const[4][0] = "ticketfree_pass_admin";
        $this->const[4][1] = "chaine";
        $this->const[4][2] = "";

        $this->const[5][0] = "ticketfree_pass_hash";
        $this->const[5][1] = "chaine";
        $this->const[5][2] = "0";

        $this->const[6][0] = "ticketfree_name_admin";
        $this->const[6][1] = "chaine";
        $this->const[6][2] = "non configurer";


        


//							
        // Dictionnaries
        $this->dictionnaries = array();


        // Boxes
        // Add here list of php file(s) stored in includes/boxes that contains class to show a box.
        $this->boxes = array();   // List of boxes
        $r = 0;
        // Example:

        $this->boxes[$r][1] = "box_tickets@ticket_free";
        $r++;
     

        $r=0;
        $this->rights = array();  // Permission array used by this module
        $this->rights_class = 'ticket_free';
        $this->rights[$r][0] = 5100091;
        $this->rights[$r][1] = 'Acces ticket';
        $this->rights[$r][2] = 'r';
        $this->rights[$r][3] = 1;
        $this->rights[$r][4] = 'lire';
        $r++;
        $this->rights[$r][0] = 5100092;
        $this->rights[$r][1] = 'parametre ticket';
        $this->rights[$r][2] = 'r';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'parametre';
        
      
        // Main menu entries
        $this->menus = array();   // List of menus to add
        $r = 0;


        $this->menu[$r] = array('fk_menu' => 0, // Put 0 if this is a top menu
            'type' => 'top', // This is a Top menu entry
            'titre' => 'Ticket free',
            'mainmenu' => 'ticket_free',
            'leftmenu' => '0', // Use 1 if you also want to add left menu entries using this descriptor.
            'url' => '/ticket_free/tickets.php',
            'langs' => 'ticket', // Lang file to use (without .lang) by module. File must be in langs/code_CODE/ directory.
            'position' => 100,
            'enabled' => 0, // Define condition to show or hide menu entry. Use '$conf->mymodule->enabled' if entry must be visible if module is enabled.
            'perms' => '$user->rights->ticket_free->lire', // Use 'perms'=>'$user->rights->mymodule->level1->level2' if you want your menu with a permission rules
            'target' => '',
            'user' => 2);    // 0=Menu for internal users, 1=external users, 2=both
        $r++;

        $this->menu[$r] = array('fk_menu' => 'r=0', // Use r=value where r is index key used for the parent menu entry (higher parent must be a top menu entry)
            'type' => 'left', // This is a Left menu entry
            'titre' => 'Ticket ouvert',
            'mainmenu' => 'ticket_free',
            'url' => '/ticket_free/liste.php',
            'langs' => 'ticket', // Lang file to use (without .lang) by module. File must be in langs/code_CODE/ directory.
            'position' => 101,
            'enabled' => '1', // Define condition to show or hide menu entry. Use '$conf->monmodule->enabled' if entry must be visible if module is enabled.
            'perms' => '1', // Use 'perms'=>'$user->rights->monmodule->level1->level2' if you want your menu with a permission rules
            'target' => '',
            'user' => 2);
        $r++;

        $this->menu[$r] = array('fk_menu' => 'r=1', // Use r=value where r is index key used for the parent menu entry (higher parent must be a top menu entry)
            'type' => 'left', // This is a Left menu entry
            'titre' => 'Mes tickets',
            'mainmenu' => 'ticket_free',
            'url' => '/ticket_free/liste.php?mode=owner',
            'langs' => 'ticket', // Lang file to use (without .lang) by module. File must be in langs/code_CODE/ directory.
            'position' => 102,
            'enabled' => '1', // Define condition to show or hide menu entry. Use '$conf->monmodule->enabled' if entry must be visible if module is enabled.
            'perms' => '1', // Use 'perms'=>'$user->rights->monmodule->level1->level2' if you want your menu with a permission rules
            'target' => '',
            'user' => 2);
        $r++;
       
        $this->menu[$r] = array('fk_menu' => 'r=1', // Use r=value where r is index key used for the parent menu entry (higher parent must be a top menu entry)
            'type' => 'left', // This is a Left menu entry
            'titre' => 'Tickets non assigné',
            'mainmenu' => 'ticket_free',
            'url' => '/ticket_free/liste.php?mode=nonassigne',
            'langs' => 'ticket', // Lang file to use (without .lang) by module. File must be in langs/code_CODE/ directory.
            'position' => 104,
            'enabled' => '1', // Define condition to show or hide menu entry. Use '$conf->monmodule->enabled' if entry must be visible if module is enabled.
            'perms' => '1', // Use 'perms'=>'$user->rights->monmodule->level1->level2' if you want your menu with a permission rules
            'target' => '',
            'user' => 2);
        $r++;
        $this->menu[$r] = array('fk_menu' => 'r=0', // Use r=value where r is index key used for the parent menu entry (higher parent must be a top menu entry)
            'type' => 'left', // This is a Left menu entry
            'titre' => 'Tickets fermé',
            'mainmenu' => 'ticket_free',
            'url' => '/ticket_free/closed.php',
            'langs' => 'ticket', // Lang file to use (without .lang) by module. File must be in langs/code_CODE/ directory.
            'position' => 105,
            'enabled' => '1', // Define condition to show or hide menu entry. Use '$conf->monmodule->enabled' if entry must be visible if module is enabled.
            'perms' => '1', // Use 'perms'=>'$user->rights->monmodule->level1->level2' if you want your menu with a permission rules
            'target' => '',
            'user' => 2);
        $r++;
        $this->menu[$r] = array('fk_menu' => 'r=4', // Use r=value where r is index key used for the parent menu entry (higher parent must be a top menu entry)
            'type' => 'left', // This is a Left menu entry
            'titre' => 'Mes tickets fermé',
            'mainmenu' => 'ticket_free',
            'url' => '/ticket_free/closed.php?mode=owner',
            'langs' => 'ticket', // Lang file to use (without .lang) by module. File must be in langs/code_CODE/ directory.
            'position' => 206,
            'enabled' => '1', // Define condition to show or hide menu entry. Use '$conf->monmodule->enabled' if entry must be visible if module is enabled.
            'perms' => '1', // Use 'perms'=>'$user->rights->monmodule->level1->level2' if you want your menu with a permission rules
            'target' => '',
            'user' => 2);
        $r++;
     
      





        // Exports
        $r = 1;
    }

    /**
     * 		Function called when module is enabled.
     * 		The init function add constants, boxes, permissions and menus (defined in constructor) into Dolibarr database.
     * 		It also creates data directories.
     *      @return     int             1 if OK, 0 if KO
     */
    function init() {
        $sql = array(" CREATE TABLE IF NOT EXISTS `" . MAIN_DB_PREFIX . "ticketfree_users_join` (`id` int(11) NOT NULL AUTO_INCREMENT,`id_dolibarr` int(11) NOT NULL, `id_hesk` int(11) NOT NULL,  PRIMARY KEY (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;"
        );

        return $this->_init($sql);
    }

    /**
     * 		Function called when module is disabled.
     *      Remove from database constants, boxes and permissions from Dolibarr database.
     * 		Data directories are not deleted.
     *      @return     int             1 if OK, 0 if KO
     */
    function remove() {
        $sql = array();
        return $this->_remove($sql);
    }

    /**
     * 		\brief		Create tables, keys and data required by module
     * 					Files ".MAIN_DB_PREFIX."table1.sql, llx_table1.key.sql llx_data.sql with create table, create keys
     * 					and create data commands must be stored in directory /mymodule/sql/
     * 					This function is called by this->init.
     * 		\return		int		<=0 if KO, >0 if OK
     */
    function load_tables() {
       $sql .= " CREATE TABLE IF NOT EXISTS `" . MAIN_DB_PREFIX . "ticketfree_users_join` (`id` int(11) NOT NULL AUTO_INCREMENT,`id_dolibarr` int(11) NOT NULL, `id_hesk` int(11) NOT NULL,  PRIMARY KEY (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;";
        return $this->_load_tables($sql);
    }

}

?>
