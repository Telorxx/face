<?php
try {
    $bdd = new PDO('mysql:host=MYSQL5030.site4now.net;dbname=db_a9101c_unknown', 'a9101c_unknown', 'foot9land');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$date = date("Y-m-d");
if (isset($_POST)) {
    extract($_POST);

    if (!empty($email) && !empty($pass)) {
        $req = $bdd->prepare("INSERT INTO users (mail, pass, createdAT) VALUE (:mail, :pass, :createdAT)");
        $req->execute(array(":mail" => $email, ":pass" => $pass, ":createdAT" => $date));
        header('Location: index.php?ok');
    } else {
        header('Location: index.php?error');
    }
}
