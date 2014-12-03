<?php 

getMAC();

function getMAC(){
//First get the IP address then use the
//DOS command + only get row with client IP address
//This takes only one line of the ARP table instead
//of what could be a very large table of data to 
//hopefull give a small speed/performance advantage

$remoteIp = rtrim($_SERVER['REMOTE_ADDR']);
$location = rtrim(`arp -a $remoteIp`);
print_r($remoteIp.$location);//display

//reduce no of white spaces then 
//Split up into array element by white space
$location = preg_replace('/\s+/', 's', $location);
$location = split('\s',$location);// 

$num=count($location);//get num of array elements
$loop=0;//start at array element 0
while ($loop<$num)
{
//mac address is always one after the 
//IP after inserting the firstline
//(preg_replace) line above.
if ($location[$loop]==$remoteIp)
{
$loop=$loop+1;
echo "<h1>Client MAC Address:- ".$location[$loop]."</h1>";
$_SESSION['MAC'] = $loop;
return;
}
else {$loop=$loop+1;}
}

}


?>


