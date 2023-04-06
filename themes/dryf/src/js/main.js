'use strict'

$(document).ready(function () {
    const swiper = new Swiper('.main-slider', {
        slidesPerView: 1,
        direction: 'horizontal',
        loop: false,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    formTab();
    moreCities();
    copyArticleLink();
    openModal();
    jobReminder();
    openMobileMenu();
    /*showSortDropdown();*/

    $('select').select2({
        minimumResultsForSearch: 10
    });

    const swiperTeam = new Swiper('.employee-slider', {
        slidesPerView: 1.6,
        direction: 'horizontal',
        spaceBetween: 20,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            520: {
                slidesPerView: 2,
            },
            675: {
                slidesPerView: 3,
            },
            880: {
                slidesPerView: 4,
            },
            1027: {
                slidesPerView: 5,
                spaceBetween: 25
            }
        }
    });
    
    const swiperFavorite_job = new Swiper('.favorite-job-slider', {
        slidesPerView: 1.6,
        direction: 'horizontal',
        spaceBetween: 25,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            520: {
                slidesPerView: 2,
            },
            580: {
                slidesPerView: 3,
            },
            880: {
                slidesPerView: 4,
            },
            1027: {
                slidesPerView: 5,
                spaceBetween: 25
            }
        }
    });
    const swiperFeedback = new Swiper('.feedback-slider', {
        slidesPerView: 1.3,
        direction: 'horizontal',
        spaceBetween: 20,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            620: {
                slidesPerView: 2,
            },
            1027: {
                slidesPerView: 3,
                spaceBetween: 29
            }
        }
    });
    const swiperPopular_job = new Swiper('.popular-job-slider', {
        slidesPerView: 1.3,
        direction: 'horizontal',
        spaceBetween: 25,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            620: {
                slidesPerView: 2,
            },
            1027: {
                slidesPerView: 3,
                spaceBetween: 25
            }
        }
    });

    readMoreFeedback();
});

let formTab = function() {
    const tabs = document.querySelectorAll('.form-tab');
    let messageItem = document.querySelectorAll('.messenger-item');
    
    if (tabs.length) {
        tabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                let index = e.currentTarget.getAttribute('data-tab');
                let currentTabs = e.currentTarget.parentElement.closest('.form-tabs').querySelectorAll('.form-tab');
                let tabsContent = e.currentTarget.parentElement.closest('.form-tabs').querySelectorAll('.form-content');
                let tabsImage = e.currentTarget.parentElement.closest('.cta-container').querySelectorAll('.cta-form-image');

                currentTabs.forEach(tab => tab.classList.remove('active'));
    
                tabsContent.forEach(tab => tab.classList.remove('show'));
                tabsImage.forEach(tab => tab.classList.remove('show'));

                setTimeout(() => {
                    tabsContent.forEach(tab => tab.classList.remove('tab_content-display'));
                    tabsImage.forEach(tab => tab.classList.remove('tab_content-display'));
                }, 400);
    
                e.currentTarget.classList.add('active');
    
                index != 0 ? e.currentTarget.parentElement.classList.add('change') : e.currentTarget.parentElement.classList.remove('change');
    
                tabsContent[index].classList.add('tab_content-display');
                tabsImage[index].classList.add('tab_content-display');
    
                setTimeout(() => {
                    tabsContent[index].classList.add('show');
                    tabsImage[index].classList.add('show');
                }, 100);
            });
        });

        messageItem.forEach(item => {
            item.addEventListener('click', (e) => {
                let messageInput = e.currentTarget.parentElement.closest('form').querySelector('input[name="your-message"]');

                messageInput.setAttribute('value', e.currentTarget.innerText);

                e.currentTarget.parentElement.querySelectorAll('.messenger-item').forEach(item => item.classList.remove('active'));

                e.currentTarget.classList.add('active');
            });
        });
    }
}

const moreCities = function() {
    const citiesParent = document.querySelectorAll('.popular-job-block');

    if (citiesParent.length) {
        citiesParent.forEach(parent => {
            let citiesList = parent.querySelectorAll('.city');

            if (window.screen.width >= 675) {
                if (citiesList.length > 3) {
                    for (let i = 3; i < citiesList.length; i++) {
                        citiesList[i].style.display = 'none';
                    }
    
                    if (citiesList.length - 3 > 1) {
                        parent.querySelector('.default').style.display = 'block';
                        parent.querySelector('.default').innerText = `+${citiesList.length - 3} ${parent.querySelector('.default').innerText}`;
                    } else {
                        parent.querySelector('.one').style.display = 'block';
                        parent.querySelector('.one').innerText = `+${citiesList.length - 3} ${parent.querySelector('.one').innerText}`;
                    }
                }
            } else {
                if (citiesList.length > 1) {
                    for (let i = 1; i < citiesList.length; i++) {
                        citiesList[i].style.display = 'none';
                    }
    
                    if (citiesList.length - 1 > 1) {
                        parent.querySelector('.default').style.display = 'block';
                        parent.querySelector('.default').innerText = `+${citiesList.length - 1} ${parent.querySelector('.default').innerText}`;
                    } else {
                        parent.querySelector('.one').style.display = 'block';
                        parent.querySelector('.one').innerText = `+${citiesList.length - 1} ${parent.querySelector('.one').innerText}`;
                    }
                }
            }

        });
    }
};

const readMoreFeedback = function() {
    let feedbackContent = document.querySelectorAll('.feedback-content');

    if (feedbackContent.length) {
        feedbackContent.forEach(item => {
            setTimeout(() => {
                if (item.offsetHeight > 180) {
                    item.querySelector('p').style.height = '160px';
                    item.querySelector('.read-more').style.display = 'block';
    
                    item.querySelector('.read-more').addEventListener('click', (e) => {
                        item.querySelector('p').style.height = '100%';
                        e.currentTarget.style.display = 'none';
                    });
                }
            }, 1500);
        })
    }
}

const copyArticleLink = function() {
    const copyButton = document.querySelector('.copy-article');
    let link = window.location.href;

    if (copyButton) {
        copyButton.addEventListener('click', () => {
            console.log(link);

            if (window.isSecureContext && navigator.clipboard) {
                navigator.clipboard.writeText(link);
            } else {
                unsecuredCopyToClipboard(link);
            }
            copyButton.classList.add('active');
        });
    }
} 

let openModal = function() {
    const modalButton = document.querySelector('button[data-event="call"]'),
            modalClose = document.querySelector('.close-modal'),
            modalWrap = document.querySelector('.form-modal_wrap');

    modalButton.addEventListener('click', () => {
        modalWrap.classList.add('show');
    });

    modalClose.addEventListener('click', () => {
        modalWrap.classList.remove('show');
    });

    modalWrap.addEventListener('click', (e) => {
        e.target == e.currentTarget ? modalWrap.classList.remove('show') : null;
    });
}

let jobReminder = function() {
    const reminderModal = document.querySelector('.remainder-jobs_modal');
    
    if (reminderModal) {
        let countElement = reminderModal.querySelector('.remainder-count span'),
            reminderClose = document.querySelector('.remainder-close');

        let vacancyCount;
        let time;
        let newVacancyCount;

        let storageData = sessionStorage.getItem(reminderModal.getAttribute('data-id'));

        if (storageData) {

            time = Math.random() * (25000 - 5000 + 1) + 5000;
            vacancyCount = sessionStorage.getItem(reminderModal.getAttribute('data-id'));
        } else {

            time = Math.random() * (5000 - 3000 + 1) + 3000;

            vacancyCount = Math.floor(Math.random() * (30 - 17 + 1) + 17);

            sessionStorage.setItem(reminderModal.getAttribute('data-id'), vacancyCount);
        }

        if (vacancyCount > 4) {
            setTimeout(() => {
                reminderModal.classList.add('show');
                
                countElement.innerText = vacancyCount;
                
                newVacancyCount = vacancyCount - Math.floor(Math.random() * (6 - 3 + 1) + 3);

                vacancyCount = newVacancyCount;

                /*switch (true) {
                    case vacancyCount < 30 && vacancyCount >= 25 :
                        vacancyCount = Math.floor(Math.random() * (25 - 20 + 1) + 20);
                        break;
                    case vacancyCount < 25 && vacancyCount >= 20 :
                        vacancyCount = Math.floor(Math.random() * (20 - 15 + 1) + 15);
                        break;
                    case vacancyCount < 20 && vacancyCount >= 15 :
                        vacancyCount = Math.floor(Math.random() * (15 - 10 + 1) + 10);
                        break;
                    case vacancyCount < 15 && vacancyCount >= 10 :
                        vacancyCount =  Math.floor(Math.random() * (10 - 5 + 1) + 5);
                        break;
                    default :
                        vacancyCount = Math.floor(Math.random() * (5 - 3 + 1) + 3);
                        break;
                }*/

                sessionStorage.setItem(reminderModal.getAttribute('data-id'), vacancyCount);

                jobReminder();

                if (reminderModal.classList.contains('show')) {
                    setTimeout(() => {
                        reminderModal.classList.remove('show');
                    }, 4500);
                }
            }, time);
        } else {
            vacancyCount = Math.floor(Math.random() * (4 - 1 + 1) + 1);
            reminderModal.classList.add('show');
            countElement.innerText = vacancyCount;
        };

        reminderClose.addEventListener('click', () => {
            reminderModal.classList.remove('show');
        })
    }
}

let openMobileMenu = function() {
    const menuButton = document.querySelector('.mobile-menu_button'),
            mobileMenu = document.querySelector('.side-bar');

    menuButton.addEventListener('click', () => {
        menuButton.classList.toggle('active');
        mobileMenu.classList.toggle('active');
        document.querySelector('body').classList.toggle('overflow');
    });


    document.querySelector('body').addEventListener('click', (e) => {
        if (e.target.contains(mobileMenu) && e.target !== mobileMenu || e.target.contains(menuButton) && e.target !== menuButton) {
            menuButton.classList.remove('active');
            mobileMenu.classList.remove('active');
            document.querySelector('body').classList.remove('overflow');
        }
    });
}

/*const showSortDropdown = function() {
    let sortBtn = document.querySelector('.classify-btn'),
        sortDropdown = document.querySelector('#sort-form');

    if (sortBtn) {
        sortBtn.addEventListener('click', (e) => {
            e.currentTarget.classList.toggle('active');
            sortDropdown.classList.toggle('show');
        });
    }
}*/

/*function addUtmTarget(...inputNames) {
    let forms = document.querySelectorAll('form');
    let url = window.location.toString().replaceAll("_", "|");
    forms.forEach(form => {
        inputNames.forEach(inputName => {
            if (inputName == 'url') {
                let urlInput = form.querySelector('input[name="url"]');
                if (urlInput) {
                    urlInput.setAttribute('value', url);
                }
                return;
            }
            let inputField = form.querySelector('input[name=' + inputName + ']');
            if (inputField) {
                let sourceValue = inputField.getAttribute('value').toString().replaceAll("_", "|");
                inputField.setAttribute('value', sourceValue);
            }
        });
    })
}
addUtmTarget("utm_source", "utm_medium", "url");*/