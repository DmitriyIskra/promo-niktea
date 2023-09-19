export default class ControllAccountAddCodes {
    constructor(arr) {
        this.draw = arr[0];
        this.fetch = arr[1];
        this.checkSlider = arr[2];
        this.accountInfo = null;

        this.onClick = this.onClick.bind(this);
        this.onInput = this.onInput.bind(this);
        this.onChange = this.onChange.bind(this);
    }

    init() {
        
        this.registerEvents();
        this.getAccountInfo();
        
    }

    registerEvents() {
        this.draw.addButton.addEventListener('click', this.onClick);
        this.draw.submitButton.addEventListener('click', this.onClick);
        this.draw.typeCode.addEventListener('input', this.onInput);
        this.draw.addFile.addEventListener('change', this.onChange);
        this.draw.addFileLabel.addEventListener('click', this.onClick);
    }

    onClick(e) {
        // открываем поле отрисовки и сохраняем код
        if(e.target.closest('.code__add')) {
            const code = this.draw.typeCode.value;
            console.log(code)
            const data = JSON.stringify({code});
            // this.validateCode(value);

            (async () => {
                const res = await this.fetch.validate(data)
                const result = await res.json();
                console.log(result)

                if(result.error === null) {
                    this.draw.isValidCode = true;
                    this.draw.showSlider(code);
                    this.draw.addCode(code);
                } else {
                    this.draw.isValidCode = false;
                    this.draw.showInvalidCode();
                };
            })();
            // 
        }

        // отправляем коды и очищаем массив 
        if(e.target.closest('.code__submit')) {
            e.preventDefault();
            // отправляем данные на сервер (если они есть)
            if(this.draw.arrCodes.size > 0 && this.draw.storageFile) {
                (async () => {
                    const formData = new FormData();
                    formData.append('name', this.accountInfo.user.name);
                    formData.append('second_name', this.accountInfo.user.second_name);
                    formData.append('patronymic', this.accountInfo.user.patronymic);
                    formData.append('phone', this.accountInfo.user.phone);
                    this.draw.arrCodes.forEach( el => formData.append('code[]', el));
                    formData.append('email', this.accountInfo.user.email);
                    formData.append('check', this.draw.storageFile);
                    console.log(Array.from(formData))
                    const res = await this.fetch.create(formData);
                    const result = await res.json();

                    console.log('result send check', result)
                    // далее нужно вызвать account info и перерисовывать страницу
                    this.draw.clearData();

                    const response = await this.fetch.read();
                    const result2 = await response.json();
                    console.log(result2);

                    // отрисовываем коды
                    this.draw.renderActiveCodes(result2);
                    // отправляем ссылки на фото чеков 
                    this.checkSlider.addVoucher(result2.registered_tickets);

                    // обновляем лимит кодов на сегодня
                    const limitCodes = result2.today_activated_codes[0].activated_today;
                    this.draw.updateLimitCodes(limitCodes);
                })();
                
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
    }

    onChange(e) {
        console.log(e)

        const file = e.target.files && e.target.files[0];
        this.draw.saveFile(file);
    }

    // валидация кода прежде чем добавить в массив для отправки
    async validateCode(code) {
        console.log('code', code)
        const data = JSON.stringify({code});

        try { // 4009-16H53TT, 2660-777MPV, 1623-15QA3G, 2583-1NL5RN5,   3918-21LCLF2
            const resp = await this.fetch.validate(data);
            const result = await resp.json();
            console.log(result);
            // проверяем ответ и отмечаем валидность
            if(result?.error) this.draw.isValidCode = false;
            if(result[0]?.code) this.draw.isValidCode = true;
        }
        catch(error) {
            console.log(error);
        }

        
    }

    async getAccountInfo() {
        const res = await this.fetch.read();
        this.accountInfo = await res.json();

        this.checkSlider.initSlider();
        // отправляем ссылки на фото чеков 
        this.checkSlider.renderingVouchers(this.accountInfo.registered_tickets);
    }

}

// Нажимая кнопку зарегистрировать мы понимаем что там коды прошедшие валидацию
