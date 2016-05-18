<?php// Getting the information
$ipaddress = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['REDIRECT_URL'];
$referrer = $_SERVER['HTTP_REFERER'];
$datetime = date("Y-m-d H:i:s");
//mktime();
$useragent = $_SERVER['HTTP_USER_AGENT'];
$remotehost = @getHostByAddr($ipaddress);
if($referrer ){		
// Create log line		
$logline = $ipaddress . '|' . $referrer . '|' . $datetime . '|' . $useragent . '|' . $remotehost . '|' . $page . "\n";
		// Write to log file:		
		$logfile = '/home/sites/site4/web/FO/log/logfile.txt';	
		// Open the log file in "Append" mode	
		if (!$handle = fopen($logfile, 'a+')) {
		die("Failed to open log file");		}		
		// Write $logline to our logfile.		
		if (fwrite($handle, $logline) === FALSE) {
		die("Failed to write to log file");		}
		fclose($handle);	
		/*$xml = new SimpleXMLElement('<statistics/>');				$statistics = $xml->addChild('record');		$statistics->addChild('ip', $ipaddress);		$statistics->addChild('referrer', $referrer);		$statistics->addChild('datetime', $datetime);		$statistics->addChild('useragent', $useragent);		$statistics->addChild('remotehost', $remotehost);		$statistics->addChild('page', $page);				$xml->asXML("/home/sites/site4/web/FO/log/logfile.xml");*/	
}?>