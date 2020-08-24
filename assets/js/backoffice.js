class backOffice {
    constructor() {
        this.creationHandler()
        this.returnHandler()
    }

    creationHandler() {
        $('.js_Build').on('click', e => {
            $('.bo_reader').addClass('dispNone')
            $('.js_Trash').addClass('dispNone')
            $('.js_Build').addClass('dispNone')
            $('.bo_editor').removeClass('dispNone')
            $('.js_Return').removeClass('dispNone')
        })
    }

    returnHandler() {
        $('.js_Return').on('click', e => {
            $('.js_Return').addClass('dispNone')
            $('.js_Trash').removeClass('dispNone')
            $('.js_Build').removeClass('dispNone')
            $('.bo_reader').removeClass('dispNone')
            $('.bo_editor').addClass('dispNone')
        })
    }
}