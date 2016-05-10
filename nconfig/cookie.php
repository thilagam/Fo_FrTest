<?

if(isset($_REQUEST["from"]))
{
	$_site = $_REQUEST["from"];
	setcookie ("_site", $_site,time()+(60*60*24*365*3),'/','.oboulo.com');
}
else
{
	if(!isset($_COOKIE["_site"]))
	{
		$_site = 0;
		setcookie ("_site", $_site,time()+(60*60*24*365*3),'/','.oboulo.com');
	}
	else
		$_site = $_COOKIE["_site"];
}