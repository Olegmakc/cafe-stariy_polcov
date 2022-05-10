
$(document).ready(function () {
	$('#orderForm').on('submit', function (e) {
		e.preventDefault();
		let name = $('#name').val();
		let phone = $('#phone').val();
		let email = $('#email').val();
		let destination_adress = $('#destination_adress').val();
		let comment = $('#comment').val();
		let payment = $("input[type='radio'][name='payment']:checked").val();
		console.log(payment);
		$.ajax({
			url: "/basket",
			type: "POST",
			data: {
				name: name,
				phone: phone,
				email: email,
				destination_adress: destination_adress,
				comment: comment,
				payment: payment,
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function (response) {
				if (response) {
					$('#name-error').text('');
					$('#phone-error').text('');
					$('#email-error').text('');
					$('#destination_adress-error').text('');
					$('#comment-error').text('');
					$('#payment-error').text('');
					window.location.href = 'http://127.0.0.1:8000';
				}
			},
			error: function (response) {
				$('#name-error').text(response.responseJSON.errors.name);
				$('#phone-error').text(response.responseJSON.errors.phone);
				$('#email-error').text(response.responseJSON.errors.email);
				$('#destination_adress-error').text(response.responseJSON.errors.destination_adress);
				$('#comment-error').text(response.responseJSON.errors.comment);
				$('#payment-error').text(response.responseJSON.errors.payment);
			}
		});
	});

	//==========<PRODUCTS>=================================================================================
	$('#search').on('keyup', function () {
		var query = $(this).val();
		var page = $('#hidden_page').val();
		var category;
		if ($('#product-category__select').children("option:selected").val() != "") {
			category = $('#product-category__select').children("option:selected").val();
		} else {
			category = "";
		}
		fetch_category_products(page, category, query);
	});
	//=============<SELECT Product_category>==============================================================================
	$('#product-category__select').on('change', function () {
		var category = $(this).val();
		var query = $('#search').val();
		var page = $('#hidden_page').val();
		fetch_category_products(page, category, query);
	});
	//=========<Pagination_PRODUCTS>==================================================================================
	$(document).on('click', '.pagination a', function (e) {
		e.preventDefault();
		var page = $(this).attr('href').split('page=')[1];
		$('#hidden_page').val(page);

		var query = $('#search').val();
		var category;
		if ($('#product-category__select').children("option:selected").val() != "") {
			category = $('#product-category__select').children("option:selected").val();
		} else {
			category = "";
		}
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		fetch_category_products(page, category, query);
	});
	var globalTimeout = null;
	function fetch_category_products(page, category, query) {
		if (globalTimeout != null) {
			clearTimeout(globalTimeout);
		}
		globalTimeout = setTimeout(function () {
			$.ajax({
				url: "/admin/products/fetch_data?page=" + page + "&query=" + query + "&category=" + category,
				method: "GET",
				dataType: 'json',
				success: function (products) {
					$('tbody').html('');
					$('tbody').html(products.view);
				}
			});
		}, 1000);
	}
	//===========</PRODUCTS>================================================================================

	//==========<FILTER CATEGORY BY PRICE>=================================================================================
	$('#filter-product').on('change', function () {
		var filter = $(this).val();
		let categorySlug = $("#category_code").val();

		fetch_filtred_products(categorySlug, filter);
	});
	function fetch_filtred_products(slug, filter) {
		$.ajax({
			url: "/menu/fetch_data?slug=" + slug + "&filter=" + filter,
			method: "GET",
			dataType: 'json',
			success: function (products) {
				$('#category-list').empty('');
				$.each(products, function (index, data) {
					$('#category-list').append(
						`<article class="slider-products__card card-product">
						<a class="card-product__image">
							<div class="card-product__inner ibg" style="background-image: url('http://127.0.0.1:8000/storage/${data.photo}');">							
								<img src="/storage/${data.photo}" alt="${data.title}"></img> 
							</div>
						</a>
						<div class="card-product__body">
							<div class="card-product__title">
									<a class="card-product__title-link">${data.title}</a>
							</div>
							<div class="card-product__text">
									<span class="card-product__weight"> ${data.weight} гр.</span>
									`+ (data.description === null ? '' : `- ${data.description}`) + `
							</div>
							<div class="card-product__footer product-footer">
									<form action="/basket/add/${data.id}" method="POST">
									<input type="hidden" name="_token" value="`+ $('meta[name="csrf-token"]').attr('content') + `" />   
										<button type="submit" class="product-footer__button _icon-cart"><span>В
													кошик</span></button>
									</form>
									<div class="product-footer__price">${data.price} грн</div>
							</div>
						</div>
					</article>`
					);
				})
			}
		});
	}
	//==========</FILTER CATEGORY BY PRICE>=================================================================================

	//===========<INPUT_ORDER>================================================================================
	$('#search_order').on('keyup', function () {
		var query = $(this).val();
		var page = $('#hidden_page').val();
		var filter = $('#order-type__select').children("option:selected").val();
		filter == "" ? filter = "" : filter;

		var dateFilter = $('#order-date__select').children("option:selected").val();
		dateFilter == "" ? dateFilter = "" : dateFilter;

		fetch_orders(page, filter, query, dateFilter);
	});
	//=========<PAYMENT_SELECT>==================================================================================
	$('#order-type__select').on('change', function () {
		var filter = $(this).val();
		var query = $('#search_order').val();
		var page = $('#hidden_page').val();

		var dateFilter = $('#order-date__select').children("option:selected").val();
		dateFilter == "" ? dateFilter = "" : dateFilter;

		fetch_orders(page, filter, query, dateFilter);
	});

	//=========<DATE_SELECT>==================================================================================
	$('#order-date__select').on('change', function () {
		var dateFilter = $(this).val();
		var query = $('#search_order').val();
		var page = $('#hidden_page').val();
		var filter = $('#order-type__select').children("option:selected").val();
		filter == "" ? filter = "" : filter;
		fetch_orders(page, filter, query, dateFilter);
	});
	//=========<PAGINATE_ORDER>==================================================================================
	$(document).on('click', '.order__pagination a', function (e) {
		e.preventDefault();
		var page = $(this).attr('href').split('page=')[1];
		$('#hidden_page').val(page);

		var query = $('#search_order').val();
		var filter = $('#order-type__select').children("option:selected").val();
		filter == "" ? filter = "" : filter;

		var dateFilter = $('#order-date__select').children("option:selected").val();
		dateFilter == "" ? dateFilter = "" : dateFilter;
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		fetch_orders(page, filter, query, dateFilter);
	});

	var globalTimeout = null;
	function fetch_orders(page, filter, query, dateFilter) {
		if (globalTimeout != null) {
			clearTimeout(globalTimeout);
		}
		globalTimeout = setTimeout(function () {
			$.ajax({
				url: "/admin/orders/fetch_data?page=" + page + "&query=" + query + "&filter=" + filter + "&date=" + dateFilter,
				method: "GET",
				dataType: 'json',
				success: function (orders) {
					$('tbody').html('');
					$('tbody').html(orders.view);
				}
			});
		}, 1000);
	}
	//===========<CATEGORY>================================================================================
	$('#category_search').on('keyup', function () {
		var query = $(this).val();
		var page = $('#hidden_page').val();
		fetch_categories(page, query);
	});
	var globalTimeout = null;
	function fetch_categories(page, query) {
		if (globalTimeout != null) {
			clearTimeout(globalTimeout);
		}
		globalTimeout = setTimeout(function () {
			$.ajax({
				url: "/admin/category/fetch_data?page=" + page + "&query=" + query,
				method: "GET",
				dataType: 'json',
				success: function (categories) {
					$('tbody').html('');
					$('tbody').html(categories.view);
				}
			});
		}, 1000);
	}
	//===========</CATEGORY>================================================================================

	//===========<NEWS>================================================================================
	$('#news-search').on('keyup', function () {
		var query = $(this).val();
		var page = $('#hidden_page').val();

		fetch_news_data(page, query);
	});
	$(document).on('click', '.news__pagination a', function (e) {
		e.preventDefault();
		var page = $(this).attr('href').split('page=')[1];
		$('#hidden_page').val(page);

		var query = $('#news-search').val();
		$('li').removeClass('active');
		$(this).parent().addClass('active');
		fetch_news_data(page, query);
	});
	var globalTimeout = null;
	function fetch_news_data(page, query) {
		if (globalTimeout != null) {
			clearTimeout(globalTimeout);
		}
		globalTimeout = setTimeout(function () {
			$.ajax({
				url: "/admin/news/fetch_data?page=" + page + "&query=" + query,
				method: "GET",
				dataType: 'json',
				success: function (news) {
					$('tbody').html('');
					$('tbody').html(news.view);
				}
			});
		}, 1000);
	}
	//===========</NEWS>================================================================================
});
