<?php

$icons = array();
$icons['None'] = array("");
$icons['IcoMoon'] = wave_get_icomoon_list();
$icons['Font Awesome'] = wave_get_fontawesome_list();

?>
<input type="hidden" id="dialog_field_name" name="dialog_field_name" value="<?php echo $_GET['field_name']; ?>"/>
<div class="dialog-icon-select">
	<?php foreach ($icons as $name => $list): ?>
		<h2><?php echo $name; ?></h2>
		<ul class="icons-list">
			<?php foreach ($list as $icon): ?>
				<li>
					<a href="javascript:void(0);" title="<?php echo $icon; ?>">
						<i class="icon icon-<?php echo $icon;
						if ($name == "IcoMoon")
							echo " icomoon"; ?>"></i>
					</a>
				</li>
			<?php endforeach; ?>
			<li class="clear"></li>
		</ul>
	<?php endforeach; ?>
	<div class="clear"></div>
</div>
<script>
	(function ($) {
		$('div.dialog-icon-select a').click(function () {
			var value = $(this).find("i").attr("class").substr(5).split("icon-").join("");
			var field_name = $('#dialog_field_name').val();
			var field = $('#<?php echo $_GET['field_name']; ?>, input[name="<?php echo $_GET['field_name']; ?>"]');
			field.val(value);
			field.siblings('div.select-icon').find("i").attr("class", "icon icon-" + value);
			tb_remove();
			return false;
		});
	})(jQuery);
</script>