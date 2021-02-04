// Merlijns private mapbox token
mapboxgl.accessToken = 'pk.eyJ1Ijoibm9wbGVhc2VtZXJsaW4iLCJhIjoiY2pueDZnM3BuMDh0aTNybjdqOTJqaHE3cCJ9.KCT5UDcVVkanDNIQO_3aUw';

// Nieuwe instantie van mapbox
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    zoom: 8,
    center: [106.827, -6.363]
});

// Navigatie toegevoegd
map.addControl(new mapboxgl.NavigationControl());


// het inladen van alle weer stations
function loadWeatherStations() {
    var client = new XMLHttpRequest();
    client.open('GET', 'js/regio_stations.xml');

    client.send();
    client.onloadend = () => {
        let xmlText = client.responseText;
        parser = new DOMParser();
        xmlDoc = parser.parseFromString(xmlText, "text/xml");
        let rows = xmlDoc.querySelectorAll('row');
        reformatWeatherStations(rows);
    }
}


// De weerstations omzetten naar het juiste format
function reformatWeatherStations(rows) {
    for (const row of rows) {
        // station number
        stn = row.childNodes[1].innerHTML
        // station name
        name = row.childNodes[3].innerHTML
        // station coords
        data = getWeatherDataFromAdvancedFunction();
        var popup = new mapboxgl.Popup({offset: 25}).setText(
            "This is weather station " + stn + " in " + name + " STP: " + data[0] + " SLP: " + data[1]
        );

        letLong = [parseFloat(row.childNodes[9].innerHTML), parseFloat(row.childNodes[7].innerHTML)]
        new mapboxgl.Marker()
            .setLngLat(letLong)
            .setPopup(popup)
            .addTo(map);
    }
}


function getWeatherDataFromAdvancedFunction(min = 970, max = 1030) {
    rand = Math.floor((Math.random() * (max - min) + min) * 10) / 10;
    diff = Math.floor(((Math.random() * (5 - 1) + 1) + rand) * 10) / 10
    return [rand, diff];
}

loadWeatherStations();
