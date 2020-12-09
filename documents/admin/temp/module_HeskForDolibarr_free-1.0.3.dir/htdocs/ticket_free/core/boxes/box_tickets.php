<?php

include_once DOL_DOCUMENT_ROOT.'/core/boxes/modules_boxes.php';
$res = 0;
if (!$res && file_exists(DOL_DOCUMENT_ROOT . "/ticket_free/class/soap.class.php"))
    $res = @include(DOL_DOCUMENT_ROOT . "/ticket_free/class/soap.class.php");
if (!$res && file_exists(DOL_DOCUMENT_ROOT_ALT.'/ticket_free/class/soap.class.php'))
    $res = @include(DOL_DOCUMENT_ROOT_ALT.'/ticket_free/class/soap.class.php');
if (!$res && file_exists("./../../class/soap.class.php"))
    $res = @include("./../../class/soap.class.php");
if (!$res)
    die("Include of soap class fails");

$res = 0;
if (!$res && file_exists(DOL_DOCUMENT_ROOT . "/ticket_free/class/ticket.class.php"))
    $res = @include(DOL_DOCUMENT_ROOT . "/ticket_free/class/ticket.class.php");
if (!$res && file_exists(DOL_DOCUMENT_ROOT_ALT.'/ticket_free/class/ticket.class.php'))
    $res = @include(DOL_DOCUMENT_ROOT_ALT.'/ticket_free/class/ticket.class.php');
if (!$res && file_exists("./../../class/ticket.class.php"))
    $res = @include("./../../class/ticket.class.php");
if (!$res)
    die("Include of ticket class fails");

class box_tickets extends ModeleBoxes {
    var $boxcode="Ticket";
	var $boximg="ticket@ticket_free";
	var $boxlabel;
	var $depends = array();
        var $db;
	var $param;
        var $soap;
        var $ticket;
	var $info_box_head = array();
	var $info_box_contents = array();
    function box_tickets () {
        
        
        global $langs,$conf,$db,$user;
		$langs->load("boxes");
                $langs->load("ticket@ticket_free");
                $this->ticket = new ticket($db);
                $this->soap = new soap($db,  $this->ticket->GetHeskOwnerId($user->id));
		$this->boxlabel=$langs->trans("mes tickets");
    }
    
    function image_priority ($priority){
        
        $img= '';
        return $img;
        
    }
    
    function loadBox($max=5){
        if (!empty($this->soap->session)){
        // TODOT voir bug affichage quand premier ticket sont ferme
                $res=0;

if (!$res && file_exists(DOL_DOCUMENT_ROOT_ALT.'/ticket_free/lib/options.php')){
    $res = @include(DOL_DOCUMENT_ROOT_ALT.'/ticket_free/lib/options.php');
    $doc_root = DOL_URL_ROOT_ALT;
}
   
if (!$res && file_exists(DOL_DOCUMENT_ROOT.'/ticket_free/lib/options.php')){
    $res = @include(DOL_DOCUMENT_ROOT.'/ticket_free/lib/options.php');
    $doc_root = DOL_URL_ROOT;
}
if (!$res && file_exists('../lib/options.php'))
    $res = @include ('../lib/options.php');
    
if (!$res)
    die("Include of options fails");
        global $user, $langs, $db, $conf;
		$langs->load("boxes");

		$this->max=$max;

		$this->info_box_head = array('text' => '<a href="'.$doc_root.'/ticket_free/liste.php?mode=owner&mainmenu=ticket">'.$langs->trans("Mes tickets",$max).'</a>','limit'=>'200',15);

                $ticket = $this->soap->get_all_ticket($this->ticket->GetHeskOwnerId($user->id));
                $categories = $this->soap->get_categories();
                
				$num1 = $num = count($ticket);
                                if ($num > $max) $num=$max;
				$i = 0;
                                $j = 0;
				while ($i < $num1)
				{
					
					
					if ($ticket[$i]['status'] !=3 && $this->soap->check_view_ticket($ticket[$i])){				
                                            
					$this->info_box_contents[$j][0] = array('td' => 'align="left" width="20"',
                                         'text' =>'<img src="'.$doc_root.'/ticket_free/img/flag_'.$ticket[$i]['priority'].'.png">');
					                                       
                                        $this->info_box_contents[$j][1] = array('td' => 'align="left" width="130"',
                                        'text' => $ticket[$i]['trackid'] ,
					'url' => '  '.$doc_root."/ticket_free/ticket.php?id=".$ticket[$i]['id']);

					$this->info_box_contents[$j][3] = array('td' => 'align="left"',
					'text' => dol_trunc($ticket[$i]['subject'],64));

					$this->info_box_contents[$j][2] = array('td' => 'align="left" width="200"',
                                                                              
					'text' => $ticket[$i]['name']);	
                                        $this->info_box_contents[$j][4] = array('td' => 'align="left" width="200"',
                                                                              
					'text' => $categories['CATEGORIES'][$ticket[$i]['category']-1]['name']);
                                        $j++;
                                        if ($j>=$num) break;
                                        }
					$i++ ;
                                        
				}
                                $j = $i = 0;
                           
        }
        
    }
    
    function showBox($head = null, $contents = null)
	{
		parent::showBox($this->info_box_head, $this->info_box_contents);
	}
    
    
    
    
    
    
}
?>
