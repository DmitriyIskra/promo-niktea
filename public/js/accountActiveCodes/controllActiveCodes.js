export default class ControllActiveCodes {
    constructor(draw) {
        this.draw = draw;

        this.onClick = this.onClick.bind(this);
    }

    init() {
        this.registerEvents();
        this.draw.initSlider();
    }

    registerEvents() {
        this.draw.wrPag.addEventListener('click', this.onClick);
    }

    onClick(e) {
        if(e.target.closest('.account__pag-code_prev')) {
            console.log('work')
            this.draw.prevCodes();         
        }

        if(e.target.closest('.account__code-pag-num-page')) {
            // передаем цифру для проверки 
            this.draw.goPage(e.target.textContent)
        }

        if(e.target.closest('.account__pag-code_next')) {
            this.draw.nextCodes();
        }
    }
}