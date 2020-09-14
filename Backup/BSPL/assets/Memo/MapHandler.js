class MapHandler {
    constructor() {
        this.fileLength = 0
        this.response = undefined
        this.mapid = undefined
        this.marker = undefined
        this.getInfos()
        this.gridLockRemover()
    }

    gridLockRemover() {

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $('.gridLock').on('dblclick', e => {
                $('.gridLock').fadeOut("fast")
            })

            //For chrome presentation 
            $('.gridLock').on('click', e => {
                $('.gridLock').fadeOut("fast")
            })
        } else {
            $('.gridLock').on('dblclick', e => {
                $('.gridLock').fadeOut("fast")
            })

        }
    }

    getInfos() {
        const self = this
        const request = new XMLHttpRequest()

        request.onreadystatechange = function(responseText) {
            if (request.readyState === 4 && request.status === 200) {
                self.response = JSON.parse(request.responseText)
                self.fileLength = self.response.length
                self.mapGeoCoding()
                self.addMarker()
            }
        }

        request.open(
            'GET',
            'https://api.jcdecaux.com/vls/v1/stations?contract=nantes&apiKey=7c03032cf082ee893681434071a4661b33ece5c0'
        )
        request.send()
    }

    mapGeoCoding() {
        const self = this

        //create map
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            self.mapid = L.map('mapid', {
                center: [47.218371, -1.553621],
                zoom: 15
            })

        } else {
            self.mapid = L.map('mapid', {
                center: [47.218371, -1.553621],
                zoom: 14
            })
        }

        //create map layer
        L.tileLayer(
            'https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 19
            }
        ).addTo(self.mapid)
    }

    addMarker() {
        const self = this

        //Set My Icon
        var myIcon = L.icon({
            iconUrl: 'assets/img/PinRedS.png',
            iconSize: [50, 50],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76]
        })

        var myIconGrey = L.icon({
            iconUrl: 'assets/img/PinGreyS.png',
            iconSize: [50, 50],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76]
        })

        //Add marker
        for (let i = 0; i < this.fileLength; i++) {
            let stationLat = this.response[i].position.lat
            let stationLng = this.response[i].position.lng
            let stationName = this.response[i].name
            let stationAdd = this.response[i].address
            let stationAvBikeStands = this.response[i].available_bike_stands
            let stationAvBike = this.response[i].available_bikes

            if (stationAvBike == 0) {
                self.marker = new L.marker([stationLat, stationLng], {
                    icon: myIconGrey
                })
                self.marker.addTo(self.mapid).on('click', onClick)
                self.marker.bindPopup(stationName)
            } else if (stationAvBike > 0) {
                self.marker = new L.marker([stationLat, stationLng], { icon: myIcon })
                self.marker.addTo(self.mapid).on('click', onClick)
                self.marker.bindPopup(stationName)
            }

            function onClick(e) {
                let booking = sessionStorage.getItem("Booking")
                let getFirstName = localStorage.getItem('firstName')
                let getLastName = localStorage.getItem('lastName')

                $('.stationNone').addClass('styleNone')
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    //Check if there's already a Booking done ?
                    if (booking == 'Done') {
                        $('.stationDetails').addClass('styleNone')
                        $('.bikeBooking').addClass('styleNone')
                        $('.signCanvas').addClass('styleNone')
                        $('.noBikesAV').addClass('styleNone')
                        $('.mobBtn1').addClass('styleNone')
                        $('.mobBtn2').addClass('styleNone')
                        $('.mobBtn3').addClass('styleNone')
                        $('.mobBtn4').addClass('styleNone')

                        $('.bookingDone').removeClass('styleNone')
                        $('.mobBtn5').removeClass('styleNone')

                        let getRecapAdd = sessionStorage.getItem('Address')
                        let getRecapName = localStorage.getItem('Name')

                        $('.recapAdd').text(getRecapAdd)
                        $('.recapName').text(' ' + getRecapName)
                    } else {
                        //If there's no booking already in place then check if there's a bike aviable at the station
                        if (stationAvBike == 0) {
                            $('.stationDetails').addClass('styleNone')
                            $('.bikeBooking').addClass('styleNone')
                            $('.signCanvas').addClass('styleNone')
                            $('.bookingDone').addClass('styleNone')
                            $('.mobBtn1').addClass('styleNone')
                            $('.mobBtn2').addClass('styleNone')
                            $('.mobBtn3').addClass('styleNone')
                            $('.mobBtn4').addClass('styleNone')
                            $('.mobBtn5').addClass('styleNone')

                            $('.noBikesAV').removeClass('styleNone')
                                //If there's a bike aviable display station's info
                        } else if (stationAvBike > 0) {
                            $('.required').val('')

                            $('.mobBtn2').addClass('styleNone')
                            $('.mobBtn3').addClass('styleNone')
                            $('.mobBtn4').addClass('styleNone')
                            $('.mobBtn5').addClass('styleNone')
                            $('.bikeBooking').addClass('styleNone')
                            $('.bookingDone').addClass('styleNone')
                            $('.signCanvas').addClass('styleNone')
                            $('.noBikesAV').addClass('styleNone')

                            $('.mobBtn1').removeClass('styleNone')
                            $('.stationDetails').removeClass('styleNone')

                            if (stationAdd == '') {
                                $('.sttAdd').text(' ' + stationName)
                            } else if (stationAdd > '') {
                                $('.sttAdd').text(' ' + stationAdd)
                            }

                            $('.sttAVBS').text(' ' + stationAvBikeStands)
                            $('.sttAVB').text(' ' + stationAvBike)

                            $('.inputFirst:text').val(getFirstName);
                            $('.inputLast:text').val(getLastName);
                        }
                    }
                } else {
                    //Check if there's already a Booking done ?
                    if (booking == 'Done') {
                        $('.stationDetails').addClass('styleNone')
                        $('.bikeBooking').addClass('styleNone')
                        $('.signCanvas').addClass('styleNone')
                        $('.noBikesAV').addClass('styleNone')
                        $('.dskBtn1').addClass('styleNone')
                        $('.dskBtn2').addClass('styleNone')
                        $('.dskBtn3').addClass('styleNone')

                        $('.bookingDone').removeClass('styleNone')
                        $('.dskBtn4').removeClass('styleNone')

                        let getRecapAdd = sessionStorage.getItem('Address')
                        let getRecapName = localStorage.getItem('Name')

                        $('.recapAdd').text(getRecapAdd)
                        $('.recapName').text(' ' + getRecapName)
                    } else {
                        //If there's no booking already in place then check if there's a bike aviable at the station
                        if (stationAvBike == 0) {
                            $('.stationDetails').addClass('styleNone')
                            $('.bikeBooking').addClass('styleNone')
                            $('.signCanvas').addClass('styleNone')
                            $('.bookingDone').addClass('styleNone')
                            $('.dskBtn1').addClass('styleNone')
                            $('.dskBtn2').addClass('styleNone')
                            $('.dskBtn3').addClass('styleNone')
                            $('.dskBtn4').addClass('styleNone')

                            $('.noBikesAV').removeClass('styleNone')
                                //If there's a bike aviable display station's info
                        } else if (stationAvBike > 0) {
                            $('.required').val('')

                            $('.dskBtn2').addClass('styleNone')
                            $('.dskBtn3').addClass('styleNone')
                            $('.dskBtn4').addClass('styleNone')
                            $('.bookingDone').addClass('styleNone')
                            $('.signCanvas').addClass('styleNone')
                            $('.noBikesAV').addClass('styleNone')

                            $('.dskBtn1').removeClass('styleNone')
                            $('.stationDetails').removeClass('styleNone')
                            $('.bikeBooking').removeClass('styleNone')

                            if (stationAdd == '') {
                                $('.sttAdd').text(' ' + stationName)
                            } else if (stationAdd > '') {
                                $('.sttAdd').text(' ' + stationAdd)
                            }

                            $('.sttAVBS').text(' ' + stationAvBikeStands)
                            $('.sttAVB').text(' ' + stationAvBike)

                            $('.inputFirst:text').val(getFirstName);
                            $('.inputLast:text').val(getLastName);

                            // If name already entered then allow to next step
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
                        }
                    }
                }
            }
        }
    }
}