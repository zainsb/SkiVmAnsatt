<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='style.css'/> 
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href ="loggUt.php">logg ut</a>
        <?php
        include 'sjekkLoggInn.php';
        ?>
        <div>
        <h3>Ski VM</h3>
            <b>Registering:</b></br>
            <a href="publikum.php">Registring for publikum</a></br>
            <a href="utover.php">Registering for utøver</a></br></br>
            <b>Endring av øvelse:</b></br>
            <a href="slett.php">Slett øvelse</a></br>
            <a href="oppdater.php">Oppdater øvelse</a></br></br>
            <b>Vis:</b></br>
            <a href="visUtover.php">Vis øvelse og utøver</a></br>
            <a href="visPublikum.php">Vis øvelse og publikum</a></br>
        </div>
        </form>
    </body>
</html>
