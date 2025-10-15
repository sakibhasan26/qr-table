(function ($) {
"user strict";


//Create Background Image
(function background() {
  let img = $('.bg_img');
  img.css('background-image', function () {
    var bg = ('url(' + $(this).data('background') + ')');
    return bg;
  });
})();

// aos
AOS.init({
  once: true,
})

// switch-toggles
$(document).ready(function(){
  $.each($(".switch-toggles"),function(index,item) {
    var firstSwitch = $(item).find(".switch").first();
    var lastSwitch = $(item).find(".switch").last();
    if(firstSwitch.attr('data-value') == null) {
      $(item).find(".switch").first().attr("data-value",true);
      $(item).find(".switch").last().attr("data-value",false);
    }
    if($(item).hasClass("active")) {
      $(item).find('input').val(firstSwitch.attr("data-value"));
    }else {
      $(item).find('input').val(lastSwitch.attr("data-value"));
    }
  });
});

$('.switch-toggles .switch').on('click', function () {
  $(this).parents(".switch-toggles").toggleClass('active');
  if($(this).parents(".switch-toggles").hasClass("active")) {
    $(".destination-view").slideDown();
  }else {
    $(".destination-view").slideUp();
  }
  $(this).parents(".switch-toggles").find("input").val($(this).attr("data-value"));
});

// nice-select
$("select").niceSelect(),

// navbar-click
$(".navbar li a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("show")) {
    element.removeClass("show");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('show');
    element.addClass("show");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});

// scroll-to-top
var ScrollTop = $(".scrollToTop");
$(window).on('scroll', function () {
  if ($(this).scrollTop() < 100) {
      ScrollTop.removeClass("active");
  } else {
      ScrollTop.addClass("active");
  }
});

//Odometer
if ($(".statistics-item,.icon-box-items,.counter-single-items").length) {
  $(".statistics-item,.icon-box-items,.counter-single-items").each(function () {
    $(this).isInViewport(function (status) {
      if (status === "entered") {
        for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
          var el = document.querySelectorAll('.odometer')[i];
          el.innerHTML = el.getAttribute("data-odometer-final");
        }
      }
    });
  });
}

var mySwiper = new Swiper(".testimonial-slider .swiper-container", {
  direction: "vertical",
  loop: true,
  parallax: true,
  autoplay: false,
  effect: "slide",
  mousewheelControl: 1,
  autoplay: {
    speed: 1500,
    delay: 3000,
  },
  speed: 1000,
});

// sidebar
$(".sidebar-menu-item > a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("active")) {
    element.removeClass("active");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('active');
    element.addClass("active");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});

// active menu JS
function splitSlash(data) {
  return data.split('/').pop();
}
function splitQuestion(data) {
  return data.split('?').shift().trim();
}
var pageNavLis = $('.sidebar-menu a');
var dividePath = splitSlash(window.location.href);
var divideGetData = splitQuestion(dividePath);
var currentPageUrl = divideGetData;

// find current sidevar element
$.each(pageNavLis,function(index,item){
    var anchoreTag = $(item);
    var anchoreTagHref = $(item).attr('href');
    var index = anchoreTagHref.indexOf('/');
    var getUri = "";
    if(index != -1) {
      // split with /
      getUri = splitSlash(anchoreTagHref);
      getUri = splitQuestion(getUri);
    }else {
      getUri = splitQuestion(anchoreTagHref);
    }
    if(getUri == currentPageUrl) {
      var thisElementParent = anchoreTag.parents('.sidebar-menu-item');
      (anchoreTag.hasClass('nav-link') == true) ? anchoreTag.addClass('active') : thisElementParent.addClass('active');
      (anchoreTag.parents('.sidebar-dropdown')) ? anchoreTag.parents('.sidebar-dropdown').addClass('active') : '';
      (thisElementParent.find('.sidebar-submenu')) ? thisElementParent.find('.sidebar-submenu').slideDown("slow") : '';
      return false;
    }
});

//sidebar Menu
$(document).on('click', '.sidebar-menu-bar', function () {
  $('.sidebar').toggleClass('active');
  $('.navbar-wrapper').toggleClass('active');
  $('.body-wrapper').toggleClass('active');
});

// dashboard-list
$('.dashboard-list-item').on('click', function (e) {
  if(e.target.classList.contains("select-btn")) {
    $(".dashboard-list-item-wrapper .select-btn").text("Select");
    $(e.target).text("Selected");
    return false;
  }
  var element = $(this).parent('.dashboard-list-item-wrapper');
  if (element.hasClass('show')) {
    element.removeClass('show');
    element.find('.preview-list-wrapper').removeClass('show');
    element.find('.preview-list-wrapper').slideUp(300, "swing");
  } else {
    element.addClass('show');
    element.children('.preview-list-wrapper').slideDown(300, "swing");
    element.siblings('.dashboard-list-item-wrapper').children('.preview-list-wrapper').slideUp(300, "swing");
    element.siblings('.dashboard-list-item-wrapper').removeClass('show');
    element.siblings('.dashboard-list-item-wrapper').find('.dashboard-list-item').removeClass('show');
    element.siblings('.dashboard-list-item-wrapper').find('.preview-list-wrapper').slideUp(300, "swing");
  }
});

$(".dashboard-list-item-wrapper .select-btn").click(function(){
  $(".dashboard-list-item-wrapper").removeClass("selected");
  $(this).parents(".dashboard-list-item-wrapper").toggleClass("selected");
});

//info-btn
$(document).on('click', '.info-btn', function () {
  $('.support-profile-wrapper').addClass('active');
});
$(document).on('click', '.chat-cross-btn', function () {
  $('.support-profile-wrapper').removeClass('active');
});

//sidebar Menu
$(document).on('click', '.notification-icon', function () {
  $('.notification-wrapper').toggleClass('active');
});

//Profile Upload
function proPicURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          var preview = $(input).parents('.preview-thumb').find('.profilePicPreview');
          $(preview).css('background-image', 'url(' + e.target.result + ')');
          $(preview).addClass('has-image');
          $(preview).hide();
          $(preview).fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
$(".profilePicUpload").on('change', function () {
  proPicURL(this);
});

$(".remove-image").on('click', function () {
  $(".profilePicPreview").css('background-image', 'none');
  $(".profilePicPreview").removeClass('has-image');
});

//acoount-toggle
$('.header-account-bar').on('click', function () {
  $('.account-section').addClass('active');
});
$('.account-close, .account-bg').on('click', function () {
  $('.account-section').addClass('duration');
  setTimeout(signupRemoveClass, 200);
  setTimeout(signupRemoveClass2, 200);
});
function signupRemoveClass() {
  $('.account-section').removeClass("active");
}
function signupRemoveClass2() {
  $('.account-section').removeClass("duration");
}
$('.account-control-btn').on('click', function () {
  $('.account-area').toggleClass('change-form');
})

// password
$(document).ready(function() {
  $(".show_hide_password .show-pass").on('click', function(event) {
      event.preventDefault();
      if($(this).parent().find("input").attr("type") == "text"){
          $(this).parent().find("input").attr('type', 'password');
          $(this).find("i").addClass( "fa-eye-slash" );
          $(this).find("i").removeClass( "fa-eye" );
      }else if($(this).parent().find("input").attr("type") == "password"){
          $(this).parent().find("input").attr('type', 'text');
          $(this).find("i").removeClass( "fa-eye-slash" );
          $(this).find("i").addClass( "fa-eye" );
      }
  });
});

})(jQuery);


//___________________________________
//__________ Header
//___________________________________
document.addEventListener('DOMContentLoaded', function() {
    // Active page highlighting
    function setActivePage() {
        const currentPage = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('.main-menu .nav-link');
        
        navLinks.forEach(link => {
            const linkPage = link.getAttribute('href');
            if (linkPage === currentPage || (currentPage === '' && linkPage === 'index.html')) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    // Mobile menu toggle enhancement
    function initMobileMenu() {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        if (navbarToggler && navbarCollapse) {
            navbarToggler.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !isExpanded);
            });

            // Close mobile menu when clicking on a link
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 991) {
                        navbarToggler.setAttribute('aria-expanded', 'false');
                        navbarCollapse.classList.remove('show');
                    }
                });
            });
        }
    }

    // Initialize functions
    setActivePage();
    initMobileMenu();
});
//___________________________________
//__________  AOS CONTROL 
//___________________________________
document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;
    body.removeAttribute('data-aos-easing');
    body.removeAttribute('data-aos-duration');
    body.removeAttribute('data-aos-delay');
    
    // Or remove all data-aos attributes
    const attributes = body.getAttributeNames();
    attributes.forEach(attr => {
        if (attr.startsWith('data-aos')) {
            body.removeAttribute(attr);
        }
    });
});

// js for dish cards
document.addEventListener('DOMContentLoaded', function() {
    // Get all dish cards
    const dishCards = document.querySelectorAll('.dish-card');
    
    // Initialize each card
    dishCards.forEach(card => {
        // Skip sold out cards
        if (card.classList.contains('sold-out')) return;
        
        const addToCartBtn = card.querySelector('.add-to-cart-btn');
        const quantityControls = card.querySelector('.quantity-controls');
        const minusBtn = card.querySelector('.minus-btn');
        const plusBtn = card.querySelector('.plus-btn');
        const quantityInput = card.querySelector('.qty-input');
        
        // Add to Cart button click
        addToCartBtn.addEventListener('click', function() {
            addToCartBtn.style.display = 'none';
            quantityControls.style.display = 'flex';
        });
        
        // Minus button click
        minusBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value) || 0;
            let newValue = Math.max(0, currentValue - 1);
            quantityInput.value = newValue;
            
            if (newValue === 0) {
                addToCartBtn.style.display = 'block';
                quantityControls.style.display = 'none';
            }
        });
        
        // Plus button click
        plusBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value) || 0;
            quantityInput.value = currentValue + 1;
        });
        
        // Input change
        quantityInput.addEventListener('change', function() {
            let value = parseInt(quantityInput.value) || 0;
            value = Math.max(0, value);
            quantityInput.value = value;
            
            if (value === 0) {
                addToCartBtn.style.display = 'block';
                quantityControls.style.display = 'none';
            }
        });
    });
});

//___________________________________
//__________ testimonials
//___________________________________
class TestimonialSlider {
    constructor() {
        this.slider = document.querySelector('.testimonial-slider');
        this.track = this.slider.querySelector('.testimonial-track');
        this.cards = this.slider.querySelectorAll('.testimonial-card');
        this.bullets = this.slider.querySelectorAll('.bullet');
        this.currentSlide = 0;
        this.cardsPerView = this.getCardsPerView();
        this.isAnimating = false;
        
        this.init();
    }

    getCardsPerView() {
        const width = window.innerWidth;
        if (width < 768) return 1;      // Mobile: 1 card
        if (width < 1200) return 2;     // Tablet & Small Desktop: 2 cards
        return 3;                       // Large Desktop: 3 cards
    }

    init() {
        this.updateCardStates();
        this.attachEvents();
        
        window.addEventListener('resize', () => {
            this.cardsPerView = this.getCardsPerView();
            this.updateSlider();
        });
        
        // Auto slide
        setInterval(() => {
            this.nextSlide();
        }, 5000);
    }

    goToSlide(slideIndex) {
        if (this.isAnimating) return;
        
        this.isAnimating = true;
        this.currentSlide = slideIndex;
        this.updateSlider();
        
        setTimeout(() => {
            this.isAnimating = false;
        }, 600);
    }

    nextSlide() {
        if (this.isAnimating) return;
        
        const totalSlides = this.bullets.length;
        this.currentSlide = (this.currentSlide + 1) % totalSlides;
        this.updateSlider();
        
        this.isAnimating = true;
        setTimeout(() => {
            this.isAnimating = false;
        }, 600);
    }

    updateSlider() {
        const cardWidth = 100 / this.cardsPerView;
        const translateX = -this.currentSlide * cardWidth;
        this.track.style.transform = `translateX(${translateX}%)`;
        
        // Update bullets
        this.bullets.forEach((bullet, index) => {
            bullet.classList.toggle('active', index === this.currentSlide);
        });
        
        this.updateCardStates();
    }

    updateCardStates() {
        this.cards.forEach((card, index) => {
            const startIndex = this.currentSlide * this.cardsPerView;
            const endIndex = startIndex + this.cardsPerView - 1;
            
            if (index >= startIndex && index <= endIndex) {
                card.classList.add('active');
            } else {
                card.classList.remove('active');
            }
        });
    }

    attachEvents() {
        this.bullets.forEach(bullet => {
            bullet.addEventListener('click', () => {
                const slideIndex = parseInt(bullet.getAttribute('data-slide'));
                this.goToSlide(slideIndex);
            });
        });
    }
}

// Initialize slider when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new TestimonialSlider();
});

//___________________________________
//__________ Menu nav
//___________________________________

document.addEventListener('DOMContentLoaded', function() {
    const menuNav = document.getElementById('menuNav');
    const navLinks = document.querySelectorAll('.menu-details-nav .nav-link');
    const categories = document.querySelectorAll('.menu-category');
    
    // Check if elements exist to prevent errors
    if (!menuNav || navLinks.length === 0 || categories.length === 0) {
        return; // Exit if elements don't exist
    }
    
    // Get the correct header height for offset
    function getHeaderHeight() {
        const header = document.querySelector('header');
        return header ? header.offsetHeight : 80;
    }
    
    // Sticky navigation with offset
    window.addEventListener('scroll', function() {
        if (window.scrollY > 150) {
            menuNav.classList.add('sticky');
        } else {
            menuNav.classList.remove('sticky');
        }
        
        // Update active nav based on scroll position
        updateActiveNav();
    });
    
    // Click navigation - Only for menu details nav links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Only prevent default for menu navigation, not other links
            if (this.getAttribute('data-target')) {
                e.preventDefault();
                
                const targetId = this.getAttribute('data-target');
                const targetCategory = document.getElementById(targetId);
                
                if (targetCategory) {
                    // Get header height for proper offset
                    const headerHeight = getHeaderHeight();
                    // Calculate position with proper offset for mobile
                    const elementPosition = targetCategory.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerHeight - 20;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // Update active navigation based on scroll position
    function updateActiveNav() {
        let current = '';
        const headerHeight = getHeaderHeight();
        const scrollPosition = window.scrollY + headerHeight + 50; // Adjusted for mobile
        
        categories.forEach(category => {
            const categoryTop = category.offsetTop;
            const categoryHeight = category.offsetHeight;
            const categoryBottom = categoryTop + categoryHeight;
            
            // Check if category is in viewport with threshold
            if (scrollPosition >= categoryTop - 100 && scrollPosition < categoryBottom - 100) {
                current = category.getAttribute('id');
            }
        });
        
        // If no category found, find the closest one
        if (!current) {
            let closestDistance = Infinity;
            categories.forEach(category => {
                const categoryTop = category.offsetTop;
                const distance = Math.abs(categoryTop - scrollPosition);
                if (distance < closestDistance) {
                    closestDistance = distance;
                    current = category.getAttribute('id');
                }
            });
        }
        
        navLinks.forEach(link => {
            link.classList.remove('menu-nav-active');
            if (link.getAttribute('data-target') === current) {
                link.classList.add('menu-nav-active');
            }
        });
    }
    
    // Update on resize for mobile orientation changes
    window.addEventListener('resize', function() {
        updateActiveNav();
    });
    
    // Initial call
    updateActiveNav();
});

//___________________________________
//__________ dish item btn
//___________________________________
document.addEventListener('DOMContentLoaded', function() {
    // Quantity controls in cart
    const minusBtns = document.querySelectorAll('.cart-table .minus-btn');
    const plusBtns = document.querySelectorAll('.cart-table .plus-btn');
    const qtyInputs = document.querySelectorAll('.cart-table .qty-input');
    
    // Minus button click
    minusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.qty-input');
            let currentValue = parseInt(input.value) || 0;
            let newValue = Math.max(0, currentValue - 1);
            input.value = newValue;
        });
    });
    
    // Plus button click
    plusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.qty-input');
            let currentValue = parseInt(input.value) || 0;
            input.value = currentValue + 1;
        });
    });
    
    // Input change
    qtyInputs.forEach(input => {
        input.addEventListener('change', function() {
            let value = parseInt(this.value) || 0;
            value = Math.max(0, value);
            this.value = value;
        });
    });
});


//___________________________________
//__________ Modal - Payment 
//___________________________________
document.addEventListener('DOMContentLoaded', function() {
    // Modal show/hide functionality
    const modal = document.getElementById('paymentModal');
    const proceedBtn = document.querySelector('.proceed-btn');
    const closeBtn = document.querySelector('.close-btn');
    const modalOverlay = document.querySelector('.modal-overlay');
    
    // Proceed button click - Modal Show
    if (proceedBtn) {
        proceedBtn.addEventListener('click', function() {
            const targetModal = this.getAttribute('data-target');
            const modalToShow = document.getElementById(targetModal);
            if (modalToShow) {
                modalToShow.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent background scroll
            }
        });
    }
    
    // Close button click - Modal Hide
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            const modalToClose = this.closest('.payment-modal');
            if (modalToClose) {
                modalToClose.classList.remove('active');
                document.body.style.overflow = ''; // Restore scroll
            }
        });
    }
    
    // Overlay click - Modal Hide
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function() {
            const modalToClose = this.closest('.payment-modal');
            if (modalToClose) {
                modalToClose.classList.remove('active');
                document.body.style.overflow = ''; // Restore scroll
            }
        });
    }
    
    // Escape key press - Modal Hide
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.payment-modal.active');
            if (openModal) {
                openModal.classList.remove('active');
                document.body.style.overflow = ''; // Restore scroll
            }
        }
    });

    // Payment method switching functionality
    const paymentMethods = document.querySelectorAll('input[name="payment-method"]');
    const cashMessage = document.querySelector('.cash-message');
    const onlineOptions = document.querySelector('.online-options');
    
    paymentMethods.forEach(method => {
        method.addEventListener('change', function() {
            if (this.value === 'cash') {
                cashMessage.classList.add('active');
                onlineOptions.classList.remove('active');
            } else {
                cashMessage.classList.remove('active');
                onlineOptions.classList.add('active');
            }
        });
    });
    
    // Initialize with cash selected
    if (cashMessage) {
        cashMessage.classList.add('active');
    }
    
    // Confirm Payment Button
    const confirmBtn = document.querySelector('.confirm-payment');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            const selectedMethod = document.querySelector('input[name="payment-method"]:checked');
            if (selectedMethod) {
                if (selectedMethod.value === 'online') {
                    const selectedCard = document.querySelector('input[name="card-type"]:checked');
                    if (!selectedCard) {
                        alert('Please select a card type');
                        return;
                    }
                }
                alert('Payment confirmed! (Demo)');
                // এখানে actual payment processing logic হবে
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
});

//___________________________________
//__________ Password 
//___________________________________
document.addEventListener('click', function(e) {
    if (e.target.closest('.show-pass')) {
        e.preventDefault();
        const button = e.target.closest('.show-pass');
        const input = button.closest('.password-input-wrapper').querySelector('input');
        const icon = button.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        }
    }
});


//___________________________________
//__________ OTP  
//___________________________________
document.addEventListener('DOMContentLoaded', function() {
    const otpInputs = document.querySelectorAll('.otp-input');
    
    otpInputs.forEach((input, index) => {
        // Handle input
        input.addEventListener('input', function(e) {
            if (this.value.length === 1) {
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            }
        });
        
        // Handle backspace
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && this.value === '' && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
        
        // Handle paste
        input.addEventListener('paste', function(e) {
            e.preventDefault();
            const pasteData = e.clipboardData.getData('text').slice(0, 6);
            pasteData.split('').forEach((char, i) => {
                if (otpInputs[i]) {
                    otpInputs[i].value = char;
                }
            });
        });
    });
});



//___________________________________
//__________ CANVAS 
//___________________________________
class CanvasManager {
    constructor() {
        this.canvas = document.querySelector('.canvas-section');
        this.backdrop = document.querySelector('.canvas-backdrop');
        this.navItems = document.querySelectorAll('.canvas-nav-item');
        this.tabs = document.querySelectorAll('.canvas-tab');
        this.closeBtn = document.querySelector('.canvas-close');
        
        this.init();
    }
    
    init() {
        // Add event listeners
        this.closeBtn.addEventListener('click', () => this.close());
        this.backdrop.addEventListener('click', () => this.close());
        
        // Navigation click handlers
        this.navItems.forEach(item => {
            item.addEventListener('click', () => this.switchTab(item));
        });
        
        // Add click handler for all buttons with data-target="userCanvas"
        document.querySelectorAll('[data-target="userCanvas"]').forEach(btn => {
            btn.addEventListener('click', () => this.open());
        });
    }
    
    open() {
        this.canvas.classList.add('active');
        this.backdrop.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    close() {
        this.canvas.classList.remove('active');
        this.backdrop.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    switchTab(clickedItem) {
        // Remove active class from all nav items
        this.navItems.forEach(item => {
            item.classList.remove('canvas-active-nav');
        });
        
        // Add active class to clicked item
        clickedItem.classList.add('canvas-active-nav');
        
        // Hide all tabs
        this.tabs.forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Show target tab
        const target = clickedItem.getAttribute('data-tab');
        const targetTab = document.getElementById(target);
        if (targetTab) {
            targetTab.classList.add('active');
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new CanvasManager();
});