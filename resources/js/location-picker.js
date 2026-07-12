import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

// Fix Leaflet's default marker icons not resolving under Vite's asset pipeline.
import markerIcon2x from 'leaflet/dist/images/marker-icon-2x.png';
import markerIcon from 'leaflet/dist/images/marker-icon.png';
import markerShadow from 'leaflet/dist/images/marker-shadow.png';

delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
    iconRetinaUrl: markerIcon2x,
    iconUrl: markerIcon,
    shadowUrl: markerShadow,
});

const YANGON_CENTER = [16.8409, 96.1735];

function initPicker(container) {
    const readonly = container.dataset.readonly === 'true';
    const latInput = readonly ? null : document.getElementById(container.dataset.latInput);
    const lngInput = readonly ? null : document.getElementById(container.dataset.lngInput);

    const initialLat = parseFloat(container.dataset.lat);
    const initialLng = parseFloat(container.dataset.lng);
    const hasInitial = !Number.isNaN(initialLat) && !Number.isNaN(initialLng);

    const center = hasInitial ? [initialLat, initialLng] : YANGON_CENTER;
    const map = L.map(container, { scrollWheelZoom: false }).setView(center, hasInitial ? 16 : 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 19,
    }).addTo(map);

    let marker = hasInitial ? L.marker(center).addTo(map) : null;

    if (readonly) {
        return;
    }

    map.on('click', (e) => {
        const { lat, lng } = e.latlng;

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }

        latInput.value = lat.toFixed(7);
        lngInput.value = lng.toFixed(7);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.location-picker-map').forEach(initPicker);
});
