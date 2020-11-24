import Sortable from "sortablejs";
const axios = require('axios').default;

document.addEventListener("DOMContentLoaded", function () {
    let sensorsList = document.querySelector('.sensors-list');

    if (typeof(sensorsList) != 'undefined' && sensorsList != null) {
        let sortable = new Sortable(sensorsList, {
            filter: '.add-sensor_form', // is not draggable
            handle: '.item-priority',
            onSort: function (evt) {
                let result = [];
                const list = evt.to.querySelectorAll(".item");
                for (let item of list) {
                    result.push(item.dataset.sensorId);
                }

                axios.post('/app/sensor/sort', {
                    sensors: result
                }).then(function (response) {
                    let alert = document.createElement("div");
                    alert.classList.add("alert");
                    alert.innerHTML = "<p>Sensors order is changed!</p>"
                    document.querySelector(".content").appendChild(alert);
                    setTimeout(function () {
                        alert.parentNode.removeChild(alert);
                    }, 6000);
                });
            },
        });
    }
});

