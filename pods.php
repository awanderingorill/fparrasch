<?php
/*
Template Name: Custom Pods template
*/
 
get_header();
?>
<div id="primary"> 
 <div style="width: 93%;" id="content" role="main">
  <article id="post-0" class="post page hentry">
   <?php pods_content(); ?>
  </article>
 </div>
</div>
<?php
get_sidebar();
get_footer();
?>