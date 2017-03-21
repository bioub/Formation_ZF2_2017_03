<?php

require_once 'src/Intro/Ordinateur.php';

$macbookpro = new Intro_Ordinateur();
$macbookpro->setMarque('Apple')->setModele('MacBook Pro');

$fujitsu = new Intro_Ordinateur();
$fujitsu->setMarque('Fujitsu')
    ->setModele('A1243');

echo 'Marque : ' . $macbookpro->getMarque();
echo "\n";

echo 'Modele : ' . $macbookpro->getModele();
echo "\n";