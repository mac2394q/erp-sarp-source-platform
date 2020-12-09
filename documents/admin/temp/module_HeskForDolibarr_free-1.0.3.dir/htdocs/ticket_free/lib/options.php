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

//priority
$options_priority = array(
    0 => 'critical',
    1 => 'high',
    2 => 'medium',
    3 => 'low'
);
//status
$status_options = array(
    0 => 'new',
    1 => 'wait_reply',
    2 => 'replied',
    3 => 'closed',
    4 => 'in_progress',
    5 => 'on_hold',
);

/* join 
 * 
 * $join['element']=column for name to display
 */
$join = array(
    societe => 'nom',
    product => 'ref',
    adherent => 'nom',
    commande => 'ref',
    commande_fournisseur => 'ref',
    contrat => 'ref',
    expedition => 'ref',
    facture => 'facnumber',
    facture_fourn => 'facnumber',
    // fichinter=>'ref',
    projet => 'ref',
    propal => 'ref',
    socpeople => 'name',
    projet_task => 'label',
    holiday => 'description',
);



$join_type = array(
    0 => 'societe',
    1 => 'product',
    2 => 'adherent',
    3 => 'commande',
    4 => 'commande_fournisseur',
    5 => 'contrat',
    6 => 'expedition',
    7 => 'facture',
    8 => 'facture_fourn',
    //9 => 'fichinter',
    10 => 'projet',
    11 => 'propal',
    12 => 'socpeople',
    13 => 'projet_task',
    14 => 'holiday'
);

$join_type_inverse = array(
    societe => '0',
    product => '1',
    adherent => '2',
    commande => '3',
    commande_fournisseur => '4',
    contrat => '5',
    expedition => '6',
    facture => '7',
    facture_fourn => '8',
    // fichinter => '9',
    projet => '10',
    propal => '11',
    socpeople => '12',
    projet_task => '13',
    holiday => '14'
        )
?>
