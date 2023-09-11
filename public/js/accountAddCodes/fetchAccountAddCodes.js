export default class FetchAccountAddCodes {
    constructor (domain) {
        this.domain = domain;
    }

    async create(data) {
        return await fetch(`${domain}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
             },
            body: data,
        })
    }
}