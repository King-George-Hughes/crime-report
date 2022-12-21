// Full Year
const yearEl = document.querySelector(".year");
const now = new Date();
yearEl.textContent = `${now.getFullYear()}`;

// Variables
const ID = document.getElementById("ID").value;
const LAT = document.getElementById("LAT").value;
const LNG = document.getElementById("LNG").value;
const C_TYPE = document.getElementById("C-TYPE").value;
const REGION = document.getElementById("REGION").value;

// Map
const coords = [LAT, LNG];

const map = L.map("map").setView(coords, 10);
const tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 20,
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

const marker = L.marker(coords)
    .addTo(map)
    .bindPopup(
        `<span class="text-danger">ID:${ID} </span> ${C_TYPE}.<br> ${REGION}.`
    )
    .openPopup();

console.log(coords);

////////////

// Get Geolocation
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        function (position) {
            console.log(position);
            const { latitude } = position.coords;
            const { longitude } = position.coords;

            L.Routing.control({
                waypoints: [L.latLng(LAT, LNG), L.latLng(latitude, longitude)],
                // waypoints: [L.latLng(LAT, LNG), L.latLng(7.5843331, -1.9375596)],
                routeWhileDragging: true,
            }).addTo(map);
        },
        function () {
            alert("Could not get location");
        }
    );
}
