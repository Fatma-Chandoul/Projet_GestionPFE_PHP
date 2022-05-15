<?php
require_once("functions.php");
?>
<html>

<head>

</head>

<body>

    <h2>
        Ajouter un etudiant
    </h2>
    <form method="get" action="ajout.php">
        <p>Titre <input type="text" name="titre"></p>
        <p>Etudiant: <select name="etd">
                <?php
                $etd = getAllEtudiant();
                foreach ($etd as $k => $v) {
                    echo "<option value='{$v["id_etd"]}'>{$v["nom"]} {$v["prenom"]}</option>";
                }
                ?>
            </select></p>
        <p>Enseignant: <select name="ens" >
                <?php
                $ens = getAllEnseignant();
                foreach ($ens as $k => $v) {
                    echo "<option value='{$v["id_ens"]}'>{$v["nom"]} {$v["prenom"]}</option>";
                }
                ?>
            </select> </p>
        <p> <input type="submit" value="Enregistrer"></p>


    </form>
</body>

</html>