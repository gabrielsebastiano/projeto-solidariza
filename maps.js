let map;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: -27.3544219, lng: -53.3942224 },
    zoom: 15,
    styles: [{
      "featureType": "poi",
      "stylers": [{
        "visibility": "off",
      }]
    }]
  });

  var iconBase = "./assets/images/points/";
  var icons = {
    hospital: {
      name: "Hospital",
      icon: iconBase + "blue-point.png"
    },
    Food: {
      name: "Lancherias",
      icon: iconBase + "yellow-point.png"
    },
    drugstore: {
      name: "Farmácias",
      icon: iconBase + "red-point.png"
    }
  };

  const legend = document.querySelector("#legend");
  const form = document.querySelector("#form");
  for (var key in icons) {
    let type = icons[key];
    let name = type.name;
    let icon = type.icon;
    let span = document.createElement("span");
    span.innerHTML = "<img src='" + icon + "'>" + name;
    legend.appendChild(span);
  }



  map.controls[google.maps.ControlPosition.LEFT_TOP].push(form);
  map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
  // Change this depending on the name of your PHP or XML file
  downloadUrl('modelMapa.php', function (data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName('marker');
    Array.prototype.forEach.call(markers, function (markerElem) {
      var id = markerElem.getAttribute('id');
      var name = markerElem.getAttribute('name');
      var address = markerElem.getAttribute('address');
      var type = markerElem.getAttribute('type');
      var point = new google.maps.LatLng(
        parseFloat(markerElem.getAttribute('lat')),
        parseFloat(markerElem.getAttribute('lng')));

      var infowincontent = document.createElement('div');
      var strong = document.createElement('strong');
      strong.textContent = name
      infowincontent.appendChild(strong);
      infowincontent.appendChild(document.createElement('br'));

      var text = document.createElement('text');
      text.textContent = address
      infowincontent.appendChild(text);
      var icon = icons[type].icon;
      var marker = new google.maps.Marker({
        map: map,
        position: point,
       // label: icon.label,
        icon:icons[type].icon
      });
      marker.addListener('click', function () {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
      });
    });
  });

  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

    request.onreadystatechange = function () {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
  }

  function doNothing() { }



}
//]]>



