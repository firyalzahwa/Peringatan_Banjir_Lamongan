//Menampilkan Peta
var map = L.map('mapid').setView([-7.118736, 112.416550], 11);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery Â© <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoicnlhbjkzc3AiLCJhIjoiY2pkMDJxZ2xpMGxjYTJxbzRtd3EzZnRzcCJ9.WsRQpljGbYjxw7za2_cPtA'
}).addTo(map);

//Menambahkan Layer Desa
var desalayer = new L.GeoJSON.AJAX("https://gevalinda.github.io/desa_lamongan/desa_lamongan.json", {
    style: {
        fillColor: "#ff7800",
        fillOpacity: 0.7,
        color: "white",
        weight: 1,
        opacity: 0.7
    }
});

//Menambahkan Layer Kecamatan
var kecamatanlayer = new L.GeoJSON.AJAX("https://gevalinda.github.io/desa_lamongan/kecamatan.json", {
    style: {
        fillColor: "#ff7800",
        fillOpacity: 0.7,
        color: "white",
        weight: 1,
        opacity: 0.7
    }
});

//Menampilka Layer Desa
document.getElementById("dataid1").addEventListener("change", function() {
    if (document.getElementById(this.id).checked == true) {
        document.getElementById('titleMode').innerText = 'Peta Desa Lamongan';
        desalayer.addTo(map);
    } else {
        desalayer.remove(map);
    }
});

//Menampilka Layer Kecamatan
document.getElementById("dataid2").addEventListener("change", function() {
    if (document.getElementById(this.id).checked == true) {
        document.getElementById('titleMode').innerText = 'Peta Kecamatan Lamongan';
        kecamatanlayer.addTo(map);
    } else {
        kecamatanlayer.remove(map);
    }
});

//Memberikan Efek pada setiap Featurenya
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

//Memberi Efek Zoom apabila di klik
function zoomToFeature(e) {
    map.fitBounds(e.target.getBounds());
}

//Menambahkan dan Menampilkan Peta Riwayat Banjir
document.getElementById("dataid4").addEventListener("change", function() {
    if (document.getElementById(this.id).checked == true) {

        document.getElementById('titleMode').innerText = 'Peta Riwayat Banjir';

        //Ambil geojson desa lamongan
        $.getJSON("https://gevalinda.github.io/desa_lamongan/desa_lamongan.json", function(data) {

            var riwayatlayer;

            //Menghilangkan efek higlight saat mouse out
            function resetHighlight(e) {
                riwayatlayer.resetStyle(e.target);
            }

            //Menambahkan efek pada setiap layer
            var riwayatlayer = L.geoJson(data, {
                onEachFeature: function(feature, layer) {
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight,
                        click: zoomToFeature
                    });
                },
                //Memberikan style dan getColorRiwayat
                style: function(feature) {
                    return {
                        weight: 2,
                        opacity: 1,
                        color: 'white',
                        dashArray: '3',
                        fillOpacity: 0.7,
                        fillColor: getColorRiwayat(feature.properties.Desa)
                    };
                }

            }).addTo(map);
            map.fitBounds(riwayatlayer.getBounds());

            //Menambahkan pop out nama desa
            riwayatlayer.bindPopup(function(e) {
                return e.feature.properties.Desa;
            });
        });
    } else {
        riwayatlayer.remove(map);
    }
});

function getColorRiwayat(desa) {
    //ini unuk colornya
    return 'tinggi' == getHistoryColor(desa) ? '#d64337' :
        'sedang' == getHistoryColor(desa) ? '#ffd868' :
        'rendah' == getHistoryColor(desa) ? '#baf1a1' :
        '#baf1a1';
}

function getHistoryColor(desa) {
    //jadi data api dipanggil disini
    $.ajax({
        type: 'GET',
        url: '/admin/map/petabanjir/',
        dataType: 'json',
        success: function(data) {
            //disimpan dilocal storage datanya agar bisa dipanggil
            localStorage.removeItem('dataBanjir');
            localStorage.setItem('dataBanjir', JSON.stringify(data));
        }
    });

    //memanggil data localstore
    var dataBanjir = localStorage.getItem('dataBanjir');
    // console.log(JSON.parse(dataBanjir));
    var color = '';
    //ini disamakan datanyaa 
    $.each(JSON.parse(dataBanjir), function(num, item) {
        desaItem = item.title;
        // console.log(item);
        if (desa.toUpperCase() == desaItem.toUpperCase()) {
            color = item.history_category;
            console.log(item.history_category);
        }
    });

    return color;

}

//Menambahkan dan Menampilkan Peta Rawan Banjir
document.getElementById("dataid5").addEventListener("change", function() {
    if (document.getElementById(this.id).checked == true) {

        document.getElementById('titleMode').innerText = 'Peta Rawan Banjir';

        $.getJSON("https://gevalinda.github.io/desa_lamongan/desa_lamongan.json", function(data) {

            var rawanlayer;

            function resetHighlight(e) {
                rawanlayer.resetStyle(e.target);
            }

            var rawanlayer = L.geoJson(data, {
                onEachFeature: function(feature, layer) {
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight,
                        click: zoomToFeature
                    });
                },
                style: function(feature) {
                    return {
                        weight: 2,
                        opacity: 1,
                        color: 'white',
                        dashArray: '3',
                        fillOpacity: 0.7,
                        fillColor: getColorRawan(feature.properties.Desa)
                    };
                }

            }).addTo(map);
            map.fitBounds(rawanlayer.getBounds());

            rawanlayer.bindPopup(function(e) {
                return e.feature.properties.Desa;
            });
        });
    } else {
        rawanLayer.remove(map);
    }
});

function getColorRawan(desa) {
    //ini unuk colornya
    return 'tinggi' == getProneColor(desa) ? '#d64337' :
        'sedang' == getProneColor(desa) ? '#ffd868' :
        'rendah' == getProneColor(desa) ? '#baf1a1' :
        '#baf1a1';
}

function getProneColor(desa) {
    //jadi data api dipanggil disini
    $.ajax({
        type: 'GET',
        url: '/admin/map/petabanjir/',
        dataType: 'json',
        success: function(data) {
            //disimpan dilocal storage datanya agar bisa dipanggil
            localStorage.removeItem('dataBanjir');
            localStorage.setItem('dataBanjir', JSON.stringify(data));
        }
    });

    //memanggil data localstore
    var dataBanjir = localStorage.getItem('dataBanjir');
    // console.log(JSON.parse(dataBanjir));
    var color = '';
    //ini disamakan datanyaa 
    $.each(JSON.parse(dataBanjir), function(num, item) {
        desaItem = item.title;
        if (desa.toUpperCase() == desaItem.toUpperCase()) {
            color = item.prone_category;
            console.log(item.prone_category);
        }
    });
    return color;
}

//Menambahkan Legend pada Peta
var legend = L.control({
    position: 'bottomleft'
});

legend.onAdd = function(map) {

    var div = L.DomUtil.create('div', 'legend');

    div.innerHTML += "<h4>Keterangan Warna</h4>";
    div.innerHTML += '<i style="background: #d64337"></i><span>Tinggi</span><br>';
    div.innerHTML += '<i style="background: #ffd868"></i><span>Sedang</span><br>';
    div.innerHTML += '<i style="background: #baf1a1"></i><span>Rendah</span><br>';

    return div;
};

legend.addTo(map);