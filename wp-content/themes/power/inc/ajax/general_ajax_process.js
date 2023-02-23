jQuery(document).ready(function($) {

	function generalAjax(dataObject, selectorBeforeSend, success) {
		$.ajax({
			url: ajaxObject.ajaxurl,
			type: "POST",
			data: dataObject,
			beforeSend() {
				$(selectorBeforeSend).html(
					'<div class="loader-box">'+
						'<div class="loader"></div>'
					+'</div>'
				)
			},
			success,
			error(errorThrown) {
				console.log(errorThrown);
			}
		})
	}

	// Search Bar Ajax Test
	$(".shareholder-content .btn-search").on("click", (e) => {
		const inputValue = $('.shareholder-content input').val();
		function success(data) {
			var results = data.split('|');
			$('.s-0 .shareholder-items').html(results[0])
			$('.s-0 .pagination').html(results[1])
		}
		const dataObject = {
			action: 'post_search_ajax',
			inputValue: inputValue
		}
		generalAjax(dataObject, '.shareholder-items', success)
	})

	// Reset Ajax
	$(".shareholder-content .reset").on("click", (e) => {
		$('.form-control').val('')
		const dataObject = {
			action: 'post_search_ajax',
			inputValue: ''
		}
		function success(data) {
			var results = data.split('|');
			$('.s-0 .shareholder-items').html(results[0])
			$('.s-0 .pagination').html(results[1])
		};
		generalAjax(dataObject, '.shareholder-items', success)
	})

	// Filter By Year
	$("body").on("click", ".s-1 .years-filter .years", function(e) {
		const dataObject = {
			action: "finance_report_ajax",
			year: e.target.getAttribute('data-value') 
		};
		function success(data) {
			var results = data.split('|');
			$('.s-1 .shareholder-items').html(results[0])
			$('.s-1 .pagination').html(results[1])
			if (e.target.classList.contains('in-the-dropdown')) {
				$target_data_value = $(e.target).attr('data-value')
				$(e.target).attr('data-value', 	$('.y-18').attr('data-value'))
				$('.y-18').attr('data-value', $target_data_value)
			}
		};
		generalAjax(dataObject, '.s-1 .shareholder-items', success)
	});

	// Filter By Type
	$("body").on("click", ".s-3 .years-filter .years", function(e) {
		function 	success(data) {
			var results = data.split('|');
			$('.s-3 .shareholder-items').html(results[0])
			$('.s-3 .pagination').html(results[1])
			if (e.target.classList.contains('in-the-dropdown')) {
				$target_data_value = $(e.target).attr('data-value')
				$(e.target).attr('data-value', 	$('.y-18').attr('data-value'))
				$('.y-18').attr('data-value', $target_data_value)
			}
		};
		const dataObject = {
			action: "shareholder_report_ajax",
			type: e.target.getAttribute('data-value') || e.target.parentElement.getAttribute('data-value'),
		};
		generalAjax(dataObject, '.s-3 .shareholder-items', success)
	});

	function handleNextPrev(e, section) {
		var paged = '';
		paged = e.target.innerText
		if (e.target.closest(section+' .page-numbers').classList.contains('prev')) {
			paged = parseInt($(section+' .page-numbers.current').text()) -	 1;
		} else if (e.target.closest('.page-numbers').classList.contains('next')) {
			paged = parseInt($(section+' .page-numbers.current').text()) + 1;
		} 
		return paged;
	}

	// Pagination
	$("body").on("click", ".s-0 .page-numbers", (e) => {
		e.preventDefault();
		if ($(e.target).hasClass('dots')) {
			return
		}
		const inputValue = $('.shareholder-content input').val();
		const paged = handleNextPrev(e, '.s-0')
		const dataObject = {
			action: "navigation_post_ajax",
			paged: paged,
			inputValue: inputValue,
			year: $('.years.active').text(),
			dots: e.target.classList.contains('dots') ? true : false,
		};
		function success(data) {
			var results = data.split('|');
			$('.s-0 .shareholder-items').html(results[0])
			$('.s-0 .pagination').html(results[1])
		};
		generalAjax(dataObject, '.s-0 .shareholder-items', success)
	});

	// Pagination
	$("body").on("click", ".s-1 .page-numbers", (e) => {
		e.preventDefault();
		if ($(e.target).hasClass('dots')) {
			return
		}
		const inputValue = $('.shareholder-content input').val();
		const paged = handleNextPrev(e, '.s-1');
		const dataObject = {
			action: "navigation_post_report_ajax",
			paged: paged,
			inputValue: inputValue, 
			year: $('.s-1 .years.active').text()
		}
		function success(data) {
			var results = data.split('|');
			$('.s-1 .shareholder-items').html(results[0])
			$('.s-1 .pagination').html(results[1])
		};
		generalAjax(dataObject, '.s-1 .shareholder-items', success)
	});

	// Pagination
	$("body").on("click", ".s-2 .page-numbers", (e) => {
		e.preventDefault();
		if ($(e.target).hasClass('dots')) {
			return
		}
		const inputValue = $('.shareholder-content input').val();
		const paged = handleNextPrev(e, '.s-2')
		const dataObject = {
			action: "annual_report_nav_ajax",
			paged: paged,
		};
		function success(data) {
			var results = data.split('|');
			$('.s-2 .annual-report-content').html(results[0])
			$('.s-2 .pagination').html(results[1])
		};
		generalAjax(dataObject, '.s-2 .annual-report-content', success)
	});

	// Pagination "Tai Lieu Co Dong"
	$("body").on("click", ".s-3 .page-numbers", (e) => {
		e.preventDefault();
		if ($(e.target).hasClass('dots')) {
			return
		}
		const paged = handleNextPrev(e, '.s-3')
		const dataObject = {
			action: "shareholder_report_nav_action",
			paged: paged,
			type: $('.s-3 .years.active').attr('data-value')
		};
		function success(data) {
			var results = data.split('|');
			$('.s-3 .shareholder-items').html(results[0])
			$('.s-3 .pagination').html(results[1])
		};
		generalAjax(dataObject, '.s-3 .shareholder-items', success)
	});

	// Pagination "Thong tin moi thau"
	$('body').on('click', '.infomation-list .page-numbers', (e) => {
		e.preventDefault()
		const paged = handleNextPrev(e, '.infomation-list')
		const inputValue = $('.filter-form .form-filter-search input').val();
		const type = $('.form-filter-type .item.active').attr('data-value');
		const field = $('.form-filter-field .item.active').attr('data-value');
		const dataDate = $('.filter-form  .form-filter-date-start input').val();
		
		const dataObject = {
			action: "tender_pag_action",
			paged: paged,
			inputValue: inputValue,
			type: type == null ? '' : type,
			dataDate: dataDate,
			field: field == null ? '' : field,
		};
		function success(data) {
			var results = data.split('|');
			$('.infomation-list .list').html(results[0])
			$('.infomation-list .pagination').html(results[1])
		}
		generalAjax(dataObject, '.infomation-list .list', success)
	})

	// Reset Ajax
	$(".reset").on("click", (e) => {
		const dataObject = {
			action: 'tender_notice_reset_action',
		}
		function success(data) {
			var results = data.split('|');
			$('.infomation-list .list').html(results[0])
			$('.infomation-list .pagination').html(results[1])
		};
		generalAjax(dataObject, '.infomation-list .list', success)
	})
})
