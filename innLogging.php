<?php
session_start();
$db = new mysqli("localhost","root","","skiVM");
$brukernavn=$_POST["brukernavn"];
$passord = $_POST["passord"];

$sql = "SELECT * FROM bruker WHERE Brukernavn ='$brukernavn'";
$resultat = $db->query($sql);

if ($db->affected_rows == 1)
{
    $rad = $resultat->fetch_object();
    $passDB = $rad->Passord;
    $saltDB = $rad->Salt;
    $passord = hash("sha512", $saltDB.$passord);
    
    if($passord == $passDB)
    {
        $_SESSION["loggetInn"]=true;
        header('location: hjem.php');
    }
    else
    {
        $_SESSION["loggetInn"]=false;
        $_SESSION["feil"]="Feil passord oppgitt";
        header('location: loggInn.php');

    }
}
else
{
    $_SESSION["loggetInn"]=false;
    $_SESSION["feil"]="Feil passord oppgitt";
    header('location: loggInn.php');
}
?>

sjekklogginn
<?php
session_start();
if(!$_SESSION["loggetInn"])
{
    header('location: loggInn.php');
    exit();
}
?>