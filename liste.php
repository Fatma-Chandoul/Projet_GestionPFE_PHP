<?php
//header( 'content-type: text/html; charset=utf-8' );
session_start();
require_once("functions.php");
if (!isset($_SESSION["user"])) {
    $_SESSION["erreur"] = "Vous n'avez pas le droit d'accéder a cette page !!!";
    $_SESSION["type"] = "danger";
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content=\"text/html; charset=UTF-8\">
    <title></title>
    <link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="bootstrap4/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <?php
        include_once("top.php");
        ?>
        <div class="alert alert-success">
            <h4><?= sizeof(getAllEtudiants()) ?> &Eacute;tudiants

            </h4>
        </div>
        <a href="addformetudiant.php" class="btn btn-info" style="color: white">
            <h6>Ajouter un &eacute;tudiant &agrave; la liste</h6>
        </a>
        <div class="card text-white mt-2">
            <div class="card-header bg-primary"> Liste des Pfes </div>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Etudiant</th>
                        <th>Enseignant</th>
                        <th>Sujet</th>
                        <th>Groupe</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $etudiant = getAllEtudiants();
                    foreach ($etudiant as $k => $v) {
                    ?>
                        <tr class="bg-info">
                            <td><?= $v["nom"] ?></td>
                            <td><?= getEnseignantById($v["id_ens"]) ?></td>
                            <td><?= getPfeById($v["id_pfe"]) ?></td>
                            <td><?= getGroupeById($v["id_groupe"]) ?></td>
                            <td>

                                <a href="delete.php?id=<?= $v["id"] ?>" class="btn btn-danger" style="color: white">Supprimer
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>

        </div>





    </div>


</body>

</html>