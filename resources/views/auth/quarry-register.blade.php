<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .container {
        max-width: 700px;
        width: 100%;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    .container .title {
        font-size: 25px;
        font-weight: 500;
        position: relative;
    }

    .container .title::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        border-radius: 5px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .content form .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: calc(100% / 2 - 20px);
    }

    form .input-box span.details {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .user-details .input-box input,
    textarea,
    select {
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box1 input {
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        padding-top: 15px;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
        border-color: #9b59b6;
    }

    form .gender-details .gender-title {
        font-size: 20px;
        font-weight: 500;
    }

    form .category {
        display: flex;
        width: 80%;
        margin: 14px 0;
        justify-content: space-between;
    }

    form .category label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    form .category label .dot {
        height: 18px;
        width: 18px;
        border-radius: 50%;
        margin-right: 10px;
        background: #d9d9d9;
        border: 5px solid transparent;
        transition: all 0.3s ease;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two,
    #dot-3:checked~.category label .three {
        background: #9b59b6;
        border-color: #d9d9d9;
    }

    form input[type="radio"] {
        display: none;
    }

    form .button {
        height: 45px;
        margin: 35px 0
    }

    form .button input {
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    form .button input:hover {
        /* transform: scale(0.99); */
        background: linear-gradient(-135deg, #71b7e6, #9b59b6);
    }

    @media(max-width: 584px) {
        .container {
            max-width: 100%;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: 100%;
        }

        form .category {
            width: 100%;
        }

        .content form .user-details {
            max-height: 300px;
            overflow-y: scroll;
        }

        .user-details::-webkit-scrollbar {
            width: 5px;
        }
    }

    @media(max-width: 459px) {
        .container .content .category {
            flex-direction: column;
        }
    }
    </style>
</head>

<body>
    <!DOCTYPE html>
    <!-- Created By CodingLab - www.codinglabweb.com -->
    <html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <title> Responsive Registration Form | CodingLab </title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div class="container">
            <div class="title">Quarry Registration</div>
            <div class="content">
                <form action="{{ route('quarryregister') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Quarry Name</span>
                            <input type="text" name="quarryname" placeholder="Enter Quarry Name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Quarry Owner Name</span>
                            <input type="text" name="quarryownername" placeholder="Enter Quarry Owner Name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input type="number" name="phone" placeholder="Enter Phone" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Quarry Address</span>
                            <textarea type="text" name="quarryaddress" placeholder="Enter Quarry Address"
                                required></textarea>
                        </div>
                        <div class="input-box">
                            <label for="category">Select a District:</label>
                            <select id="category" name="district" required>

                                @foreach($datas as $data)

                                <option value="{{ $data->id }}">{{ $data->district }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Pincode</span>
                            <input type="number" name="pincode" placeholder="Enter Pincode" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" name="password" placeholder="Enter Password" aria-label="Password"
                                value="secret" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Get Geo Location</span>
                            <button type="button" onclick="getGeoLocation()">&nbsp;&nbsp;<i class="fa fa-map-marker"></i> - location</button>

                            <h5 id="texto"></h5>
                        </div>

                        <input type="hidden" name="lat" id="lat" placeholder="Enter quarry latitude" required>

                        <input type="hidden" name="long" id="long" placeholder="Enter quarry longitude" required>

                        <div class="input-box1">
                            <span class="details">Quarry Photo</span>
                            <input type="file" name="quarryphoto" required>
                        </div>
                    </div>

                    <div class="button">
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div>

    </body>

    </html>
</body>
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
function getGeoLocation() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            // Success callback
            function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                lat.value = latitude;
                long.value = longitude;
                document.getElementById('texto').innerHTML = "Geo Location Entered";

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

</html>
