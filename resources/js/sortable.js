import Sortable from "sortablejs";
const axios = require('axios').default;

document.addEventListener("DOMContentLoaded", function () {
    let sensorsList = document.querySelector('.sensors-list');

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
                console.log(response);
            });
        },
    });
});

