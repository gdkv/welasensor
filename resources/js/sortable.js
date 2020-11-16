import Sortable from "sortablejs";
const axios = require('axios').default;

document.addEventListener("DOMContentLoaded", function () {
    let sensorsList = document.querySelector('.sensors-list');

    let sortable = new Sortable(sensorsList, {
        filter: '.add-sensor_form', // is not draggable

        onSort: function (/**Event*/ evt) {
            // same properties as onEnd
            console.log('finished');
            console.log(evt.to);

            axios.post('/app/sensor/sort', {
                firstName: 'Fred',
                lastName: 'Flintstone'
            }).then(function (response) {
                console.log(response);
            });
        },
    });
});

