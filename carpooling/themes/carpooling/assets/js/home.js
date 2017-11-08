$(document).ready(function () {

    $("#searchform").validate({
        errorElement: "div",
        //set the rules for the fild names
        rules: {
            destination: {
                required: true,
            },
            source: {
                required: true,
            },
            journey_date: {
                required: true,
            }
        },
        //set messages to appear inline
        messages: {
            destination: {
                required: "",
            },
            source: {
                required: "",
            },
            journey_date: {
                required: "",
            },
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }

    });




});


function initialize1() {

    var input = document.getElementById('source');
    var multicountry = expcountry;

    if (multicountry == ''){       
        autocomplete = new google.maps.places.Autocomplete(input);
        
        google.maps.event.addListener(autocomplete, 'place_changed', function () {

        var data = $('#source').val();
        geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address': data}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //alert(results[0].geometry.location.lat());
                source = results[0].geometry.location.lat() + "," + results[0].geometry.location.lng();
                $('#formlatlng').val(source);

            } else
            {
                alert('Latitude and longitude not found for your input please try different(near by) location');
                $("#formlatlng").val('');
            }

        });
    });
    }
    if (multicountry != '') {
        for (country in multicountry) {             
            var options = {componentRestrictions: {country: multicountry[country]}};
            autocomplete = new google.maps.places.Autocomplete(input, options);
            
            google.maps.event.addListener(autocomplete, 'place_changed', function () {

        var data = $('#source').val();
        geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address': data}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //alert(results[0].geometry.location.lat());
                source = results[0].geometry.location.lat() + "," + results[0].geometry.location.lng();
                $('#formlatlng').val(source);

            } else
            {
                alert('Latitude and longitude not found for your input please try different(near by) location');
                $("#formlatlng").val('');
            }

        });
    });
        }
    }

    
}

function initialize2() {

    var input = document.getElementById('destination');
    var multicountry = expcountry;

    if (multicountry == ''){       
        autocomplete = new google.maps.places.Autocomplete(input);
        
        google.maps.event.addListener(autocomplete, 'place_changed', function () {

            var data = $("#destination").val();
            geocoder = new google.maps.Geocoder();

            geocoder.geocode({'address': data}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    //alert(results[0].geometry.location.lat());
                    destination = results[0].geometry.location.lat() + "," + results[0].geometry.location.lng();
                    $('#tolatlng').val(destination);
                } else
                {
                    alert('Latitude and longitude not found for your input please try different(near by) location');
                    $("#tolatlng").val('');
                }

            });

        });
    }
    if (multicountry != '') {
        for (country in multicountry) {             
            var options = {componentRestrictions: {country: multicountry[country]}};
            autocomplete = new google.maps.places.Autocomplete(input, options);
            
            google.maps.event.addListener(autocomplete, 'place_changed', function () {

            var data = $("#destination").val();
            geocoder = new google.maps.Geocoder();

            geocoder.geocode({'address': data}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    //alert(results[0].geometry.location.lat());
                    destination = results[0].geometry.location.lat() + "," + results[0].geometry.location.lng();
                    $('#tolatlng').val(destination);
                } else
                {
                    alert('Latitude and longitude not found for your input please try different(near by) location');
                    $("#tolatlng").val('');
                }

            });

        });
        }
    }

        
}

google.maps.event.addDomListener(window, 'load', initialize1);
google.maps.event.addDomListener(window, 'load', initialize2);

function getfrequency()
{
    var d = new Date($("#journey_date").val());
    var n = d.getDay()
    $('#frequency').val(n);

}

google.maps.event.addDomListener(window, 'load', initialize1mob);
google.maps.event.addDomListener(window, 'load', initialize2mob);

function initialize1mob() {
    
    var input = document.getElementById('mob_source');
    var multicountry = expcountry;

    if (multicountry == ''){       
        autocomplete = new google.maps.places.Autocomplete(input);
        
        google.maps.event.addListener(autocomplete, 'place_changed', function () {

        var data = $('#mob_source').val();
        geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address': data}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //alert(results[0].geometry.location.lat());
                source = results[0].geometry.location.lat() + "," + results[0].geometry.location.lng();
                $('#mob_formlatlng').val(source);

            } else
            {
                alert('Latitude and longitude not found for your input please try different(near by) location');
                $("#mob_formlatlng").val('');
            }

        });
    });
    }
    if (multicountry != '') {
        for (country in multicountry) {             
            var options = {componentRestrictions: {country: multicountry[country]}};
            autocomplete = new google.maps.places.Autocomplete(input, options);
            
            google.maps.event.addListener(autocomplete, 'place_changed', function () {

        var data = $('#mob_source').val();
        geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address': data}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //alert(results[0].geometry.location.lat());
                source = results[0].geometry.location.lat() + "," + results[0].geometry.location.lng();
                $('#mob_formlatlng').val(source);

            } else
            {
                alert('Latitude and longitude not found for your input please try different(near by) location');
                $("#mob_formlatlng").val('');
            }

        });
    });
        }
    }
    
    
}
function initialize2mob() {
    
    var input = document.getElementById('mob_destination');
    var multicountry = expcountry;

    if (multicountry == ''){       
        autocomplete = new google.maps.places.Autocomplete(input);
        
        google.maps.event.addListener(autocomplete, 'place_changed', function () {

        var data = $('#mob_destination').val();
        geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address': data}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //alert(results[0].geometry.location.lat());
                source = results[0].geometry.location.lat() + "," + results[0].geometry.location.lng();
                $('#mob_tolatlng').val(source);

            } else
            {
                alert('Latitude and longitude not found for your input please try different(near by) location');
                $("#mob_tolatlng").val('');
            }

        });
    });
    }
    if (multicountry != '') {
        for (country in multicountry) {             
            var options = {componentRestrictions: {country: multicountry[country]}};
            autocomplete = new google.maps.places.Autocomplete(input, options);
            
            google.maps.event.addListener(autocomplete, 'place_changed', function () {

        var data = $('#mob_destination').val();
        geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address': data}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //alert(results[0].geometry.location.lat());
                source = results[0].geometry.location.lat() + "," + results[0].geometry.location.lng();
                $('#mob_tolatlng').val(source);

            } else
            {
                alert('Latitude and longitude not found for your input please try different(near by) location');
                $("#mob_tolatlng").val('');
            }

        });
    });
        }
    }
    
    
}

function getfrequencymob()
{
    var d = new Date($("#journey_dater").val());
    var n = d.getDay()
    $('#mob_frequency').val(n);

}