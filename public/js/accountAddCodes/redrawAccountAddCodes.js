export default class RedrawAccountAddCodes {
    constructor(element) {
        this.element = element;
        this.addButton = this.element.querySelector('.code__add');
        this.submitButton = this.element.querySelector('.code__submit');
        this.codeSlider = this.element.querySelector('.code__slider');
        this.typeCode = this.element.querySelector('.code__input__field--account');
        this.invalidCode = this.element.querySelector('.invalid-feedback');

        // Отметим активен ли слайдер
        this.activeSlider = null;
        // массив добавленных кодов
        this.arrCodes = [];
    }

    // показываем поле для отображения введенных кодов
    // и последующим действием добавляем коды
    showSlider(value) {
        // если пользователь не ввел код и пытается нажать плюс
        // или зарегистрировать показываем ошибку
        if(!value) {
            this.showInvalidCode();
            return;
        }
        // если поле активно ничего не делаем
        if(this.activeSlider) return;

        // активируем поле для отображения кодов
        this.activeSlider = true;
        this.codeSlider.classList.add('code__sleder--display');
    }

    // сохраняем введенные коды
    addCode(code) {
        // если код не введен ничего не делаем
        if(!code) return;

        // если кодов в массиве 15 дальше ничего не делаем
        if(this.arrCodes.length === 15) return;

        // добавляем код в массив
        this.arrCodes.unshift(code);
        console.log('массив кодов', this.arrCodes)
        // добавляем код в поле для отображения
        this.addCodeInPlace(code); 

        // очищаем поле ввода
        this.typeCode.value = '';
    }
    // отрисовываем введенные коды
    addCodeInPlace(code) {
        console.log('code added to place')
    }

    validateCode() {
        
    }

    // вешаем класс invalid на элемент показывающий не валидность, но если его нет
    showInvalidCode() {
        if(!this.invalidCode.closest('.invalid-feedback_active')) {
            this.invalidCode.classList.add('invalid-feedback_active');
        }
    }
    // снимаем класс с элемента показывающего невалидность если он есть, но если он есть
    hideInvalidCode() {
        if(this.invalidCode.closest('.invalid-feedback_active')) {
            this.invalidCode.classList.remove('invalid-feedback_active');
        }
    }
}

// Нажав на плюс 
// 1. Поле ввода пустое получим ошибку
// 2. Начнем вводить текст ошибка исчезнет
// 3. поле отрисовки откроется только если в поле ввода что то есть 
//    и в поле отрисовки после этого попадет код
// 4. если кодов было введено 15 то больше не получится