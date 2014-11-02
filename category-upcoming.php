<?php get_header(); ?>


<div class="container">

	<header class="sixteen columns">
		<h1>Upcoming <span class="gray-text">Exhibitions</span></h1>
	</header>

	<?php 
		$slug = pods_v( 'last', 'url' );

	    $params = array( 
	        'where'=> "category.name = '$slug'" ); 

	    // Create and find in one shot 
	    $exhibition = pods( 'exhibition', $params ); 

	    if ( 0 < $exhibition->total() ) { 
	        while ( $exhibition->fetch() ) { 
	?> 

	<div class="sixteen columns">			
		<p>
			<a href="<?php echo $exhibition->display( 'guid' ); ?>"><?php echo $exhibition->display( 'name' ); ?></a>
		</p> 

	</div>

	<?php 
	        } // end of exhibition loop 
	    } // end of found exhibitions
	?>

</div>