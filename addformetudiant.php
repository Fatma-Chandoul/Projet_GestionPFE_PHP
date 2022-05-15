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
    <div class="container-fluid ">
        <br><br><br>
        <div class="row mt-2">
            <div class="offset-4 col-4 bg-light border border-primary">
                <h1 style="text-align:center">Gestion des Pfes</h1>
                <h3 style="text-align:center">Ajouter un etudiant</h3>
                <form action="addetudiant.php" method="post">
                    <div class="form-group">
                        <label>Groupe :</label>
                        <select class="form-control" name="groupe" id="groupe" onchange="update();">
                            <?php
                            $groups = getAllGroupes();
                            $groupe = $_GET["groupe"];
                            $sujet = getGroupeById($groupe);
                            if (!isset($_GET["groupe"])) {

                                echo "<option value='0'>choisir un groupe</option>";
                                foreach ($groups as $k => $v) {
                                    echo "<option value='{$v["id"]}'>{$v["nom"]}</option>";
                                }
                            } else {
                                foreach ($groups as $k => $v) {

                                    if ($v["nom"] == $sujet) {
                                        echo "<option value='{$groupe}' selected>{$sujet}</option>";
                                    } else {
                                        echo "<option value='{$v["id"]}'>{$v["nom"]}</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <script>
                        function update() {
                            var g = (document.getElementById('groupe')).value;

                            window.location.href = "addformetudiant.php?groupe=" + g;

                        }
                    </script>
                    <?php
                    if (isset($_GET["groupe"])) {
                        $groupe = $_GET["groupe"];

                    ?>
                        <div class="form-group">
                            <label>Enseignant :</label>
                            <select class="form-control" name="enseignant">
                                <?php
                                $enseignants = getEnseignantsByGroupe($groupe);
                                foreach ($enseignants as $k => $v) {
                                    echo "<option value='{$v["id"]}'>{$v["nom"]}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sujet :</label>
                            <select class="form-control" name="pfe">
                                <?php
                                $sujets = getPfeByGroupe($groupe);
                                foreach ($sujets as $k => $v) {
                                    echo "<option value='{$v["id"]}'>{$v["sujet"]}</option>";
                                }
                                ?>

                            </select>
                        </div>
                    <?php
                        echo ("<div class='form-group'>
                    <label>Nom de l'etudiant: </label> <input type='text' class='form-control' id='nom' name='nom' placeholder='Nom' required='required' />
                    <span class='glyphicon glyphicon-user form-control-feedback'></span>
                </div>");
                    }
                    ?>
                    <div class="form-row">
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-block mb-1" id="_submit" name="_submit" value="Ajouter" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>