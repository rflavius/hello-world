<?php
/*------------------------------------------------------------------------------------------------
	|		dotBoost Self Managed Content | SMC Users Framework | support@dotboost.com
	+---------------------------------------------------------------------------
	|		SMC Users Framework IS NOT FREE SOFTWARE!
	+---------------------------------------------------------------------------
	|		Name : general_functions.inc.php
	|		Date started: Aug 3 2006
	|		Description : all main functions used by the script are stored here
	|		Version : 0.9
	+---------------------------------------------------------------------------------------------*/
#Returns the time in a fancy format
function TimeFormatShort($date)
{
	if ($date)
	{
		global $conf;
		$time = strtotime($date);
		$time = strftime($conf->time_format, $time);
		return $time;
	}
}
function ValidHeader ($value)
{
	$neg_values = array("\r\n", "\n", "to:", "bcc:", "cc:", "reply-to:");
	foreach ($neg_values as $key => $val)
	{
		if (eregi($val, $value)){return false;}
	}
	return true;
}

#Cleans the arrays
function array_clean(&$value) 
{
	#PHP 4 only
	if (is_array($value))
	{
		array_walk($value, 'array_clean');
	return;
	}
	if (ini_get('magic_quotes_gpc'))
	{
		$value = stripslashes($value);
	}
}

#Gets the referef
function GetReferer()
{
	return getenv('HTTP_REFERER');
}

#Gets the user ip
function GetUserIP() 
{
	if (getenv("HTTP_CLIENT_IP")) $ip = getenv("HTTP_CLIENT_IP");
	else
	{
		if (getenv('HTTP_X_FORWARDED_FOR'))
		{
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		else
		{
			$ip = getenv('REMOTE_ADDR');
		}
	}
	return $ip;
}

#Gets the user agent
function GetUserAgent()
{
	return $_SERVER["HTTP_USER_AGENT"];
}

#Verifies the validity of an email
function ValidEmail($email)
{

	if (eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,3}$", $email)) return true;
	return false;
}

#Returns the content of a file
function GetFileContent($path)
{
	if (@fopen($path, "r"))
	{
		$fp = fopen($path, "r");
		$text = fread ($fp, filesize($path));
		fclose($fp);
		return $text;
	}
	else 
	{
		echo 'File : '.$path.' doesn\'t exist !';
		exit;
	}
}

#Validate a external url
function ValidateURL($url)
{
	if (eregi("[a-z0-9_-]+\.+[a-z0-9_-]", $url ))
	//if (eregi("^(http|https)+(:\/\/)+[a-z0-9_-]+\.+[a-z0-9_-]", $url ))
	return true;
	return false;
}

#Rewrite Function , turn the php get codes in html formats
function ReWrite ($section, $link_url)
{
	switch ($section)
	{
		case 'default'://default : simple links, no parameters
			if (URLREWRITE == 'Y')
			{
				if ($link_url == 'home')
				{
					$url = SITE_BASE;
					return $url;
				}
				else 
				{$url = $link_url.FILE_EXTENSION;}
			}
			else 
			{$url = $link_url;}
		break;
	}
	#remove non alpha numeric or "-" , "." characters if the url rewrite is on
	if (URLREWRITE == 'Y')
	{
		$url = ereg_replace("[^a-zA-Z0-9_.:/\-]", "", $url);
	}
	else 
	{
		$url = '?action='.$url;
	}
	return $url;
}