<?php
if (!isset($_GET["id"])) {
    exit(header("Location: ./index.php"));
}

require_once("../db/connectDB.php");

$createdat = html_entity_decode($_GET["id"]);

if ($stmt = $conn->prepare("DELETE FROM contact_form_submissions WHERE createdat = ?")) {
    $stmt->bind_param("s", $createdat);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        header("Location: ./form-submissions.php?deleted=true");
    } else {
        header("Location: ./form-submissions.php?deleted=false");
    }
} else {
    header("Location: ./form-submissions.php?deleted=false");
}
echo $createdat;
