import Alpine from 'alpinejs'
import mask from '@alpinejs/mask'
Alpine.plugin(mask)

window.Alpine = Alpine
Alpine.start()

import "./bootstrap"
import "@tabler/core/dist/js/tabler.min"
import "../css/hotspot.css"

// document.addEventListener("DOMContentLoaded", function(event) {
//      document.getElementById('pageMain').style.display = "inherit"
//     document.getElementById('spinload').remove()
// });
