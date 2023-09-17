export default class FetchAccountAddCodes {
    constructor (domain) {
        this.domainReg = domain[0];
        this.domainCheck = domain[1]
    }

    // получаем account-info
    async read() {
        const requestOptions = {
            method: 'GET',
            redirect: 'follow' 
        };

        return await fetch("/api/account/info", requestOptions);
    }

    async create(formData) {
        return await fetch(`${this.domainReg}`, {
            method: 'POST',

            body: formData,
        })
    }

    async validate(data) {
        return await fetch(`${this.domainCheck}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: data,
        })
    }
}
