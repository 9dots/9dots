<div class="box box-post">
	<div class="column">
		<div class="three_fourth">
			<?php get_template_part('parts/post/content'); ?>
		</div>
		<div class="one_fourth last">
			<div id="sidebar">
				<ul>
					<?php dynamic_sidebar('Blog Sidebar'); ?>
				</ul>
				<div class="clearboth"></div>
			</div>
		</div>
		<div class="clearboth"></div>
	</div>
</div>
<div class="box box-comments">
	<div class="column">
		<?php comments_template(); ?>
		<div class="clearboth"></div>
	</div>
</div>