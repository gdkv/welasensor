/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/misc.js":
/*!******************************!*\
  !*** ./resources/js/misc.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  function get_active_data() {
    var temp = $(".weakly-weather-item.active [data-type='temperature']").data("value");
    var hum = $(".weakly-weather-item.active [data-type='humidity']").data("value");
    var co2 = $(".weakly-weather-item.active [data-type='co2']").data("value");
    var lux = $(".weakly-weather-item.active [data-type='lux']").data("value");
    var sensor_name = $(".weakly-weather-item.active").data("name");
    $(".weather-data [data-type='temperature'] h4").html(temp + "<span class=\"symbol\">&deg;</span>C");
    $(".weather-data [data-type='humidity'] h4").html(hum + "%");
    $(".weather-data [data-type='co2'] h4").html(co2);
    $(".weather-data [data-type='lux'] h4").html(lux);
    $(".weather-data .sensor-name").html(sensor_name);
  }

  function get_settings_data() {
    var current_type = $('.card-control .active').data('type');
    var min = $('.weakly-weather-item.active [data-type=' + current_type + ']').data('min');
    var max = $('.weakly-weather-item.active [data-type=' + current_type + ']').data('max');
    var sensor_id = $('.weakly-weather-item.active').data('id');
    $('.sensor-settings [name="min"]').val(min);
    $('.sensor-settings [name="max"]').val(max);
    $('.sensor-settings [name="sensor"]').val(sensor_id);
    $('.sensor-settings [name="type"]').val(current_type);
  }

  $(function () {
    get_active_data();
    get_settings_data();
    $('.sliders-up-container').each(function () {
      var offset = 0; // var count = $(".sliders-up-container > * ").length;

      var count = $(this).children(".sliders-up-container-item").length;
      window.setInterval(function () {
        offset = (offset - 56) % (count * 56); // 104px div height (incl margin)

        $(".sliders-up-container-item > *").css({
          "transform": "translateY(" + offset + "px)"
        });
      }, 3000);
    });
    $(".card-control button").on("click", function () {
      var t = $(this);
      var type = t.data("type");
      $(".card-control button").removeClass("active");
      t.addClass("active");
      $(".slideup-block-container .slideup-block-item").attr("hidden", "hidden");
      $(".slideup-block-container .slideup-block-item[data-type='" + type + "']").removeAttr("hidden");
      get_active_data();
      get_settings_data();
    });
    $(".weakly-weather-item").on("click", function () {
      var t = $(this);
      $(".weakly-weather-item").removeClass("active");
      t.addClass("active");
      get_active_data();
      get_settings_data();
    });
    var sidebar = $('.sidebar'); //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required

    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.nav li a', sidebar).each(function () {
      var $this = $(this);

      if (current === "") {
        //for root url
        if ($this.attr('href').indexOf("index.html") !== -1) {
          $(this).parents('.nav-item').last().addClass('active');

          if ($(this).parents('.sub-menu').length) {
            $(this).closest('.collapse').addClass('show');
            $(this).addClass('active');
          }
        }
      } else {
        //for other url
        if ($this.attr('href').indexOf(current) !== -1) {
          $(this).parents('.nav-item').last().addClass('active');

          if ($(this).parents('.sub-menu').length) {
            $(this).closest('.collapse').addClass('show');
            $(this).addClass('active');
          }
        }
      }
    }); //Close other submenu in sidebar on opening any

    sidebar.on('show.bs.collapse', '.collapse', function () {
      sidebar.find('.collapse.show').collapse('hide');
    }); //Change sidebar and content-wrapper height

    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if ($('.scroll-container').length) {
        var ScrollContainer = new PerfectScrollbar('.scroll-container');
      }
    } //checkbox and radios


    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');
    $(".purchace-popup .popup-dismiss").on("click", function () {
      $(".purchace-popup").slideToggle();
    });
  });
})(jQuery);

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/misc.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/apusagency1/Sites/welasensor/resources/js/misc.js */"./resources/js/misc.js");


/***/ })

/******/ });