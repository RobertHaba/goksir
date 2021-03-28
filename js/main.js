(() => {
    const scrollShrinkNavbar = () => {
        let navbar = document.querySelector('#navbar')
        if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) {
            navbar.classList.add('scrolled-nav')
        } else {
            navbar.classList.remove('scrolled-nav')
        }
    }
    window.onscroll = () => {
        scrollShrinkNavbar()
    }
    const sliderPromotedPost = () => {
        let sliderContainer = document.querySelector('#sliderPromotedPost');
        let sliderItems = sliderContainer.children.length;
        let sliderWidth = '250' * sliderItems
        var cssAnimation = document.createElement('style');
        cssAnimation.type = 'text/css';
        var rules = document.createTextNode('@keyframes slider {' +
            'from { transform: translateX(0);}' +
            'to { transform: translateX(-' + sliderWidth / 2 + 'px); }' +
            '}');
        cssAnimation.appendChild(rules);
        document.getElementsByTagName("head")[0].appendChild(cssAnimation);
        sliderContainer.style.width = sliderWidth + 'px';
        sliderContainer.style.animation = "slider 12s linear infinite"
        sliderPromotedStop(sliderContainer)
        sliderPromotedStart(sliderContainer)
    }
    const sliderPromotedStop = (sliderContainer) => {
        let stopButton = document.querySelector('#promotedSliderStop')
        stopButton.addEventListener('click', function() {
            sliderContainer.style.animation = ''
        })
    }
    const sliderPromotedStart = (sliderContainer) => {
        let startButton = document.querySelector('#promotedSliderStart')
        startButton.addEventListener('click', function() {
            sliderContainer.style.animation = "slider 12s linear infinite"
        })
    }
    sliderPromotedPost()
    async function namedayPlugin() {
        let namedays = await namedayConnect()
        let namedayContainer = document.querySelector('#nameday');
        namedayContainer.innerText = namedays

    }
    async function namedayConnect() {
        let res = await fetch('https://api.abalin.net/today?country=pl')
            .then(response => response.json())
        let orginalRes = res.data.namedays.pl
        let shortRes = orginalRes.split(' ').slice(0, 3).join(' ');
        return shortRes
    }
    namedayPlugin()
    const findMiddleElementInEvents = () => {
        let eventsBox = document.querySelectorAll('.events-box');
        if (eventsBox.length != 0) {
            let middleEventBox = eventsBox[Math.round((eventsBox.length - 1) / 2)]
            middleEventBox.classList.add('events-box--big')
        }
    }
    findMiddleElementInEvents()
        // Carousel 
    let switcher
    const carousel = () => {
        let carousel = document.getElementById('carousel');
        if (carousel) {
            carouselInterval(carousel)
            carouselStart(carousel)
            carouselStop()
        }
    }
    const carouselInterval = (carousel) => {
        carouselStop()
        let speed = 7000; // 7 seconds
        let slides = carousel.querySelectorAll('.header-slide');
        switcher = setInterval(function() {
            switchSlide(slides);
        }, speed);
    }
    const carouselStop = () => {
        let pauseButton = document.querySelector('#carouselPause')
        pauseButton.addEventListener('click', () => {
            clearInterval(switcher)
        })
    }
    const carouselStart = (carousel, status) => {
        let startButton = document.querySelector('#carouselStart')
        startButton.addEventListener('click', () => {
            clearInterval(switcher)
            carouselInterval(carousel)
        })
    }

    function carouselHide(num, slides) {
        slides[num].setAttribute('data-state', '');

        slides[num].style.opacity = 0;
    }

    function carouselShow(num, slides) {
        slides[num].setAttribute('data-state', 'active');

        slides[num].style.opacity = 1;
    }

    function switchSlide(slides) {
        var nextSlide = 0;

        // Reset all slides
        for (var i = 0; i < slides.length; i++) {
            // If current slide is active & NOT equal to last slide then increment nextSlide
            if ((slides[i].getAttribute('data-state') == 'active') && (i !== (slides.length - 1))) {
                nextSlide = i + 1;
            }

            // Remove all active states & hide
            carouselHide(i, slides);
        }

        // Set next slide as active & show the next slide
        carouselShow(nextSlide, slides);
    }

    carousel()
        // Copy link script
    const copyPostLink = () => {
        let btn = document.querySelector('#btn-copy-link-post');
        if (btn) {
            btn.addEventListener('click', function() {
                copyToClipboard()
            })
        }
    }
    const getSiteURL = () => {
        return document.URL
    }
    const copyToClipboard = () => {
        let textToCopy = document.querySelector('#copyURL')
        textToCopy.value = getSiteURL()
        textToCopy.select();
        textToCopy.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }
    copyPostLink()
        //Share post

    const facebookShare = () => {
        let btn = document.querySelector('.button-social-post--facebook')
        if (btn) {
            btn.dataset.href = getSiteURL();
            window.fbAsyncInit = function() {
                FB.init({
                    appId: '287839232323097',
                    xfbml: true,
                    version: 'v2.5'
                });
            };
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            btn.addEventListener('click', function() {
                FB.ui({
                    method: 'share',
                    href: getSiteURL(),
                }, function(response) {});
            })
        }
    }
    facebookShare();
    /*// Gallery - Show image
    const galleryScript = () => {
        let gallerySite = document.querySelector('.single-gallery');
        if (gallerySite) {
            galleryClickOnImage()
            galleryNextSlide()
        }
    }
    const galleryClickOnImage = () => {
        let images = document.querySelectorAll('.gallery-slide-box');
        images.forEach(image => image.addEventListener('click', () => {
            changeGalleryMainImage(image)
            changeGallerySlidePosition(image)
        }))
    }
    const changeGalleryMainImage = (image) => {
        let mainImage = document.querySelectorAll('.header-image img')
        mainImage[0].src = image.querySelector('.gallery-slide-image').src
    }
    const changeGallerySlidePosition = (image) => {
        let sliderBox = document.querySelector('.gallery-image-preview-slider')
        let indexImage = Array.from(sliderBox.children).indexOf(image)
        sliderBox.style.marginLeft = -(290 * indexImage) + 'px'

    }
    const galleryNextSlide = () => {
        let buttonNext = document.querySelector('#galleryNextSlide');
        let buttonPrevious = document.querySelector('#galleryPreviousSlide');
        let sliderBox = document.querySelector('.gallery-image-preview-slider')
        buttonNext.addEventListener('click', () => {
            if (-(sliderBox.style.marginLeft.replace('px', '')) < (sliderBox.offsetWidth - 290)) {
                sliderBox.style.marginLeft = sliderBox.style.marginLeft.replace('px', '') - 290 + 'px';

            }
        })
        buttonPrevious.addEventListener('click', () => {
            if ((sliderBox.style.marginLeft.replace('px', '')) != 0) {

                sliderBox.style.marginLeft = (parseInt(sliderBox.style.marginLeft.replace('px', '')) + 290) + 'px';

            }
        })
    }
    galleryScript()
    */

    const hamburgerMenu = (isOpen) => {
        let navbarMenu = document.querySelector('.navbar__items')
        let layout = document.querySelector('.layout')
        if (isOpen) {
            navbarMenu.style.animation = ""
            layout.style.opacity = "0"
            navbarMenu.classList.add('navbar__items--full-size')
        } else {
            navbarMenu.style.animation = "closeMenu 0.6s ease-out"
            setTimeout(() => {
                layout.style.opacity = "1"
                navbarMenu.classList.remove('navbar__items--full-size')
            }, 600)
        }

    }
    const subMenu = (item) => {
        item.classList.toggle('mobile-menu-item-has-children')

    }
    const clickMenuEvent = () => {
        let menuHamburgerButton = document.querySelector('.menu-hamburger__button');
        let subMenuButtons = document.querySelectorAll('.menu-item-has-children')
        let isOpen = false
        menuHamburgerButton.addEventListener('click', () => {
            isOpen = (isOpen == false) ? true : false;
            hamburgerMenu(isOpen)
        })
        subMenuButtons.forEach(subMenuBtn => subMenuBtn.addEventListener('click', () => {
            subMenu(subMenuBtn)

        }))
    }
    clickMenuEvent()
    const currentCatItem = () => {
        let categories = document.querySelector('#categoriesList')
        if (categories != undefined) {
            let categoriesList = categories.children
            let addClassCurrent, firstCategoryItem
            firstCategoryItem = categoriesList[0]
            for (category of categoriesList) {
                if (category.classList.value.includes('current-cat') == true) {
                    addClassCurrent = ''
                } else if (firstCategoryItem == category) {
                    addClassCurrent = 'current-cat'
                }

            }
            firstCategoryItem = categoriesList[0]
            firstCategoryItem.classList.add(addClassCurrent)

        }
    }
    currentCatItem()
    const flyOutMenu = () => {
        var menuItems = document.querySelectorAll('.navbar .menu-item-has-children');
        Array.prototype.forEach.call(menuItems, function(el, i) {
            var activatingA = el.querySelector('a');
            var btn = '<button aria-label="Rozwiń menu dla ' + activatingA.text + '" aria-expanded="true" ><span><span class="visuallyhidden">Zobacz menu dla “' + activatingA.text + '”</span></span></button>';
            activatingA.insertAdjacentHTML('afterend', btn);
            el.querySelector('button').addEventListener("click", function(event) {
                if (this.parentNode.classList.contains('menu-item-has-children--focus') !== true) {
                    menuItems.forEach((element) => {
                        element.classList.remove('menu-item-has-children--focus')
                    })
                    this.parentNode.classList.add('menu-item-has-children--focus')
                    this.parentNode.querySelector('a').setAttribute('aria-expanded', "true");
                    console.log(this.parentNode.querySelector('button'));
                    this.parentNode.querySelector('button').setAttribute('aria-expanded', "true");
                } else {
                    console.log('asda');
                    this.parentNode.classList.remove('menu-item-has-children--focus')
                    this.parentNode.querySelector('a').setAttribute('aria-expanded', "false");
                    this.parentNode.querySelector('button').setAttribute('aria-expanded', "false");
                }
                event.preventDefault();
            });
        });
        //Escape close event
        document.addEventListener('keydown', (el) => {
            if (el.keyCode == "27") {
                menuItems.forEach((element) => {
                    element.classList.remove('menu-item-has-children--focus')
                })
            }
        })
    }
    flyOutMenu()

})()