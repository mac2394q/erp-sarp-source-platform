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

include './options.php';

function ticket_img_action($alt = "default", $numaction) {
    global $conf, $langs;
    if ($alt == "default") {
        if ($numaction == 0)
            $alt = $langs->transnoentitiesnoconv("open");
        if ($numaction == 1)
            $alt = $langs->transnoentitiesnoconv("wait_reply");
        if ($numaction == 2)
            $alt = $langs->transnoentitiesnoconv("replied");
        if ($numaction == 3)
            $alt = $langs->transnoentitiesnoconv("closed");
        if ($numaction == 4)
            $alt = $langs->transnoentitiesnoconv("in_progress");
        if ($numaction == 5)
            $alt = $langs->transnoentitiesnoconv("on_hold");
    }
    return '<img src="./img/ticket_action_' . $numaction . '.png" border="0" alt="' . dol_escape_htmltag($alt) . '" title="' . dol_escape_htmltag($alt) . '">';
}

function add_select_element() {
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
        13 => 'projet_task'
    );
}

?>
