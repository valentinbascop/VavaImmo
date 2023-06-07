// Add this JavaScript code after including the jQuery library

$(document).ready(function() {
  var carousel = $(".carousel-inner");
  var carouselItems = carousel.find(".carousel-item");
  var carouselItemWidth = carouselItems.outerWidth(true);
  var carouselWrapperWidth = carouselItemWidth * carouselItems.length;
  carousel.css("width", carouselWrapperWidth);

  var currentSlide = 0;
  var totalSlides = carouselItems.length;
  var slideWidth = carouselItems.first().outerWidth(true);

  $(".carousel-prev").on("click", function() {
    if (currentSlide > 0) {
      currentSlide--;
    } else {
      currentSlide = totalSlides - 1;
      carousel.css("transition", "none");
      carousel.css("transform", "translateX(-" + totalSlides * slideWidth + "px)");
      setTimeout(function() {
        carousel.css("transition", "transform 0.3s ease-in-out");
        carousel.css("transform", "translateX(-" + ((totalSlides - 1) * slideWidth) + "px)");
        currentSlide = totalSlides - 1;
      }, 50);
    }
    carousel.css("transform", "translateX(-" + (currentSlide * slideWidth) + "px)");
  });

  $(".carousel-next").on("click", function() {
    if (currentSlide < totalSlides - 1) {
      currentSlide++;
    } else {
      currentSlide = 0;
      carousel.css("transition", "none");
      carousel.css("transform", "translateX(-" + slideWidth + "px)");
      setTimeout(function() {
        carousel.css("transition", "transform 0.3s ease-in-out");
        carousel.css("transform", "translateX(0)");
        currentSlide = 0;
      }, 50);
    }
    carousel.css("transform", "translateX(-" + (currentSlide * slideWidth) + "px)");
  });
});
