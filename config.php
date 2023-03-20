<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
    DEFINE('DB_USER', 'cpc');
    DEFINE('DB_PASSWORD', 'AkoVamJeDobroOndaNista');
    DEFINE('DB_HOSTNAME', '82.117.205.242');
    DEFINE('DB_NAME', 'cpc');

    $dbc = new mysqli(DB_HOSTNAME, DB_USER, DB_PASSWORD,'cpc');
    mysqli_set_charset($dbc,"utf8");
    $javno = TRUE;

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if ($dbc->connect_error) {
        die("Connection failed: " . $dbc->connect_error);
    }

    function upitI($upit) {
        global $dbc;
        try {
            $rezultat = mysqli_query($dbc,$upit) or die();
            return $rezultat;
        }
        catch(mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage().'- '.$upit;
        }    
        
    }

    session_start();
    $idkorisnika=isset($_SESSION['korisnikid'])?$_SESSION['korisnikid']:NULL;

?>
