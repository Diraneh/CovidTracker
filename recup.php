
<?php
// ma première action
function dire_bonjour(){
	echo '<nav class="navbar navbar-dark bg-primary">
    <div class="container">
    
    </div>
   <form class="form-inline my-2 my-lg-0">
         <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit name="recherche" value="action">Search</button>
       </form>
   </nav>
   ';
}
add_action( 'init', 'dire_bonjour');

?>

























?>