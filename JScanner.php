<?php
/*
 ****************************************************
 *													*
 * JScanner scan all joomla components v1.0			*
 * -=======================================-        *
 * Coded by MrSqar Hacker                           *
 * -=====================-                          *
 * Gz : All my friends                              *
 * -==================-                             *
 * mail : mrsqar@gmail.com [ for any questions ]    *
 * -============================================-   *
 * Note : Don't change my fucking Rights ~*~        *
 *                                                  *
 ***************************************************
 */
#|~|||||||||||||||||||||||||||||||||||||||~|#
#|~|||||||||||| Fucking start ||||||||||||~|#
#|~|||||||||||||||||||||||||||||||||||||||~|#
$uname = php_uname();
if(preg_match("/Linux/",$uname)){	
	system("clear");
}else{
	system("cls");
}

if(empty($argv[1])){
	echo "\n";
	echo "  [~] usage : php ".$argv[0]." -u http://www.site.com ";
	echo "\n";
	echo "  [~] usage : php ".$argv[0]." -w wordlist.txt [sites] ";
	echo "\n";
	exit();
	}
#|+|||||||||||||||||||||||||||||||||||+|#
#|+|||||||||||| variables ||||||||||||+|#
#|+|||||||||||||||||||||||||||||||||||+|#
$version = "v1.0";
$result = fopen("result.txt","a+");
$white = "\e[97m";
$black = "\e[30m\e[1m";
$yellow = "\e[93m";
$orange = "\e[38;5;208m";
$blue   = "\e[34m";
$lblue  = "\e[36m";
$cln    = "\e[0;94m";
$green  = "\e[92m";
$fgreen = "\e[32m";
$red    = "\e[91m";
$magenta = "\e[35m";
$bluebg = "\e[44m";
$lbluebg = "\e[106m";
$greenbg = "\e[42m";
$lgreenbg = "\e[102m";
$yellowbg = "\e[43m";
$lyellowbg = "\e[103m";
$redbg = "\e[101m";
$grey = "\e[37m";
$cyan = "\e[36m";
$bold   = "\e[1m";
$nbold = "\e[1;97m";
echo $green.$bold;
$plugins = @file_get_contents("plugins.txt");
$plugins = explode("\n",$plugins);
/*$plugins = array(
'com_users',
'com_contact',
'com_user',
'com_user',
'com_jce',
'com_user',
'com_tog',
'com_fabrik',
'com_actparse',
'com_ajax',
'com_banners',
'com_config',
'com_content',
'com_contenthistory',
'com_djimageslider',
'com_fields',
'com_finder',
'com_mailto',
'com_media',
'com_menus',
'com_modules',
'com_newsfeeds',
'com_search',
'com_wrapper',
);
*/
echo $bold;
echo $cyan;
echo " 
   ___ _____                                 
  |_  /  ___|                                
    | \ `--.  ___ __ _ _ __  _ __   ___ _ __ 
    | |`--. \/ __/ _` | '_ \| '_ \ / _ \ '__|
/\__/ /\__/ / (_| (_| | | | | | | |  __/ |   
\____/\____/ \___\__,_|_| |_|_| |_|\___|_|   
                                             
                                             
";
echo " -==================================================- \n";
echo $yellow;
echo "\n		[~] STARTING NOW [~] \n\n";
echo $green;
#||||||||||||||||||||||||||||||||||||||||#
#|||||||||||||| multi scan ||||||||||||||# 
#||||||||||||||||||||||||||||||||||||||||#
if($argv[1] == "-w"){
$sites = $argv[2];
$sites = @file_get_contents($sites);
$sites = explode("\n",$sites);
$count = count($sites);
$count2 = count($plugins);
for($i=0;$i<$count;$i++){
$sites[$i] = trim($sites[$i]);
$FuckingSite = $sites[$i];
		for($x=0;$x<$count2;$x++){
		   $plugins[$x] = trim($plugins[$x]);
		   $FuckingPlugin = $plugins[$x];
		   $ReadyToFuck = $FuckingSite."/components/".$FuckingPlugin;
		   $headers = @get_headers("$ReadyToFuck");
		   if(!preg_match("/404/",$headers[0])){
			   $source = @file_get_contents("$ReadyToFuck");
			   if(preg_match("/Forbidden/",$source)){
				  $re = "   [+] Found : ".$ReadyToFuck."\n";
				  echo $re;
				  fwrite($result,$re);
				   }elseif(preg_match("/Index of/",$source)){
					  $re = "   [+] Found : ".$ReadyToFuck."\n";		   
					  echo $re;
		    		  fwrite($result,$re);
					   }elseif(preg_match("/403/",$source)){
							$re = "   [+] Found : ".$ReadyToFuck."\n";		   
							echo $re;
							fwrite($result,$re);
					}
				}
			}	
		}

#|||||||||||||||||||||||||||||||||||||||||#
#|||||||||||||| single scan ||||||||||||||# 
#|||||||||||||||||||||||||||||||||||||||||#
}elseif($argv[1] == "-u"){
$Site = $argv[2];
$Site = trim($Site);
$count = count($plugins);
for($x=0;$x<$count;$x++){
		   $plugins[$x] = trim($plugins[$x]);
		   $FuckingPlugin = $plugins[$x];
		   $ReadyToFuck = $Site."/components/".$FuckingPlugin;
		   $headers = @get_headers("$ReadyToFuck");
		   if(!preg_match("/404/",$headers[0])){
			   $source = @file_get_contents("$ReadyToFuck");
			   if(preg_match("/Forbidden/",$source)){
				  $re = "   [+] Found : ".$ReadyToFuck."\n";
				  echo $re;
				  fwrite($result,$re);
				   }elseif(preg_match("/Index of/",$source)){
				  $re = "   [+] Found : ".$ReadyToFuck."\n";
				  echo $re;
				  fwrite($result,$re);
					   }elseif(preg_match("/403/",$source)){
				  $re = "   [+] Found : ".$ReadyToFuck."\n";
				  echo $re;
				  fwrite($result,$re);
					}
				}
			}	
	}
?>
