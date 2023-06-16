// HEADER POPUP

let userClick = document.querySelector('.user-popup');
let popup = document.querySelector('.js-popup');
let test = document.querySelector('.js-popup-mobile');

// document.addEventListener('click', (e) => {
//   console.log(e.currentTarget);
// })

if(userClick){
  userClick.addEventListener('click', () => {
    popup.classList.toggle('show');
    test.classList.toggle('show');
  })
}

// RESPONSIVE MENU

document.addEventListener("DOMContentLoaded", function () {
  let toggleButton = document.querySelector(".mobile-menu-toggle");
  let menuItems = document.querySelector(".mobile-menu-items");

  toggleButton.addEventListener("click", function () {
    menuItems.classList.toggle("show");
  });
});

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
  var years = parseInt(document.getElementById('years').value);
  var interestRate = 3.5; // Set your desired interest rate
  var notaryFeesPercentage = 8; // Set notary fees percentage

  // Calculate financing values
  var loanAmount = propertyPrice - downPayment;
  var totalLoanAmount = loanAmount;
  var monthlyInstallment = loanAmount / (years * 12);
  var interestCost = (loanAmount * (interestRate / 100)) * years;
  var notaryFees = (notaryFeesPercentage / 100) * propertyPrice;

  // Update displayed values
  document.getElementById('monthly-installment').textContent = monthlyInstallment.toFixed(2);
  document.getElementById('total-loan-amount').textContent = totalLoanAmount.toFixed(2);
  document.getElementById('interest-cost').textContent = interestCost.toFixed(2);
  document.getElementById('notary-fees').textContent = notaryFees.toFixed(2);
}

// Attach event listener to the range input element
var yearsInput = document.getElementById('years');
yearsInput.addEventListener('input', function () {
  document.getElementById('years-value').textContent = yearsInput.value;
  calculateFinancing();
});

// Initial calculation
calculateFinancing();