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



function affichage(){

    $contenu='<table >';
    $contenu.='<tr>';
    $contenu.='<th>regions</th>';
    $contenu.='<th>hospitalises</th>';
    $contenu.='<th>nouvellesHospitalisations</th>';
    $contenu.='</tr>';
    global $wpdb;
    $resultats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}db_covid") ;
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


        <select name="choix">
        <option value="">Choisir  une région
        
        <option value="departement">le nombre de personnes hospitalises</option>
        <option value="region">le nombre de personnes en réaanimation</option>
        <option value="departements">le nombre de nouvelles hospitalisations</option>
        <option value="departement">le nombre de personnes personnes en réanimation</option>
        <option value="region">le nombre de personnes décédés</option>
        <option value="departements">le nombre de personnes guéries </option>
       
    </select>
    <input type="text" size="30" name="display" id="display" />
           <button >Recherche</button>
    
    
        