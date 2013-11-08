<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('NHP_Options')){
	require_once( dirname( __FILE__ ) . '/options/options.php' );
}

define( 'PREMIUM_THEME_NAME', 'Bravo' );

/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
				'title' => __('A Section added by hook', 'bravo'),
				'desc' => '<p class="description">'.__('This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.', 'bravo').'</p>',
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);
	
	return $sections;
	
}
//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}


/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = true;


$args['intro_text'] = '<p>'.__('Welcome to '.PREMIUM_THEME_NAME.' Options Panel. You will find out that its very simple to do what you want to and yet powerful enough to do whatever you want to with our wide variety of options.', 'bravo').'</p>';


//Choose to disable the import/export feature
//$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = PREMIUM_THEME_NAME;


$args['menu_title'] = __(PREMIUM_THEME_NAME.' Options', 'bravo');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __(PREMIUM_THEME_NAME.' Theme Options', 'bravo');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = PREMIUM_THEME_NAME.'_theme_options';



//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 29;

//Custom page icon class (used to override the page icon next to heading)
$args['page_icon'] = PREMIUM_THEME_NAME.'-logo';

	
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-1',
							'title' => __('Theme Information 1', 'bravo'),
							'content' => '<p>'.__('This is the tab content, HTML is allowed.', 'bravo').'</p>'
							);
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-2',
							'title' => __('Theme Information 2', 'bravo'),
							'content' => '<p>'.__('This is the tab content, HTML is allowed.', 'bravo').'</p>'
							);

//Set the Help Sidebar for the options page - no sidebar by default										
$args['help_sidebar'] = '<p>'.__('This is the sidebar content, HTML is allowed.', 'bravo').'</p>';



$sections = array();
global $pattern_array;
$pattern_array = array(
				'None' => array('title' => 'None', 'img' => NHP_OPTIONS_URL.'images/pattern/None.png'),
				'Style-1' => array('title' => 'Style-1', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-1.png'),
				'Style-2' => array('title' => 'Style-2', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-2.png'),
				'Style-3' => array('title' => 'Style-3', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-3.png'),
				'Style-4' => array('title' => 'Style-4', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-4.png'),
				'Style-5' => array('title' => 'Style-5', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-5.png'),
				'Style-6' => array('title' => 'Style-6', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-6.png'),
				'Style-7' => array('title' => 'Style-7', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-7.png'),
				'Style-8' => array('title' => 'Style-8', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-8.png'),
				'Style-9' => array('title' => 'Style-9', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-9.png'),
				'Style-10' => array('title' => 'Style-10', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-10.png'),
				'Style-11' => array('title' => 'Style-11', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-11.png'),
				'Style-12' => array('title' => 'Style-12', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-12.png'),
				'Style-13' => array('title' => 'Style-13', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-13.png'),
				'Style-14' => array('title' => 'Style-14', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-14.png'),
				'Style-15' => array('title' => 'Style-15', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-15.png'),
				'Style-16' => array('title' => 'Style-16', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-16.png'),
				'Style-17' => array('title' => 'Style-17', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-17.png'),
				'Style-18' => array('title' => 'Style-18', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-18.png'),
				'Style-19' => array('title' => 'Style-19', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-19.png'),
				'Style-20' => array('title' => 'Style-20', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-20.png'),
				'Style-21' => array('title' => 'Style-21', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-21.png'),
				'Style-22' => array('title' => 'Style-22', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-22.png'),
				'Style-23' => array('title' => 'Style-23', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-23.png'),
				'Style-24' => array('title' => 'Style-24', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-24.png'),
				'Style-25' => array('title' => 'Style-25', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-25.png'),
				'Style-26' => array('title' => 'Style-26', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-26.png'),
				'Style-27' => array('title' => 'Style-27', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-27.png'),
				'Style-28' => array('title' => 'Style-28', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-28.png'),
				'Style-29' => array('title' => 'Style-29', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-29.png'),
				'Style-30' => array('title' => 'Style-30', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-30.png'),
				'Style-31' => array('title' => 'Style-31', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-31.png'),
				'Style-32' => array('title' => 'Style-32', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-32.png'),
				'Style-33' => array('title' => 'Style-33', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-33.png'),
				'Style-34' => array('title' => 'Style-34', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-34.png'),
				'Style-35' => array('title' => 'Style-35', 'img' => NHP_OPTIONS_URL.'images/pattern/Style-35.png')
			);

$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'images/icon/general.png',
				'title' => __('General', 'bravo'),
				'desc' => '<p class="description">'.__('Welcome to the Bravo Theme Options panel. Here you will find various basic ways to tweak the theme to suit your needs.', 'bravo').'</p>',
				'fields' =>	array(
					array(
						'id' => 'dev_or_deploy',
						'type' => 'button_set',
						'title' => __('Website Status', 'bravo'), 
						'sub_desc' => __('Your current website status.', 'bravo'),
						'desc' => __('It is important to set this to "deploy" after you have finished playing with options panel and ready to launch the website. It will help us cache the css and optimize performance of the website', 'bravo'),
						'options' => array('dev' => 'Develop','deploy' => 'Deploy'),//Must provide key => value pairs for radio options
						'std' => 'dev'
						),
					
					array(
						'id' => 'logo',
						'type' => 'upload',
						'title' => __('Logo', 'bravo'), 
						'sub_desc' => __('Upload your custom logo.', 'bravo')
						),	
					array(
						'id' => 'retina_logo',
						'type' => 'upload',
						'title' => __('Retina Logo', 'bravo'), 
						'sub_desc' => __('Upload a retina logo for retina-ready devices.', 'bravo'),
						'desc' => __('Please append @2x to your logo\'s file name. If your logo is example.png , the retina logo must be named example@2x.png.', 'bravo')
						),										
					array(
						'id' => 'favicon',
						'type' => 'upload',
						'title' => __('Your Favicon', 'bravo'), 
						'sub_desc' => __('A Favicon is the bookmark icon of your website.', 'bravo'),
						'desc' => __('Please upload a 16px x 16px Favicon or 32px x 32px Favicon (.PNG or .ICO) for retina-ready devices here.', 'bravo')
						),

					array(
						'id' => 'copyright_text',
						'type' => 'textarea',
						'title' => __('Copyright Text', 'bravo'), 
						'sub_desc' => __('Footer copyright text.', 'bravo'),
						'desc' => __('Please place your copyright text to be displayed at the bottom-left of the footer.', 'bravo'),
						'validate' => 'html', 
						'std' => '&copy; Copyright 2013 | Bravo WordPress Theme by Prothemeus'
						),

					array(
						'id' => 'google_analytics_code',
						'type' => 'text',
						'title' => __('Google Analytics ID', 'bravo'), 
						'sub_desc' => __('The Google Analytics tracking code.', 'bravo'),
						'desc' => __('Please enter your Google analytics tracking code here.', 'bravo'),
						'validate' => 'js', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => ''
						),
					array(
						'id' => 'enable_nicescroll',
						'type' => 'checkbox',
						'title' => __('Enable Smooth Scroll', 'bravo'), 
						'sub_desc' => __('Uncheck to retain native OS scrollbar.', 'bravo'),
						'desc' => __('', 'bravo')
						),
					array(
						'id' => 'related_posts_count',
						'type' => 'text',
						'title' => __('Blog - Related Posts', 'bravo'), 
						'sub_desc' => __('Related blog posts on single blog posts.', 'bravo'),
						'desc' => __('', 'bravo')
						),
					array(
						'id' => 'portfolio_related_posts_count',
						'type' => 'text',
						'title' => __('Portfolio - Related Posts', 'bravo'), 
						'sub_desc' => __('Related portfolio posts on single portfolio posts.', 'bravo'),
						'desc' => __('', 'bravo')
						),
					array(
						'id' => 'custom_css',
						'type' => 'textarea',
						'title' => __('Custom CSS', 'bravo'), 
						'sub_desc' => __('Enter custom CSS.', 'bravo'),
						'desc' => __('Please add your custom css here.', 'bravo'),
						'validate' => 'html_custom', 
						'std' => ''
						),
					array(
						'id' => 'custom_js',
						'type' => 'textarea',
						'title' => __('Custom Javascript', 'bravo'), 
						'sub_desc' => __('Enter custom Javascript.', 'bravo'),
						'desc' => __('Please add your custom js code here.', 'bravo'),
						'validate' => 'html_custom', 
						'std' => ''
						),
												
				)
			);

$sections[] = array(
				'title' => __('Basic Styling', 'bravo'),
				'desc' => '<p class="description">'.__('This panel will allow you to have a bit more control over the appearance of the header and footer.', 'bravo').'</p>',
				'fields' => array(
					array(
						'id' => 'header',
						'type' => 'background',
						'title' => __('Header', 'bravo'), 
						'sub_desc' => __('Customize the header.', 'bravo'),
						'desc' => __('Header Section', 'bravo'),
						'defaults' => $pattern_array,
						'patterns' => array('dark' => 'Dark','light' => 'Light'),
						'std' =>    array(            
								'background' =>'#f9f9f9', 
			                    'scale' => 0,
			                    'bgdefault' => '',
			                    'bgpattern' => '',
			                    'color' => '#f9f9f9', 
			                    'opacity' => '1'
			                ),
						
					),
					array(
						'id' => 'footer',
						'type' => 'background',
						'title' => __('Footer', 'bravo'), 
						'sub_desc' => __('Customize the footer.', 'bravo'),
						'desc' => __('Footer Section', 'bravo'),
						'defaults' => $pattern_array,
						'patterns' => array('dark' => 'Dark','light' => 'Light'),
						'std' =>    array(            
								'background' =>'#f9f9f9', 
			                    'scale' => 0,
			                    'bgdefault' => '',
			                    'bgpattern' => '',
			                    'color' => '#f9f9f9', 
			                    'opacity' => '1'
			                )
						
					),
					array(
						'id' => 'variation_color',
						'type' => 'color',
						'title' => __('Accent Color', 'bravo'),
						'sub_desc' => __('This will change the main color used through the theme.', 'bravo'),
						'std' => '#ff4311'
					)
																
				)
			);


$sections[] = array(
				'title' => __('Typography', 'bravo'),
				'desc' => '<p class="description">'.__('The Bravo Wordpress theme comes with a wide variety to change the typography of your theme. Shown below are options to change fonts, colors, sizes and much more!', 'bravo').'</p>',
				'icon' => NHP_OPTIONS_URL.'images/icon/typo.png',
				'fields' => array(
					array(
						'id' => 'preview',
						'type' => 'typo_preview',
						'title' => __('Font Preview', 'bravo'), 
						'sub_desc' => __('Typography Font Preview Section', 'bravo'),
						'desc' => __('', 'bravo')
						),
					array(
						'id' => 'h1',
						'type' => 'typo',
						'title' => __('H1 Heading Tag', 'bravo'), 
						'group' => 'typo',
						'group_head' => 'typo',
						'std' => array
					                (
					                    'family' => 'default/NovecentowideBookBold',
					                    'size' => '50px',
					                    'line_height' => '70px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'uppercase',
					                    'color' => '#222222'
					                )
						),

					array(
						'id' => 'h2',
						'type' => 'typo',
						'title' => __('H2 Heading Tag', 'bravo'), 
						'group' => 'typo',
						'std' => array
					                (
					                    'family' => 'default/NovecentowideBookBold',
					                    'size' => '40px',
					                    'line_height' => '49px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'uppercase',
					                    'color' => '#222222'
					                )
						),

					array(
						'id' => 'h3',
						'type' => 'typo',
						'title' => __('H3 Heading Tag', 'bravo'), 
						'group' => 'typo',
						'std' => array
					                (
					                    'family' => 'default/NovecentowideBookBold',
					                    'size' => '30px',
					                    'line_height' => '37px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'uppercase',
					                    'color' => '#222222'
					                )
						),

					array(
						'id' => 'h4',
						'type' => 'typo',
						'title' => __('H4 Heading Tag', 'bravo'), 
						'group' => 'typo',
						'std' => array
					                (
					                   'family' => 'default/NovecentowideBookBold',
					                    'size' => '25px',
					                    'line_height' => '31px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'uppercase',
					                    'color' => '#222222'
					                )
						),

					array(
						'id' => 'h5',
						'type' => 'typo',
						'title' => __('H5 Heading Tag', 'bravo'),
						'group' => 'typo',
						'std' => array
					                (
					                    'family' => 'default/NovecentowideBookBold',
					                    'size' => '20px',
					                    'line_height' => '30px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'uppercase',
					                    'color' => '#222222'
					                )
						),

					array(
						'id' => 'h6',
						'type' => 'typo',
						'title' => __('H6 Heading Tag', 'bravo'),
						'group' => 'typo',
						'std' => array
					                (
										'family' => 'default/NovecentowideBookBold',
					                    'size' => '16px',
					                    'line_height' => '20px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'uppercase',
					                    'color' => '#222222'
					                )
						),
					array(
						'id' => 'sub_title',
						'type' => 'typo',
						'title' => __('Sub Title', 'bravo'),
						'group' => 'typo',
						'std' => array
					                (
										'family' => 'default/NovecentowideUltraLightBold',
					                    'size' => '16px',
					                    'line_height' => '20px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'uppercase',
					                    'color' => '#cdd0d2'
					                )
						),					

					array(
						'id' => 'body_text',
						'type' => 'typo',
						'title' => __('Paragraph Text', 'bravo'),
						'std' => array (
					                    'family' => 'default/Arial',
					                    'size' => '14px',
					                    'line_height' => '27px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'none',
					                    'color' => '#656771'
					                )
						),

					array(
						'id' => 'sidebar_widget_text',
						'type' => 'typo',
						'title' => __('Sidebar Widget Text', 'bravo'),
						'std' => array
					                (
					                    'family' => 'default/Arial',
					                    'size' => '14px',
					                    'line_height' => '27px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'none',
					                    'color' => '#656771'
					                )
						),

					array(
						'id' => 'bottom_widget_text',
						'type' => 'typo',
						'title' => __('Footer Widget Text', 'bravo'),
						'std' => array
					                (
					                    'family' => 'default/Arial',
					                    'size' => '13px',
					                    'line_height' => '20px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'none',
					                    'color' => '#1b1c21'
					                )
						),

					array(
						'id' => 'footer_text', 
						'type' => 'typo',
						'title' => __('Footer Text', 'bravo'),
						'desc' => __('Text below the main footer.', 'bravo'),
						'std' => array
					                (
					                    'family' => 'default/Arial',
					                    'size' => '14px',
					                    'line_height' => '27px',
					                    'style' => 'normal',
					                    'weight' => 'normal',
					                    'transform' => 'none',
					                    'color' => '#656771'
					                )
						),

					array(
						'id' => 'navigation_text',
						'type' => 'typo',
						'title' => __('Navigation Menu', 'bravo'),
						'std' => array
					                (
					                    'family' => 'default/NovecentowideBookBold',
					                    'size' => '15px',
					                    'line_height' => '23px',
					                    'style' => 'normal',
					                    'weight' => 'bold',
					                    'transform' => 'uppercase',
					                    'color' => '#13131b'
					                )
						)				

					) // Fields Array
				);

$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'images/icon/layout-new.png',
				'title' => __('Select Header Layout', 'bravo'),
				'desc' => __('<p class="description">The Bravo theme has two header layouts available to customize your theme even more. Shown below are two examples which you can select.</p>', 'bravo'),
				'fields' =>	array(

					array(
						'id' => 'layout',
						'type' => 'radio_img',
						'title' => __('Available Header Layouts', 'bravo'),
						'options' => array(
										'boxed' => array('title' => 'Layout 1', 'img' => NHP_OPTIONS_URL.'images/layout/style1.jpeg'),
										'wide' => array('title' => 'Layout 2', 'img' => NHP_OPTIONS_URL.'images/layout/style2.jpeg')
									),//Must provide key => value(array:title|img) pairs for radio options
						'std' => 'boxed'
						),
					array(
						'id' => 'sticky_header',
						'type' => 'button_set',
						'title' => __('Sticky Header', 'bravo'), 
						'sub_desc' => __('', 'bravo'),
						'desc' => __('', 'bravo'),
						'options' => array('on' => 'On','off' => 'Off'),//Must provide key => value pairs for radio options
						'std' => 'off'
						)					
				)
			);

$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'images/icon/contact.png',
				'title' => __('Contact Settings', 'bravo'),
				'desc' => '<p class="description">'.__('Enter the email address where you would like to receive emails that have been sent through the contact form.', 'bravo').'</p>',
				'fields' => array(

					array(
						'id' => 'mail_id',
						'type' => 'text',
						'title' => __('Contact Email Id', 'bravo'),
						'desc' => __('Please enter your email address', 'bravo'),
						'std' => 'name@yourdomain.com'
						)

					)
			);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'images/icon/contact.png',
				'title' => __('Portfolio Settings', 'bravo'),
				'desc' => '<p class="description">'.__('Please enter the maximum image height of the portfolio thumbnails.', 'bravo').'</p>',
				'fields' => array(

					array(
						'id' => 'full_width_portfolio_max_height',
						'type' => 'text',
						'title' => __('Thumbnail Height', 'bravo'),
						'desc' => __('Maximum thumbnail height of the portfolio.', 'bravo'),
						'std' => 'name@yourdomain.com'
						)

					)
			);


				
				
	$tabs = array();
			
	if (function_exists('wp_get_theme')){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Author');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');
	}else{
		$theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
		$theme_uri = $theme_data['URI'];
		$description = $theme_data['Description'];
		$author = $theme_data['Author'];
		$version = $theme_data['Version'];
		$tags = $theme_data['Tags'];
	}	

	$theme_info = '<div class="nhp-opts-section-desc">';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-uri"><strong>'.__('Theme URL: ', 'bravo').'</strong><a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-author"><strong>'.__('Author: ', 'bravo').$author.'</strong></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-version"><strong>'.__('Version: ', 'bravo').$version.'</strong></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-tags"><strong>'.__('Tags: ', 'bravo').implode(', ', $tags).'</strong></p>';
	$theme_info .= '</div>';



	$tabs['theme_info'] = array(
					'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',
					'title' => __('Theme Information', 'bravo'),
					'content' => $theme_info
					);

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function
?>