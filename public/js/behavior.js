class behavior {
    constructor() {
        this.dispCom()
        this.hideCom()
        this.permDelete()
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
    permDelete() {
        $('.articlePermDel').on('click', e => {
            $('.bo_permDelete').removeClass('dispNone')
        })
    }
}