export default class RedrawActiveCodes {
    constructor(codeList, wrPag) {
        this.codeList = codeList;
        this.codeItems = this.codeList.querySelectorAll('.code__item');
        // для понимания открыто на десктопе или мобилке 14 или 6
        this.widthScreen = window.innerWidth;

        this.wrPag = wrPag;
        this.pagPrev = this.wrPag.querySelector('.account__pag-code_prev');
        this.pugItems = this.wrPag.querySelectorAll('.account__code-pag-num-page');
        this.pagNext = this.wrPag.querySelector('.account__pag-code_next');

        this.activePage = this.pugItems[0];
        this.activeNumPage = 1;

        // - тест переключения стрелками после добавления новых кодов

        // 0. Работать будет только по стрелкам, визуализиирует сдвиг цифр
        // 1. Определить max-width контейнера по ширине li * 3
        // 2.Сделать каунтер   активная страница - 3, по нему считать количество сдвигов слайдера
        // 3. Ширина ul тоже по ширине li * на общее количество страниц
        // 4. сдвиг по transform: translate
        // Определение размеров добавить в update, и сделать там обновление
    }

    // нужно каждый раз обновлять данные, так как содержимле меняется динамически
    updateElements () {
        this.codeItems = this.codeList.querySelectorAll('.code__item');
        this.pugItems = this.wrPag.querySelectorAll('.account__code-pag-num-page');
        this.activePage = [...this.pugItems].find( el => el.matches('.account__code-pag-num-page_active'));
        // Т Е С Т И Т Ь ! ! ! ! !
        // если при обновлении не совпадает значит страница кодов изменилась
        // и активна первая страница
        if(+this.activePage.textContent !== this.activeNumPage) this.activeNumPage = 1;
    }

    prevCodes() {
        this.updateElements();
        
        // меняем данные о активных позициях
        this.activeNumPage -= 1;

        this.activePage.classList.remove('account__code-pag-num-page_active');
        this.activePage = this.pugItems[this.activeNumPage - 1];
        this.activePage.classList.add('account__code-pag-num-page_active');

        // если страница первая скрываем стрелку влево
        if(this.activeNumPage === 1 && this.pagPrev.matches('.account__pag-code-arrow_active')) {
            this.hideArrowPrev();
        }
        
        // при крайнем конечном занчении скрываем стрелку
        if(this.activeNumPage < this.pugItems.length) {
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
        this.activePage = this.pugItems[this.activeNumPage - 1];
        this.activePage.classList.add('account__code-pag-num-page_active');

        // если страница не первая показываем стрелку влево
        if(this.activeNumPage !== 1 && !this.pagPrev.closest('.account__pag-code-arrow_active')) {
            this.showArrowPrev();
        }
        
        // при крайнем конечном занчении скрываем стрелку
        if(this.activeNumPage === this.pugItems.length) {
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
        this.activePage = this.pugItems[this.activeNumPage - 1];
        this.activePage.classList.add('account__code-pag-num-page_active');

        // переключаем страницу с кодами
        this.changeVisibleCodes();

        // при крайнем конечном занчении скрываем стрелку
        if(this.activeNumPage < this.pugItems.length) {
            this.showArrowNext();
        }

        // при крайнем конечном занчении скрываем стрелку
        if(this.activeNumPage === this.pugItems.length) {
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


