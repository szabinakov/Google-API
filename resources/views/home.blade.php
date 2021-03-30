@extends('layout')

@section('content')
    <div class="form-container">
        <h1>Welcome Back,</h1>
        @if( auth()->check() )
        <p class="name">{{ auth()->user()->name }}!</p>          
        @endif
        <p>
            Below on the map you can see all other users with the click on their flag you are able to see their name and email address as well.
        </p>
        <div id="map"></div>
    </div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script async
    src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&libraries=places">
</script>

<script>
    axios.get('/allflags')
        .then((response) => {
            const users = response.data.users
            initMap()
            function initMap() {
                
                
                const UK_AND_IRELAND = {
                    north: 60.061,
                    south: 49.959999905,
                    west: -17.015517,
                    east: 4.0919117,
                }
               
                const center = { lat: 53.4808, lng:2.2426}
                const map = new google.maps.Map(document.getElementById("map"), {
                    maxZoom: 14,
                    zoom: 5,
                    restriction: {
                        latLngBounds: UK_AND_IRELAND,
                        strictBounds: false,
                    },
                    center: center
                });
                
                users.map(user => {
                    const position = {lat: user.lat, lng: user.long}
                    const marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon:"https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"
                });
                
                const contentString = 
                `Name: ${user.name}` + '<br/>' + `Email: ${user.email}` + '<br/>' + `Postcode: ${user.postcode}`
                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
                })
                
            }
        })
        .catch(function(error){
            console.log(error)
        })
</script>
@endsection