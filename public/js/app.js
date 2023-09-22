

// Добавление кодов и чеков на странице аккаунт
import ControllAccountAddCodes from "./accountAddCodes/controllAccountAddCodes.js";
import RedrawAccountAddCodes from "./accountAddCodes/redrawAccountAddCodes.js";
import FetchAccountAddCodes from "./accountAddCodes/fetchAccountAddCodes.js";
import RedrawVoucherSlider from "./accountAddCodes/redrawVoucherSlider.js";

// Управоение переключением активных кодов
import ControllActiveCodes from "./accountActiveCodes/controllActiveCodes.js";
import RedrawActiveCodes from "./accountActiveCodes/redrawActiveCodes.js";

window.addEventListener('load', () => {

    const accAddCodeGroup = document.querySelector('.code__input--group');

    if(accAddCodeGroup) {
        // добавление кодов и чеков (управление слайдером чеков)
        const domainReg = '/api/auth/register';
        const domainVoucher = `/api/code/checkout`;
        const domains = [domainReg, domainVoucher];
        const voucherSlider = '.account__slider-check';
        const slidesWrapper = document.querySelector('.account__slider-check-wrapper');
        const voucherPaginContainer = document.querySelector('.pagination__container');

        const drawAccAddCodes = new RedrawAccountAddCodes(accAddCodeGroup);
        const fetchAccAddCodes = new FetchAccountAddCodes(domains);
        const redrawVoucherSlider = new RedrawVoucherSlider(voucherSlider, slidesWrapper, voucherPaginContainer);
        const arr = [drawAccAddCodes, fetchAccAddCodes, redrawVoucherSlider]
        const controllAccAddCodes = new ControllAccountAddCodes(arr);

        controllAccAddCodes.init();


        // АКТИВНЫЕ КОДЫ управление
        const codeList = document.querySelector('.code__list');
        const wrPag = document.querySelector('.account__wr-pag-code');

        const pagContainer = document.querySelector('.account__pag-num');
        let pagItemsList = null;
        setTimeout(() => {
            pagItemsList = pagContainer.querySelector('.account__wr-code-pag-list');

            const redrawActiveCodes = new RedrawActiveCodes(codeList, wrPag, pagContainer, pagItemsList);
            const controllActiveCodes = new ControllActiveCodes(redrawActiveCodes);
            controllActiveCodes.init();
        }, 2000)




    }
})
