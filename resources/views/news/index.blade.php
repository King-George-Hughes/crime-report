<x-layout >

<main>
    <div class="background-img">
        {{-- Hero --}}
        {{-- @include('partials._hero') --}}
        {{-- @foreach ($allCrimeTypes as $allCrimeType) --}}
            <x-hero :allCrimeTypes="$allCrimeTypes" :location="$location" :allEmergencyTypes="$allEmergencyTypes"/>
        {{-- @endforeach --}}
        {{-- Hero --}}
    </div>

    <div class="album py-3 bg-light">
        <div class="container">
            <h1 class="h3 text-center text-decoration-underline">NEWS</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                {{-- Demo --}}
                @foreach ($news as $new)
                    <x-news-card :new="$new" />

                @endforeach
                {{-- Demo --}}
            </div>
        </div>

        {{-- Location --}}
        {{-- <div class="container">
            <h1>How to Get Current User Location with Laravel - Tutsmake.com</h1>
            <div class="card">
                <div class="card-body">
                    @if($location)
                        <h4>IP: {{ $location->ip }}</h4>
                        <h4>Country Name: {{ $location->countryName }}</h4>
                        <h4>Country Code: {{ $location->countryCode }}</h4>
                        <h4>Region Code: {{ $location->regionCode }}</h4>
                        <h4>Region Name: {{ $location->regionName }}</h4>
                        <h4>City Name: {{ $location->cityName }}</h4>
                        <h4>Zip Code: {{ $location->zipCode }}</h4>
                        <h4>Latitude: {{ $location->latitude }}</h4>
                        <h4>Longitude: {{ $location->longitude }}</h4>
                        <h2><?php echo $location->longitude ?></h2>
                    @endif
                </div>
            </div>
        </div> --}}
        {{-- Location --}}


        {{-- Pagination --}}
        <div class="container">
            <div class="mt-3 p-3 pagination-md">
                {{ $news->links() }}
            </div>
        </div>

    </div>

    {{-- <h1 class="DD"></h1> --}}


</main>

<script>
    // Geolocation API
    const Latitude = document.querySelectorAll('.Latitude');
    const Longitude = document.querySelectorAll('.Longitude');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                console.log(position);
                const { latitude } = position.coords;
                const { longitude } = position.coords;
                Latitude.forEach(lat=>lat.value = `${latitude}`)
                Longitude.forEach(lat=>lat.value = `${longitude}`)
             
                var currentLocation = window.location;
                console.log(currentLocation);
                console.log(currentLocation.hostname);

                let loc = window.location.href
                console.log(loc);

            },
            function () {
                alert("Could not get location");
            }
        );
    }
</script>
</x-layout>
 