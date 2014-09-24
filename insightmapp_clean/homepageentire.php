<!DOCTYPE html>

<html>

<!--  See the db structure in /Dropbox/Project1/insightmapp_dbstructure.txt -->

<head>
<style>
.

</style>
<link rel="stylesheet" href="CSStyle/HomeStyle.css"/>
<meta charset='utf-8'/>   
<link rel="stylesheet" href="CSStyle/leaf.css"/>

  <script src='https://api.tiles.mapbox.com/mapbox.js/v2.0.1/mapbox.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox.js/v2.0.1/mapbox.css' rel='stylesheet' />

</head>

    
<body>
    <header>
              <div class="logo"> 
            
          <img alt="inSightMapplogo" src="./parts/svgImages/IMLogo.svg" class="IMlogo" />
            <a href="parts/upload.php" class="Upload">Upload</a>
        <a href="logIn.php" class = "signIn">Sign in</a>
            
            
        </div>
            <label for="searchPlace">
        <nav class="search">
 
            
          <p class="insightSearch"> <form   method = "post" action="search.php"> <input type="text" name="searchPlace" class="searchPlace" placeholder="inSightMapp" size="30"> </form> 
            </p>
        </nav>
        
    </header>
    <section>
    
      	<nav class="side">
            <nav class="sideList">
            <!-- Parties à changer -->
                
            <a  href="#" class="Recent">Recent</a>
         
            <a href="#" class="Popular">Popular</a>    
            <a href="#" class="Followed"  >FollowIN</a>
            <a href="#"  >News Spots</a>
            
              
        </nav>
        <aside class="sideFooter">
        </aside>
    </section>
      
        
  <footer > 
    
      
      
    </footer>
 
    

    <div id="map"></div>


<!--  <iframe class="map" src='http://a.tiles.mapbox.com/v3/dmitryprokofyev.ic2d2fbc/attribution,zoomwheel.html'></iframe>
-->
    

<script>
//Provide your access token
L.mapbox.accessToken = 'pk.eyJ1IjoiZG1pdHJ5cHJva29meWV2IiwiYSI6IkpyanVVbG8ifQ.ikhXo6zUpSk2dbwLhqpvzA';
// Create a map in the div #map
var map =  L.mapbox.map('map', 'dmitryprokofyev.ic2d2fbc');

var Francois_jpg_X = 48.033;
var Francois_jpg_Y = -4.85;

var myicon = L.icon( {
	iconUrl : 'images/Francois.jpg',
		iconSize : [40,40],
shadowAnchor: [Francois_jpg_X, Francois_jpg_Y]
});

var popup = L.marker([Francois_jpg_X, Francois_jpg_Y] , {icon:myicon}).addTo(map);



</script>





</body>    

</html>