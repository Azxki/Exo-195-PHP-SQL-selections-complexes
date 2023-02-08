<?php

/**
 * Utilisez la base de données que vous avez utilisé dans l'exo 194.
 * Utilisez aussi le CSS que vous avez écris ( div contenant l'utilisateur ).
 * Pour chaque sélection, vous utiliserez un div par utilisateur:
 * ex:  <div class="classe-css-utilisateur">
 *          utilisateur 1, données ( nom, prenom, etc ... )
 *      </div>
 *      <div class="classe-css-utilisateur">
 *          utilisateur 2, données ( nom, prenom, etc ... )
 *      </div>
 *
 * -- Sélections complexes --
 * Une seule requête est permise pour chaque point de l'exo.
 */

// TODO Commencez par créer votre objet de connexion à la base de données, vous pouvez aussi utiliser l'objet statique ou autre qu'on a créé ensemble.

/* 1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' */
// TODO votre code ici.

/* 2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John' */
// TODO Votre code ici.

/* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
// TODO Votre code ici.

/* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
// TODO Votre code ici.

/* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
// TODO Votre code ici.

/* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
// TODO Votre code ici.

/* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
// TODO Votre code ici.

/* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
// TODO Votre code ici.

/* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
// TODO Votre code ici.

/* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement */
// TODO Votre code ici.

/* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères ( voir LIKE )*/
// TODO Votre code ici.

/* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
// TODO Votre code ici.

/* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
// TODO Votre code ici.

/* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
// TODO Votre code ici.

$username = 'root';
$password = '';
$host = 'localhost';
$data = 'test';

$file = file_get_contents('./SQL/user.sql');

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $data . ';charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $db->lastInsertId();
    $db->exec($file);

    $stmt = $db->prepare('SELECT * from utilisateurs WHERE nom = "Conor"');
    $stmt2 = $db->prepare('SELECT * from utilisateurs WHERE prenom != "John"');
    /* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
// TODO Votre code ici.
    $stmt3 = $db->prepare('SELECT * from utilisateurs WHERE id <= 2 ');
    /* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
// TODO Votre code ici.
    $stmt4 = $db->prepare('SELECT * from utilisateurs WHERE id >= 2');
    /* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
// TODO Votre code ici.
    $stmt5 = $db->prepare('SELECT * from utilisateurs WHERE id = 1');
    /* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
// TODO Votre code ici.
    $stmt6 = $db->prepare('SELECT * from utilisateurs WHERE id > 1 AND nom = "Doe"');
    /* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
// TODO Votre code ici.
    $stmt7 = $db->prepare('SELECT * from utilisateurs WHERE nom = "Doe" AND prenom = "John"');
    /* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
// TODO Votre code ici.
    $stmt8 = $db->prepare('SELECT * from utilisateurs WHERE nom = "Conor" OR prenom = "Jane"');
    /* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
// TODO Votre code ici.
    $stmt9 = $db->prepare('SELECT * from utilisateurs WHERE id < 3');
    /* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement */
// TODO Votre code ici.
    $stmt10 = $db->prepare('SELECT * from utilisateurs WHERE id < 2');
    /* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères ( voir LIKE )*/
// TODO Votre code ici.
    $stmt11 = $db->prepare('SELECT * from utilisateurs WHERE nom LIKE "C%_____%r"');
    /* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
// TODO Votre code ici.
    $stmt12 = $db->prepare('SELECT * from utilisateurs WHERE nom LIKE "%e%"');
    /* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
// TODO Votre code ici.
    $stmt13 = $db->prepare('SELECT * from utilisateurs WHERE prenom IN ("John", "Sarah")');
    /* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
// TODO Votre code ici.
    $stmt14 = $db->prepare('SELECT * from utilisateurs WHERE id BETWEEN "2" AND "4"');

    $state = $stmt->execute();
    $state2 = $stmt2->execute();
    $state3 = $stmt3->execute();
    $state4 = $stmt4->execute();
    $state5 = $stmt5->execute();
    $state6 = $stmt6->execute();
    $state7 = $stmt7->execute();
    $state8 = $stmt8->execute();
    $state9 = $stmt9->execute();
    $state10 = $stmt10->execute();
    $state11 = $stmt11->execute();
    $state12 = $stmt12->execute();
    $state13 = $stmt13->execute();
    $state14 = $stmt14->execute();


    if ($state) {
        foreach ($stmt->fetchAll() as $user){
            echo "Utilisateur ayant le nom Conor : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }

    echo "<br>";

    if ($state2) {
        foreach ($stmt2->fetchAll() as $user){
            echo "Utilisateurs = John : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }
    if ($state3) {
        foreach ($stmt3->fetchAll() as $user){
            echo "Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }

    echo "<br>";

    if ($state4) {
        foreach ($stmt4->fetchAll() as $user){
            echo "Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }
    if ($state5) {
        foreach ($stmt5->fetchAll() as $user){
            echo "Utilisateur ayant le nom Conor : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }

    echo "<br>";

    if ($state6) {
        foreach ($stmt6->fetchAll() as $user){
            echo "Utilisateurs : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }
    if ($state7) {
        foreach ($stmt7->fetchAll() as $user){
            echo "Utilisateur ayant le nom Conor : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }

    echo "<br>";

    if ($state8) {
        foreach ($stmt8->fetchAll() as $user){
            echo "Utilisateurs : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }
    if ($state) {
        foreach ($stmt->fetchAll() as $user){
            echo "Utilisateur ayant le nom Conor : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }

    echo "<br>";

    if ($state9) {
        foreach ($stmt9->fetchAll() as $user){
            echo "Utilisateurs : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }
    if ($state10) {
        foreach ($stmt10->fetchAll() as $user){
            echo "Utilisateur ayant le nom Conor : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }

    echo "<br>";

    if ($state11) {
        foreach ($stmt11->fetchAll() as $user){
            echo "Utilisateurs : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }
    if ($state12) {
        foreach ($stmt12->fetchAll() as $user){
            echo "Utilisateur ayant le nom Conor : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }

    echo "<br>";

    if ($state13) {
        foreach ($stmt13->fetchAll() as $user){
            echo "Utilisateurs : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }
    if ($state14) {
        foreach ($stmt14->fetchAll() as $user){
            echo "Utilisateurs : " . $user['nom'] . " " . $user['prenom'] . '<br>';
        }
    }
    else {
        echo "requête invalide !";
    }
}


catch (PDOException $exception) {
    echo $exception->getMessage();
}
