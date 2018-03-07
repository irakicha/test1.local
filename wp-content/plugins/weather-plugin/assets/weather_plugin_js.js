var input = document.getElementById('searchCity');
var options = {
    types: ['(cities)'],
    placeIdOnly: name,
};

autocomplete = new google.maps.places.Autocomplete(input, options);