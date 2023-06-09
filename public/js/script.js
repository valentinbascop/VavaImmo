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


// FINANCEMENT

    // Calculate financing details
    function calculateFinancing() {
      var propertyPrice = parseInt(document.getElementById('property-price').value);
      var downPayment = parseInt(document.getElementById('down-payment').value);
      var installments = parseInt(document.getElementById('installments').value);
      var interestRate = 3.5; // Set your desired interest rate
      var notaryFeesPercentage = 8; // Set notary fees percentage

      // Calculate financing values
      var loanAmount = propertyPrice - downPayment;
      var monthlyInterestRate = (interestRate / 100) / 12;
      var monthlyInstallment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -installments));
      var totalLoanAmount = loanAmount + (monthlyInstallment * installments);
      var interestCost = totalLoanAmount - loanAmount;
      var notaryFees = (notaryFeesPercentage / 100) * propertyPrice;

      // Update displayed values
      document.getElementById('monthly-installment').textContent = monthlyInstallment.toFixed(2);
      document.getElementById('total-loan-amount').textContent = totalLoanAmount.toFixed(2);
      document.getElementById('interest-cost').textContent = interestCost.toFixed(2);
      document.getElementById('notary-fees').textContent = notaryFees.toFixed(2);
    }

    // Attach event listener to the range input element
    document.getElementById('installments').addEventListener('input', calculateFinancing);

    // Initial calculation
    calculateFinancing();