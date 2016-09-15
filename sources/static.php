<?php
switch ($action )
{
	case 'home':
	default:
		$template->set_file("tpl_home",$module."/home.tpl");
		$template->set_var("PAGETITLE","Rom-Car Professional");
		$template->set_var("META_KEYWORDS","");
		$template->set_var("META_DESCRIPTION","");
		echo 'dev is testing it using gitHub';
		$template->parse('MAIN','tpl_home');
	break;

	case 'protejare-mediu':
		$template->set_file("tpl_contact",$module."/protejare_mediu.tpl");
		$template->set_var("PAGETITLE","Protejarea mediului inconjurator");
		$template->set_var("META_KEYWORDS","");
		$template->set_var("META_DESCRIPTION","");
		$template->parse('MAIN', 'tpl_contact');
	break;

	case 'spalare-fara-apa':
		$template->set_file("tpl_contact",$module."/spalare_fara_apa.tpl");
		$template->set_var("PAGETITLE","Spalarea fara apa");
		$template->set_var("META_KEYWORDS","");
		$template->set_var("META_DESCRIPTION","");
		$template->parse('MAIN', 'tpl_contact');
	break;

	case 'cum-functioneaza':
		$template->set_file("tpl_contact",$module."/cum_functioneaza.tpl");
		$template->set_var("PAGETITLE","Cum functioneaza");
		$template->set_var("META_KEYWORDS","");
		$template->set_var("META_DESCRIPTION","");
		$template->parse('MAIN', 'tpl_contact');
	break;

	case 'articol-spalarea-fara-apa':
		$template->set_file("tpl_contact",$module."/articol1.tpl");
		$template->set_var("PAGETITLE","Spalatoriile auto fara apa, bune pentru mediu");
		$template->set_var("META_KEYWORDS","");
		$template->set_var("META_DESCRIPTION","");
		$template->parse('MAIN', 'tpl_contact');
	break;

	case 'produse':
		$template->set_file("tpl_contact",$module."/produse.tpl");
		$template->set_var("PAGETITLE","Produse");
		$template->set_var("META_KEYWORDS","");
		$template->set_var("META_DESCRIPTION","");
		$template->parse('MAIN', 'tpl_contact');
	break;

	case 'servicii':
		$template->set_file("tpl_contact",$module."/servicii.tpl");
		$template->set_var("PAGETITLE","Servicii");
		$template->set_var("META_KEYWORDS","");
		$template->set_var("META_DESCRIPTION","");
		$template->parse('MAIN', 'tpl_contact');
	break;

	case 'contact':
		$template->set_file("tpl_contact",$module."/contact.tpl");
		$template->set_var("PAGETITLE","Rom-Car Professional - Contact Page");
		$template->set_var('CONTACT_ACTION',ReWrite('default',$module.'.send') );
		$template->set_var("META_KEYWORDS","");
		$template->set_var("META_DESCRIPTION","");
		$template->parse('MAIN', 'tpl_contact');
	break;

	case 'send':
		$to= '';
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$headers = 'From: Images Host' . "\r\n" .
				'Reply-To: ' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
		//mail($to, $subject, $message, $headers);
		header("Location: ".ReWrite('default',$module.'.sent'));
		exit;
	break;

	case 'sent':
		$template->set_file("tpl_contact",$module."/message.tpl");
		$template->set_var('MESSAGE',"Mesajul dvs a fost trimis cu succes !" );
		$template->parse('MAIN', 'tpl_contact');
	break;
}

?>