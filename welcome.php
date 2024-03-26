

<!DOCTYPE html>
<html>
<head>
    <title>Uspešné prihlásnie</title>
    <link rel="stylesheet" type="text/css" href="stylelog.css" >
</head>
<body>
    <div>
    <?php
session_start(); //otvorenie session

//zistenie ci je session nastavene
if(isset($_SESSION['username']) ) {
     
    echo 'Vitaj '.$_SESSION['username'].'<br>';

    echo 'Klikni tu pre <a href = "logout.php" tite = "Logout">odhlásenie.';//odkaz na odhlasenie
}
?>
    </div>
</body>
</html>