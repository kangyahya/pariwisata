<div class="panel-body" style="border:1px solid #ddd;padding: 0;">
            
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZxi74hCX5kr0R0P8ugFRy6O6dJBfzfgc&callback=initMap"></script>
                  
                  <script>
                    
                    var marker;
                      function initialize() {
                      
                    // Variabel untuk menyimpan informasi (desc)
                    var infoWindow = new google.maps.InfoWindow;
                    
                    //  Variabel untuk menyimpan peta Roadmap
                    var mapOptions = {
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                        } 
                    
                    // Pembuatan petanya
                    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                              
                        // Variabel untuk menyimpan batas kordinat
                    var bounds = new google.maps.LatLngBounds();

                    // Pengambilan data dari database
                    <?php
                      $id = $_GET['id'];
                      $tampil = mysql_query("SELECT * from markers where id=$id")or die("Query failed with error: ".mysql_error());
                      while ($data = mysql_fetch_array($tampil)) {
                        $nama   = $data[nama];
                        $alamat   = $data[alamat];
                        $lat    = $data[lat];
                        $lon    = $data[lng];
                        ?>

                        var image = "<?php echo base_url().'uploads/icon/'.$icon ?> ";

                        <?php
                        
                        echo ("addMarker($lat, $lon, '<b>$nama</b><br>$alamat<br>');\n"); 
                      }
                        
                    ?>
                      
                    // Proses membuat marker 
                    function addMarker(lat, lng, info) {
                      var lokasi = new google.maps.LatLng(lat, lng);
                      bounds.extend(lokasi);
                      
                      var marker = new google.maps.Marker({
                        map: map,
                        position: lokasi,
                        icon:image
                      });       
                      map.fitBounds(bounds);
                      bindInfoWindow(marker, map, infoWindow, info);
                     }
                    
                    // Menampilkan informasi pada masing-masing marker yang diklik
                        function bindInfoWindow(marker, map, infoWindow, html) {
                          google.maps.event.addListener(marker, 'click', function() {
                            infoWindow.setContent(html);
                            infoWindow.open(map, marker);
                          });
                        }
                 
                        }
                      google.maps.event.addDomListener(window, 'load', initialize);
                    
                  </script>
                  <div id="map-canvas" style="width: auto; height: 600px;"></div>
      
          </div>