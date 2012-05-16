<? 
extract($HTTP_GET_VARS);
extract($HTTP_POST_VARS);
/********* PHP RATING SYSTEM v1.5 ************ 
Copyright Scriptsez.net 
You have to leave the copyright. 
If you have any problem just let us know.
E-mail: support@scriptsez.net
Website: http://www.scriptsez.net
**********************************************/ 
$ficdest=explode(".",basename($PHP_SELF)); 
$ficdest=$ficdest[0].".dat"; 
$ip = getenv(REMOTE_ADDR); 
	if(file_exists($ficdest)) { 
     $compteur=fopen($ficdest, "r"); 
     $old_stats=file($ficdest); 
     $stats=explode("|", $old_stats[0]); 
     fclose($compteur); 
     $new_count=$stats[0]; 
     if ($stats[3] != $ip) { 
         $new_count +=1; 
     } 
     $ip_hit=$ip; 
     $compteur=fopen($ficdest, "w"); 
     fputs($compteur, "$new_count|$stats[1]|$stats[2]|$ip_hit|$stats[4]"); 
     fclose($compteur); 
} 
else { 
     $nouveau_compteur=fopen($ficdest, "w"); 
     fputs($nouveau_compteur, "1|||$ip|"); 
     fclose($nouveau_compteur); 
} 

if (!empty($envoi)) { 
     $vote=fopen($ficdest, "r"); 
     $old_stats=file($ficdest); 
     $stats=explode("|", $old_stats[0]); 
     fclose($vote); 
     $nbr_votes=$stats[1]; 
     $moy_votes=$stats[2]; 
     if ($stats[4] != $ip) { 
         $nbr_votes +=1; 
         $moy_votes=((($stats[1]*$stats[2])+$note)/$nbr_votes); 
     } 
else { echo "<div align=center><font face=Verdana size=2 color=red>You have already voted</font> </div><br/>";} 
     $ip_vote=$ip; 
     $vote=fopen($ficdest, "w"); 
     $new_stats=fputs($vote, "$new_count|$nbr_votes|$moy_votes|$stats[3]|$ip_vote"); 
     fclose($vote); 
} 

print ("<form method=post>"); 
$old_stats=file($ficdest); 
$stats=explode("|", $old_stats[0]); 
if ($stats[2] == 5)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/5star.gif" ;
}
if ($stats[2]>=1)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/1star.gif" ;
}
if ($stats[2]>=1.5)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/15star.gif" ;
}
if ($stats[2]>=2)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/2star.gif" ;
}
if ($stats[2]>=2.5)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/25star.gif" ;
}
if ($stats[2]>=3)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/3star.gif" ;
}	
if ($stats[2]>=3.5)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/35star.gif" ;
}	
if ($stats[2] >= 4)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/4star.gif" ;
}	
if ($stats[2] >= 4.5)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/45star.gif" ;
}	
if ($stats[2] >= 5)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/5star.gif" ;
}	
if ($stats[2]<=0)
{
	$star = "/SEspectaculosMVC/vistas/votos/images/00star.gif" ;
}	
print ("<table bordercolor=#99999 cellspacing=0 border=0><td width=50% cellspacing=none cellpadding=none align=middle valign=middle border=1><font size=1 face=Verdana color=#999999>Rating: <img src=\"$star\" alt=\"Average rating: $stats[2]\">  $stats[1] Ratings</td><tr></font>");

echo"<td align=middle valign=middle><br><input type=radio name=note value=5><font face=arial size=2 color=#99999>Excellent";
echo"<input type=radio name=note value=4>Very Good";
echo"<input type=radio name=note value=3>Good";
echo"<input type=radio name=note value=2>Fine";
echo"<input type=radio name=note value=1>Bad";
echo "<br>";
print ("<input type=hidden name=envoi value=1><br />  <input type=submit value=Rate style=background:#ffcc00;border-width:1;Border-color:#ffcc00;></table></form></font></td>");

?>
