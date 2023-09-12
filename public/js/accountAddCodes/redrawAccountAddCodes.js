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
        this.arrCodes = [];
        // для файла
        this.storageFile = null;
        // Выражение для проверки файла
        this.regExpFile = /(\/jpg|\/jpeg|\/bmp|\/png|\/gif|\/svg|\/webp)$/g;
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

        // колличество кодов уже добавленных сегодня
        // и колличество новых (сумма)
        const totalCodes = +sessionStorage.todayCodesActivated + this.arrCodes.length;
        console.log(totalCodes)
        // если кодов в массиве 15 дальше ничего не делаем
        if(totalCodes === 15) return;

        // добавляем код в массив
        this.arrCodes.unshift(code);
        console.log('массив кодов', this.arrCodes)
        // добавляем код в поле для отображения
        this.addCodeInPlace(code); 

        // очищаем поле ввода
        this.typeCode.value = '';
    }
    // валидация кода
    validateCode() {
        
    }
    // отрисовываем введенные коды
    addCodeInPlace(code) {
        console.log('code added to place')
    }
    
                                // ВАЛИДАЦИЯ КОЛИЧЕСТВА ЧЕКОВ ЗА ДЕНЬ
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