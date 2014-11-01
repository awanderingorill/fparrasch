<?php 

// call the pods
$exhibition = pods( 'exhibition' ); 
$exhibition->find( $params ); 


// Here's how to use find() 
$params = array( 
    'where'=>"category.name = 'past'" 
); 

// Run the find 
$exhibition = pods( 'exhibition', $params ); 

// Loop through the records returned 
while ( $exhibition->fetch() ) { 
    echo $exhibition->display( 'name' ) . "\n"; 
}