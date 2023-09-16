
// Добавление кодов на странице аккаунт
import ControllAccountAddCodes from "./accountAddCodes/controllAccountAddCodes.js";
import RedrawAccountAddCodes from "./accountAddCodes/redrawAccountAddCodes.js";
import FetchAccountAddCodes from "./accountAddCodes/fetchAccountAddCodes.js";

// Управоение переключением активных кодов
import ControllActiveCodes from "./accountActiveCodes/controllActiveCodes.js";
import RedrawActiveCodes from "./accountActiveCodes/redrawActiveCodes.js";

window.addEventListener('load', () => { 

    const accAddCodeGroup = document.querySelector('.code__input--group');

    if(accAddCodeGroup) {
        // добавление кодов
        const domainReg = '/api/auth/register';
        const domainCheck = `http://niktea/api/code/checkout`;
        const domains = [domainReg, domainCheck]

        const drawAccAddCodes = new RedrawAccountAddCodes(accAddCodeGroup);
        const fetchAccAddCodes = new FetchAccountAddCodes(domains);
        const arr = [drawAccAddCodes, fetchAccAddCodes]
        const controllAccAddCodes = new ControllAccountAddCodes(arr);

        controllAccAddCodes.init();



        const codeList = document.querySelector('.code__list');
        const wrPag = document.querySelector('.account__wr-pag-code');

        const redrawActiveCodes = new RedrawActiveCodes(codeList, wrPag);
        const controllActiveCodes = new ControllActiveCodes(redrawActiveCodes);
        controllActiveCodes.init();
    }
})
