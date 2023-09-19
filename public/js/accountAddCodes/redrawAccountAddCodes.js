
export default class RedrawAccountAddCodes {
    constructor(element) {
        this.element = element;
        this.addButton = this.element.querySelector('.code__add');
        this.submitButton = this.element.querySelector('.code__submit');
        this.codeSlider = this.element.querySelector('.code__slider');
        this.slideWrapper = this.element.querySelector('.swiper-wrapper');
        this.typeCode = this.element.querySelector('.code__input__field--account');
        this.invalidCode = this.element.querySelector('.invalid-feedback');
        this.addFile = this.element.querySelector('.file-upload__input--user');
        this.addFileLabel = this.element.querySelector('.file-upload__label');
        this.textFileValid = this.element.querySelector('.account__file_valid');
        this.textFileInvalid = this.element.querySelector('.account__file_invalid');
        this.limitCodesToday = this.element.querySelector('.code__count');

        // Отметим активен ли слайдер
        this.activeSlider = null;
        // массив добавленных кодов
        this.arrCodes = new Set();
        // для файла
        this.storageFile = null;
        // Выражение для проверки файла
        this.regExpFile = /(\/jpg|\/jpeg|\/bmp|\/png|\/gif|\/svg|\/webp)$/g;
        // значение валидности или не валидности кода (true или false)
        this.isValidCode = null;
        // сам свайпер
        this.swiperCode = null;
        // инициализация свайпера
        this.initSwiper = null;
    }

    // показываем поле для отображения введенных кодов
    // и последующим действием добавляем коды
    showSlider(value) {
        // если пользователь не ввел код или исчерпан лимит или код не валиден
        //  и пытается нажать плюс даже не ткрываем поле для показа
        if(!value || !this.isValidCode || +sessionStorage.todayCodesActivated >= 15) {
            this.showInvalidCode();
            return;
        }
        // если поле активно ничего не делаем (заново не переопределяем класс)
        if(this.activeSlider) return;

        // активируем поле для отображения кодов
        this.activeSlider = true;
        this.codeSlider.classList.add('code__sleder--display');
    }

    // сохраняем введенные коды
    addCode(code) {
        // если код не введен ничего не делаем
        if(!code) return;
        
        // колличество кодов уже добавленных сегодня
        // и колличество новых (сумма)
        const totalCodes = +sessionStorage.todayCodesActivated + this.arrCodes.length;
        // если кодов в массиве 15 дальше ничего не делаем
        if(totalCodes >= 15) return;
        // если код не валиден
        if(!this.isValidCode) {
            this.showInvalidCode();
            return;
        }

        // добавляем код в массив
        this.arrCodes.add(code);
        console.log('массив кодов', this.arrCodes)
        // добавляем код в поле для отображения
        this.addCodeInPlace(code); 

        // очищаем поле ввода
        this.typeCode.value = '';
    }
    
    // отрисовываем введенные коды
    addCodeInPlace(code) {
        const swSlide = document.createElement('div');
        swSlide.classList.add('swiper-slide');

        const swSlideCode = document.createElement('span');
        swSlideCode.classList.add('code__text');
        swSlideCode.textContent = code;

        swSlide.append(swSlideCode);
        this.slideWrapper.prepend(swSlide);



        if(!this.initSwiper) {
            this.swiperCode = new Swiper(".account__slider-add-code", {
                grabCursor: true,
                // keyboard: true, 
                slidesPerView: 1,
                spaceBetween: 2,
                loop: true,
                centeredSlides: true,
                slideShadows: true,
                simulateTouch: false,
                navigation: {
                    nextEl: ".code__carousel-next",
                    prevEl: ".code__carousel-prev",
                },
                breakpoints: {
                    992: {
                        // centeredSlides: true,
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 0
                    },
                    300: {
                        // with: 200,
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                },
        
            });
        }
        
        this.swiperCode.updateSlides();
        
        this.initSwiper = true;

        console.log('code added to place')
    }
    
    // вешаем класс invalid на элемент показывающий не валидность, но если его нет
    showInvalidCode() {
        if(!this.invalidCode.closest('.invalid-feedback_active')) {
            this.invalidCode.classList.add('invalid-feedback_active');
            this.typeCode.style = 'color: red;';
        }
    }
    // снимаем класс с элемента показывающего невалидность если он есть, но если он есть
    hideInvalidCode() {
        if(this.invalidCode.closest('.invalid-feedback_active')) {
            this.invalidCode.classList.remove('invalid-feedback_active');
            this.typeCode.style = 'color: #463E57;'
        }
    }


    // сохраняем файл 
    saveFile(file) {
        if(!file) return;

        const result = this.validateFile(file.type, file.size);

        // не прошел валидацию, показываем пользователю информацию
        if(!result) {
            this.infoAboutUpload(this.textFileInvalid);
            console.log('error upload file');
            return;
        }

        // файл загружен валиден показываем пользователю информацию
        this.storageFile = file;
        this.infoAboutUpload(this.textFileValid);

    }
    // валидируем файл
    validateFile(type, size) { // 102400
        const typeRes = this.regExpFile.test(type);
        const sizeRes = size <= 104857600

        const result = typeRes && sizeRes ? true : false;

        return result;
    }
    // показываем или скрываем результат загрузки файла
    // метод несет двойное назначение
    infoAboutUpload(element) {
        console.log('work')
        // для снятия активности при отправке
        if(this.textFileInvalid.matches('.account__file-result_active')) {
            this.textFileInvalid.classList.remove('account__file-result_active');
            return;
        }

        if(this.textFileValid.matches('.account__file-result_active')) {
            this.textFileValid.classList.remove('account__file-result_active');
            return;
        }

        // показываем информацию о результате загрузки пользователю
        if(element) element.classList.add('account__file-result_active');
    }

    updateLimitCodes(amount) {
        this.limitCodesToday.textContent = 15 - amount;
    }

    renderActiveCodes(data) {
        const codeList = document.querySelector('.code__list');
        const contCodePag = document.querySelector('.account__pag-num');
        const pagCodePrev = document.querySelector('.account__pag-code_prev');
        const pagCodeNext = document.querySelector('.account__pag-code_next');

        [...codeList.children].forEach( el => el.remove());
        [...contCodePag.children].forEach( el => el.remove());
        pagCodePrev.classList.remove('account__pag-code-arrow_active');
        pagCodeNext.classList.remove('account__pag-code-arrow_active');
    
        const windowWidth = window.innerWidth;

        const codeWinners = [];
        const restCodes = [];

        data.activated_codes.forEach( el => {
        if(el.code_main_win === 1 || el.code_tea_win === 1) {
            codeWinners.unshift(el);
        } else {
            restCodes.unshift(el);
        }
        })

        console.log(codeWinners)
        console.log(restCodes)

        // Заполнение кодов

        // Заполняем выигрышные коды
        if(codeWinners.length !== 0) {
        
            codeWinners.forEach( el => {
            
            const codeItem = document.createElement('li');
            codeItem.classList.add('code__item');
            codeItem.classList.add('code__item_win');
            
            // начало левой части
            const wrCodeAndWin = document.createElement('div');
            wrCodeAndWin.classList.add('account__wr-code-and-win');
            
            const wrValue = document.createElement('div');
            wrValue.classList.add('account__wr-value-code');
            const codeWinTextMobile = document.createElement('div');
            codeWinTextMobile.classList.add('account__code-win-text_mobile');
            codeWinTextMobile.textContent = 'ВЫ ВЫИГРАЛИ!';
            const codeValue = document.createElement('div');
            codeValue.classList.add('code__value');
            codeValue.textContent = el.code_string;
            wrValue.append(codeWinTextMobile);
            wrValue.append(codeValue);
            
            const wrTextIconWin = document.createElement('div');
            wrTextIconWin.classList.add('account__wr-text-icon-win');
            const iconWin = document.createElement('div');
            iconWin.classList.add('account__icon-win');
            if(el.code_main_win === 1) iconWin.classList.add('account__icon-win_main');
            if(el.code_tea_win === 1) iconWin.classList.add('account__icon-win_tea');
            const codeWinTextDesc = document.createElement('div');
            codeWinTextDesc.classList.add('account__code-win-text_desctop');
            codeWinTextDesc.textContent = 'ВЫ ВЫИГРАЛИ!';
            wrTextIconWin.append(iconWin);
            wrTextIconWin.append(codeWinTextDesc);
            
            wrCodeAndWin.append(wrValue);
            wrCodeAndWin.append(wrTextIconWin);
            // конец левой части
    
            const codeDate = document.createElement('div');
            const dateArr = el.created_time.split(' ')
            codeDate.textContent = dateArr[0];
            codeDate.classList.add('code__date');
        
            codeItem.append(wrCodeAndWin);
            codeItem.append(codeDate);
        
            
            codeList.append(codeItem);
            })
        }
    
        // Заполняем не выигрышные коды
        if(restCodes.length !== 0) {
            // количество кодов уже добавленных 
            const amountCodes = codeList.children.length;
            // счетчик видимых кодов (сколько еще можно оставить видимыми)
            // показываем максимум 14 кодов
            let counter = 0 + amountCodes;
    
            restCodes.forEach( el => {
            counter += 1;
    
            const codeItem = document.createElement('li');
            codeItem.classList.add('code__item');
            const codeValue = document.createElement('span');
            codeValue.classList.add('code__value');
            codeValue.textContent = el.code_string;
            const codeDate = document.createElement('span');
            const dateArr = el.created_time.split(' ')
            codeDate.textContent = dateArr[0];
            codeDate.classList.add('code__date');
    
            codeItem.append(codeValue);
            codeItem.append(codeDate);
    
            // если соответствующий экран и сообщений в массиве больше чем разрешено
            // остальные скрываем
            if(windowWidth > 428 && counter > 14) {
                codeItem.classList.add('account__codeHide');
            }
    
            if(windowWidth <= 428 && counter > 6) {
                codeItem.classList.add('account__codeHide');
            }
    
            codeList.append(codeItem);
            });
        }
    
        // активируем пагинацию
        if(windowWidth > 428 && data.activated_codes.length > 14) {
            pagCodeNext.classList.add('account__pag-code-arrow_active');
    
            const amountPagPages = Math.ceil(data.activated_codes.length / 14);
            
            const wrPagSlides = document.createElement('ul');
            wrPagSlides.classList.add('account__wr-code-pag-list');
    
            for(let i = 1; i <= amountPagPages; i += 1) {
            const pagSlideItem = document.createElement('li');
            pagSlideItem.classList.add('account__code-pag-item');
            const numPage = document.createElement('div');
            numPage.classList.add('account__code-pag-num-page');
            if( i === 1 ) numPage.classList.add('account__code-pag-num-page_active');
            numPage.textContent = i;
            pagSlideItem.append(numPage);
    
            wrPagSlides.append(pagSlideItem);
            }
    
        
            contCodePag.append(wrPagSlides); 
    
        }
            
    
        
    
        // активируем пагинацию для мобильного устройства
        if(windowWidth <= 428 && data.activated_codes.length > 6) {
            pagCodeNext.classList.add('account__pag-code-arrow_active');
    
            const amountPagPages = Math.ceil(data.activated_codes.length / 14);
            
            const wrPagSlides = document.createElement('ul');
            wrPagSlides.classList.add('account__wr-code-pag-list');
    
            for(let i = 1; i <= amountPagPages; i += 1) {
            const pagSlideItem = document.createElement('li');
            pagSlideItem.classList.add('account__code-pag-item');
            const numPage = document.createElement('div');
            numPage.classList.add('account__code-pag-num-page');
            if( i === 1 ) numPage.classList.add('account__code-pag-num-page_active');
            numPage.textContent = i;
            pagSlideItem.append(numPage);
    
            wrPagSlides.append(pagSlideItem);
            }
    
        
            contCodePag.append(wrPagSlides);
        }
        
        // обновляем количество уже зарегистрированных кодов за сегодня
        sessionStorage.todayCodesActivated = data.today_activated_codes[0].activated_today;

    }

    clearData() {
        this.arrCodes.clear();

        this.storageFile = null;

        this.codeSlider.classList.remove('code__sleder--display');

        this.textFileValid
        this.textFileInvalid

        this.textFileValid.classList.remove('account__file-result_active');
        this.textFileInvalid.classList.remove('account__file-result_active');
    }

    
}

// Нажав на плюс 
// 1. Поле ввода пустое получим ошибку
// 2. Начнем вводить текст ошибка исчезнет
// 3. поле отрисовки откроется только если в поле ввода что то есть 
//    и в поле отрисовки после этого попадет код
// 4. если кодов было введено 15 то больше не получится