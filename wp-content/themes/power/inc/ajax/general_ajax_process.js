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
				$(e.target).attr('data-value', 	$('.s-1 .y-18').attr('data-value'))
				$('.s-1 .y-18').attr('data-value', $target_data_value)
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
		$('html').scrollTop(640)
		if ($(e.target).hasClass('dots')) {
			return
		}
		const inputValue = $('.s-0 .shareholder-content input').val();
		const paged = handleNextPrev(e, '.s-0')
		const dataObject = {
			action: "navigation_post_ajax",
			paged: paged,
			inputValue: inputValue,
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
		$('html').scrollTop(400);
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
		$('html').scrollTop(200);
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
		$('html').scrollTop(200);

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

	/** 
	 * Contractor Selection Results
	 * 
	 * Ajax handler Contractor Selection Results page
	 * 
	*/
		// Selection Result Search
		$(".contractor-celection-results-form .btn-search").on('click', function(e) {
			const inputValue = $('.contractor-celection-results-form .form-filter-search input').val();
			const type = $('.contractor-celection-results-form .form-filter-type .item.active').attr('data-value');
			const field = $('.contractor-celection-results-form .form-filter-field .item.active').attr('data-value');
			const dataDate = $('.filter-form.contractor-celection-results-form .form-filter-date-start input[type="date"]').val();

			function success(data) {
				var results = data.split('|');
				$('.infomation-list.contractor-celection-results-list .list').html(results[0])
				$('.infomation-list.contractor-celection-results-list .pagination').html(results[1])
			}
			const dataObject = {
				action: 'contractor_celection_results_search',
				paged: 1,
				inputValue: inputValue,
				type: type == null ? '' : type,
				dataDate: dataDate == null ? '' : dataDate,
				field: field == null ? '' : field,
				
			}
			generalAjax(dataObject, '.infomation-list.contractor-celection-results-list .list', success)
		})

		// Selection Result Pagination 
		$('body').on('click', '.contractor-celection-results-list.infomation-list .page-numbers', (e) => {
			e.preventDefault()
			$('html').scrollTop(200);

			const paged = handleNextPrev(e, '.contractor-celection-results-list.infomation-list')
			const inputValue = $('.contractor-celection-results-form input').val();
			const type = $('.contractor-celection-results-form .form-filter-type .item.active').attr('data-value');
			const field = $('.contractor-celection-results-form .form-filter-field .item.active').attr('data-value');
			const dataDate = $('.filter-form.contractor-celection-results-form .form-filter-date-start input[type="date"]').val();

			const dataObject = {
				action: "contractor_selection_results_pagination",
				paged: paged,
				inputValue: inputValue,
				type: type == null ? '' : type,
				dataDate: dataDate == null ? '' : dataDate,
				field: field == null ? '' : field,
			};
			function success(data) {
				var results = data.split('|');
				$('.infomation-list.contractor-celection-results-list .list').html(results[0])
				$('.infomation-list.contractor-celection-results-list .pagination').html(results[1])
			}
			generalAjax(dataObject, '.infomation-list.contractor-celection-results-list .list', success)
		})

		// Selection Result Reset
		$(".contractor-celection-results-form .btn-reset").on("click", (e) => {
			$('.contractor-celection-results-form input').val('');
			$('.contractor-celection-results-form .item.active').removeClass('active');
			$('.contractor-celection-results-form .item.first').addClass('active');
			const dataObject = {
				action: 'contractor_celection_results_reset',
			}
			function success(data) {
				var results = data.split('|');
				$('.infomation-list.contractor-celection-results-list .list').html(results[0])
				$('.infomation-list.contractor-celection-results-list .pagination').html(results[1])
			}
			generalAjax(dataObject, '.infomation-list.contractor-celection-results-list .list', success)
		})
	/** End Contractor Selection Results */



	/** 
	 * Tender Notice 
	 * 
	 * Ajax handler for Tender Information page
	 * 
	*/
		// Tender Notification Search
		$(".tender-notice.tender .btn-search").on('click', function(e) {
			// const paged = handleNextPrev(e, '.infomation-list')
			const inputValue = $('.tender-notice.tender input').val();
			const type = $('.form-filter-type .item.active').attr('data-value');
			const field = $('.form-filter-field .item.active').attr('data-value');
			const dataDate = $('.filter-form  .form-filter-date-start input[type="date"]').val();
			

			function success(data) {
				var results = data.split('|');
				$('.infomation-list.tender-infor .list').html(results[0])
				$('.infomation-list.tender-infor .pagination').html(results[1])
			}
			const dataObject = {
				action: 'tender_notification_search',
				paged: 1,
				inputValue: inputValue,
				type: type == null ? '' : type,
				dataDate: dataDate == null ? '' : dataDate,
				field: field == null ? '' : field,
				
			}
			generalAjax(dataObject, '.infomation-list.tender-infor .list', success)
		})

		// Tender Notification Pagination 
		$('body').on('click', '.infomation-list.tender-infor .page-numbers', (e) => {
			$('html').scrollTop(200);
			e.preventDefault()
			const paged = handleNextPrev(e, '.infomation-list.tender-infor')
			const inputValue = $('.filter-form.tender-notice .form-filter-search input').val();
			const type = $('.tender-notice .form-filter-type .item.active').attr('data-value');
			const field = $('.tender-notice .form-filter-field .item.active').attr('data-value');
			const dataDate = $('.filter-form.tender-notice .form-filter-date-start input[type="date"]').val();

			
			const dataObject = {
				action: "tender_pag_action",
				paged: paged,
				inputValue: inputValue,
				type: type == null ? '' : type,
				dataDate: dataDate == null ? '' : dataDate,
				field: field == null ? '' : field,
			};
			function success(data) {
				var results = data.split('|');
				$('.infomation-list.tender-infor .list').html(results[0])
				$('.infomation-list.tender-infor .pagination').html(results[1])
			}
			generalAjax(dataObject, '.infomation-list.tender-infor .list', success)
		})

		// Tender Notification Reset
		$(".tender-notice .btn-reset").on("click", (e) => {
			$('.tender-notice.tender input').val('');
			$('.tender-notice .item.active').removeClass('active');
			$('.tender-notice .item.first').addClass('active');
			const dataObject = {
				action: 'tender_notice_reset_action',
			}
			function success(data) {
				var results = data.split('|');
				$('.infomation-list.tender-infor .list').html(results[0])
				$('.infomation-list.tender-infor .pagination').html(results[1])
			};
			generalAjax(dataObject, '.infomation-list.tender-infor .list', success)
		})
	/** End Tender Notice */


	
})
