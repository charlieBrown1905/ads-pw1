
var lat1 = -23.7891;
var lng1 = -51.1234;

var lat2 = -23.7890;
var lng2 = -51.1233;

var distancia = Math.sqrt(
    Math.pow(lng1 - lng2, 2) +
    Math.pow(lat1 - lat2, 2));

var distanciaEmMetros = distancia * 111111.11;

console.log(`Distancia eh ${distanciaEmMetros}`);

