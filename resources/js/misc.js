(function($) {
  function get_active_data () {

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
      var min = $('.weakly-weather-item.active [data-type='+current_type+']').data('min');
      var max = $('.weakly-weather-item.active [data-type='+current_type+']').data('max');
      var sensor_id = $('.weakly-weather-item.active').data('id');

      $('.sensor-settings [name="min"]').val(min);
      $('.sensor-settings [name="max"]').val(max);
      $('.sensor-settings [name="sensor"]').val(sensor_id);
      $('.sensor-settings [name="type"]').val(current_type);
  }
  $(function() {

    get_active_data();
    get_settings_data();

    $('.sliders-up-container').each(function(){
        var offset = 0;
        // var count = $(".sliders-up-container > * ").length;
        var count = $(this).children(".sliders-up-container-item").length;
        window.setInterval(
            function() {
                offset = (offset - 56) % (count * 56); // 104px div height (incl margin)
                $(".sliders-up-container-item > *").css({
                    "transform": "translateY(" + offset + "px)",
                });
            }, 3000);
    });

    $(".card-control button").on("click", function(){
        var t = $(this);
        var type = t.data("type");
        $(".card-control button").removeClass("active");
        t.addClass("active");
        $(".slideup-block-container .slideup-block-item").attr("hidden", "hidden");
        $(".slideup-block-container .slideup-block-item[data-type='"+ type +"']").removeAttr("hidden");

        get_active_data();
        get_settings_data();
    });

    $(".weakly-weather-item").on("click", function(){
        var t = $(this);
        $(".weakly-weather-item").removeClass("active");
        t.addClass("active");

        get_active_data();
        get_settings_data();
    });

    var sidebar = $('.sidebar');

    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required
    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.nav li a', sidebar).each(function() {
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
    });

    //Close other submenu in sidebar on opening any

    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });


    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if ($('.scroll-container').length) {
        const ScrollContainer = new PerfectScrollbar('.scroll-container');
      }
    }

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');


    $(".purchace-popup .popup-dismiss").on("click",function(){
      $(".purchace-popup").slideToggle();
    });
  });
})(jQuery);
