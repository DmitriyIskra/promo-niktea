export default class RedrawVoucherSlider {
    constructor(sliderPath, slidesWrapper, pagContainer) {
        this.slider = null;
        this.sliderPath = sliderPath;
        this.slidesWrapper = slidesWrapper;
        this.pagContainer = pagContainer


        // стрелки пагинации
        this.voucherPaginationNext = this.pagContainer.querySelector('.pagination-next--check');
        this.voucherPaginationPrev = this.pagContainer.querySelector('.pagination-prev--check');
        // обертка списка пагинации
        this.paginationWrapper = this.pagContainer.querySelector('.account__pagination-list');

        this.activePagination = null;
        // Общее количество кликов
        this.counterPagination = 0;
        this.totalPagination = null;
        // количество кликов прежде чем сдвинуть
        this.counterPrev = 1;
        this.leftPositionPag = 1;

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
                this.leftArrowSl.classList.add('account__slider-check-arrow_active');
                this.voucherPaginationPrev.classList.add('account__pagination-arrow_active');
            }

            // когда дошли до крайнего элемента справа отключаем стрелку next
            if(+this.activePagination.textContent === this.totalPagination) {
                this.rightArrowSl.classList.remove('account__slider-check-arrow_active');
                this.voucherPaginationNext.classList.remove('account__pagination-arrow_active');
            }

            // this.slidesWrapper - 3 на сколько ббудет сдвинут слайдер 
            // this.counterPagination = this.slidesWrapper - 3
            const activeSl = this.slidesWrapper.querySelector('.swiper-slide-active');

            this.counterPrev += 1;

            if(+activeSl.getAttribute('num-slide') > 3 && this.counterPrev === 4) {
                // значение для счетчика сдвигов
                this.counterPagination = +activeSl.getAttribute('num-slide') - 3;
                const offset = widthItemVW * this.counterPagination;
                this.paginationWrapper.style = `transform: translateX(-${offset}vw)`;
                this.counterPrev = 3;

                // сохраняем крайнюю левую видимую часть пагинации
                this.leftPositionPag = +this.activePagination.textContent - 2;
            }
            
        });

        // сдвиг пагинации влево по клику на стрелку слайдера
        this.leftArrowSl.addEventListener('click', (e) => {
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

            // когда пагинация сдвинулась влево от крайнего справа
            // активного элемента включаем стрелку next
            if(+this.activePagination.textContent === this.totalPagination - 1) {
                this.rightArrowSl.classList.add('account__slider-check-arrow_active');
                this.voucherPaginationNext.classList.add('account__pagination-arrow_active');
            }

            // когда дошли до первого элемента выключаем стрелку prev
            if(+this.activePagination.textContent === 1) {
                this.leftArrowSl.classList.remove('account__slider-check-arrow_active');
                this.voucherPaginationPrev.classList.remove('account__pagination-arrow_active');
            }

            // доводим до состояния когда можно сдвигать влево - это 0
            this.counterPrev -= 1;

            // пока активный элемент не меньше или равен 1 сдвигаем
            if(+this.activePagination.textContent >= 1 && this.counterPrev === 0) {
                this.counterPagination -= 1;
                const offset = widthItemVW * this.counterPagination;
                this.paginationWrapper.style = `transform: translateX(-${offset}vw)`;
                this.counterPrev = 1;

                // сохраняем крайнюю левую видимую часть пагинации
                this.leftPositionPag = +this.activePagination.textContent;
            }
        });

    
        this.voucherPaginationNext.addEventListener('click', () => {
            this.rightArrowSl.click();
            this.offsetPaginationNext();
        })
    
        this.voucherPaginationPrev.addEventListener('click', () => {
            this.leftArrowSl.click();
            this.offsetPaginationPrev()
        })

        this.paginationWrapper.addEventListener('click', this.offsetNum);
    }

    addVoucher(arr) {
        let counter = 0;
        // создаем элемент
        const swiperSlide = this.pattern(arr[arr.length - 1], 0);
        // подставляем
        this.slidesWrapper.prepend(swiperSlide);
        // переопределяем нумерации
        [...this.slidesWrapper.children].forEach( el => {
            counter += 1;

            el.setAttribute('num-slide', counter);
        })
        // обновляем слайды
        this.updateSlider();
    }

    renderingVouchers(arr) {
        
        // для нумерации слайда
        let counter = arr.length + 1

        arr.forEach( el => {
            counter -= 1;

            const swiperSlide = this.pattern(el, counter);
            
            this.slidesWrapper.prepend(swiperSlide);
        });

    }

    pattern(el, counter) {
        const swiperSlide = document.createElement('div');
        swiperSlide.classList.add('swiper-slide');
        swiperSlide.classList.add('account__wr-slide-check');
        swiperSlide.setAttribute('num-slide', counter)

        const imgVoucher = document.createElement('img');
        imgVoucher.classList.add('account__img-check');
        imgVoucher.src = el.ticket_path;
        imgVoucher.alt = 'Чек';

        swiperSlide.append(imgVoucher);
        console.log('pattern')
        return swiperSlide;
    }

    updateSlider() {
        this.slider.updateSlides();
        console.log('update slides');
    }

    clearVoucher() {
        [...this.slidesWrapper.children].forEach( el => el.remove());
        console.log('clear voucher');
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
            this.leftArrowSl.classList.add('account__slider-check-arrow_active');
            this.voucherPaginationPrev.classList.add('account__pagination-arrow_active');
        }

        // когда дошли до крайнего элемента справа отключаем стрелку next
        if(+this.activePagination.textContent === this.totalPagination) {
            this.rightArrowSl.classList.remove('account__slider-check-arrow_active');
            this.voucherPaginationNext.classList.remove('account__pagination-arrow_active');
        }

        // 
        this.counterPrev += 1;

        // когда активный элемент больше 3 и на счет 4 сдвигаем пагинацию 
        if(+this.activePagination.textContent > 3 && this.counterPrev === 4) {
            this.counterPagination += 1;
            const offset = widthItemVW * this.counterPagination;
            this.paginationWrapper.style = `transform: translateX(-${offset}vw)`;

            this.counterPrev = 3;
            // сохраняем крайнюю левую видимую часть пагинации
            this.leftPositionPag = +this.activePagination.textContent - 2;
        }
    }

    offsetPaginationPrev() {
        
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
            this.rightArrowSl.classList.add('account__slider-check-arrow_active');
            this.voucherPaginationNext.classList.add('account__pagination-arrow_active');
        }

        // когда дошли до первого элемента выключаем стрелку prev
        if(+this.activePagination.textContent === 1) {
            this.leftArrowSl.classList.remove('account__slider-check-arrow_active');
            this.voucherPaginationPrev.classList.remove('account__pagination-arrow_active');
        }

        // доводим счетчик для состояния когда можно сдвигать
        this.counterPrev -= 1;

        // пока активный элемент не меньше или равен 3 и на счет 0 сдвигаем
        if(+this.activePagination.textContent >= 1 && this.counterPrev === 0) {
            this.counterPagination -= 1;
            const offset = widthItemVW * this.counterPagination;
            this.paginationWrapper.style = `transform: translateX(-${offset}vw)`;

            this.counterPrev = 1;
            // сохраняем крайнюю левую видимую часть пагинации
            this.leftPositionPag = +this.activePagination.textContent;
        }
    }

    // управление цифрами пагинации
    offsetNum(e) {
        if(e.target.closest('.swiper-pagination-bullet')) {
            this.activePagination = e.target.textContent;

            // сколько всего элементов пагинации
            this.totalPagination = this.paginationWrapper.children.length;
    
    
            // управление стрелками влево prev
            if(+this.activePagination > 1) {
                this.leftArrowSl.classList.add('account__slider-check-arrow_active');
                this.voucherPaginationPrev.classList.add('account__pagination-arrow_active');
            } else {
                this.leftArrowSl.classList.remove('account__slider-check-arrow_active');
                this.voucherPaginationPrev.classList.remove('account__pagination-arrow_active');
            }
    
            // управление стрелками вправо next
            if(+this.activePagination === this.totalPagination) {
                this.rightArrowSl.classList.remove('account__slider-check-arrow_active');
                this.voucherPaginationNext.classList.remove('account__pagination-arrow_active');
            } else {
                this.rightArrowSl.classList.add('account__slider-check-arrow_active');
                this.voucherPaginationNext.classList.add('account__pagination-arrow_active');
            }

            // расщитываем счетчик когда можно листать
            let num = +this.activePagination - this.leftPositionPag;
            this.counterPrev = 1 + num;
            console.log(this.counterPrev)
        }
    }

}