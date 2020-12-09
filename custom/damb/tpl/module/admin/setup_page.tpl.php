<?php

/**
 * This file was generated by DAMB
 *
 * @copyright   Copyright (c) 2019 - 2020, AXeL-dev
 * @license     GPL
 * @link        https://github.com/AXeL-dev/damb
 */

// Load Dolibarr environment (mandatory)
if (false === (@include_once '../../main.inc.php')) { // From htdocs directory
    require_once '../../../main.inc.php'; // From "custom" directory
}

// Load page, setup & ${module_folder} lib
dol_include_once('${module_folder}/lib/page.lib.php');
dol_include_once('${module_folder}/lib/setup.lib.php');
dol_include_once('${module_folder}/lib/${module_folder}.lib.php');

// Control access to page
control_access('$user->admin');

// Get parameters
$action = GETPOST('action', 'alpha');

/**
 * Actions
 */

load_default_actions($action${default_actions_parameters});

/**
 * View
 */

print_header('Setup', array('admin', '${lang_file}@${module_folder}'));

print_subtitle('Setup', 'title_setup.png', 'link:modules_list');

print_admin_tabs('Setup');

${settings}

// print_subtitle('Settings');

// print_options(array(
//     array('name' => 'MY_TEXT', 'type' => 'text', 'desc' => 'Text'),
//     array('name' => 'MY_NUMBER', 'type' => 'number', 'desc' => 'Number'),
//     array('name' => 'MY_SELECT', 'type' => 'select', 'desc' => 'Select', 'values' => array('Choice 1', 'Choice 2')),
//     array('name' => 'MY_MULTI_SELECT', 'type' => 'multiselect', 'desc' => 'Multi Select', 'values' => array('1' => 'Choice 1', '2' => 'Choice 2')),
//     array('name' => 'MY_COLOR', 'type' => 'color', 'desc' => 'Color'),
//     array('name' => 'MY_DATE', 'type' => 'date', 'desc' => 'Date'),
//     array('name' => 'MY_SWITCH', 'type' => 'switch', 'desc' => 'Switch'),
//     array('name' => 'MY_RANGE', 'type' => 'range', 'desc' => 'Range', 'min' => 0, 'max' => 10)
// ));

print_footer(true);