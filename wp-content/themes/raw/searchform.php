<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<div>
		<label for="s" class="screen-reader-text"><?php _e('Search for:', WAVE_TEXT_DOMAIN); ?></label>
		<input type="search" id="s" name="s" value=""/>
		<input type="submit" class="button small" value="<?php _e('Search', WAVE_TEXT_DOMAIN); ?>" id="searchsubmit"/>
	</div>
</form>