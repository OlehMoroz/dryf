jQuery(function($) {
	
	//задаем активную форму (декстоп) 
	$('.dekstop-filter input[type="checkbox"]').on('click', function() {
		var form = $(this).parents('form'),
			cf = false;
		
		form.find('input[type="checkbox"]').each(function() {
			if($(this).is(':checked')) cf = true;
		});
		if(cf) form.addClass('active');
		else form.removeClass('active');
	});
	// (мобайл) 
	$('.filter-toggle, .tab_bar_item').on('click', function() {
		if($('#filter_mobile').is(':visible')) {
			var cf = false;
			var form = $('.vacancies-filter.mobile-filter');
			
			form.find('input[type="checkbox"]').each(function() {
				if($(this).is(':checked')) cf = true;
			});
			if(cf) form.addClass('active');
			else form.removeClass('active');
			
			$('.vacancies-filter.dekstop-filter').removeClass('active');
		}
	})
	
	function runIteration(fn, numTimes, delay) {
		var cnt = 0;
		function next() {
			// call the callback and stop iterating if it returns false
			if (fn(cnt) === false) return;
			++cnt;
			// if not finished with desired number of iterations,
			// schedule the next iteration
			if (cnt < numTimes) {
				setTimeout(next, delay);
			}
		}
		// start first iteration
		next();

	}
	
	function vacancies_filter(form, task) {
		var tag_value = $('.vacancies_filter li.uk-active').data('tag-slug'),
			sort_value = $('.vacancies_sort select').val(),
			page = $('#page').val(),
			per_page = $('#per_page').val(),
			max_pages = $('#max-pages').val(),
			pageID = $('#pageID').val(),
			no_items = $('#no_items').val(),
			load_text = $('#load_text').val(),
			data = [
				form.serialize(),
				$.param({tag: tag_value}),
				$.param({sort: sort_value}),
				$.param({page: page}),
				$.param({per_page: per_page}),
				$.param({pageID: pageID}),
				$.param({no_items: no_items})
			].join('&');


		if(task == 'load_more') {
			var btn = $('.vacancies_load a'),
				btn_text = btn.attr('data-value');
		}
		else {
			var btn = form.find('input[type="submit"]'),
				btn_text = btn.val();
		}

		$.ajax( {
			url:'/wp-admin/admin-ajax.php?action=vacancies_filter',
			data:data,
			type:'POST',
			dataType: 'json',
			beforeSend: function( xhr ){				
				if(task == 'load_more') btn.text(load_text);
				else btn.val(load_text);
			},
			success:function(data){
				if( data ) {
					//$('#response').html(data);
					if(task == 'load_more') $('#response').append(data.html);
					else $('#response').html(data.html);
					console.log(btn_text)
					if(task == 'load_more') btn.text(btn_text);
					else btn.val(btn_text);

					$('.post__count span').html(data.post_count);
					//$('.post__count span').html($('.vacancies_grid_item').length);
					//
					//console.log(data.max_pages);
					//console.log(max_pages);
					//console.log(page);
					
					if(!data.max_pages || data.max_pages == 1 || data.max_pages == page) $('.vacancies_load').hide();
					else $('.vacancies_load').show();

					$('.pagination').html(data.navi);
					
					$('#max-pages').val(data.max_pages);
					
					
					/*формируем метки фильтра*/
					$('.filter_applied').html('');
					$(form).find('.filter_list_items input').each(function() {
						if($(this).is(':checked')) {
							$('.clear_filters').show();

							var filter_type = $(this).attr('name'),
								filter_val = $(this).val(),
								filter_text = $(this).parent('label').text(),
								filter_html = '',
								term = $("#term").val();
							
							if($(this).val() != term) {
								filter_type = filter_type.replace(/[[]]/gm, '_')+'filter';
								filter_html += '<a href="#" class="filter_close" data-filter-type='+filter_type+' data-filter-val="'+filter_val+'">';
								filter_html += '<span>'+filter_text+'</span>';
								filter_html += '</a>';
							}
							else {
								filter_html += '<a href="#" class="filter_close fixed">';
								filter_html += '<span>'+filter_text+'</span>';
								filter_html += '</a>';
							}
							
							
							$('.filter_applied').append(filter_html);
						}
					});
					
					//анимация			
					if(!task || task != 'load_more') {
						$('body,html').animate({
							scrollTop: $('#response').offset().top - 120
						}, 600);
					}
					
					$('.uk-offcanvas-close').trigger('click');
					
				}
			}
		});
		//console.log(data);
	}
	
	//запускаем фильтр там, где выбраны значения (декстоп или мобайл версия)
	$('body').on('submit', '.vacancies-filter.active', function() {
		$('#page').val(1);
		vacancies_filter($(this));		
		return false;
	});
	
	//фильтр по tag (типам записей)
	$('.vacancies_filter li').on('click', function() {
		$('#page').val(1);
		$('.vacancies_filter li').removeClass('uk-active');
		$(this).addClass('uk-active');
		
		setTimeout(function() {
			var form = $('body').find('.vacancies-filter.active');
			vacancies_filter(form);	
		},100)
	});
	
		
	//сортировка
	$('.vacancies_sort select').on('change', function() {
		$('#page').val(1);
		var form = $('body').find('.vacancies-filter.active');
		vacancies_filter(form);	
	});
	
	
	//клик по меткам фильтра
	$('body').on('click', '.filter_applied .filter_close:not(.fixed)', function() {
		$('#page').val(1);
		var filter_type = $(this).data('filter-type'),
			filter_val = $(this).data('filter-val'),
			form = $('body').find('.vacancies-filter.active');
			
		$(form).find('.filter_list_items.'+filter_type+' input').each(function() {
			if($(this).val() == filter_val) {
				$(this).prop('checked', false);
			}
		});
		
		$(this).remove();
		
		vacancies_filter(form);	
		
		//если нет выделенных значений - убираем кнопку Очистить фильтр
		var check = true;
		$(form).find('.filter_list_items input').each(function() {
			if($(this).is(':checked')) check = false;
		});
		if(check) $('.clear_filters').hide();
	});
	
	//очищаем фильтр
	$('.clear_filters').on('click', function() {
		var term = $('#term').val();
		$('#page').val(1);
		
		$('.vacancies-filter.active').find('input[type="checkbox"]').each(function() {
			if(term != $(this).val()) $(this).prop('checked', false);		
		});
		
		var form = $('body').find('.vacancies-filter.active');
		vacancies_filter(form);	
		$('.vacancies-filter').removeClass('active');
		$(this).hide();
	});
	
	
	/*Load more*/
	$('.vacancies_load').on('click', function(e) {

		var cur_page = Number($('#page').val());
		$('#page').val(cur_page + 1);
		
		var form = $('body').find('.vacancies-filter.active');
		vacancies_filter(form, 'load_more');	
	});
	
	//ajax pagination by pages
	$('body').on('click', 'a.page-numbers', function(e) {
		e.preventDefault();
		var regex = /page\/(\d)\//gm;
		var str = $(this).attr("href");
		var cur_page = 1;
		var match = '';
		var per_page = $('#per_page').val();
		var p = Number($('#page').val());
		if(match = str.split('page/')[1]) cur_page = Number(match.split('/')[0]);
		var form = $('body').find('.vacancies-filter.active');

		if(cur_page == 1) {
			$('#page').val(cur_page);
			setTimeout(function() {
				vacancies_filter(form);	
			},100)
		}
		else if(cur_page > p) {
				var iterations = cur_page - p;
				runIteration(function(i) {
					p++;
					$('#page').val(p);
					vacancies_filter(form, 'load_more');
				}, iterations, 200);
		}
		else{
			var q = 0;
			var iterations = cur_page;
			runIteration(function(i) {
				q++;
				$('#page').val(q);
				if(q == 1) vacancies_filter(form);
				else vacancies_filter(form, 'load_more');
			}, iterations, 200);
		}
	
	})
	
})