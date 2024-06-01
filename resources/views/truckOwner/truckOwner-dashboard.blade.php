@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@if(!session('transport'))
<script>
window.location = "{{ url('/logout') }}";
</script>

@endif
@section('content')
@include('layouts.navbars.truckowner.sidenav')
@include('layouts.navbars.truckowner.topnav', ['title' => 'Dashboard'])

<div class="container py-4">
    <div class="row mt-4">
            <div class="card shadow-sm rounded-3 border border-primary">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Voice Search</h5>
                    <button id="startButton" onclick="getGeoLocation()" class="btn btn-primary btn-lg mb-3"><i
                            class="fas fa-microphone"></i></button>
                    <p id="output" class="mb-3"></p>
                    <form action="{{ route('search-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" id="speech" name="speech" class="form-control">
                            @error('speech') <p class="text-danger text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-3">
                            <input type="hidden" id="lat" name="lat" class="form-control">
                            <input type="hidden" name="status" value="1" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" id="long" name="long" class="form-control">
                        </div>
                        <button type="submit" id="search" class="btn btn-success btn-block">Search</button>
                    </form>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Manual Search</h5>

                    <form action="{{ route('drop-quarry') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group mb-3">
                            <select id="district" name="district" class="form-control">
                                <option value="">-- Select District --</option>
                                @foreach ($datas as $district)
                                <option value="{{ $district->id}}">
                                    {{$district->district}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <select id="product"  name="product"class="form-control">
                            <option value="">-- Select Product --</option>
                            </select>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <!-- <div class="form-group">
                        <select id="city-dropdown" class="form-control">
                        </select>
                    </div> -->


                        <button type="submit"  class="btn btn-success btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>
$(document).ready(function() {

    /*------------------------------------------
    --------------------------------------------
    Country Dropdown Change Event
    --------------------------------------------
    --------------------------------------------*/
    $('#district').on('change', function() {
        var district_id = this.value;

        $("#product").html('');
        $.ajax({
            url: "{{ url('get-productlist') }}",
            type: "post",
            data: {
                district: district_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#product').html('<option value="">-- Select Product --</option>');
                $.each(result, function(key, value) {
                    $("#product").append('<option value="' + value.id + '">' + value
                        .product_name + '</option>');
                });

            },
            error: function(xhr, status, error) {

                $('#product').html('<option value=""> Product Not Found</option>');

            }
        });
    });
});



// When the DOM content is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get references to HTML elements
    const startButton = document.getElementById('startButton');
    const outputDiv = document.getElementById('output');
    const speechInput = document.getElementById('speech');

    // Initialize SpeechRecognition object
    let recognition = new webkitSpeechRecognition() || new SpeechRecognition();
    recognition.lang = 'en-US'; // Set recognition language to English (United States)
    recognition.interimResults = true; // Enable interim results (partial recognition)

    // When speech recognition starts
    recognition.onstart = () => {
        outputDiv.textContent = 'Listening...';
    };

    // When speech recognition produces a result
    recognition.onresult = function(event) {
        let finalTranscript = '';

        // Iterate through recognition results
        for (let i = event.resultIndex; i < event.results.length; ++i) {
            if (event.results[i].isFinal) {
                finalTranscript += event.results[i][0].transcript + ' ';
            }
        }

        // Display final transcription result in outputDiv
        outputDiv.innerHTML = '<p>Result: ' + finalTranscript + '</p>';
        // Set the value of speechInput field to the final transcript
        speechInput.value = finalTranscript;
    };

    // When speech recognition ends
    recognition.onend = function() {
        // Speech recognition has ended
    };

    // When the startButton is clicked
    startButton.addEventListener('click', function() {
        // Clear the old speech when starting a new speech session
        outputDiv.innerHTML = '';
        // Start speech recognition
        recognition.start();
    });
});





function getGeoLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            // Success callback
            function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                lat.value = latitude;
                long.value = longitude;

                console.log('Latitude:', latitude);
                console.log('Longitude:', longitude);


                // You can now use the latitude and longitude as needed.
                // For example, you may want to display it on the page or send it to the server.
            },
            // Error callback
            function(error) {
                console.error('Error getting geolocation:', error.message);
            }
        );
    } else {
        console.error('Geolocation is not supported by this browser.');
    }
}
</script>

@endpush
