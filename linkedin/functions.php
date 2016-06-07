<?php
ini_set('display_errors', '1');
error_reporting(E_ALL); 

function scraplinkedin($sourcecode) {
//$doc = new DOMDocument(); 
//$doc->loadHTML($sourcecode); 
//$htmldoc = $doc->saveHTML(); 
$sourcecode = preg_replace("@<head[^>]*?>.*?</head>@siu", "", $sourcecode);
$sourcecode = preg_replace("@<script[^>]*?>.*?</script>@siu", "", $sourcecode);
$sourcecode = preg_replace("@<code[^>]*?>.*?</code>@siu", "", $sourcecode);

echo $sourcecode;



}




	function scrapmagnetsite($theurl1,$thekeyword,$theurl2) {
$theurl = $theurl1.$thekeyword.$theurl2;
$var = fread_url($theurl);  
    preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
                    "(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", 
                    $var, $matches);   												    
    $matches = $matches[1];
    $list = array();
	$i =0;
    foreach($matches as $var)
    {    
	
	if (strpos($var,'magnet') !== false) {
    $dtarget= $var;
	$dtitle =  explode( '=', $dtarget );
	$dtitle =  $dtitle[2];
	$dtitle = str_replace("+", " ", $dtitle);
	$dtitle = str_replace("%5D", "]", $dtitle);
	$dtitle = str_replace("%5B", "[", $dtitle);
	$dtitle = str_replace("%28", "(", $dtitle);
	$dtitle = str_replace("%29", ")", $dtitle);
	$dtitle = str_replace("%26amp%3B", " ", $dtitle);
	$dtitle = str_replace("%40", "@", $dtitle);
	$dtitle = str_replace("%2", "-", $dtitle);
	$dtitle = substr($dtitle, 0, -3);
	$cleantitle = str_replace($thekeyword, "", $dtitle);
	if ($i < 20) {
			$sUrl = $dtarget;
 
   echo '<a href="'.$sUrl.'" title="Download '.$dtitle.' via magnet link">'.$dtitle.'</a><br>'; 
 
	}
	else {
echo '';
	}
 
$i++;
    }
	else {
	}
	}
	}
		
	

?>