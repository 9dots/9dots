(function() {
    tinymce.create('tinymce.plugins.wave_shortcodes', {
        init : function(ed, url) {
            this.wave_shortcodes_url = url;
        },
        createControl : function(n, cm) {

            var wave_shortcodes_url = this.wave_shortcodes_url;

            switch(n) {
                case 'wave_shortcodes':
                    var button = cm.createSplitButton('wave_shortcodes', {
                        title : 'RAW Theme Shortcodes',
                        image : this.wave_shortcodes_url + '/icon.png'
                    });

                    button.onRenderMenu.add(function(button, menu) {

                        /*
                        menu.add({
                            title : 'Subject Tabs Right',
                            icon: 'wave_subject_tabs_right',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[subject_tabs_right title="Title"][/subject_tabs_right]');
                            }
                        });
                        */


                        menu.add({
                            title : 'Typography',
                            'class' : 'mceMenuItemTitle'
                        }).setDisabled(1);

                        menu.add({
                            title : 'Title',
                            icon: 'wave_title',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[title size="1 - 6"][/title]');
                            }
                        });

                        menu.add({
                            title : 'Dropcap',
                            icon: 'wave_dropcap',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[dropcap][/dropcap]');
                            }
                        });

                        menu.add({
                            title : 'Highlight',
                            icon: 'wave_highlight',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[highlight][/highlight]');
                            }
                        });

                        menu.add({
                            title : 'Light Text',
                            icon: 'wave_light',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[light][/light]');
                            }
                        });

                        menu.add({
                            title : 'List',
                            icon: 'wave_list',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[list style="arrows, hearts, stars, checks" color="Any valid hex color code"][/list]');
                            }
                        });

                        menu.add({
                            title : 'Separator',
                            icon: 'wave_separator',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[separator style="shadow, single, double, dotted, dashed"][/separator]');
                            }
                        });

                        menu.add({
                            title : 'Text Shadow',
                            icon: 'wave_text_shadow',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[text_shadow vertical="1" horizontal="1" blur="1" color="#000000" opacity="0.75"]Enter your text here...[/separator]');
                            }
                        });


                        menu.add({
                            title : 'Columns & Layout',
                            'class' : 'mceMenuItemTitle'
                        }).setDisabled(1);

                        menu.add({
                            title : 'One Third',
                            icon: 'wave_one_third',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[one_third last="no"]<br/><br/>[/one_third]');
                            }
                        });

                        menu.add({
                            title : 'Two Third',
                            icon: 'wave_two_third',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[two_third last="no"]<br/><br/>[/two_third]');
                            }
                        });

                        menu.add({
                            title : 'One Half',
                            icon: 'wave_one_half',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[one_half last="no"]<br/><br/>[/one_half]');
                            }
                        });

                        menu.add({
                            title : 'One Fourth',
                            icon: 'wave_one_fourth',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[one_fourth last="no"]<br/><br/>[/one_fourth]');
                            }
                        });

                        menu.add({
                            title : 'Three Fourth',
                            icon: 'wave_three_fourth',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[three_fourth last="no"]<br/><br/>[/three_fourth]');
                            }
                        });

                        menu.add({
                            title : 'One Fifth',
                            icon: 'wave_one_fifth',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[one_fifth last="no"]<br/><br/>[/one_fifth]');
                            }
                        });

                        menu.add({
                            title : 'Two Fifth',
                            icon: 'wave_two_fifth',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[two_fifth last="no"]<br/><br/>[/two_fifth]');
                            }
                        });

                        menu.add({
                            title : 'Three Fifth',
                            icon: 'wave_three_fifth',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[three_fifth last="no"]<br/><br/>[/three_fifth]');
                            }
                        });

                        menu.add({
                            title : 'Four Fifth',
                            icon: 'wave_four_fifth',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[four_fifth last="no"]<br/><br/>[/four_fifth]');
                            }
                        });

                        menu.add({
                            title : 'One Sixth',
                            icon: 'wave_one_sixth',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[one_sixth last="no"]<br/><br/>[/one_sixth]');
                            }
                        });

                        menu.add({
                            title : 'Five Sixth',
                            icon: 'wave_five_sixth',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[five_sixth last="no"][/five_sixth]');
                            }
                        });

                        menu.add({
                            title : 'Spacer',
                            icon: 'wave_spacer',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[spacer width="1" height="1"]');
                            }
                        });

                        menu.add({
                            title : 'Full Width Section',
                            icon: 'wave_full_width_section',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[full_width_section bgcolor="#fff" bgimage="" column="yes" parallax="no"]Enter your content here...[/full_width_section]');
                            }
                        });


                        menu.add({
                            title : 'Buttons, Icon & Image',
                            'class' : 'mceMenuItemTitle'
                        }).setDisabled(1);

                        menu.add({
                            title : 'Button',
                            icon: 'wave_button',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[button style="3d, 2d, alt, plain, ui" color="primary" size="small, medium, large" url="#" icon_type="fontawesome, icomoon" icon_left=""]Button Text[/button]');
                            }
                        });

                        menu.add({
                            title : 'Call to Action Button',
                            icon: 'wave_cta_button',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[cta_button id="" button_size="small, medium, large" button_style="2d, 3d"]Button Text[/cta_button]');
                            }
                        });


                        menu.add({
                            title : 'Icon',
                            icon: 'wave_icon',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[icon color="default" size="tiny, small, medium, large, huge" image="ok" style="default, invert, alt" type="fontawesome, icomoon" mouseover="yes, no"][/icon]');
                            }
                        });



                        menu.add({
                            title : 'Image',
                            icon: 'wave_image',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[image width="" height=""]Enter an image URL here[/image]');
                            }
                        });

                        menu.add({
                            title : 'Content',
                            'class' : 'mceMenuItemTitle'
                        }).setDisabled(1);


                        menu.add({
                            title : 'Callout Box',
                            icon: 'wave_callout_box',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[callout_box bgcolor="Any valid hex color code" bgimage="" boxed="yes, no"][/callout_box]');
                            }
                        });


                        menu.add({
                            title : 'Icon Box',
                            icon: 'wave_icon_box',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[icon_box icon="" icon_color="default" icon_style="default, invert, alt" icon_type="fontawesome, icomoon" icon_size="tiny, small, medium, large, huge" title="Title" layout="icon-title, icon-top, icon-left, boxed"]Lorem ipsum dolor[/icon_box]');
                            }
                        });



                        menu.add({
                            title : 'Accordion',
                            icon: 'wave_accordion',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[accordion style="default, plain"]',
                                    '[toggle title="Toggle 1"]Lorem ipsum dolor[/toggle]',
                                    '[toggle title="Toggle 2"]Lorem ipsum dolor[/toggle]',
                                    '[toggle title="Toggle 3"]Lorem ipsum dolor[/toggle]',
                                    '[/accordion]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Toggles',
                            icon: 'wave_toggles',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[toggles style="default, plain"]',
                                    '[toggle title="Toggle 1"]Lorem ipsum dolor[/toggle]',
                                    '[toggle title="Toggle 2"]Lorem ipsum dolor[/toggle]',
                                    '[toggle title="Toggle 3"]Lorem ipsum dolor[/toggle]',
                                    '[/toggles]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Vertical Tabs',
                            icon: 'wave_vertical_tabs',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[vertical_tabs]',
                                    '[tab title="Tab 1"]Lorem ipsum dolor[/tab]',
                                    '[tab title="Tab 2"]Lorem ipsum dolor[/tab]',
                                    '[tab title="Tab 3"]Lorem ipsum dolor[/tab]',
                                    '[/vertical_tabs]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Tabs Left',
                            icon: 'wave_tabs_left',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[tabs_left]',
                                    '[tab title="Tab 1"]Lorem ipsum dolor[/tab]',
                                    '[tab title="Tab 2"]Lorem ipsum dolor[/tab]',
                                    '[tab title="Tab 3"]Lorem ipsum dolor[/tab]',
                                    '[/tabs_left]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Tabs Right',
                            icon: 'wave_tabs_right',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[tabs_right]',
                                    '[tab title="Tab 1"]Lorem ipsum dolor[/tab]',
                                    '[tab title="Tab 2"]Lorem ipsum dolor[/tab]',
                                    '[tab title="Tab 3"]Lorem ipsum dolor[/tab]',
                                    '[/tabs_right]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Subject Tabs Left',
                            icon: 'wave_subject_tabs_left',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[subject_tabs_left]',
                                    '[tab title="Tab 1"]Lorem ipsum dolor[/tab]',
                                    '[tab title="Tab 2"]Lorem ipsum dolor[/tab]',
                                    '[tab title="Tab 3"]Lorem ipsum dolor[/tab]',
                                    '[/subject_tabs_left]'
                                ].join("<br/><br/>"));
                            }
                        });


                        menu.add({
                            title : 'Other',
                            'class' : 'mceMenuItemTitle'
                        }).setDisabled(1);




                        menu.add({
                            title : 'Bar Graph',
                            icon: 'wave_bar_graph',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[bar_graph]',
                                    '[bar title="Lorem" percent="25"]',
                                    '[bar title="Ipsum" percent="50"]',
                                    '[bar title="Dolor" percent="75"]',
                                    '[/bar_graph]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Counters Circle',
                            icon: 'wave_counters_circle',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[counters_circle][/counters_circle]');
                                tinyMCE.activeEditor.selection.setContent([
                                    '[counters_circle]',
                                    '[counter_circle value="25"]25%[/counter_circle]',
                                    '[counter_circle value="50"]50%[/counter_circle]',
                                    '[counter_circle value="75"]75%[/counter_circle]',
                                    '[/counters_circle]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Counters',
                            icon: 'wave_counters',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[counters]',
                                    '[counter value="25" unit="%"]Lorem[/counter]',
                                    '[counter value="50" unit="%"]Ipsum[/counter]',
                                    '[counter value="75" unit="%"]Dolor[/counter]',
                                    '[/counters]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Vimeo Video',
                            icon: 'wave_vimeo',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[vimeo id="" width="320" height="260"][/vimeo]');
                            }
                        });

                        menu.add({
                            title : 'YouTube Video',
                            icon: 'wave_youtube',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[youtube id="" width="320" height="260"][/youtube]');
                            }
                        });

                        menu.add({
                            title : 'SoundCloud Audio',
                            icon: 'wave_soundcloud',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[soundcloud url="" width="100%" height="81" comments="true, false" auto_play="true, false" color="ff7700"][/soundcloud]');
                            }
                        });

                        menu.add({
                            title : 'Pricing Table',
                            icon: 'wave_pricing_table',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[pricing_table]',
                                    '[pricing_column name="Micro" price="19.99" button_text="Button Text" button_url="#"]',
                                    '<ul><li>Lorem ipsum dolor</li></ul>[/pricing_column]',
                                    '[pricing_column name="Small" price="29.99" button_text="Button Text" button_url="#"]',
                                    '<ul><li>Nullam sed aliquam</li><li>Pellentesque pharetra</li></ul>[/pricing_column]',
                                    '[pricing_column highlight="Best Offer!" name="Medium" price="39.99" button_text="Button Text" button_url="#"]',
                                    '<ul><li>Vivamus at lobortis</li><li>Donec a turpis blandit</li><li>Mauris sed libero</li></ul>[/pricing_column]',
                                    '[pricing_column name="Large" price="55" button_text="Button Text" button_url="#"]',
                                    '<ul><li>Aenean feugiat dapibus</li><li>Etiam quis arcu</li><li>Aliquam at sem viverra</li></ul>[/pricing_column]',
                                    '[/pricing_table]'
                                ].join("<br/>"));
                            }
                        });

                        menu.add({
                            title : 'Team Carrousel',
                            icon: 'wave_team_carousel',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[clients columns="5" carousel="yes"]',
                                    '[client image="" url="" alt="Client 1"]',
                                    '[client image="" url="" alt="Client 2"]',
                                    '[client image="" url="" alt="Client 3"]',
                                    '[/clients]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Google Map',
                            icon: 'wave_map',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[map width="100%" height="400" address="A valid address" type="satellite, terrain, roadmap" zoom="14"]');
                            }
                        });

                        menu.add({
                            title : 'Blog',
                            icon: 'wave_blog',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[blog posts="4"]');
                            }
                        });

                        menu.add({
                            title : 'Portfolio',
                            icon: 'wave_portfolio',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[portfolio posts="8"]');
                            }
                        });

                        menu.add({
                            title : 'Clients Carrousel',
                            icon: 'wave_clients',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[clients columns="5" carousel="yes"]',
                                    '[client image="" url="" alt="Client 1"]',
                                    '[client image="" url="" alt="Client 2"]',
                                    '[client image="" url="" alt="Client 3"]',
                                    '[/clients]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Testimonial Slider',
                            icon: 'wave_testimonial_slider',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent([
                                    '[testimonial_slider]',
                                    '[testimonial name="Name 1" company="Company 1"]Lorem ipsum dolor[/testimonial]',
                                    '[testimonial name="Name 2" company="Company 2"]Lorem ipsum dolor[/testimonial]',
                                    '[testimonial name="Name 3" company="Company 3"]Lorem ipsum dolor[/testimonial]',
                                    '[/testimonial_slider]'
                                ].join("<br/><br/>"));
                            }
                        });

                        menu.add({
                            title : 'Person',
                            icon: 'wave_person',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[person name="Name" title="Title" image="" facebook="" twitter="" google_plus="" linkedin=""]Lorem ipsum dolor...[/person]');
                            }
                        });

                        menu.add({
                            title : 'Facebook Like Button',
                            icon: 'wave_facebook_like',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[facebook_like href="" width="450" height="35" colorscheme="light, dark" layout="" show_faces="yes, no"][/facebook_like]');
                            }
                        });


                        menu.add({
                            title : 'Alert Success',
                            icon: 'wave_alert_success',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[alert_success][/alert_success]');
                            }
                        });

                        /*


                         menu.add({
                         title : 'Alert Error',
                         icon: 'wave_alert_error',
                         onclick : function() {
                         tinyMCE.activeEditor.selection.setContent('[alert_error][/alert_error]');
                         }
                         });
                         menu.add({
                         title : 'Alert Info',
                         icon: 'wave_alert_info',
                         onclick : function() {
                         tinyMCE.activeEditor.selection.setContent('[alert_info][/alert_info]');
                         }
                         });

                         menu.add({
                         title : 'Alert Notice',
                         icon: 'wave_alert_notice',
                         onclick : function() {
                         tinyMCE.activeEditor.selection.setContent('[alert_notice][/alert_notice]');
                         }
                         });
                         */

                    });

                    return button;

                break;
            }

            return null;
        },
        getInfo : function() {
            return {
                longname : 'RAW Theme Shortcodess',
                author : 'WaveThemes',
                authorurl : 'http://wave-themes.com/',
                infourl : 'http://wave-themes.com/',
                version : "1.0"
            };
        },
        getDoc: function(){}
    });
    tinymce.PluginManager.add('wave_shortcodes', tinymce.plugins.wave_shortcodes);
})();