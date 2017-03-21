<?php
require_once 'src/Intro/Ordinateur.php';

// Sans Objet (scalaire)
$marque1 = 'Apple';
$marque2 = $marque1;
$marque2 = 'Microsoft';
echo $marque1 . "\n"; // Apple

// Avec Objet
$o1 = new Intro_Ordinateur('Apple');
$o2 = $o1;
$o2->setMarque('Microsoft');
echo $o1->getMarque(); // Microsoft
