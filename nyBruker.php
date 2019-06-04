
<head>
<link rel='stylesheet' type='text/css' href='style.css'/> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="validering.js"></script>
</head>
<form action="" method="post" onsubmit="return validerAlle();">
    <table border="0">
        <p><b>Register som ny bruker</b></p>
        <tr>
            <td>Fornavn:</td>
            <td><input id="fornavn" type="text" name="fornavn" onchange="validerForNavn();"/></td>
            <td id="feilForNavn">*</td>
        </tr>
        <tr>
            <td>Etternavn:</td>
            <td><input id="etternavn" type="text" name="etternavn" onchange="validerEtterNavn();"/></td>
            <td id="feilEtterNavn">*</td>
        </tr>
        <tr>
            <td>Epostadresse:</td>
            <td><input id="epost" type="text" name="epostadresse" onchange="validerEpost();"/></td>
            <td id="feilEpost">*</td>
        </tr>
        <tr>
            <td>Brukernavn:</td>
            <td><input id="brukernavn" type="text" name="brukernavn" onchange="validerBrukerNavn();"/></td>
            <td id="feilBrukerNavn">*</td>
        </tr>
        <tr>
            <td>Passord:</td>
            <td><input id="passord" type="password" name="passord" onchange="validerPassord();"/></td>
            <td id="feilPassord">*</td>
        </tr>
        <tr>
            <td><input type="submit" name="knapp" value="Register"</td>
        </tr>    
    </table>
</form>

<?php
session_start();
if(isset($_POST["knapp"]))
{
 /*$fornavn=$_POST["fornavn"];
 $etternavn=$_POST["etternavn"];
 $epostadresse=$_POST["epostadresse"];
 $brukernavn=$_POST["brukernavn"];
 $passord=$_POST["passord"];*/
    
          $okFNavn = $_POST["fornavn"];
          $okENavn = $_POST["etternavn"];
          $okEpost = $_POST["epostadresse"];
          $okBNavn = $_POST["brukernavn"];
          $okPassord = $_POST["passord"];
          $ok = true;
          
          /*if(($okFNavn && $okENavn && $okEpost && $okBNavn && $okPassord))
            {
            $salt=mcrypt_create_iv(30);
            $hashSalt=$salt.$_POST["passord"];
            $hash=Hash("sha512","$hashSalt");

            $db = mysqli_connect("localhost","root","","skiVM"); 
            $sql = "Insert INTO bruker (Fornavn,Etternavn,Epostadresse,Brukernavn,Passord,Salt)";
            $sql .="Values ('$okFNavn','$okENavn','$okEpost','$okBNavn','$hash','$salt')";
            $data = mysqli_query($db,$sql);
            echo "Validering OK, lagre i databasen her!";
            }
            else
            {
              echo "Validering IKKE OK!";
              die();
            }  
            }*/
            if($ok)
            {
            $salt=mcrypt_create_iv(30);
            $hashSalt=$salt.$_POST["passord"];
            $hash=Hash("sha512","$hashSalt");

            $db = mysqli_connect("localhost","root","","skiVM"); 
            $sql = "Insert INTO bruker (Fornavn,Etternavn,Epostadresse,Brukernavn,Passord,Salt)";
            $sql .="Values ('$okFNavn','$okENavn','$okEpost','$okBNavn','$hash','$salt')";
            $data = mysqli_query($db,$sql);
            echo "<p>Registering er klart!</p>";
            }
            header('location: hjem.php');
            if(!$data)
            {
            echo "<p>Feil, klarte ikke å registere data</p>". mysqli_error($db);
            }
            elseif(mysqli_affected_rows($db)==0)
            {
            echo "<p>Feil, ingen rader er satt inn</p>";
            }
            
            if(!preg_match("/^[a-zA-ZøæåØÆÅ.] {2,20}$/", $okFNavn))
            {
              echo "Fornavnet er feil. <br/>";
              $ok=false;
            }
            if(!preg_match("/^[a-zA-ZøæåØÆÅ.] {2,20}$/", $okENavn))
            {
              echo "Etternavnet er feil. <br/>";
              $ok=false;
            }
            if(!preg_match("/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $okEpost))
            {
              echo "Epost er feil. <br/>";
              $ok=false;
            }
            if(!preg_match("/^[a-zA-Z.] {2,20}$/", $okBNavn))
            {
              echo "Brukernavnet er feil. <br/>";
              $ok=false;
            }
            if(!preg_match("/^[a-zA-Z.] {2,20}$/", $okPassord))
            {
              echo "Passordet er feil. <br/>";
              $ok=false;
            }
}
?>
