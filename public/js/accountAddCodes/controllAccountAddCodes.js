export default class ControllAccountAddCodes {
    constructor(arr) {
        this.draw = arr[0];
        this.fetch = arr[1];

        this.onClick = this.onClick.bind(this);
        this.onInput = this.onInput.bind(this);
        this.onChange = this.onChange.bind(this);
    }

    init() {
        this.registerEvents();
    }

    registerEvents() {
        this.draw.addButton.addEventListener('click', this.onClick);
        this.draw.submitButton.addEventListener('click', this.onClick);
        this.draw.typeCode.addEventListener('input', this.onInput);
        this.draw.addFile.addEventListener('change', this.onChange);
        this.draw.addFileLabel.addEventListener('click', this.onClick);
    }

    onClick(e) {
        console.log(e.target)
        // открываем поле отрисовки и сохраняем код
        if(e.target.closest('.code__add')) {
            const value = this.draw.typeCode.value;
            this.draw.showSlider(value);
            this.draw.addCode(value);
        }

        // отправляем коды и очищаем массив
        if(e.target.closest('.code__submit')) {
            // отправляем данные на сервер (если они есть)
            if(this.draw.arrCodes.length > 0 && this.draw.storageFile) {
                const formData = new FormData;
                formData.append('check', this.draw.storageFile);
                this.draw.arrCodes.forEach( el => formData.append('code[]', el));
                сщт
                // (async () => {
                //     const res = await this.fetch.create(formData);
                //     const result = await res.json();
                //     console.log(result)
                //     // далее нужно вызвать account info и перерисовывать страницу
                // })();
            
                return;
            }
            
            // если не введено ни одного кода показываем сообщение об оошибке
            if(this.draw.arrCodes.length === 0) {
                this.draw.showInvalidCode();
            }
            // если чек не загружен сообщаем что это обязательно
            if(!this.draw.storageFile) {
                console.log('novalidate')
                this.draw.infoAboutUpload(this.draw.textFileInvalid)
            }
        }

        // если клик по загрузить фото чека
        if(e.target.closest('.file-upload__label')) this.draw.infoAboutUpload();
    }


    onInput() {
        const value = this.draw.typeCode.value;
        // если есть сообщение о невалидности кода, при изменении поля убираем это сообщение
        if(value) {
            this.draw.hideInvalidCode();
        }

        // отправляем код на проверку
        if(value.length >= 9) {
            this.validateCode(value);
        }
    }

    onChange(e) {
        console.log(e)
        
        const file = e.target.files && e.target.files[0];
        this.draw.saveFile(file);
    }

    // валидация кода прежде чем добавить в массив для отправки
    async validateCode(code) {
        const data = JSON.stringify({code});

        try { // 4009-16H53TT, 2660-777MPV, 1623-15QA3G, 2583-1NL5RN5
            const resp = await this.fetch.validate(data);
            const result = await resp.json();

            // проверяем ответ и отмечаем валидность
            if(result?.error) this.draw.isValidCode = false;
            if(result[0]?.code) this.draw.isValidCode = true;
        } 
        catch(error) {
            console.log(error)
        }
    }
}

// Нажимая кнопку зарегистрировать мы понимаем что там коды прошедшие валидацию 