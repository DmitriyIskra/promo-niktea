export default class RedrawActiveCodes {
    constructor(codeList, wrPag, pagContainer, pagItemsList) {
        this.codeList = codeList;
        this.codeItems = this.codeList.querySelectorAll('.code__item');
        // для понимания открыто на десктопе или мобилке 14 или 6
        this.widthScreen = window.innerWidth;

        this.wrPag = wrPag;
        this.pagContainer = pagContainer;
        this.pagItemsList = pagItemsList;
        this.pagPrev = this.wrPag.querySelector('.account__pag-code_prev');
        this.pagItems = this.wrPag.querySelectorAll('.account__code-pag-num-page');
        this.pagNext = this.wrPag.querySelector('.account__pag-code_next');

        // активный элемент с номером страницы
        this.activePage = this.pagItems[0];
        // номер активной страницы
        this.activeNumPage = 1;

        // счетчик для сдвига слайдера
        this.slideMaxOffset = null;
        this.slideCounter = 0;
        // Ширина элемента пагинации с цифрой
        this.widthPagItem = null;
        // Крайний левый элемент
        this.LestLeftEl = 1;

        

        // - тест переключения стрелками после добавления новых кодов и страниц

        // 0. ! Работать будет только по стрелкам, визуализиирует сдвиг цифр
        // 1. ! Определить max-width контейнера по ширине li * 3
        // 2. ! Сделать каунтер   активная страница - 3, по нему считать количество сдвигов слайдера
        // 3. ! Ширина ul тоже по ширине li * на общее количество страниц
        // 4. ! сдвиг по transform: translate
        // 5. ! Определение размеров добавить в update, и сделать там обновление
        // 6. сдвиг нужно постоянно на что то умножать
    }



    // нужно каждый раз обновлять данные, так как содержимле меняется динамически
    updateElements () {
        this.codeItems = this.codeList.querySelectorAll('.code__item');
        this.pagItems = this.wrPag.querySelectorAll('.account__code-pag-num-page');
        this.activePage = [...this.pagItems].find( el => el.matches('.account__code-pag-num-page_active'));
        // если при обновлении не совпадает значит страница кодов изменилась
        // и активна первая страница
        if(+this.activePage.textContent !== this.activeNumPage) this.activeNumPage = 1;

        // если элементов больше 3х задаем размеры нужные для работы слайдера
        if(this.pagItems.length > 3) this.initSlider(); 
    }

    initSlider() {
        // Задаем макисмальную ширину поля, инициализируем слайдер
        // this.widthPagItem = this.pagItemsList.children[0].offsetWidth * 3;
        // this.pagContainer.style.maxWidth = `${this.widthPagItem}px`;
        // убираем выравнивание по центру
        this.pagContainer.style.justifyContent = 'flex-start';

        // заряжаем счетчик для работы слайдера
        this.slideMaxOffset = this.pagItems.length - 3;
        
    }

    prevCodes() {
        this.updateElements();

        // меняем данные о активных позициях
        this.activeNumPage -= 1;

        this.activePage.classList.remove('account__code-pag-num-page_active');
        this.activePage = this.pagItems[this.activeNumPage - 1];
        this.activePage.classList.add('account__code-pag-num-page_active');

        // если активная страница больше 3 и каунтер слайдер меньше
        // допустимого значения значит есть куда сдвигать
        if( (this.activeNumPage + 1) === this.LestLeftEl && this.slideCounter > 0 ) {
            // получаем ширину item всегда свежую
            // можем сдвигать пока каунтер меньше допустимого значения
            this.slideCounter -= 1;
            console.log('prev', this.slideCounter)
            // расчитываем размер сдвига во vw, для адаптивности
            let item = this.pagItemsList.children[0];
            let widthItemVw = (item.offsetWidth / window.innerWidth * 100).toFixed(2);
            let offsetItem = widthItemVw * this.slideCounter
            
            this.pagItemsList.style = `transform: translateX(-${offsetItem}vw);`; 
            this.LestLeftEl -= 1
            console.log('LestLeftEl prev', this.LestLeftEl)
        }

        // если страница первая скрываем стрелку влево
        if(this.activeNumPage === 1 && this.pagPrev.matches('.account__pag-code-arrow_active')) {
            this.hideArrowPrev();
        }
        
        // при крайнем конечном занчении скрываем стрелку
        if(this.activeNumPage < this.pagItems.length) {
            this.showArrowNext();
        }
  
        // переключаем страницу с кодами
        this.changeVisibleCodes();
    }

    nextCodes() {
        this.updateElements();

        // меняем данные о активных позициях
        this.activeNumPage += 1;

        this.activePage.classList.remove('account__code-pag-num-page_active');
        this.activePage = this.pagItems[this.activeNumPage - 1];
        this.activePage.classList.add('account__code-pag-num-page_active');

        // если активная страница больше 3 и каунтер слайдер меньше
        // допустимого значения значит есть куда сдвигать
        if(this.activeNumPage > 3 && this.slideCounter < this.slideMaxOffset ) {
            // получаем ширину item всегда свежую
            // можем сдвигать пока каунтер меньше допустимого значения
            this.slideCounter += 1;
            console.log('next', this.slideCounter)
            // расчитываем размер сдвига во vw, для адаптивности
            let item = this.pagItemsList.children[0];
            let widthItemVw = (item.offsetWidth / window.innerWidth * 100).toFixed(2);
            let offsetItem = widthItemVw * this.slideCounter
            this.pagItemsList.style = `transform: translateX(-${offsetItem}vw);`; 
            this.LestLeftEl += 1;
            console.log('LestLeftEl next', this.LestLeftEl)
        }

        // если страница не первая показываем стрелку влево
        if(this.activeNumPage !== 1 && !this.pagPrev.closest('.account__pag-code-arrow_active')) {
            this.showArrowPrev();
        }
        
        // при крайнем конечном занчении скрываем стрелку
        if(this.activeNumPage === this.pagItems.length) {
            this.hideArrowNext();
        }
        
        // переключаем страницу с кодами
        this.changeVisibleCodes();
    }

    goPage(num) {
        this.updateElements();
        // если клик по той же цифре return
        if(+num === this.activeNumPage) return;

        // Присваиваем новую страницу
        this.activeNumPage = +num;
        // Меняем активную цифру
        this.activePage.classList.remove('account__code-pag-num-page_active');
        this.activePage = this.pagItems[this.activeNumPage - 1];
        this.activePage.classList.add('account__code-pag-num-page_active');

        // переключаем страницу с кодами
        this.changeVisibleCodes();

        // при крайнем конечном занчении скрываем стрелку
        if(this.activeNumPage < this.pagItems.length) {
            this.showArrowNext();
        }

        // при крайнем конечном занчении скрываем стрелку
        if(this.activeNumPage === this.pagItems.length) {
            this.hideArrowNext()
        }

        // если страница не первая и prev не активна активируем
        if(this.activeNumPage !== 1 && !this.pagPrev.closest('.account__pag-code-arrow_active')) {
            this.showArrowPrev();
        }

        // если страница первая скрываем стрелку влево
        if(this.activeNumPage === 1 && this.pagPrev.matches('.account__pag-code-arrow_active')) {
            this.hideArrowPrev();
        }

    }

    showArrowNext() {
        this.pagNext.classList.add('account__pag-code-arrow_active');
    }

    hideArrowNext() {
        this.pagNext.classList.remove('account__pag-code-arrow_active');
    }

    showArrowPrev() {
        this.pagPrev.classList.add('account__pag-code-arrow_active');
    }

    hideArrowPrev() {
        this.pagPrev.classList.remove('account__pag-code-arrow_active');
    }
    
    changeVisibleCodes() {
        // скрываем открытые
        [...this.codeItems].forEach( el => {
            if(!el.matches('.account__codeHide')) {
                el.classList.add('account__codeHide')
            }
        })

        // открываем по активной странице
        if(this.widthScreen > 428) {
            let startIndex = 14 * (this.activeNumPage - 1);
            let finalIndex = startIndex + 14 - 1;
            // открываем 14 элементов
            for(let i = startIndex ; i <= finalIndex ; i += 1) {
                if(this.codeItems[i]) {
                    this.codeItems[i].classList.remove('account__codeHide');
                }
            }
        }

        // открываем по активной странице
        if(this.widthScreen <= 428) {
            let startIndex = 6 * (this.activeNumPage - 1);
            let finalIndex = startIndex + 6 - 1;
            // открываем 14 элементов
            for(let i = startIndex ; i <= finalIndex ; i += 1) {
                this.codeItems[i].classList.remove('account__codeHide');
            }
        }
    }

    

}


