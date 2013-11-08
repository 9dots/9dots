/* ==========================
    Typography
   ========================== */
body{
    <?php bravo_print_typography('body_text'); ?>
}
h1 {
    <?php bravo_print_typography('h1'); ?>
}
h2 {
    <?php bravo_print_typography('h2'); ?>
}
h3 {
    <?php bravo_print_typography('h3'); ?>
}
h4 {
    <?php bravo_print_typography('h4'); ?>
}
h5 {
    <?php bravo_print_typography('h5'); ?>
}
h6 {
    <?php bravo_print_typography('h6'); ?>
}

.sub-title{
     <?php bravo_print_typography('sub_title'); ?>
}

.single-blog-detail a, .show-more-post-btn, input[type=button],
input[type=submit],
input[type=reset],
button, .notification{
    font-family: "<?php $font_name = get_font($bravo_options['h6']['family']); echo $font_name['name']; ?>", sans-serif;
}

#menu li a{
    <?php bravo_print_typography('navigation_text'); ?>
}
.mobile-menu-controller {
     <?php bravo_print_typography('navigation_text'); ?>
     color: #fff;
}
#menu li .sub-menu li a{
    font-weight: normal;
    font-size: 15px;
    font-family: "<?php $font_name = get_font($bravo_options['body_text']['family']); echo $font_name['name']; ?>", sans-serif;
}
footer.footer {
    <?php bravo_print_typography('footer_text'); ?>
}
.bottom-widget .widget {
	<?php bravo_print_typography('bottom_widget_text'); ?>
}
header.header {
	<?php bravo_set_backgrounds('header'); ?>
}
footer.footer {
	<?php bravo_set_backgrounds('footer'); ?>
}
#menu li a:hover,
#prevslide:hover, 
#nextslide:hover,
.portfolio-filter.full-width a.current, 
.portfolio-filter.full-width a:hover,
.flexslider .flex-next:hover,
.flexslider .flex-prev:hover,
.blog-post-content-area h6.blog-title a:hover,
.blog-post-content-area .recent-post-comment-count:hover,
.blog-read-more:hover,
.tweet-list a.tweet-time:hover,
.recent-post-content p a:hover,
.single-blog-detail a:hover,
a, a:hover,
.comment-meta span.fn:hover,
.comment-meta span.reply a:hover,
.edit-link,
.track.playing,div.slider-nav span:hover,
.single-blog-detail a:hover,
.widget .recent-post-comment-count:hover{
	color : <?php echo $bravo_options['variation_color']; ?>;
    font-weight:bold;
    text-decoration: none;
}

.blog-post.format-quote  h6.blog-title a:hover,
.blog-post.format-quote .recent-post-comment-count:hover,
.blog-post.format-image  h6.blog-title a:hover,
.blog-post.format-image .recent-post-comment-count:hover,
.blog-post.format-link  h6.blog-title a:hover,
.blog-post.format-link .recent-post-comment-count:hover
 {
    color : #fff !important;
}

.mobile-menu-controller:hover,
#slidecaption .read-more-btn,
.centered-screen-portfolio .portfolio-filter .filter.current,
.centered-screen-portfolio .portfolio-filter .filter:hover,
.flex-control-paging li a.flex-active,
.flex-control-paging li a:hover,
.bottom-widget-controller:hover,
#menu li .sub-menu li a:hover,
.show-more-post-btn:hover,
input[type=submit]:hover,
.blog-post.format-quote , .blog-post.format-link {
	background: <?php echo $bravo_options['variation_color']; ?>;
}
.thumb-overlay,
.blog-post.format-image .blog-post-content-area-wrap {
    <?php
        $rgb = hexa_to_rgb($bravo_options['variation_color']);
    ?>
   background: <?php echo 'rgb('.$rgb[0].','.$rgb[1].','.$rgb[2].');';  ?> 
   background: <?php echo 'rgba('.$rgb[0].','.$rgb[1].','.$rgb[2].',0.7);';  ?>
}

.contact_submit{ 
    font-family: 'NovecentowideBookBold',Arial,sans-serif;
}
.photostream ul li:hover{
	border: 3px solid <?php echo $bravo_options['variation_color']; ?>;
}
.single-blog-detail a:hover {
    border-bottom: 3px solid <?php echo $bravo_options['variation_color']; ?>;
}

.recent-post-comment-count,  .flexslider .flex-next:hover, .flexslider .flex-prev:hover {
font-weight: normal;
}

.recent-post-comment-count:hover{
    font-weight: normal !important;
}


@media only screen and (max-width: 767px) {
	#menu li a:hover {
		background: <?php echo $bravo_options['variation_color']; ?>;
	}
    #menu li .sub-menu li a{
        font-family: "<?php $font_name = get_font($bravo_options['navigation_text']['family']); echo $font_name['name']; ?>", sans-serif;
    }
    .slidecontent h3 { font-size: 30px; line-height: 35px; }

    .slidecontent { font-size: 11px; line-height: 20px;  }
    
   
    h1, .slidecontent h1 { font-size: 35px; line-height: 45px; }
    .sub-title { font-size: 14px; line-height: 25px; }

    .full-screen-slider-wrap .icon-chevron-right:before, .full-screen-slider-wrap .icon-chevron-left:before{
        font-size: 40px;
    }

    div.slider-nav span.right { right: 0; }
    div.slider-nav span.left { left: -20px; }
    div.slider-nav span { margin-top: -20px; }
}

/*  Optiopn Panel Css */
<?php echo stripslashes_deep(htmlspecialchars_decode($bravo_options['custom_css'],ENT_QUOTES));  ?>
