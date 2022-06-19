<?php
$amt = $_GET["amt"];
$txAmt = $_GET["txn"];
$psc = $_GET["sc"];

if (!isset($amt, $txAmt, $psc)) {
    header("Location: ./index.php");
    exit();
}

$amt = intval($amt);
$txAmt = intval($txAmt);
$psc = intval($psc);
