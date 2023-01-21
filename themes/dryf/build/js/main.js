'use strict'

$(document).ready(function () {
  /*$(".animation").animate({fill:"transparent", stroke:"#5E7586"}, 2000).animate({fill:"#5E7586", stroke:"none"}, 3000);*/

  let mobScreen = false;

  $('select').select2();

  $("input[name='your-phone']").inputmask("+380 (99) 999-9999"); 

  restaurantsTabs();
  counterPeople();
  transferElement();

  $('#dt').multiDatesPicker({
    dateFormat: "dd/mm/yy",
    multidate: true,
    minDate: 1,
    monthNames: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
    dayNamesMin: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    showOtherMonths: true,
    firstDay: 1,
    prevText: "",
    nextText: "",
    autoclose: true,
    numberOfMonths: 2,
  });

  /*$('#dt-start').multiDatesPicker({
    dateFormat: "dd.m.yy",
    minDate: 1,
    monthNames: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
    dayNamesMin: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    showOtherMonths: true,
    firstDay: 1,
    prevText: "",
    nextText: "",
    autoclose: true,
    numberOfMonths: 2
  });
  $(function() {
      $.datepicker.setDefaults({ // Set common properties
            changeMonth: true,
            defaultDate: '+1w',
      });
      var from = $('#from').datepicker({ minDate: 0 }).
            on('change', function() {
                  var date = from.datepicker('getDate');
                  var endDate = new Date(date);
                  endDate.setDate(endDate.getDate() + 14);
                  to.datepicker('option', { minDate: date, maxDate: endDate }); 
            });
      var to = $('#to').datepicker().
            on('change', function() {
                  from.datepicker('option', { maxDate: to.datepicker('getDate') });
            });
});
  
  */
  $('#dt-start').datepicker({
    dateFormat: "dd/mm/yy",
    multidate: true,
    minDate: 1,
    monthNames: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
    dayNamesMin: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    showOtherMonths: true,
    firstDay: 1,
    prevText: "",
    nextText: "",
    autoclose: true,
    numberOfMonths: 2,
  });

  $('#dt-end').datepicker({
    dateFormat: "dd/mm/yy",
    multidate: true,
    minDate: 1,
    monthNames: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
    dayNamesMin: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    showOtherMonths: true,
    firstDay: 1,
    prevText: "",
    nextText: "",
    autoclose: true,
    numberOfMonths: 2
  });

  $("#dt-start").datepicker("setDate", "-1");
  $("#dt-end").datepicker("setDate", "0");

  document.body.addEventListener('click', (e) => {
    e.target.style.cssText = 'cursor: url("/wp-content/themes/nashe/images/common/cursor-click.svg"), auto;';
    setTimeout(() => e.target.style.cssText = '', 100);

    if (e.target.getAttribute('id') == "dt") {
      document.querySelector('.calendar-form_group').append(document.querySelector('#ui-datepicker-div'));
    }

    if (e.target.getAttribute('id') == "dt-end" || e.target.getAttribute('id') == "dt-start") {
      document.querySelector('.modal-calendar-form_group').append(document.querySelector('#ui-datepicker-div'));
    }

    if (e.target.getAttribute('data-event') == "main-booking") {
      e.preventDefault();

      fastBooking();

      document.querySelector('.modal-wrap').classList.add('active');

      setTimeout(() => {
        document.querySelector('.modal').classList.add('active');
      }, 500);

      if (document.querySelector('.mob-modal') && document.querySelector('.mob-modal').classList.contains('active')) {
        document.querySelector('.mob-modal').classList.remove('active');
      }
    }

    if (e.target.getAttribute('data-event') == "menu-button") {
      document.querySelector('.header-menu_modal').classList.toggle('active');
      document.querySelector('.menu-button').classList.toggle('active');

      if (document.querySelector('.header-menu_modal').classList.contains('active')) {
        document.querySelector('html').style.cssText = 'overflow-y: hidden;';
      } else {
        document.querySelector('html').style.cssText = '';
      }

      if (document.querySelector('.header-menu_modal').classList.contains('sub-menu-active')) {
        document.querySelector('.header-menu_modal').classList.remove('sub-menu-active');
        
        document.querySelector('.menu-item-has-children.active').classList.remove('active')

      }
    }

    if (e.target.getAttribute('data-event') == "open-modal-booking") {
      document.querySelector('.booking-modal').classList.add('active');
      document.querySelector('html').style.cssText = 'overflow-y: hidden;';
      
    }

    if (e.target.getAttribute('data-event') == "relax-booking") {
      if (window.innerWidth <= 850) {
        document.querySelector('.modal-wrap').classList.add('active');
        document.querySelector('.mob-modal').classList.add('active');
        document.querySelector(`option#${e.target.getAttribute('data-id')}`).setAttribute('selected', true);
        document.querySelector(`.select2-selection__rendered`).setAttribute('title', `${document.querySelector(`option#${e.target.getAttribute('data-id')}`).innerText}`);
        document.querySelector(`.select2-selection__rendered`).innerText = document.querySelector(`option#${e.target.getAttribute('data-id')}`).innerText;
      } else {
        document.querySelector('.booking-modal').classList.add('active');
        document.querySelector('html').style.cssText = 'overflow-y: hidden;';
        document.querySelector(`label[for="${e.target.getAttribute('data-id')}"]`).classList.add('active');
        document.querySelector(`label[for="${e.target.getAttribute('data-id')}"] input`).setAttribute('checked', true);
      }
    }

    if (e.target.className == "booking-cout_input") {
      document.querySelector('.main-booking_form .booking-count').classList.toggle('active');
      document.querySelector('.main-booking_form .booking-count_dropdown').classList.toggle('active');
    }

    if (!document.querySelector('.main-booking_form .booking-count_dropdown').contains(e.target) && !document.querySelector('.booking-cout_input').contains(e.target)) {
      document.querySelector('.main-booking_form .booking-count').classList.remove('active');
      document.querySelector('.main-booking_form .booking-count_dropdown').classList.remove('active');
    }

    if (e.target.getAttribute('data-event') == "close-modal") {
      if (document.querySelector('.booking-modal').classList.contains('active')) {
        document.querySelector('.booking-modal').classList.remove('active');
        document.querySelector('html').style.cssText = 'overflow-y: auto;';
      }

      if (document.querySelector('.modal-wrap').classList.contains('active')) {
        document.querySelector('.modal').classList.remove('active');

        setTimeout(() => {
          document.querySelector('.modal-wrap').classList.remove('active');
        }, 500);
      }

      if (document.querySelector('.mob-modal') && document.querySelector('.mob-modal').classList.contains('active')) {
        document.querySelector('.mob-modal').classList.remove('active');

        setTimeout(() => {
          document.querySelector('.modal-wrap').classList.remove('active');
        }, 500);
      }
    }
  });

  document.querySelector('.booking-modal .base-btn').addEventListener('click', () => {
    mainBooking();
  });

  document.querySelectorAll('.booking-modal .swiper-slide label').forEach(item => {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      item.classList.toggle('active');
      item.style.cssText = 'cursor: url("/wp-content/themes/nashe/images/common/cursor-click.svg"), auto;';
      setTimeout(() => item.style.cssText = '', 100);
      if (item.querySelector('input[type="checkbox"]').getAttribute('checked')) {
        item.querySelector('input[type="checkbox"]').removeAttribute('checked');
      } else {
        item.querySelector('input[type="checkbox"]').setAttribute('checked', true);
      }
    });
  });

  document.querySelectorAll('.menu-item-has-children > a').forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      document.querySelectorAll('.menu-item-has-children.active').forEach(item => item.classList.remove('active'));
      e.target.parentElement.classList.add('active');

      e.target.parentElement.querySelectorAll('.sub-menu > .menu-item').forEach((item, key) => {
        if (!item.querySelector('span')) {
          let count = document.createElement('span');

          count.innerHTML = `0${++key}`;

          item.prepend(count);
        };
      });

      document.querySelector('.header-menu_modal').classList.add('sub-menu-active');
    });
  });

  document.querySelectorAll('.header-menu-list > .menu-item').forEach((item, key) => {
    let count = document.createElement('span');

    count.innerHTML = `0${++key}`;

    item.prepend(count);
  });

  document.querySelector('#ui-datepicker-div').style.cssText = 'display: none;';

  let swiperImage = new Swiper(document.getElementById('main-slider'), {
    spaceBetween: 0,
    slidesPerView: 1,
    speed: 800,
    direction: 'horizontal',
    mousewheel: true,
    effect: 'fade',
    loop: true,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-dots'
    },
    breakpoints: {
      980: {
        direction: 'horizontal',
      }
    }
  });

  let servicesCarousele = new Swiper(document.getElementById('services-carousel'), {
    spaceBetween: 25,
    slidesPerView: 1.25,
    speed: 800,
    direction: 'horizontal',
    mousewheel: {
      releaseOnEdges: true,
    },
    loop: false,
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },
    breakpoints: {
      850: {
        slidesPerView: 2.75,
        direction: 'horizontal',
      }
    },
  });
  
  let servicesBookingCarousele = new Swiper(document.getElementById('booking-services-carousel'), {
    spaceBetween: 0,
    slidesPerView: 4.75,
    speed: 800,
    direction: 'horizontal',
    mousewheel: {
      releaseOnEdges: true,
    },
    loop: false,
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },
    breakpoints: {
      980: {
        direction: 'horizontal',
      }
    },
  });
  
  let relaxSlider = new Swiper(document.getElementById('relax-slider'), {
    slidesPerView: "auto",
    centeredSlides: true,
    spaceBetween: 250,
    speed: 800,
    effect: 'coverflow',
    direction: 'vertical',
    mousewheel: {
      forceToAxis: true,
      sensitivity: 1,
      releaseOnEdges: true,
    },
    touchReleaseOnEdges: true,
    loop: false,
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
    breakpoints: {
      980: {
        direction: 'vertical',
        mousewheel: {
          forceToAxis: true,
          sensitivity: 1,
          releaseOnEdges: true,
        },
        touchReleaseOnEdges: false,
      }
    },
  });

  $(window).scroll(function(){
    if (document.querySelector('.home')) {
      if ($(this).scrollTop() >= $('.home-about_section').offset().top / 2) {
        $('.home-about_section').addClass('home-about_section-animation');
     }
   
     if ($(this).scrollTop() >= $('.home-services_section').offset().top / 1.8) {
       $('.home-services_section').addClass('home-services_section-animation');
     }
   
     if ($(this).scrollTop() >= $('.home-relax_section').offset().top / 1.2) {
       $('.home-relax_section').addClass('home-relax_section-animation');
     }
   
     if ($(this).scrollTop() >= $('.home-restaurants_section').offset().top / 1.3) {
       $('.home-restaurants_section').addClass('home-restaurants_section-animation');
     }
   
     if ($(this).scrollTop() >= $('.contact_section').offset().top / 1.3) {
       $('.contact_section').addClass('contact_section-animation');
     }
    }
  });

  $('.booking-modal .wpcf7-form').on('wpcf7mailsent', function (event) {
    $( ".booking-modal_body" ).fadeOut( );
    $( ".booking-modal-form_wrap" ).fadeOut();
  
    $('.booking-modal .form-thanks-wrap').html('<div class="form-thanks_massages"><h3>Дякуємо за те, що довіряєте нам Ваш відпочинок</h3><hr><p>Ми зателефонуємо вам як найшвидше для підтвердження бронювання</p></div>');
  
    setTimeout(() => {
      $('.booking-modal').removeClass('active');
    }, 5000);  
  });
  
  $('.modal  .wpcf7-form').on('wpcf7mailsent', function (event) {
    $(".modal .wpcf7-form").fadeOut();
  
    setTimeout(() => {
      $('.modal .form-thanks-wrap').html('<div class="form-thanks_massages"><h3>Дякуємо за те, що довіряєте нам Ваш відпочинок</h3><hr><p>Ми зателефонуємо вам як найшвидше для підтвердження бронювання</p></div>');
    }, 500);
  
    setTimeout(() => {
      $('.modal').removeClass('active');
      $('.modal-wrap').removeClass('active');
    }, 5000);
  });

  window.addEventListener('resize', () => {
    if (window.innerWidth <= 850 && !mobScreen) {
      transferElement();
    } else {
      transferBackElement();
    }
  });

  function counter() {
    var count = setInterval(function () {
      var c = parseInt($(".progress-bar_percent").text());
      if (c !== 100) {
        $(".progress-bar_percent").text((++c).toString() + '%');
        $(".progress-bar div").css('width', `${(++c).toString()}%`);
      } else {
        $(".progress-bar_percent").text(100 + '%');
        $(".progress-bar div").css('width', '100%');
        $( "#preloader" ).fadeOut(500, function() {
          $( "html" ).css('overflow-y', 'auto');
          $( "#preloader" ).remove();
        });
        clearInterval(count);
      }
    }, 25);
  }
  
  function restaurantsTabs() {
    if (document.querySelectorAll('.restaurants-tab_item')[0]) {
      document.querySelectorAll('.restaurants-tab_item')[0].classList.add('active');
      document.querySelectorAll('.restaurants-tab_image')[0].classList.add('active');
  
      document.querySelector('.restaurants-tabs').addEventListener('click', (e) => {
        if (e.target.className == 'restaurants-tab_item') {
          document.querySelectorAll('.restaurants-tab_item').forEach(tab => tab.classList.remove('active'));
          document.querySelectorAll('.restaurants-tab_image').forEach(image => image.classList.remove('active'));
  
          e.target.classList.add('active');
  
          document.querySelector('.restaurants-tab-before_text').style.cssText = `left: calc(${e.target.offsetLeft}px + 0rem)`;
  
          document.querySelector(`.restaurants-tab_image[data-id='${e.target.getAttribute('data-id')}']`).classList.add('active');
        }
      });
    }
  }
  
  function fastBooking() {
    const bookingForm = document.querySelector('.main-booking_form');
  
    console.log(bookingForm.querySelector('.select2-selection__rendered').innerText, bookingForm.querySelector('input#dt').value, bookingForm.querySelector('input[name="pepople_count"]').value, bookingForm.querySelector('input[name="child_count"]').value);
  
    document.querySelector('.modal input[name="services"]').value = bookingForm.querySelector('.select2-selection__rendered').innerText.toString();
    document.querySelector('.modal input[name="date"]').value = bookingForm.querySelector('input#dt').value.toString();
    document.querySelector('.modal input[name="people-count"]').value = bookingForm.querySelector('input[name="pepople_count"]').value.toString();
    document.querySelector('.modal input[name="child-count"]').value = bookingForm.querySelector('input[name="child_count"]').value.toString();    
  }
  
  function mainBooking() {
    const bookingMainForm = document.querySelector('.booking-modal');
  
    let servicesArray = [];
  
    bookingMainForm.querySelectorAll('.swiper-slide input[type="checkbox"]').forEach(checkbox => {
      if (checkbox.getAttribute('checked')) {
        servicesArray.push(checkbox.getAttribute('data-name'));
      }
    });
      
    bookingMainForm.querySelector('.booking-modal input[name="services"]').value = servicesArray.toString();
    bookingMainForm.querySelector('.booking-modal input[name="date-start"]').value = bookingMainForm.querySelector('input#dt-start').value.toString();
    bookingMainForm.querySelector('.booking-modal input[name="date-end"]').value = bookingMainForm.querySelector('input#dt-end').value.toString();
    bookingMainForm.querySelector('.booking-modal input[name="people-count"]').value = bookingMainForm.querySelector('input[name="people_count-booking"]').value.toString();
    bookingMainForm.querySelector('.booking-modal input[name="child-count"]').value = bookingMainForm.querySelector('input[name="child_count-booking"]').value.toString();    
  }
  
  function counterPeople() {
    let countWrap = document.querySelectorAll('.booking-counter_group');
  
    countWrap.forEach(item => {
      item.addEventListener('click', (e) => {
        if (e.target.getAttribute('data-event') == 'minus') {
          e.preventDefault(); 
          let currentCount = e.target.parentElement.querySelector('input[type="text"]').getAttribute('value');
  
          if (currentCount <= 0) {
            e.target.parentElement.querySelector('input[type="text"]').setAttribute('value', 0)
          } else {
            e.target.parentElement.querySelector('input[type="text"]').setAttribute('value', --currentCount)
          }
        }
  
        if (e.target.getAttribute('data-event') == 'plus') {
          e.preventDefault();
          let currentCount = e.target.parentElement.querySelector('input[type="text"]').getAttribute('value');
          e.target.parentElement.querySelector('input[type="text"]').setAttribute('value', ++currentCount)
        }
      });
    });
  }
  
  function transferElement() {
    let buttonBooking = document.querySelectorAll('button[data-event="open-modal-booking"]'),
        formBooking = document.querySelector('.main-booking_form'),
        buttonModalBooking = document.querySelector('button[data-event="main-booking"]'),
        homeBookingWrap = document.querySelector('.booking-form_wrap');
  
    if (homeBookingWrap && window.innerWidth >= 850) {
      homeBookingWrap.append(formBooking);
    } else {
      document.querySelector('.mob-modal').append(formBooking);
    }
  
    if (window.innerWidth <= 850) {
      mobScreen = true;
  
      if (homeBookingWrap) {
        let buttonMainBooking = document.createElement('button');
    
        let buttonText = 'Забронювати <svg xmlns="http://www.w3.org/2000/svg" width="31" height="13" viewBox="0 0 31 13" fill="none"><use xlink:href="#arrow-right"></use></svg>';
      
        buttonMainBooking.classList.add('base-btn');
        buttonMainBooking.innerHTML = buttonText;
    
        homeBookingWrap.append(buttonMainBooking);
  
        buttonMainBooking.addEventListener('click', () => {
          document.querySelector('.modal-wrap').classList.toggle('active');
    
          setTimeout(() => {
            document.querySelector('.mob-modal').classList.toggle('active');
          }, 500);
        });
      }
  
      document.querySelector('.header-menu_modal').prepend(buttonBooking[0]);
  
      buttonBooking.forEach(button => {
        button.addEventListener('click', openMobBooking);
      });
    }
  };
  
  function openMobBooking() {
    document.querySelector('.modal-wrap').classList.toggle('active');
    
    setTimeout(() => {
      document.querySelector('.mob-modal').classList.toggle('active');
    }, 500);
  }
  
  function transferBackElement() {
    let buttonBooking = document.querySelectorAll('button[data-event="open-modal-booking"]'),
        formBooking = document.querySelector('.main-booking_form'),
        buttonMainBooking = document.querySelector('.booking-form_wrap > .base-btn'),
        homeBookingWrap = document.querySelector('.booking-form_wrap');
  
    if (window.innerWidth >= 850) {
      mobScreen = false;
  
  
      if (homeBookingWrap) {
        document.querySelector('.booking-form_wrap').append(formBooking);
      }
  
      if (buttonMainBooking) {
        buttonMainBooking.remove();
      }
  
      buttonBooking.forEach(button => {
        button.removeEventListener('click', openMobBooking);
      });
    
      document.querySelector('.header-booking_wrap').prepend(buttonBooking[0]);
    }
  };
});