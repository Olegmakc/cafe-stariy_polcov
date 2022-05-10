/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

$(document).ready(function () {
  $('#orderForm').on('submit', function (e) {
    e.preventDefault();
    var name = $('#name').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var destination_adress = $('#destination_adress').val();
    var comment = $('#comment').val();
    var payment = $("input[type='radio'][name='payment']:checked").val();
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
        payment: payment
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(response) {
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
      error: function error(response) {
        $('#name-error').text(response.responseJSON.errors.name);
        $('#phone-error').text(response.responseJSON.errors.phone);
        $('#email-error').text(response.responseJSON.errors.email);
        $('#destination_adress-error').text(response.responseJSON.errors.destination_adress);
        $('#comment-error').text(response.responseJSON.errors.comment);
        $('#payment-error').text(response.responseJSON.errors.payment);
      }
    });
  }); //==========<PRODUCTS>=================================================================================

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
  }); //=============<SELECT Product_category>==============================================================================

  $('#product-category__select').on('change', function () {
    var category = $(this).val();
    var query = $('#search').val();
    var page = $('#hidden_page').val();
    fetch_category_products(page, category, query);
  }); //=========<Pagination_PRODUCTS>==================================================================================

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
        success: function success(products) {
          $('tbody').html('');
          $('tbody').html(products.view);
        }
      });
    }, 1000);
  } //===========</PRODUCTS>================================================================================
  //==========<FILTER CATEGORY BY PRICE>=================================================================================


  $('#filter-product').on('change', function () {
    var filter = $(this).val();
    var categorySlug = $("#category_code").val();
    fetch_filtred_products(categorySlug, filter);
  });

  function fetch_filtred_products(slug, filter) {
    $.ajax({
      url: "/menu/fetch_data?slug=" + slug + "&filter=" + filter,
      method: "GET",
      dataType: 'json',
      success: function success(products) {
        $('#category-list').empty('');
        $.each(products, function (index, data) {
          $('#category-list').append("<article class=\"slider-products__card card-product\">\n\t\t\t\t\t\t<a class=\"card-product__image\">\n\t\t\t\t\t\t\t<div class=\"card-product__inner ibg\" style=\"background-image: url('http://127.0.0.1:8000/storage/".concat(data.photo, "');\">\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t<img src=\"/storage/").concat(data.photo, "\" alt=\"").concat(data.title, "\"></img> \n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<div class=\"card-product__body\">\n\t\t\t\t\t\t\t<div class=\"card-product__title\">\n\t\t\t\t\t\t\t\t\t<a class=\"card-product__title-link\">").concat(data.title, "</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"card-product__text\">\n\t\t\t\t\t\t\t\t\t<span class=\"card-product__weight\"> ").concat(data.weight, " \u0433\u0440.</span>\n\t\t\t\t\t\t\t\t\t") + (data.description === null ? '' : "- ".concat(data.description)) + "\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"card-product__footer product-footer\">\n\t\t\t\t\t\t\t\t\t<form action=\"/basket/add/".concat(data.id, "\" method=\"POST\">\n\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"") + $('meta[name="csrf-token"]').attr('content') + "\" />   \n\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"product-footer__button _icon-cart\"><span>\u0412\n\t\t\t\t\t\t\t\t\t\t\t\t\t\u043A\u043E\u0448\u0438\u043A</span></button>\n\t\t\t\t\t\t\t\t\t</form>\n\t\t\t\t\t\t\t\t\t<div class=\"product-footer__price\">".concat(data.price, " \u0433\u0440\u043D</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</article>"));
        });
      }
    });
  } //==========</FILTER CATEGORY BY PRICE>=================================================================================
  //===========<INPUT_ORDER>================================================================================


  $('#search_order').on('keyup', function () {
    var query = $(this).val();
    var page = $('#hidden_page').val();
    var filter = $('#order-type__select').children("option:selected").val();
    filter == "" ? filter = "" : filter;
    var dateFilter = $('#order-date__select').children("option:selected").val();
    dateFilter == "" ? dateFilter = "" : dateFilter;
    fetch_orders(page, filter, query, dateFilter);
  }); //=========<PAYMENT_SELECT>==================================================================================

  $('#order-type__select').on('change', function () {
    var filter = $(this).val();
    var query = $('#search_order').val();
    var page = $('#hidden_page').val();
    var dateFilter = $('#order-date__select').children("option:selected").val();
    dateFilter == "" ? dateFilter = "" : dateFilter;
    fetch_orders(page, filter, query, dateFilter);
  }); //=========<DATE_SELECT>==================================================================================

  $('#order-date__select').on('change', function () {
    var dateFilter = $(this).val();
    var query = $('#search_order').val();
    var page = $('#hidden_page').val();
    var filter = $('#order-type__select').children("option:selected").val();
    filter == "" ? filter = "" : filter;
    fetch_orders(page, filter, query, dateFilter);
  }); //=========<PAGINATE_ORDER>==================================================================================

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
        success: function success(orders) {
          $('tbody').html('');
          $('tbody').html(orders.view);
        }
      });
    }, 1000);
  } //===========<CATEGORY>================================================================================


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
        success: function success(categories) {
          $('tbody').html('');
          $('tbody').html(categories.view);
        }
      });
    }, 1000);
  } //===========</CATEGORY>================================================================================
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
        success: function success(news) {
          $('tbody').html('');
          $('tbody').html(news.view);
        }
      });
    }, 1000);
  } //===========</NEWS>================================================================================

});

/***/ }),

/***/ "./resources/sass/admin.scss":
/*!***********************************!*\
  !*** ./resources/sass/admin.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0,
/******/ 			"css/admin/admin": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app","css/admin/admin"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/admin/admin"], () => (__webpack_require__("./resources/sass/admin.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app","css/admin/admin"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;