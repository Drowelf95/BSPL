class behavior {
    constructor() {
        this.dispCom()
        this.hideCom()
        this.del_click()
        this.timeAlert()
        this.loginOut()
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

    del_click() {
        $('.articlePermDel').on('click', e => {
            let articleID = $(e.target).attr('id')
            articleID = articleID.replace('btnDel-', '')
            $('#confDel-' + articleID).removeClass('dispNone')
        })
        $('.bo_permNo').on('click', e => {
            $('.bo_permDelete').addClass('dispNone')
        })
        $('.bo_permYes').on('click', e => {
            $('.bo_permDelete').addClass('dispNone')
        })
    }

    timeAlert() {
        const self = this

        self.interval = setInterval(function() {
            self.hideAlerts()
        }, 3000)
    }

    hideAlerts() {
        $('.bo_alert').fadeOut('slow');
    }

    loginOut() {
        $('.bo_logOut').on('click', e => {
            $('.logout_Conf').removeClass('dispNone')
        })
        $('.conf_No').on('click', e => {
            $('.logout_Conf').addClass('dispNone')
        })
    }
}