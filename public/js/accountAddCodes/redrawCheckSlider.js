export default class RedrawCheckSlider {
    constructor(sliderPath, slidesWrapper, pagContainer) {
        this.slider = null;
        this.sliderPath = sliderPath;
        this.slidesWrapper = slidesWrapper;
        this.pagContainer = pagContainer


        // стрелки пагинации
        this.checkPaginationNext = this.pagContainer.querySelector('.pagination-next--check');
        this.checkPaginationPrev = this.pagContainer.querySelector('.pagination-prev--check');
        // обертка списка пагинации
        this.paginationWrapper = this.pagContainer.querySelector('.account__pagination-list');

        this.activePagination = null;
        // Общее количество кликов
        this.counterPagination = 0;
        this.totalPagination = null;
        // количество кликов прежде чем сдвинуть
        this.counterPrev = 0;

        this.offsetNum = this.offsetNum.bind(this);
        this.offsetPaginationNext = this.offsetPaginationNext.bind(this);
        this.offsetPaginationPrev = this.offsetPaginationPrev.bind(this);
    }

    initSlider() {
        this.slider = new Swiper(this.sliderPath, {
            // grabCursor: true,
            // keyboard: true,
            slidesPerView: 3,
            spaceBetween: 10,
            // loop: true,
            slideShadows: true,
            // отменили перетаскивание на ПК
            simulateTouch: false,
            navigation: {
                nextEl: ".slider-button-next",
                prevEl: ".slider-button-prev",
            },
    
            pagination: {
                el: ".account__pagination-list",
                type: "bullets",
                // динамические булеты
                // dynamicBullets: true,
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },
    
            // медиа запросы min-width
            breakpoints: {
                1920: {
                    slidesPerView: 3,
                    // spaceBetween: 15,
                },
                1536: {
                    slidesPerView: 2,
                    // spaceBetween: 15,
                },
                1280: {
                    slidesPerView: 1,
                    // spaceBetween: 15,
                },
                768: {
                    // width: 940,
                    slidesPerView: 3,
                    // spaceBetween: 5,
                },
                // 540: {
                //   slidesPerView: 1,
                //   // spaceBetween: 0,
                // },
                300: {
                    slidesPerView: 1,
                    // spaceBetween: 5,
                },
            }
        });
    
        this.registerEvents();
        
    }

    registerEvents() {
        this.rightArrowSl = document.querySelector('.slider-button-next');
        this.leftArrowSl = document.querySelector('.slider-button-prev');


        // сдвиг пагинации вправо по клику на стрелку слайдера
        this.rightArrowSl.addEventListener('click', (e) => {
            if(!e.isTrusted) return;
            // сколько всего элементов пагинации
            this.totalPagination = this.paginationWrapper.children.length;

            // ширина элементов пагинации в пикселях
            const widthItemPX = this.paginationWrapper.children[0].offsetWidth;
            const widthWindow = window.innerWidth;

            // ширина элементов пагинации во вьпортах
            const widthItemVW = widthItemPX / widthWindow * 100;

            // активный элемент пагинации
            this.activePagination = this.paginationWrapper.querySelector('.swiper-pagination-bullet-active');

            // когда пагинация сдвинулась включаем стрелку prev
            if(+this.activePagination.textContent === 2) {
                this.checkPaginationPrev.classList.add('account__pagination-arrow_active');
            }

            // когда дошли до крайнего элемента справа отключаем стрелку next
            if(+this.activePagination.textContent === this.totalPagination) {
                this.checkPaginationNext.classList.remove('account__pagination-arrow_active');
            }

            // this.slidesWrapper - 3 на сколько ббудет сдвинут слайдер 
            // this.counterPagination = this.slidesWrapper - 3
            const activeSl = this.slidesWrapper.querySelector('.swiper-slide-active');
            console.log('active slide', +activeSl.getAttribute('num-slide'))
            if(+activeSl.getAttribute('num-slide') > 3) {
                // значение для счетчика сдвигов
                this.counterPagination = +activeSl.getAttribute('num-slide') - 3;
                const offset = widthItemVW * this.counterPagination;
                this.paginationWrapper.style = `transform: translateX(-${offset}vw)`;
                this.counterPrev = 3;
                console.log('count pag next sl', this.counterPagination)
            }
            
        });

        // сдвиг пагинации влево по клику на стрелку слайдера
        this.leftArrowSl.addEventListener('click', (e) => {
            if(!e.isTrusted) return;
        });

        // l.addEventListener
    
        this.checkPaginationNext.addEventListener('click', () => {
            this.rightArrowSl.click();
            this.offsetPaginationNext();
        })
    
        this.checkPaginationPrev.addEventListener('click', () => {
            this.leftArrowSl.click();
            this.offsetPaginationPrev()
        })

        this.paginationWrapper.addEventListener('click', this.offsetNum);
    }

    addCheck(check) {

    }

    offsetPaginationNext() {
        // сколько всего элементов пагинации
        this.totalPagination = this.paginationWrapper.children.length;

        // ширина элементов пагинации в пикселях
        const widthItemPX = this.paginationWrapper.children[0].offsetWidth;
        const widthWindow = window.innerWidth;

        // ширина элементов пагинации во вьпортах
        const widthItemVW = widthItemPX / widthWindow * 100;

        // активный элемент пагинации
        this.activePagination = this.paginationWrapper.querySelector('.swiper-pagination-bullet-active');

        // когда пагинация сдвинулась включаем стрелку prev
        if(+this.activePagination.textContent === 2) {
            this.checkPaginationPrev.classList.add('account__pagination-arrow_active');
        }

        // когда дошли до крайнего элемента справа отключаем стрелку next
        if(+this.activePagination.textContent === this.totalPagination) {
            this.checkPaginationNext.classList.remove('account__pagination-arrow_active');
        }

        // когда активный элемент больше 3 сдвигаем пагинацию
        if(+this.activePagination.textContent > 3) {
            this.counterPagination += 1;
            const offset = widthItemVW * this.counterPagination;
            this.paginationWrapper.style = `transform: translateX(-${offset}vw)`;
            this.counterPrev = 3;
            console.log('countPag next', this.counterPagination)
        }
    }

    offsetPaginationPrev() {
        // доводим счетчик для состояния когда можно сдвигать
        if(this.counterPrev > 0) this.counterPrev -= 1;

        // сколько всего элементов пагинации
        this.totalPagination = this.paginationWrapper.children.length;

        // ширина элементов пагинации в пикселях
        const widthItemPX = this.paginationWrapper.children[0].offsetWidth;
        const widthWindow = window.innerWidth;

        // ширина элементов пагинации во вьпортах
        const widthItemVW = widthItemPX / widthWindow * 100;

        // активный элемент пагинации
        this.activePagination = this.paginationWrapper.querySelector('.swiper-pagination-bullet-active');

        // когда пагинация сдвинулась влево от крайнего справа
        // активного элемента включаем стрелку next
        if(+this.activePagination.textContent === this.totalPagination - 1) {
            this.checkPaginationNext.classList.add('account__pagination-arrow_active');
        }

        // когда дошли до первого элемента выключаем стрелку prev
        if(+this.activePagination.textContent === 1) {
            this.checkPaginationPrev.classList.remove('account__pagination-arrow_active');
        }

        // когда активная позиция равна 3 "обнуляем счетчик"
        if(+this.activePagination === 1) this.counterPrev = 3;

        console.log("counter prev", this.counterPrev)
        console.log('counter pag prev')
        // пока активный элемент не меньше или равен 3 сдвигаем
        if(+this.activePagination.textContent >= 1 && this.counterPrev === 0) {
            this.counterPagination -= 1;
            const offset = widthItemVW * this.counterPagination;
            this.paginationWrapper.style = `transform: translateX(-${offset}vw)`;
            console.log("pag num", this.counterPagination)
            console.log('active pag', this.activePagination)
        }
    }

    offsetNum(e) {
    
    }

    renderingChecks(arr) {
        console.log(arr)
        let counter = arr.length + 1
        // this.slidesWrapper
        arr.forEach( el => {
            counter -= 1
            const swiperSlide = document.createElement('div');
            swiperSlide.classList.add('swiper-slide');
            swiperSlide.classList.add('account__wr-slide-check');
            swiperSlide.setAttribute('num-slide', counter)

            const imgCheck = document.createElement('img');
            imgCheck.classList.add('account__img-check');
            imgCheck.src = el.ticket_path;
            imgCheck.alt = 'Чек';

            swiperSlide.append(imgCheck);
            this.slidesWrapper.prepend(swiperSlide);
        });

        this.updateSlider();
    }

    updateSlider() {
        this.slider.updateSlides();
    }
}