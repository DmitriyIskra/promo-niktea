export default class RedrawSlHeaderMain {
    constructor(el) {
        this.el = el;

        // описание под классом
        this.slidesList = this.el.querySelector('.slider-hm__slides-list');
        this.slides = null;
        this.amountSlides = null;
        this.showSlides = 1;
        this.gapSlides = 0;

        // параметры для transition
        this.timingFunc = 'linear';
        this.duration = 0.3;

        // кнопки
        this.next = this.el.querySelector('.slider-hm__controll-next');
        this.prev = this.el.querySelector('.slider-hm__controll-prev');

        // Блокировка накликивания
        this.stop = false;

        this.intervalId = null;
        this.intervalTime = 5;
    }

    initSlider() {
        this.slides = this.slidesList.children;
        this.amountSlides = this.slides.length;

        // ширина слайда
        [...this.slides].forEach(item => item.style.width = `${100 / this.showSlides}%`);
        // отступ между слайдами
        this.slidesList.style.gap = `${this.gapSlides}px`;

        if(this.amountSlides.length <= this.showSlides) {
            this.next.style.display = 'none';
            this.prev.style.display = 'none';

            return;
        }

        // this.leafInterval();
    }

    mooveNext() {
        if(this.stop) return;

        this.stop = true;

        // останавливаем интервал автоматического перелистывания
        this.stopLeafInterval();

        // ширина слайда для сдвига
        const widthSlide = this.culcWidthSlide();

        // Добавляем transition элементу
        this.setTransition();
        // Сдвигаем 
        this.setTransform(widthSlide);

        this.slidesList.addEventListener('transitionend', () => {
            // убираем transition
            this.deleteTransition();

            this.slidesList.append(this.slides[0]);

            this.setTransform(0);

            this.stop = false;

            // запускаем авто пролистывание сначала
            // this.leafInterval();
        }, {once: true})
    }

    moovePrev() {
        if(this.stop) return;

        this.stop = true;

        this.stopLeafInterval();

        const widthSlide = this.culcWidthSlide();

        this.slidesList.prepend(this.slides[this.slides.length - 1]);

        this.setTransform(widthSlide);

        setTimeout(() => {
            this.setTransition();

            this.setTransform(0);
        })
        
        this.slidesList.addEventListener('transitionend', () => {
            this.deleteTransition();

            this.stop = false;

            // this.leafInterval();
        }, {once: true})
    }

    // перелистывание через интервал
    leafInterval() {
        this.intervalId = setInterval(() => this.next.click(), this.intervalTime * 1000);
    }

    // сброс интервала
    stopLeafInterval() {
        clearInterval(this.intervalId);
    }

    culcWidthSlide() {
        return this.slides[0].offsetWidth
    }

    setTransition() {
        this.slidesList.style.transition = `
            transform ${this.duration}s ${this.timingFunc}
        `;
    }

    deleteTransition() {
        this.slidesList.style.transition = ``;
    }

    setTransform(data) {
        this.slidesList.style.transform = `translateX(-${data}px)`;
    }
}


// this.slidesList = Блок со слайдами
// this.slides = коллекция слайдов
// this.amountSlides = кол-во слайдов
// this.showSlides = кол-во к показу
// this.gapSlides = расстояние между слайдами