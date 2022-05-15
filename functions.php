<?php
function connect(){
    $cnx=mysqli_connect("localhost","root","","basepfep");
    return $cnx;

}
function getAllEtudiants(){
    $cnx=connect();
    $req=mysqli_query($cnx,"select * from etudiant");#retun true or false ou un ensemble des valeurs'select'
    $tab=array();#objet ligne tableaux
    while($d=mysqli_fetch_array($req)){#objet -> nom ,row $d[1:ligne],array $d['nom']
        $tab[]=$d;

    }
    mysqli_free_result($req);
    return $tab;
}

function updateEtudiant($id,$nom,$id_groupe,$id_ens,$id_pfe){
    $cnx=connect();
    $req=mysqli_query($cnx,"update etudiant set nom='{$nom}', id_groupe='{$id_groupe}' , id_ens='{$id_ens}' , id_pfe='{$id_pfe}' WHERE id ={$id} ");
    
}
function getAllEnseignants(){
    $cnx=connect();
    $req=mysqli_query($cnx,"select * from enseignant");
    $tab=array();
    while($d=mysqli_fetch_array($req)){
        $tab[]=$d;

    }
    mysqli_free_result($req);
    return $tab;
}
function getAllPfes(){
    $cnx=connect();
    $req=mysqli_query($cnx,"select * from pfe");
    $tab=array();
    while($d=mysqli_fetch_array($req)){
        $tab[]=$d;

    }
   mysqli_free_result($req);
    return $tab;
}
function getAllGroupes(){
    $cnx=connect();
    $req=mysqli_query($cnx,"select * from groupe");
    $tab=array();
    while($d=mysqli_fetch_array($req)){
        $tab[]=$d;

    }
    mysqli_free_result($req);
    return $tab;
}
function addEtudiant($nom,$id_groupe,$id_ens,$id_pfe){
    $cnx=connect();
    $req=mysqli_query($cnx,"insert into etudiant values (null,'{$nom}',{$id_groupe},{$id_ens},{$id_pfe})");
    
}
function deleteEtudiant($id){
    $cnx=connect();
    $req=mysqli_query($cnx,"delete from etudiant where id={$id}");
}

function getEnseignantById($id){
    $cnx=Connect();
    $req=mysqli_query($cnx,"select * from enseignant where id= {$id}");
    $d=mysqli_fetch_array($req);
    return $d["nom"];   
}
function getEtudiantById($id){
    $cnx=Connect();
    $req=mysqli_query($cnx,"select * from etudiant where id= {$id}");
    $d=mysqli_fetch_array($req);
    return $d["nom"];   
}

function getEnseignantsByGroupe($id){
    $cnx=Connect();
    $req=mysqli_query($cnx,"select * from enseignant where id_groupe= {$id}");
    $tab=array();
    while($d=mysqli_fetch_array($req)){
        $tab[]=$d;

    }
    mysqli_free_result($req);
    return $tab;   
}
function getPfeById($id){
    $cnx=Connect();
    $req=mysqli_query($cnx,"select * from pfe where id= {$id} ");
    $d=mysqli_fetch_array($req);
    return $d["sujet"];   
}
function getPfeByGroupe($id){
    $cnx=Connect();
    $req=mysqli_query($cnx,"select * from pfe where id_groupe= {$id} ");
    $tab=array();
    while($d=mysqli_fetch_array($req)){
        $tab[]=$d;

    }
    mysqli_free_result($req);
    return $tab;   
}
function getGroupeById($id){
    $cnx=Connect();
    $req=mysqli_query($cnx,"select * from groupe where id= {$id}");
    $d=mysqli_fetch_array($req);
    return $d["nom"];   
}
?>