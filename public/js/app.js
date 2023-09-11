
// Добавление кодов на странице аккаунт
import ControllAccountAddCodes from "./accountAddCodes/controllAccountAddCodes.js";
import RedrawAccountAddCodes from "./accountAddCodes/redrawAccountAddCodes.js";
import FetchAccountAddCodes from "./accountAddCodes/fetchAccountAddCodes.js";

document.addEventListener('DOMContentLoaded', () => {

    const accAddCodeGroup = document.querySelector('.code__input--group');

    if(accAddCodeGroup) {
        const domain = 'https://dev.nikteaworld.com/api/auth/register'

        const drawAccAddCodes = new RedrawAccountAddCodes(accAddCodeGroup);
        const fetchAccAddCodes = new FetchAccountAddCodes(domain);
        const arr = [drawAccAddCodes, fetchAccAddCodes]
        const controllAccAddCodes = new ControllAccountAddCodes(arr);

        controllAccAddCodes.init();
    }
})
