<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='style.css'/> 
        <meta charset="UTF-8">
        <title></title>
    </head>
        <table border="0"> 
            <p><b>Logg inn</b></p>
            <form action="innLogging.php" method="post">
            <tr>
                <td>Brukernavn:</td>
                <td><input type="text" name="brukernavn"/></br></td>
            </tr>
            <tr>                
                <td>Passord:</td>
                <td><input type="password" name="passord"/></br></td>
            </tr>
            <tr>
                <td><input type="submit" name="loggInn" value="Logg inn"/></td>
                <td><a href="nyBruker.php">Ny bruker</a></br></td>
            </tr>
        </form>
        </table>
    <?php
        if(isset($_SESSION["feil"]))
        {
            echo $_SESSION["feil"]."<br/>";
            unset($_SESSION["feil"]);
        }
    ?>
    </body>
</html>
