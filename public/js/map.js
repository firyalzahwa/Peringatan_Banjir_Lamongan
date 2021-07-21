//Menampilkan Peta
var map = L.map('mapid').setView([-7.118736, 112.416550], 11)

var geojson;
function resetHighlight(e) {
    geojson.resetStyle(e.target);
}

function zoomToFeature(e) {
    map.fitBounds(e.target.getBounds());
}

function highlightFeature(e) {
    var layer = e.target;
    layer.setStyle({
        weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
}

function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}

function getColor(d) {
    if(d == 1){
        return '#ffff00';
    }else if(d == 2){
        return '#ff0000';
    }else if(d == 0){
        return '#00ff00';
    }
    return '#ff7800';
}

function style(feature) {
    console.log(feature.properties.hasil);
    return {
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7,
        fillColor: getColor(feature.properties.hasil)
    };
}

function arrayColumn(array, columnName) {
    return array.map(function(value,index) {
        return value[columnName];
    })
}

geojson = L.geoJson(kecamatan_data, {
    style: style,
    onEachFeature: onEachFeature
}).addTo(map);

$('#select-pilih-peta').change(function(){
    geojson.remove(map);
    if($(this).find(":selected").data('url') == '' || $(this).find(":selected").data('url') == undefined){
        for(let _index in kecamatan_data.features){
            kecamatan_data.features[_index].properties.hasil = -1;
        }
        geojson = L.geoJson(kecamatan_data, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);
        return false;
    }
    $.ajax({
        type: "GET",
        url: $(this).find(":selected").data('url'),
        data: {},
        beforeSend: function() {
        },
        complete:function() {
        },
        success: function(data){

            for(let _index_fahp in data){
                let index = arrayColumn(kecamatan_data.features, 'id').indexOf(data[_index_fahp].id);
                if(index != -1){
                    kecamatan_data.features[index].properties.hasil =  data[_index_fahp].hasil;
                }
            }

            geojson = L.geoJson(kecamatan_data, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
        }
    });
})