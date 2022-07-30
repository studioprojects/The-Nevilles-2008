<?
//These are your set username and password
$username = "Vipers";
$password = "20Mark08";

//These are received from Flash
$user=$_POST['user'];
$pass=$_POST['pass'];

//Chack them against each other
if ($user == $username && $pass == $password){
print "s=1";
}else{
print "s=2";
}
?>