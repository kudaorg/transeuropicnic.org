<?php 
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php the_date('l, F j, Y','<h2 class="date-header">','</h2>'); unset($previousday); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<div class="post-title"><h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title();?>"><?php the_title(); ?></a></h3></div>

	<div class="storycontent">
		<?php the_content(__('(more...)')); ?>
	</div>

	<?php wp_link_pages(); ?>
	
	<div class="meta"><?php _e("posted by"); ?> <?php the_author() ?> at <font color="#99AADD"><?php the_time() ?></font> <!-- <?php _e("filed in"); the_category(',') ?>--> &nbsp; <?php edit_post_link(__('[Edit]')); ?></div>

	<div class="feedback">
            <?php comments_popup_link(__('0 Comments'), __('1 Comment'), __('Comments (%)')); ?>
	</div>

</div>

<?php comments_template(); // Get wp-comments.php template ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>

<?php get_footer(); ?>
