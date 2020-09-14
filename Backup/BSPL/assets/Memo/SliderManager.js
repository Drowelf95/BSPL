class SliderManager {
    constructor() {
        this.counter = 1
        this.size = undefined
        this.interval = undefined
        this.interval2 = undefined
        this.intervalStatus = 'running'
        this.sizeSlider()
        this.slideRotation()
        this.initRotation()
        this.checkPageFocus()
        this.initButtons()
    }

    initRotation() {
        const self = this

        //Set interval
        self.interval = setInterval(function() {
            self.counter++;
            self.slideRotation()
        }, 5000)

        //Make it go around)
        $('.slide').on('transitionend webkitTransitionEnd oTransitionEnd', (e, item) => {

            //if counter reach maximum, then slider goes back to first slide
            if (self.counter === $('.slide img').length - 1) {
                $('.slide').css('transition', 'none')
                self.counter = 1
                $('.slide').css(
                    'transform',
                    'translateX(' + -self.size * self.counter + 'px)'
                )
            }
            //if user wanna go backward slider goes around
            if (self.counter === 0) {
                $('.slide').css('transition', 'none')
                self.counter = $('.slide img').length - 2
                $('.slide').css(
                    'transform',
                    'translateX(' + -self.size * self.counter + 'px)'
                )
            }
        })

    }

    checkPageFocus() {
        const self = this

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            self.interval2 = setInterval(function() {
                if (document.hasFocus()) {
                    if (self.intervalStatus == 'outOfFocus') {
                        self.intervalStatus = 'running'
                        self.initRotation()
                    } else {
                        return
                    }
                } else {
                    clearInterval(self.interval)
                    self.intervalStatus = 'outOfFocus'
                    return
                }
            }, 2000)
        } else {
            self.interval2 = setInterval(function() {
                if (document.hasFocus()) {
                    if (self.intervalStatus == 'outOfFocus') {
                        self.intervalStatus = 'running'
                        $('#btnPause i').removeClass('fa-play')
                        $('#btnPause i').addClass('fa-pause')
                        self.initRotation()
                    } else {
                        return
                    }
                } else {
                    $('#btnPause i').removeClass('fa-pause')
                    $('#btnPause i').addClass('fa-play')
                    clearInterval(self.interval)
                    self.intervalStatus = 'outOfFocus'
                    return
                }
            }, 2000)
        }
    }

    slideRotation() {
        const self = this

        $('.slide').css('transition', 'transform 0.4s ease-in-out')
        $('.slide').css(
            'transform',
            'translateX(' + -self.size * self.counter + 'px)'
        )
        self.dotChecker()
    }

    initButtons() {
        const self = this

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

            // Bind Swip right function
            $(".slideTxt").on("swiperight", swiperightHandler);

            // Swip Right to slide
            function swiperightHandler() {
                if (self.counter <= 0) return
                $('.slide').css('transition', 'transform 0.4s ease-in-out')
                self.counter--
                    $('.slide').css(
                        'transform',
                        'translateX(' + -self.size * self.counter + 'px)'
                    )
                self.dotChecker()
                self.resetTime()
            }

            // Bind Swip left function
            $(".slideTxt").on("swipeleft", swipeleftHandler);

            // Swip Right to slide
            function swipeleftHandler() {
                if (self.counter >= $('.slide img').length - 1) return
                $('.slide').css('transition', 'transform 0.4s ease-in-out')
                self.counter++
                    $('.slide').css(
                        'transform',
                        'translateX(' + -self.size * self.counter + 'px)'
                    )
                self.dotChecker()
                self.resetTime()
            }

            //Button Stop
            $('.slideTxt').on('click', e => {
                if (self.intervalStatus == 'running') {
                    $('#btnPause i').removeClass('fa-pause')
                    $('#btnPause i').addClass('fa-play')
                    clearInterval(self.interval)
                    self.intervalStatus = 'pause'
                    console.log('ok')
                    return
                }
                if (self.intervalStatus == 'pause') {
                    self.intervalStatus = 'running'
                    $('#btnPause i').removeClass('fa-play')
                    $('#btnPause i').addClass('fa-pause')
                    self.initRotation()
                }
            })
        }

        //Button Next
        $('#btnNext').on('click', e => {
            if (self.counter >= $('.slide img').length - 1) return
            $('.slide').css('transition', 'transform 0.4s ease-in-out')
            self.counter++
                $('.slide').css(
                    'transform',
                    'translateX(' + -self.size * self.counter + 'px)'
                )
            self.dotChecker()
            self.resetTime()
        })

        //Button Previous
        $('#btnPrev').on('click', e => {
            if (self.counter <= 0) return
            $('.slide').css('transition', 'transform 0.4s ease-in-out')
            self.counter--
                $('.slide').css(
                    'transform',
                    'translateX(' + -self.size * self.counter + 'px)'
                )
            self.dotChecker()
            self.resetTime()
        })

        //Button Stop
        $('#btnPause').on('click', e => {
            if (self.intervalStatus == 'running') {
                $('#btnPause i').removeClass('fa-pause')
                $('#btnPause i').addClass('fa-play')
                clearInterval(self.interval)
                self.intervalStatus = 'pause'
                return
            }
            if (self.intervalStatus == 'pause') {
                self.intervalStatus = 'running'
                $('#btnPause i').removeClass('fa-play')
                $('#btnPause i').addClass('fa-pause')
                self.initRotation()
            }
        })

        //Key listener
        $(document).keydown(function(e) {
            switch (e.which) {
                case 37: // left
                    if (self.counter <= 0) return
                    $('.slide').css('transition', 'transform 0.4s ease-in-out')
                    self.counter--
                        $('.slide').css(
                            'transform',
                            'translateX(' + -self.size * self.counter + 'px)'
                        )
                    self.dotChecker()
                    self.resetTime()
                    break

                case 39: // right
                    if (self.counter >= $('.slide img').length - 1) return
                    $('.slide').css('transition', 'transform 0.4s ease-in-out')
                    self.counter++
                        $('.slide').css(
                            'transform',
                            'translateX(' + -self.size * self.counter + 'px)'
                        )
                    self.dotChecker()
                    self.resetTime()
                    break

                default:
                    return
            }
            //e.preventDefault() // prevent the default action (scroll / move caret)
        })

        //Dot 1
        $('.dot_1').on('click', e => {
            self.counter = 1
            self.slideRotation()
            self.resetTime()
            self.dotChecker()
        })

        //Dot 2
        $('.dot_2').on('click', e => {
            self.counter = 2
            self.slideRotation()
            self.resetTime()
            self.dotChecker()
        })

        //Dot 3
        $('.dot_3').on('click', e => {
            self.counter = 3
            self.slideRotation()
            self.resetTime()
            self.dotChecker()
        })
    }

    dotSlider1() {
        $('.dot_1').css('background-color', 'red')
        $('.dot_2').css('background-color', 'grey')
        $('.dot_3').css('background-color', 'grey')
    }

    dotSlider2() {
        $('.dot_1').css('background-color', 'grey')
        $('.dot_2').css('background-color', 'red')
        $('.dot_3').css('background-color', 'grey')
    }

    dotSlider3() {
        $('.dot_1').css('background-color', 'grey')
        $('.dot_2').css('background-color', 'grey')
        $('.dot_3').css('background-color', 'red')
    }

    dotChecker() {
        const self = this

        if (self.counter == 1) {
            self.dotSlider1()
        } else if (self.counter == 2) {
            self.dotSlider2()
        } else if (self.counter == 3) {
            self.dotSlider3()
        } else if (self.counter == 4) {
            self.dotSlider1()
        } else if (self.counter == 0) {
            self.dotSlider3()
        }
    }

    resetTime() {
        const self = this

        clearInterval(self.interval)
        self.initRotation()
    }

    sizeSlider() {
        const self = this

        if (/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            self.size = 320
        } else if (/iPad/i.test(navigator.userAgent)) {
            self.size = 760
        } else {
            self.size = 1200
        }
    }
}