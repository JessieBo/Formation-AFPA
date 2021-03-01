var nadaillac = [45.03872, 1.39725]

// creation de la map
var map = L.map('carte').setView(nadaillac, 12);//lattitude, longitude, niveau de zoom
console.log(map)

// création du calques images
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 20,
}).addTo(map);

// création d'un marqueur
var marker = L.marker(nadaillac).addTo(map);

// ajout d'un popup
marker.bindPopup('<h3> Nadaillac, France </h3>')
