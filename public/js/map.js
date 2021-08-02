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

function arrayColumn(array, columnName) {
    return array.map(function(value,index) {
        return value[columnName];
    })
}
var draw = {};

$('#select-pilih-peta').change(function(){
    $.ajax({
        type: "GET",
        url: $(this).find(":selected").data('url'),
        data: {},
        beforeSend: function() {
            map.removeLayer('maine')
            map.removeSource('maine')
        },
        complete:function() {
        },
        success: function(data){
            // console.log('start', kecamatan_data.features)
            for(let _index_fahp in data){
                let index = arrayColumn(kecamatan_data.features, 'id').indexOf(data[_index_fahp].id);
                if(index != -1){
                    // console.log('start',kecamatan_data.features[index].properties.new_color)
                    kecamatan_data.features[index].properties.new_color =  getColor(data[_index_fahp].hasil);
                    // console.log('end',kecamatan_data.features[index].properties.new_color)
                }
            }
            map.addSource('maine', {
                'type': 'geojson',
                'data': kecamatan_data
            });
            map.addLayer({
                'id': 'maine',
                'type': 'fill',
                'source': 'maine', // reference the data source
                'layout': {},
                'paint': {
                    
                    'fill-opacity': 0.5
                }
            });
            map.setPaintProperty('maine', 'fill-color', ['get', 'new_color']);        
        }
    });
})
mapboxgl.accessToken = 'pk.eyJ1IjoiZmlyeWFsemFod2EiLCJhIjoiY2tyYzVuOTZ0M2Z5eTJ3cno1d2ptOXZ6eSJ9.b8kigM8EySBANTLFVfMX3g';
    var map = new mapboxgl.Map({
        container: 'mapid', // container ID
        style: 'mapbox://styles/mapbox/light-v10', // style URL
        center: [112.416550, -7.118736], // starting position
        zoom:9 // starting zoom
    });

    map.on('load', function () {
        map.addSource('maine', {
            'type': 'geojson',
            'data': kecamatan_data
        });

        map.addLayer({
            'id': 'maine',
            'type': 'fill',
            'source': 'maine', // reference the data source
            'layout': {},
            'paint': {
                
                'fill-opacity': 0.5
            }
        });

        map.on('mousemove', function (e) {
            var states = map.queryRenderedFeatures(e.point, {
              layers: ['maine']
            });
  
            if (states.length > 0) {
              document.getElementById('pd').innerHTML =
                '<h3><strong>' +
                states[0].properties.Kecamatan +
                '</strong></h3>' ;
            } else {
              document.getElementById('pd').innerHTML =
                '<p>Hover over a state!</p>';
            }
          });
        map.setPaintProperty('maine', 'fill-color', ['get', 'color']);
    });
    
    map.on('draw.update', sourceRefresh);
    function sourceRefresh(e) {
        var data = draw.getAll();
        console.log(draw)
        map.getSource('maine').setData(data);
    };