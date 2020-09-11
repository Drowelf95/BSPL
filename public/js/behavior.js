class behavior {
    constructor() {
        this.dispCom()
        this.hideCom()
    }

    dispCom() {
        $('.fv_comBtn').on('click', e => {
            $('.fv_comBtn').addClass('dispNone')
            $('.fv_comArea').removeClass('dispNone')
        })
    }

    hideCom() {
        $('.fv_comCancel').on('click', e => {
            $('.fv_comBtn').removeClass('dispNone')
            $('.fv_comArea').addClass('dispNone')
        })
    }
}