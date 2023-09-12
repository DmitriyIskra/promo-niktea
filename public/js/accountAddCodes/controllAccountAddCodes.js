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
            console.log('code__submit', this.draw.arrCodes);
        }

        // если клик по загрузить фото чека
        if(e.target.closest('.file-upload__label')) this.draw.infoAboutUpload();
    }


    onInput() {
        const value = this.draw.typeCode.value;
        if(value) {
            this.draw.hideInvalidCode();
        }
    }

    onChange(e) {
        console.log(e)
        
        const file = e.target.files && e.target.files[0];
        this.draw.saveFile(file);
    }
}