(function($){
"use strict";
	
	
	
	$(window).resize(function(){

		$('.person').each(function(){
			$(this).find('.overlay').height($(this).find('img').height());
		});

	});

	$(window).resize();

	$("div.accordion div.tab div.tab-title, div.toggles div.tab div.tab-title").click(function(){
		
		var tab = $(this).parent();
		var parent = tab.parent();
		var type = parent.hasClass("accordion") ? "accordion" : "toggles";
		var content = tab.find("div.tab-content");
		var contentInner = tab.find("div.tab-content-inner");
		var currentHeight = content.height();
			
		if(currentHeight == 0){
			content.transition({height: contentInner.outerHeight()}, 500);
			tab.removeClass("inactive").addClass("active");
		}
		else{
			content.css({height: contentInner.outerHeight()});
			content.transition({height: 0}, 500);
			tab.removeClass("active").addClass("inactive");
		}
		
		if(type == "accordion"){
			tab.siblings().removeClass("active").addClass("inactive").find("div.tab-content").transition({height: 0}, 500);
		}
		
	});
	
		
		
	$(window).load(function(){
		
		$("div.gmap").each(function(){
			
			var element = $(this);
			
			var id = $(this).attr("id").substr(4);
			//var attr = Polar.getVar("maps_" + id);
	
			var data = {
				address: element.attr("data-map-address"),
				type: element.attr("data-map-type"),
				zoom: element.attr("data-map-zoom"),
				scrollwheel: element.attr("data-map-scrollwheel"),
				scale: element.attr("data-map-scale"),
				zoomPanControl: element.attr("data-map-zoom-pancontrol")
			};
			
			if(data.address != ""){
				
				var options = {
					map: {
						address: data.address,
						options: {
							zoom: Number(data.zoom),
							mapTypeId: data.type,
							navigationControl: false,
							scrollwheel: (data.scrollwheel == "yes"),
							panControl: (data.zoomPanControl == "yes"),
							zoomControl: (data.zoomPanControl == "yes"),
							mapTypeControl: false,
							scaleControl: (data.scale == "yes"),
							streetViewControl: false,
							overviewMapControl: false
						}
					},
					marker: {
						address: data.address,
						data: data.address,
						events: {
							click: function(marker, event, context){
								
								var map = $(this).gmap3("get"), infowindow = $(this).gmap3({get: {name: "infowindow"}});
								
								if(infowindow){
									infowindow.open(map, marker);
									infowindow.setContent(context.data);
								}
								else{
									$(this).gmap3({
										infowindow: {
											anchor:marker,
											options:{content: context.data}
										}
									});
								}
								
							}
						}
					}
				};
			
			}
			else if(wave_maps_config){
				
				var config = wave_maps_config;
				
				var options = {
					map: {
						options: {
							center: [config.latitude, config.longitude],
							zoom: Number(config.zoomDefault),
							mapTypeId: "roadmap",
							navigationControl: false,
							scrollwheel: false,
                            panControl: (data.zoomPanControl == "yes"),
                            zoomControl: (data.zoomPanControl == "yes"),
                            mapTypeControl: false,
                            scaleControl: (data.scale == "yes"),
							streetViewControl: false,
							overviewMapControl: false
						}
					},
					marker: {
						values: config.markers,
						events: {
							click: function(marker, event, context){
								
								var map = $(this).gmap3("get"), infowindow = $(this).gmap3({get: {name: "infowindow"}});
								
								if(infowindow){
									infowindow.open(map, marker);
									infowindow.setContent(context.data);
								}
								else{
									$(this).gmap3({
										infowindow: {
											anchor:marker,
											options:{content: context.data}
										}
									});
								}
								
							}
						}
					}
				};
				
			}
			
			element.gmap3(options);
			
		});
	
	});
	
	$("div.testimonial_slider").each(function(){
		
		var testimonialSlider = $(this);
		var height = 0;
		
		var delay = 8000;
		
		testimonialSlider.find("div.testimonial").each(function(index){
			var testimonial = $(this);
			if(height < testimonial.height()){
				height = testimonial.height();
				testimonialSlider.height(height);
			}
			if(index == 0){
				testimonial.css("visibility", "visible");
			}
		});
		
		testimonialSlider.attr("data-index", 0);

        testimonialSlider.bind('wave-change-testiminial', function(){
            var index = testimonialSlider.attr("data-index");
            var length = testimonialSlider.find("div.testimonial").length-1;
            var currentIndex = index;
            index++;
            if(index > length) index = 0;
            testimonialSlider.attr("data-index", index);
            $(testimonialSlider.find("div.testimonial").get(currentIndex)).transition({opacity: 0}, 1000, function(){
                $(testimonialSlider.find("div.testimonial").get(index)).transition({opacity: 1}, 2000);
            });
        });

		setInterval(function(){
            testimonialSlider.trigger('wave-change-testiminial');
        }, delay);

        testimonialSlider.trigger('wave-change-testiminial');
		
	});
	
    /*
    $(document).bind('wave-prepare-counter-circle', function(){
        $(".counter-circle").waypoint(function(){

            var counter = $(this);
            var color = counter.attr("data-counter-color");
            var bgcolor = counter.attr("data-counter-bgcolor");
            var value = counter.attr("data-counter-value");
            var canvas = counter.find("canvas").get(0);

            var opts = {
                lines: 1,
                angle: 0.5,
                lineWidth: 0.07,
                colorStart: color,
                colorStop: color,
                strokeColor: bgcolor,
                generateGradient: false
            };

            var gauge = new Donut(canvas).setOptions(opts);
            gauge.maxValue = 100;
            gauge.animationSpeed = 128;
            gauge.set(value);

        }, {triggerOnce: true, offset: '70%'});
    });

    $(document).trigger('wave-prepare-counter-circle');
    */

    $(".counter-circle").bind('wave-prepare-counter-circle', function(){

        var counter = $(this);
        counter.waypoint('destroy');
        counter.waypoint(function(){
            var input = counter.find('input');
            input.val(0).knob({fgColor: input.attr('data-color'), bgColor: input.attr('data-bgcolor'), thickness: 0.15});
            $({value: 0}).animate({value: parseInt(input.attr('data-value'))}, {duration: 5000, easing: 'swing', step: function(){input.val(this.value).trigger('change');}});
        }, {triggerOnce: true, offset: '70%'});

    });

    $(".counter-circle").trigger('wave-prepare-counter-circle');
	
	
	$(".counter-box").waypoint(function(){
		
		var counter = $(this);
		var valueElement = counter.find("span.value");
		var value = counter.attr("data-counter-value");
		var currentValue = 0;
		var animationTime = 1500;
		
		valueElement.html(currentValue);
		
		valueElement.countTo({from: currentValue, to: value, speed: animationTime});
		
	}, {triggerOnce: true, offset: '70%'});
	

	$('ul.carousel.clients').each(function() {

		var carousel = $(this);

		var columns = parseInt(carousel.attr("data-columns"));
		var autoplay = (carousel.attr("data-carousel") == "true");
		var delay = parseInt(carousel.attr("data-carousel-delay"));
		var duration = parseInt(carousel.attr("data-carousel-transition"));

		carousel.carouFredSel({
			circular: true,
			responsive: true,
			items: {

				height: carousel.find('> div:first').height(),
				width: 220,
				visible: {
					min: 1,
					max: columns
				}
			},
			swipe: {
				onTouch: true
			},
			scroll: {
				items: 1,
				easing: 'easeInOutCubic',
				duration: '800',
				pauseOnHover: true
			},
			auto: {
				play: autoplay,
				timeoutDuration: 5000,
				duration: duration
			}
		});

	});


	$('ul.teammembers').carouFredSel({
		prev: 'div.team-carousel a.button-arrow-left',
		next: 'div.team-carousel a.button-arrow-right',
		circular: true,
		responsive: true,
		debug: true,
		items: {
			visible: {
				min: 1,
				max: 4
			}
		},
		swipe: {
			onTouch: true
		},
		scroll: {
			items: 1,
			easing: 'easeInOutCubic',
			duration: 1000,
			pauseOnHover: true
		},
		auto: {
			play: false
		},
		onCreate: function(){
			setTimeout(function(){
				$('ul.teammembers').trigger("updateSizes");
				$(window).resize();
			}, 1000);
		}
	});

	$(window).load(function(){
		$('ul.teammembers').trigger("updateSizes");
		$(window).resize();
	});
		
	
	$('ul.bar_graph').waypoint(function(){
		var percentage;
		if(!$(this).hasClass("animation-complete")){
			$(this).addClass("animation-complete");
			$(this).find("li div.bar").each(function(index){
				percentage = Number($(this).attr("data-percentage"));
				$(this).find("div")
					.css({opacity: 0}, 0)
					.delay(200 * index)
					.transition({width: (percentage + 2) +"%", opacity: 1}, 1000)
					.transition({width: percentage + "%"}, 1000);
			});
		}
	}, {offset: '70%'});
	

	
	
	
	$('input[type="submit"], input[type="button"]').addClass("button");
	
	$("div.pricing-table").each(function(){
		
		var table = $(this);
		var columns = table.find("div.pricing-column");
		
		var listHeight = 0;
		var rowsHeights = [];
		
		columns.each(function(){
			
			var list = $(this).find("ul");
			
			if(listHeight < list.outerHeight()){
				listHeight = list.outerHeight();
			}
			
			list.find("li").each(function(index, cell){
				if(typeof rowsHeights[index] == "undefined" || rowsHeights[index] < $(cell).outerHeight()){
					rowsHeights[index] = $(cell).outerHeight();
				}
			});
		});
		
		
		columns.each(function(){
			var list = $(this).find("ul");
			list.height(listHeight);
			$(this).find("ul li").each(function(index, cell){
				$(this).height(rowsHeights[index]);
			});
		});
		
	});
	
	$('ul.projects-list').isotope({ filter: "*" });
	
	$('ul.projects-categories a').click(function(){
		
		var link = this;
		
		var selector = $(this).attr('data-filter');
		$('ul.projects-list').isotope({ filter: selector });
		
		$('ul.projects-categories').find("li a").each(function(){
			
			if(link == this){
				$(this).addClass("active");
			}
			else{
				$(this).removeClass("active");
			}
			
		});
		
		
		return false;
	});
	


})(jQuery);
