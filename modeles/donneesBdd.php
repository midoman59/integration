<?php

$link = mysqli_connect("localhost", "root", "", "integration")
		or die("Impossible de se connecter : " . mysql_error());
mysqli_query($link, "SET NAMES UTF8");



//fonction de manipulation de titre
function recupTitres() {
	global $link;
	$resultat = mysqli_query($link, 'SELECT * FROM `menu-haut`');
	$titres = [];
	while ($data = mysqli_fetch_assoc($resultat)) {
		$titres[$data['id']] = $data['titre'];		
	}
	return $titres;
	
}

function editerTitre($id, $titre) {
	global $link;
	$query = "UPDATE `menu-haut` SET `titre`='" . $titre . "' WHERE `id`='" . $id . "'";
	mysqli_query($link, $query);
}

function ajouterTitre($titre) {
	global $link;
	$query = "INSERT INTO `menu-haut` (titre) VALUES ('" . $titre . "')";
	mysqli_query($link, $query);
}

function suprimerTitre($id) {
	global $link;
	$query="DELETE FROM `menu-haut` WHERE `id`='" .$id ."'";
	mysqli_query($link, $query);
}

