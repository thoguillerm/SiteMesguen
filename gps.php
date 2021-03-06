<html>

<head>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>

<body>
	<input type="text" id="adresse" value="saisissez votre adresse à géolocaliser" />
	<input type="button" onclick="geolocalise()" value="géolocaliser" />Latitude : <input type="text" id="lat" value="" />Longitude : <input type="text" id="lng" value="" /> 
	<div id="answer">Réponse de l'appel AJAX :</div>

<script type="text/javascript">

 /* Déclaration des variables globales */ 
 var geocoder = new google.maps.Geocoder();
 var addr, latitude, longitude;

 /* Fonction chargée de géolocaliser l'adresse */ 
 function geolocalise(){
  /* Récupération du champ "adresse" */ 
  addr = document.getElementById('adresse').value;
  /* Tentative de géocodage */ 
  geocoder.geocode( { 'address': addr}, function(results, status) {
   /* Si géolocalisation réussie */ 
   if (status == google.maps.GeocoderStatus.OK) {
    /* Récupération des coordonnées */ 
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();
    /* Insertion des coordonnées dans les input text */ 
    document.getElementById('lat').value = latitude;
    document.getElementById('lng').value = longitude;
    /* Appel AJAX pour insertion en BDD */ 
    var sendAjax = $.ajax({
     type: "POST",
     url: 'insert-in-bdd.php',
     data: 'lat='+latitude+'&lng='+longitude+'&adr='+addr,
     success: handleResponse
    });
   }
   function handleResponse(){
    $('#answer').get(0).innerHTML = sendAjax.responseText;
   }
  });
 }

</script>

</body>
</html>