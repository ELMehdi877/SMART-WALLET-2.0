<?php
require "connection.php";
require "User.php";

$user = new User("Mehdi", "mehdi@test.com", "123456");

if ($user->register($pdo)) {
    echo "Utilisateur enregistré avec succès";
} else {
    echo "Erreur lors de l'inscription";
}