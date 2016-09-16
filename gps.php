<html>

<head>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>

<body>
	<input type="text" id="adresse" value="saisissez votre adresse � g�olocaliser" />
	<input type="button" onclick="geolocalise()" value="g�olocaliser" />Latitude : <input type="text" id="lat" value="" />Longitude : <input type="text" id="lng" value="" /> 
	<div id="answer">R�ponse de l'appel AJAX :</div>

<script type="text/javascript">

 /* D�claration des variables globales */ 
 var geocoder = new google.maps.Geocoder();
 var addr, latitude, longitude;

 /* Fonction charg�e de g�olocaliser l'adresse */ 
 function geolocalise(){
  /* R�cup�ration du champ "adresse" */ 
  addr = document.getElementById('adresse').value;
  /* Tentative de g�ocodage */ 
  geocoder.geocode( { 'address': addr}, function(results, status) {
   /* Si g�olocalisation r�ussie */ 
   if (status == google.maps.GeocoderStatus.OK) {
    /* R�cup�ration des coordonn�es */ 
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();
    /* Insertion des coordonn�es dans les input text */ 
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