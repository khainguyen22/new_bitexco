jQuery(document).ready(function ($) {
  if ($('div.historical-grow-page')) {
    var current_section = $(".period.active");

    $(".period").on("click", function () {
      $(".period.active").removeClass("active");
      $(this).addClass("active");
      const section_active = $(this).attr("data-number");
      $(".period-grow.active").removeClass("active");
      $(".period-" + section_active).addClass("active");
      current_section = $(".period.active");
    });

    // Prev Section
    $(".nav.prev").on("click", function () {
      const section_active = current_section.attr("data-number");
      if (section_active == 1) {
        return;
      }
      $(".period.active").removeClass("active");
      $(".period-grow.active").removeClass("active");
      $(".period-" + (section_active - 1)).addClass("active");
      current_section = $(".period-section .period-" + (section_active - 1));
      current_section.addClass("active");
    });


    // Next Section
    $(".nav.next").on("click", function () {
      const section_active = current_section.attr("data-number");
      if (section_active == 3) {
        return;
      }
      $(".period.active").removeClass("active");
      $(".period-grow.active").removeClass("active");
      $(".period-" + (parseInt(section_active) + 1)).addClass("active");
      current_section = $(
        ".period-section .period-" + (parseInt(section_active) + 1)
      );
      current_section.addClass("active");
    });

    function historical_line() {
      var defaultOffsetTop = document.querySelector(
        ".period-grow.active .period-line"
      ).offsetTop;

      let firstOffsetTop = 350

      if (window.innerWidth <= 767) {
        firstOffsetTop = 400
      }

      $(window).on("scroll", function () {
        var scrollOffsetY = $(window).scrollTop() + firstOffsetTop;
        for (var iterator of $(".year")) {
          if (iterator.offsetTop + defaultOffsetTop <= scrollOffsetY) {
            iterator.classList.add("active");
          } else {
            iterator.classList.remove("active");
          }
        }

        var new_line = document.querySelector(".period-grow.active .new-line");
        if (new_line.offsetTop <= scrollOffsetY) {
          var new_line_height = $(window).scrollTop() - defaultOffsetTop + firstOffsetTop;
          new_line.style.height = new_line_height + "px"

        } else {
          new_line.classList.remove("yellow-line");
        }
      });
    }

    historical_line();

    window.addEventListener('resize', function () {
      historical_line();
    })
  }
});
