<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>BRAVO SHORTCODES</title>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/custom.css">
	<script language="javascript" type="text/javascript" src="js/tiny_mce_popup.js"></script>
	<script type="text/javascript" src="js/dialog.js"></script>
</head>
<body onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';">
<form onsubmit="tinypluginDialog.insert();return false;" action="#">
	<p>Choose Your Shortcodes here. </p>
	<p>
		<select id="shortcode" name="shortcode">
			<option value="separator">Separator</option>
			<option value="sub_title">Sub Title</option>
			<option value="notification">Notification</option>
			<option value="button">Button</option>
			<option value="" disabled="disabled">-------------------------------------</option>
			<option value="" disabled="disabled">Content Formatting</option>
			<option value="" disabled="disabled">-------------------------------------</option>
			<option value="one_half_row">One Half Row</option>
			<option value="one_third_row">One Third Row</option>
			<option value="one_fourth_row">One Fourth Row</option>
			<option value="one_fifth_row">One Fifth Row</option>
			<option value="two_third_row">Two Third Row</option>
			<option value="three_fourth_row">Three Fourth Row</option>
			<option value="" disabled="disabled">-------------------------------------</option>
			<option value="" disabled="disabled">Template Shortcode</option>
			<option value="" disabled="disabled">-------------------------------------</option>
			<option value="contact">Contact</option>
			<option value="three_column_portfolio">Three Column Portfolio</option>
			<option value="blog">Blog</option>
			<option value="music_player">Music Player</option>
			<option value="" disabled="disabled">-------------------------------------</option>
			<option value="" disabled="disabled">Tabs and Toggles</option>
			<option value="" disabled="disabled">-------------------------------------</option>
			<option value="tabs">Tabs</option>
			<option value="accordian">Accordian</option>
			<option value="" disabled="disabled">-------------------------------------</option>
			<option value="" disabled="disabled">Slider and Video</option>
			<option value="" disabled="disabled">-------------------------------------</option>
			<option value="flex_slider">Flex Slider</option>
			<option value="attachments">Attachments</option>
			<option value="youtube">YouTube</option>
			<option value="vimeo">Vimeo</option>
			<option value="icon">Font Awesome Icons</option>
			<option value="icon_social">Ico Moon Icons</option>	
		</select>
	</p>
	<script>
	function result(){
		var resultstring;
		var getstr=tinyMCE.activeEditor.selection.getContent();
		if(document.getElementById('shortcode').value == 'separator'){
			resultstring="[separator color='Enter Separator Color Here']";
		}

		if(document.getElementById('shortcode').value == 'contact'){
			resultstring='[contact]';
		}
		
		if(document.getElementById('shortcode').value == 'three_column_portfolio'){
			resultstring='[three_column_portfolio]';
		}
		
		if(document.getElementById('shortcode').value == 'blog'){
			resultstring='[blog]';
		}
		
		if(document.getElementById('shortcode').value == 'music_player'){
			resultstring='[music_player]';
		}
		
		if(document.getElementById('shortcode').value == 'sub_title'){
			if(getstr=="")
			resultstring='[sub_title color="Color Value Enter Here"][/sub_title]';
			else
			resultstring='[sub_title color="Color Value Enter Here"]'+getstr+'[/sub_title]';
		}
		
		if(document.getElementById('shortcode').value == 'notification'){
			if(getstr=="")
			resultstring='[notification style="black"][/notification]';
			else
			resultstring='[notification style="black"]'+getstr+'[/notification]';
		}
		
		if(document.getElementById('shortcode').value == 'button'){
			if(getstr=="")
			resultstring='[button color="" hover="" url="#"][/button]';
			else
			resultstring='[button color="" hover="" url="#"]'+getstr+'[/button]';
		}

		if(document.getElementById('shortcode').value == 'youtube'){
			if(getstr=="")
			resultstring='[youtube url="Video Link here"]';
			else
			resultstring='[youtube url="'+getstr+'"]';
		}
		if(document.getElementById('shortcode').value == 'vimeo'){
			if(getstr=="")
			resultstring='[vimeo url="Video Link here"]';
			else
			resultstring='[vimeo url="'+getstr+'"]';
		}

		if(document.getElementById('shortcode').value == 'tabs'){
			if(getstr=="")
				resultstring='[tabs]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[tab title="tab title"]your content here[/tab]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[tab title="tab title"]your content here[/tab]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[tab title="tab title"]your content here[/tab]<br/>[/tabs]';
			else
				resultstring='[tabs]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[tab title="tab title"]'+getstr+'[/tab]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[tab title="tab title"]your content here[/tab]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[tab title="tab title"]your content here[/tab]<br/>[/tabs]';
		}
		if(document.getElementById('shortcode').value == 'accordian'){
			if(getstr=="")
				resultstring='[accordian]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>[/accordian]';
			else
				resultstring='[accordian]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]'+getstr+'[/toggle]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>[/accordian]';
		}
		if(document.getElementById('shortcode').value == 'collapsed'){
			if(getstr=="")
				resultstring='[collapsed]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>[/collapsed]';
			else
				resultstring='[collapsed]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]'+getstr+'[/toggle]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>&nbsp;&nbsp;&nbsp;&nbsp;[toggle title="title"]your content here[/toggle]<br/>[/collapsed]';
			
		}
		if(document.getElementById('shortcode').value == 'one_third_row'){
			if(getstr=="")
				resultstring="[one_third] your content here [/one_third]<br/>[one_third] your content here [/one_third]<br/>[one_third_last] your content here [/one_third_last]";
			else
				resultstring="[one_third] "+getstr+" [/one_third]<br/>[one_third] your content here [/one_third]<br/>[one_third_last] your content here [/one_third_last]";
		}
		if(document.getElementById('shortcode').value == 'one_fourth_row'){
			if(getstr=="")
				resultstring="[one_fourth] your content here [/one_fourth]<br/>[one_fourth] your content here [/one_fourth]<br/>[one_fourth] your content here [/one_fourth]<br/>[one_fourth_last] your content here [/one_fourth_last]";
			else
				resultstring="[one_fourth] "+getstr+" [/one_fourth]<br/>[one_fourth] your content here [/one_fourth]<br/>[one_fourth] your content here [/one_fourth]<br/>[one_fourth_last] your content here [/one_fourth_last]";
		}
		if(document.getElementById('shortcode').value == 'one_half_row'){
			if(getstr=="")
				resultstring="[one_half] your content here [/one_half]<br/>[one_half_last] your content here [/one_half_last]";
			else
				resultstring="[one_half] "+getstr+" [/one_half]<br/>[one_half_last] your content here [/one_half_last]";
		}
		if(document.getElementById('shortcode').value == 'one_fifth_row'){
			if(getstr=="")
				resultstring="[one_fifth] your content here [/one_fifth]<br/>[one_fifth] your content here [/one_fifth]<br/>[one_fifth] your content here [/one_fifth]<br/>[one_fifth] your content here [/one_fifth]<br/>[one_fifth_last] your content here [/one_fifth_last]";
			else
				resultstring="[one_fifth] "+getstr+" [/one_fifth]<br/>[one_fifth] your content here [/one_fifth]<br/>[one_fifth] your content here [/one_fifth]<br/>[one_fifth] your content here [/one_fifth]<br/>[one_fifth_last] your content here [/one_fifth_last]";
		}
		if(document.getElementById('shortcode').value == 'two_third_row'){
			if(getstr=="")
				resultstring="[two_third] your content here [/two_third]<br/>[one_third_last] your content here [/one_third_last]";
			else
				resultstring="[two_third] "+getstr+" [/two_third]<br/>[one_third_last] your content here [/one_third_last]";
		}
		if(document.getElementById('shortcode').value == 'three_fourth_row'){
			if(getstr=="")
				resultstring="[three_fourth] your content here [/three_fourth]<br/>[one_fourth_last] your content here [/one_fourth_last]";
			else
				resultstring="[three_fourth] "+getstr+" [/three_fourth]<br/>[one_fourth_last] your content here [/one_fourth_last]";
		}		
	
		if(document.getElementById('shortcode').value == 'flex_slider'){
			resultstring='[flex_slider category="" animation="" auto_slide="" slide_interval=""]';
		}
		
		if(document.getElementById('shortcode').value == 'attachments'){
			resultstring='[attachments animation="" auto_slide="" slide_interval=""]';
		}

		if(document.getElementById('shortcode').value == 'icon'){
			resultstring='[icon_fontawesome name="cog" size="medium" style="square" color="#fff" bg_color="#000" hover_color="#000" hover_bg_color="#ff4311" url="#"]';
		}
		if(document.getElementById('shortcode').value == 'icon_social'){
			resultstring='[icon_icomoon name="facebook" size="medium" style="circle" color="#fff" bg_color="#000" hover_color="#000" hover_bg_color="#ff4311" url="#"]';
		}					


		tinyMCE.activeEditor.selection.setContent(resultstring);
		tinyMCEPopup.close();
	}
	</script>
	<div class="mceActionPanel">
		<input type="button" id="insert" name="insert" value="{#insert}" onclick="result();" />
		<input type="button" id="cancel" name="cancel" value="{#cancel}" onclick="tinyMCEPopup.close();" />
	</div>
</form>

</body>
</html>
