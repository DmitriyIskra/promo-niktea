
// Добавление кодов на странице аккаунт
import ControllAccountAddCodes from "./accountAddCodes/controllAccountAddCodes.js";
import RedrawAccountAddCodes from "./accountAddCodes/redrawAccountAddCodes.js";
import FetchAccountAddCodes from "./accountAddCodes/fetchAccountAddCodes.js";

document.addEventListener('DOMContentLoaded', () => {

    const accAddCodeGroup = document.querySelector('.code__input--group');

    if(accAddCodeGroup) {
        const domainReg = '/api/auth/register';
        const domainCheck = `http://niktea/api/code/checkout`;
        const domains = [domainReg, domainCheck]

        const drawAccAddCodes = new RedrawAccountAddCodes(accAddCodeGroup);
        const fetchAccAddCodes = new FetchAccountAddCodes(domains);
        const arr = [drawAccAddCodes, fetchAccAddCodes]
        const controllAccAddCodes = new ControllAccountAddCodes(arr);

        controllAccAddCodes.init();
    }
})
