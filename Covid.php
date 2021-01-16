<?php

/**
 
 */
/*
Plugin Name: Covide
Plugin URI: 
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Covid
Author: Elmi Diraneh
Version: 1.7.2
Author URI: 
*/

defined('ABSPATH') or die('Oups !');
include_once("DBp_db_file.php");

function my_admin_menu() {
    add_menu_page(
        __( 'Covid', 'my-textdomain' ),
        __( 'Covid', 'my-textdomain' ),
        'manage_options',
        'sample-page',
        'my_admin_page_contents',
        'dashicons-schedule',
       
        3
    );
}

add_action( 'admin_menu', 'my_admin_menu' );


function my_admin_page_contents() {
  
    ?>
        <h1>
            <?php esc_html_e( 'Welcome to my custom admin page.', 'my-plugin-textdomain' ); ?>
        </h1>
        <form action="" method="POST">
          <button type="button" class="btn btn-success" value="action" name="ajouter">Upload</button>
        </form>

        
       
    <h3>Please choose an option to generete a shortcode</h3>
  
<select name="choix" id="choose">
<option value="1">--Please choose an option--</option>
<option value="Departement">Departement</option>
<option value="regions">Région</option>


</select>
<button onclick="selection()">Valider</button>
<div id="code"></div>



    
    
    <?php

    

}


if(isset($_POST['ajouter'])=='action'){



    $curl=curl_init('https://coronavirusapi-france.now.sh/AllLiveData');
    
    curl_setopt_array($curl,[CURLOPT_CAINFO =>__DIR__.DIRECTORY_SEPARATOR.'certife.cer',
    CURLOPT_RETURNTRANSFER=>true]);

    $data=curl_exec($curl);
    
    if ($data===false){
      curl_error($curl);
    }else if(curl_getinfo($curl,CURLINFO_HTTP_CODE)=== 200){
        $data = json_decode($data,true);
        ;
        for($i=0;$i<count($data['allLiveFranceData']);$i++){
            Insertion($data['allLiveFranceData'][$i]['code'] ,
              $data['allLiveFranceData'][$i]['nom'] ,
              $data['allLiveFranceData'][$i]['hospitalises'] ,
               $data['allLiveFranceData'][$i]['reanimation'],
               $data['allLiveFranceData'][$i]['nouvellesHospitalisations'],
               $data['allLiveFranceData'][$i]['nouvellesReanimations'] ,
                $data['allLiveFranceData'][$i]['deces'] ,
                $data['allLiveFranceData'][$i]['gueris']);
    }
    }
    
    register_activation_hook(__FILE__,"DBP_tb_create");
     
    curl_close($curl);
    }

    function tbare_wordpress_plugin_allregions() {
        $Content = allregions();
        
        return $Content;
        }
 add_shortcode('regions', 'tbare_wordpress_plugin_allregions');
 



 
 function tbare_wordpress_plugin_Departements() {
    $Content =Departementts();
    
    return $Content;
    }
add_shortcode('Departement', 'tbare_wordpress_plugin_Departements');


?>



<script>


function selection(){
var e = document.getElementById("choose").value;

if(e != "1") {
document.getElementById('code').innerHTML="["+e+"]";

}

}


</script>

 
