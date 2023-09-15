export default class RedrawAccountAddCodes {
    constructor(element) {
        this.element = element;
        this.addButton = this.element.querySelector('.code__add');
        this.submitButton = this.element.querySelector('.code__submit');
        this.codeSlider = this.element.querySelector('.code__slider');
        this.typeCode = this.element.querySelector('.code__input__field--account');
        this.invalidCode = this.element.querySelector('.invalid-feedback');
        this.addFile = this.element.querySelector('.file-upload__input--user');
        this.addFileLabel = this.element.querySelector('.file-upload__label');
        this.textFileValid = this.element.querySelector('.account__file_valid');
        this.textFileInvalid = this.element.querySelector('.account__file_invalid');

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
        console.log('code added to place')
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

    clearData() {
        this.arrCodes = [];

        this.storageFile = null;
    }

    
}

// Нажав на плюс 
// 1. Поле ввода пустое получим ошибку
// 2. Начнем вводить текст ошибка исчезнет
// 3. поле отрисовки откроется только если в поле ввода что то есть 
//    и в поле отрисовки после этого попадет код
// 4. если кодов было введено 15 то больше не получится