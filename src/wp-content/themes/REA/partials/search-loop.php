<?php 
/* 
/ Template uses data generated by the rea_posts function() in /library/functions/frontend.php
/
/ Available variables
/ ---------------------
/
*/
//The included variables
	$firstname = get_the_author_meta('user_firstname');
	$lastname = get_the_author_meta('user_lastname');
	$authorID = get_the_author_meta('ID');
	$postdate =  the_date('d M Y', '', '', false);

?>

<div class="post-meta"> 
	<div class="post-cats"><?php list_post_cats(); ?></div>
	<div class="authorname"><?php echo $firstname.' '.$lastname ?></div>
	<div class="post-date"><?php echo $postdate ?></div>
	<div class="post-cats"><?php list_post_tags(); ?></div>
</div>
<div class="post-overview">
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div>


