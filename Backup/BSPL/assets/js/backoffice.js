class backOffice {
    constructor() {
        this.creationHandler()
        this.returnHandler()
        this.trashHandler()
    }

    creationHandler() {
        $('.js_Build').on('click', e => {
            $('.bo_reader').addClass('dispNone')
            $('.js_Trash').addClass('dispNone')
            $('.js_Build').addClass('dispNone')
            $('.bo_editor').removeClass('dispNone')
            $('.js_Return').removeClass('dispNone')
            $('.bo_trash').addClass('dispNone')
        })
    }

    returnHandler() {
        $('.js_Return').on('click', e => {
            $('.js_Return').addClass('dispNone')
            $('.js_Trash').removeClass('dispNone')
            $('.js_Build').removeClass('dispNone')
            $('.bo_reader').removeClass('dispNone')
            $('.bo_editor').addClass('dispNone')
            $('.bo_trash').addClass('dispNone')
        })
    }

    trashHandler() {
        $('.js_Trash').on('click', e => {
            $('.js_Return').removeClass('dispNone')
            $('.js_Trash').addClass('dispNone')
            $('.js_Build').addClass('dispNone')
            $('.bo_reader').addClass('dispNone')
            $('.bo_editor').addClass('dispNone')
            $('.bo_trash').removeClass('dispNone')
        })
    }
}