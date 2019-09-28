
//<![CDATA[
 
var iconBlue = new GIcon();
 
iconBlue.image = 'http://labs.google.com/ridefinder/images/mm_20_blue.png';
 
iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
 
iconBlue.iconSize = new GSize(12, 20);
 
iconBlue.shadowSize = new GSize(22, 20);
 
iconBlue.iconAnchor = new GPoint(6, 20);
 
iconBlue.infoWindowAnchor = new GPoint(5, 1);
 
var iconRed = new GIcon();
 
iconRed.image = 'http://labs.google.com/ridefinder/images/mm_20_red.png';
 
iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
 
iconRed.iconSize = new GSize(12, 20);
 
iconRed.shadowSize = new GSize(22, 20);
 
iconRed.iconAnchor = new GPoint(6, 20);
 
iconRed.infoWindowAnchor = new GPoint(5, 1);
 
var iconGreen = new GIcon();
 
iconGreen.image = 'http://labs.google.com/ridefinder/images/mm_20_green.png';
 
iconGreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
 
iconGreen.iconSize = new GSize(12, 20);
 
iconGreen.shadowSize = new GSize(22, 20);
 
iconGreen.iconAnchor = new GPoint(6, 20);
 
iconGreen.infoWindowAnchor = new GPoint(5, 1);
 
var iconYellow = new GIcon();
 
iconYellow.image = 'http://labs.google.com/ridefinder/images/mm_20_yellow.png';
 
iconYellow.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
 
iconYellow.iconSize = new GSize(12, 20);
 
iconYellow.shadowSize = new GSize(22, 20);
 
iconYellow.iconAnchor = new GPoint(6, 20);
 
iconYellow.infoWindowAnchor = new GPoint(5, 1);
 
var customIcons = [];
 
customIcons["Wisata"] = iconBlue;
 
customIcons["Mall"] = iconRed;
 
customIcons["Museum"] = iconGreen;

customIcons["Hotel"] = iconYellow;
 
function load() {
 
if (GBrowserIsCompatible()) {
 
var map = new GMap2(document.getElementById("map"));
 
map.addControl(new GSmallMapControl());
 
map.addControl(new GMapTypeControl());
 
map.setCenter(new GLatLng(-6.7320229, 108.5523164), 13);
 
GDownloadUrl("generatexml.php", function(data) {
 
var xml = GXml.parse(data);
 
var markers = xml.documentElement.getElementsByTagName("marker");
 
for (var i = 0; i < markers.length; i++) {
 
var nama = markers[i].getAttribute("nama");
 
var alamat = markers[i].getAttribute("alamat");
 
var tipe = markers[i].getAttribute("tipe");
 
var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
 
parseFloat(markers[i].getAttribute("lng")));
 
var marker = createMarker(point, nama, alamat, tipe);
 
map.addOverlay(marker);
 
}
 
});
 
}
 
}
 
function createMarker(point, nama, alamat, tipe) {
 
var marker = new GMarker(point, customIcons[tipe]);
 
var html = "<b>" + nama + "</b> <br/>" + alamat;
 
GEvent.addListener(marker, 'click', function() {
 
marker.openInfoWindowHtml(html);
 
});
return marker;
}
//]]>