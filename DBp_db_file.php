<?php
require_once(ABSPATH."wp-admin/includes/upgrade.php");

function DBP_tb_create()
{
global $wpdb;

$db = $wpdb->prefix. "db_covid";
$query ="CREATE TABLE $db(
id int(6) NOT NULL AUTO_INCREMENT,
code varchar(30) ,

nom varchar(30),
hospitalises int(30),
reanimation int(30),
nouvellesHospitalisations int(30),
nouvellesReanimations int(30),
deces int(30),
gueris int(30),
PRIMARY KEY(id)
)";

dbDelta($query);


}



function Insertion($code,$nom,$hospitalises,$reanimation,$nouvellesHospitalisations,$nouvellesReanimations,$deces,$gueris)
{
    global $wpdb;

    $table_name = $wpdb->prefix. "db_covid";

    $wpdb->insert($table_name, array('id' => NULL,'code' => $code, 'nom' => $nom, 'hospitalises' => $hospitalises, 'reanimation' => $reanimation, 'nouvellesHospitalisations' => $nouvellesHospitalisations,'nouvellesReanimations' => $nouvellesReanimations, 'deces' => $deces, 'gueris' => $gueris)); 
}



function allregions(){

    $contenu='<table >';
    $contenu.='<tr>';
    $contenu.='<th>regions</th>';
    $contenu.='<th>hospitalises</th>';
    $contenu.='<th>nouvellesHospitalisations</th>';
    $contenu.='</tr>';
    global $wpdb;
    $resultats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}db_covid WHERE code LIKE 'reg%'") ;
    // Parcours des resultats obtenus
    foreach ($resultats as $affiche) {
    
        $contenu.='<tr>';
        $contenu.='<td>'.$affiche->nom.'</td>';
        $contenu.='<td>'.$affiche->hospitalises.'</td>';
        $contenu.='<td>'.$affiche->nouvellesHospitalisations.'</td>';
        $contenu.='</tr>';
      
    
    }
    
    return  $contenu;

}







function Departementts(){

    $contenu='<table >';
    $contenu.='<tr>';
    $contenu.='<th>Departement</th>';
    $contenu.='<th>hospitalises</th>';
    $contenu.='<th>nouvellesHospitalisations</th>';
    $contenu.='</tr>';
    global $wpdb;
    $resultats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}db_covid WHERE code LIKE 'Dep%'") ;
    // Parcours des resultats obtenus
    foreach ($resultats as $affiche) {
    
        $contenu.='<tr>';
        $contenu.='<td>'.$affiche->nom.'</td>';
        $contenu.='<td>'.$affiche->hospitalises.'</td>';
        $contenu.='<td>'.$affiche->nouvellesHospitalisations.'</td>';
        $contenu.='</tr>';
      
    
    }
    
    return  $contenu;

}



    
       ?>


        