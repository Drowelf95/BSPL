class pageBehavior {
    constructor() {
        this.initRollingbox()
        this.smothScroll()
        this.infoBoxBehavior()
        this.countDown()
    }

    initRollingbox() {
        $('.overlayLogo').on('mouseover', e => {
            $('#rollBox').addClass('rollingBoxRun')
        })

        $('.overlayLogo').on('mouseout', e => {
            $('#rollBox').removeClass('rollingBoxRun')
        })
    }

    smothScroll() {
        const topAnchor = $('#topAnchor')[0]
        const sliderAnchor = $('#sliderAnchor')[0]

        $('#scrollTop').on('click', e => {
            topAnchor.scrollIntoView({
                behavior: 'smooth',
                block: 'end'
            })
        })

        $('#infoAnchorDesk').on('click', e => {
            sliderAnchor.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
                inline: 'nearest'
            })
        })

        //Display scroll Top depending on scroll position
        let lastScrollPositionknown = 0
        let ticking = false

        window.addEventListener('scroll', e => {
            lastScrollPositionknown = window.scrollY
                //console.log(lastScrollPositionknown);

            if (lastScrollPositionknown < 200) {
                $('#scrollTop').removeClass('scrollWhite')
                $('#scrollTop').removeClass('scrollGrey')
                $('#scrollTop').addClass('scrollNone')
                ticking = false
                return
            }

            if (lastScrollPositionknown < 2200) {
                $('#scrollTop').removeClass('scrollWhite')
                $('#scrollTop').addClass('scrollGrey')
                $('#scrollTop').removeClass('scrollNone')
                ticking = false
                return
            }

            if (lastScrollPositionknown > 1100) {
                $('#scrollTop').removeClass('scrollGrey')
                $('#scrollTop').addClass('scrollWhite')
                ticking = false
                return
            }
        })
    }

    infoBoxBehavior() {
        const self = this

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            self.btnBookingMob()
            self.initContactFormMob()
            $('.dskLock').addClass('styleNone')
        } else {
            self.btnBookingDsk()
            self.initContactFormDsk()
            $('.mobLock').addClass('styleNone')
        }
    }

    btnBookingDsk() {
        const self = this

        // dskBtn1 is set up by the MapHandler

        // dskBtn2 listen to Keydown in inputs fields to unable itself
        $('.required').on('keyup change', e => {
            //If both inputs are full display button "Reserver"
            $('.required').each(function() {
                if ($(this).val() == '') {
                    $('.dskBtn2').addClass('styleNone')
                    $('.dskBtn1').removeClass('styleNone')
                    return false
                } else if ($(this).val() > '') {
                    $('.dskBtn1').addClass('styleNone')
                    $('.dskBtn2').removeClass('styleNone')
                }
            })
            return true
        })

        // dskBtn2 listen to Clicks then show Canvas
        $('.dskBtn2').on('click', e => {
            let bookingAdd = $('.sttAdd').text();
            let userFirst = $('.inputFirst').val();
            let userLast = $('.inputLast').val();
            let userID = $('.inputFirst').val() + ' ' + $('.inputLast').val();

            $('.bikeBooking').addClass('styleNone')
            $('.dskBtn2').addClass('styleNone')

            $('.signCanvas').removeClass('styleNone')
            $('.dskBtn3').removeClass('styleNone')


            sessionStorage.setItem('Address', bookingAdd);
            localStorage.setItem('firstName', userFirst);
            localStorage.setItem('lastName', userLast);
            localStorage.setItem('Name', userID);

            $('.gridLock').fadeIn("fast")
        })

        // dskBtn3 register booking and inform User that it's done
        $('.dskBtn3').on('click', e => {
            const blank = isCanvasBlank(document.getElementById('sketch'));
            if (blank) {
                window.alert('Merci de signer pour pouvoir valider votre réservation');
            } else {
                $('.stationDetails').addClass('styleNone')
                $('.signCanvas').addClass('styleNone')
                $('.dskBtn3').addClass('styleNone')

                $('.bookingDone').removeClass('styleNone')
                $('.dskBtn4').removeClass('styleNone')

                let getRecapAdd = sessionStorage.getItem('Address')
                let getRecapName = localStorage.getItem('Name')
                let d1 = new Date();
                let d2 = new Date(d1);
                d2.setMinutes(d1.getMinutes() + 20);

                $('.recapAdd').text(getRecapAdd)
                $('.recapName').text(' ' + getRecapName)

                sessionStorage.setItem('Booking', 'Done');
                sessionStorage.setItem('BookingTime', d2);

                self.countDown()
            }

            // Check if Canvas is blank
            function isCanvasBlank(canvas) {
                const context = canvas.getContext('2d');

                const pixelBuffer = new Uint32Array(
                    context.getImageData(0, 0, canvas.width, canvas.height).data.buffer
                );

                return !pixelBuffer.some(color => color !== 0);
            }
        });

        // dskBtn4 allow user to make a new reservation
        $('.dskBtn4').on('click', e => {
            $('.bookingDone').addClass('styleNone')
            $('.dskBtn4').addClass('styleNone')

            $('.stationNone').removeClass('styleNone')

            sessionStorage.setItem('Booking', '');
            sessionStorage.setItem('Address', '');
            localStorage.setItem('Name', '');
            sessionStorage.setItem('BookingTime', '');
        });
    }

    btnBookingMob() {
        const self = this

        // mobBtn 1 is set up by the MapHandler

        // mobBtn1 agree on selected station (appear on click of a station)
        let nameStored = localStorage.getItem('firstName');

        $('.mobBtn1').on('click', e => {
            $('.bikeBooking').css('margin-bottom', '0')

            $('.stationDetails').addClass('styleNone')
            $('.mobBtn1').addClass('styleNone')

            $('.bikeBooking').removeClass('styleNone')

            // If name is already present then show mobBtn3
            if (nameStored == '') {
                $('.mobBtn2').removeClass('styleNone')
            } else {
                $('.mobBtn3').removeClass('styleNone')
            }
        });

        // mobBtn2 listen to Keydown in inputs fields to unable itself
        $('.required').on('keyup change', e => {
            // If both inputs are full display button "Reserver"
            $('.required').each(function() {
                if ($(this).val() == '') {
                    $('.mobBtn3').addClass('styleNone')
                    $('.mobBtn2').removeClass('styleNone')
                    return false
                } else if ($(this).val() > '') {
                    $('.mobBtn2').addClass('styleNone')
                    $('.mobBtn3').removeClass('styleNone')
                }
            })
            return true
        });


        // mobBtn3 listen to Clicks then show Canvas
        $('.mobBtn3').on('click', e => {
            let bookingAdd = $('.sttAdd').text();
            let userFirst = $('.inputFirst').val();
            let userLast = $('.inputLast').val();
            let userID = $('.inputFirst').val() + ' ' + $('.inputLast').val();

            $('.bikeBooking').addClass('styleNone')
            $('.mobBtn3').addClass('styleNone')

            $('.signCanvas').removeClass('styleNone')
            $('.mobBtn4').removeClass('styleNone')


            sessionStorage.setItem('Address', bookingAdd);
            localStorage.setItem('firstName', userFirst);
            localStorage.setItem('lastName', userLast);
            localStorage.setItem('Name', userID);

            $('.gridLock').fadeIn("fast")
        });

        // mobBtn4 register booking and inform User that it's done
        $('.mobBtn4').on('click', e => {
            const blank = isCanvasBlank(document.getElementById('sketch'));
            if (blank) {
                window.alert('Merci de signer pour pouvoir valider votre réservation');
            } else {
                $('.stationDetails').addClass('styleNone')
                $('.signCanvas').addClass('styleNone')
                $('.mobBtn4').addClass('styleNone')

                $('.bookingDone').removeClass('styleNone')
                $('.mobBtn5').removeClass('styleNone')

                let getRecapAdd = sessionStorage.getItem('Address')
                let getRecapName = localStorage.getItem('Name')
                let d1 = new Date();
                let d2 = new Date(d1);
                d2.setMinutes(d1.getMinutes() + 20);

                $('.recapAdd').text(getRecapAdd)
                $('.recapName').text(' ' + getRecapName)

                sessionStorage.setItem('Booking', 'Done');
                sessionStorage.setItem('BookingTime', d2);

                self.countDown()
            }

            // Check if Canvas is blank
            function isCanvasBlank(canvas) {
                const context = canvas.getContext('2d');

                const pixelBuffer = new Uint32Array(
                    context.getImageData(0, 0, canvas.width, canvas.height).data.buffer
                );

                return !pixelBuffer.some(color => color !== 0);
            }
        });

        // mobBtn5 allow user to make a new reservation
        $('.mobBtn5').on('click', e => {
            $('.bookingDone').addClass('styleNone')
            $('.mobBtn5').addClass('styleNone')

            $('.stationNone').removeClass('styleNone')

            sessionStorage.setItem('Booking', '');
            sessionStorage.setItem('Address', '');
            localStorage.setItem('Name', '');
            sessionStorage.setItem('BookingTime', '');
        });
    }

    countDown() {

        // Init timer
        startCountDown();

        // Update the count down every 1 second
        let x = setInterval(function() {
            startCountDown();
        }, 1000);

        function startCountDown() {
            // Set the date we're counting down to
            let bookingDate = sessionStorage.getItem('BookingTime')
            let countDownDate = new Date(bookingDate).getTime();

            // Get today's date and time
            let now = new Date().getTime();

            // Find the distance between now and the count down date
            let distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            //let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            //let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element within the console
            $('.bookingTimer').text(minutes + "m " + seconds + "s ")

            // If the count down is finished, write some text
            if (distance < 0) {
                $('.bookingDone').addClass('styleNone')
                $('.dskBtn4').addClass('styleNone')

                $('.stationNone').removeClass('styleNone')

                sessionStorage.setItem('Booking', '');
                sessionStorage.setItem('Address', '');
                localStorage.setItem('Name', '');
                sessionStorage.setItem('BookingTime', '')
                $('.bookingTimer').text('0m 0s ')
            }
        }
    }

    initContactFormDsk() {
        let booking = sessionStorage.getItem("Booking")

        if (booking == 'Done') {
            $('.stationDetails').addClass('styleNone')
            $('.bikeBooking').addClass('styleNone')
            $('.signCanvas').addClass('styleNone')
            $('.noBikesAV').addClass('styleNone')
            $('.stationNone').addClass('styleNone')
            $('.dskBtn1').addClass('styleNone')
            $('.dskBtn2').addClass('styleNone')
            $('.dskBtn3').addClass('styleNone')

            $('.bookingDone').removeClass('styleNone')
            $('.dskBtn4').removeClass('styleNone')

            let getRecapAdd = sessionStorage.getItem('Address')
            let getRecapName = localStorage.getItem('Name')

            $('.recapAdd').text(getRecapAdd)
            $('.recapName').text(' ' + getRecapName)
        }
    }

    initContactFormMob() {
        let booking = sessionStorage.getItem("Booking")

        if (booking == 'Done') {
            $('.stationDetails').addClass('styleNone')
            $('.bikeBooking').addClass('styleNone')
            $('.signCanvas').addClass('styleNone')
            $('.noBikesAV').addClass('styleNone')
            $('.stationNone').addClass('styleNone')
            $('.mobBtn1').addClass('styleNone')
            $('.mobBtn2').addClass('styleNone')
            $('.mobBtn3').addClass('styleNone')
            $('.mobBtn4').addClass('styleNone')

            $('.bookingDone').removeClass('styleNone')
            $('.mobBtn5').removeClass('styleNone')

            let getRecapAdd = sessionStorage.getItem('Address')
            let getRecapName = sessionStorage.getItem('Name')

            $('.recapAdd').text(getRecapAdd)
            $('.recapName').text(' ' + getRecapName)
        }
    }
}