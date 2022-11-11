<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$error = $this->session->flashdata('error');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Casarosa Bed & Breakfast</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/main.css">
        <link rel="stylesheet" href="/assets/css/styles.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            
            function showRoom(id)
    {
        $("#room_details").html("");
        let url = "/reservations/show/" + id +"";
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                console.log(response);
                let details = response[0];
                container = document.getElementById('room_details');
                if(details.room_type === '1'){
                    container.innerHTML+='<div class="form-group"><input type="hidden" name="id" class="form-control" value="'+ details.id +'"><label for="room_number">Room Number:</label><input type="text" name="room_number" class="form-control" value="'+details.room_number+'" readonly></div><div class="form-group"><label for="room_type">Room Type:</label><input type="text" class="form-control" value="Single Room" readonly><input type="hidden" name="room_type" class="form-control" value="'+details.room_type+'"></div>';
                }
                else if(details.room_type === '2'){
                    container.innerHTML+='<div class="form-group"><input type="hidden" name="id" class="form-control" value="'+ details.id +'"><label for="room_number">Room Number:</label><input type="text" name="room_number" class="form-control" value="'+details.room_number+'" readonly></div><div class="form-group"><label for="room_type">Room Type:</label><input type="text" class="form-control" value="Standard Room" readonly><input type="hidden" name="room_type" class="form-control" value="'+details.room_type+'"></div>';
                }
                else if(details.room_type === '3'){
                    container.innerHTML+='<div class="form-group"><input type="hidden" name="id" class="form-control" value="'+ details.id +'"><label for="room_number">Room Number:</label><input type="text" name="room_number" class="form-control" value="'+details.room_number+'" readonly></div><div class="form-group"><label for="room_type">Room Type:</label><input type="text" class="form-control" value="Intermediate Room" readonly><input type="hidden" name="room_type" class="form-control" value="'+details.room_type+'"></div>';
                }
                else if(details.room_type === '4'){
                    container.innerHTML+='<div class="form-group"><input type="hidden" name="id" class="form-control" value="'+ details.id +'"><label for="room_number">Room Number:</label><input type="text" name="room_number" class="form-control" value="'+details.room_number+'" readonly></div><div class="form-group"><label for="room_type">Room Type:</label><input type="text" class="form-control" value="Twin Room" readonly><input type="hidden" name="room_type" class="form-control" value="'+details.room_type+'"></div>';
                }
                else if(details.room_type === '5'){
                    container.innerHTML+='<div class="form-group"><input type="hidden" name="id" class="form-control" value="'+ details.id +'"><label for="room_number">Room Number:</label><input type="text" name="room_number" class="form-control" value="'+details.room_number+'" readonly></div><div class="form-group"><label for="room_type">Room Type:</label><input type="text" class="form-control" value="Family Room" readonly><input type="hidden" name="room_type" class="form-control" value="'+details.room_type+'"></div>';
                }
                $("#book_details").modal('show'); 
                 
            },
            error: function(response) {
                console.log(response)
            }
        });
    }

        </script>
        <script src="/assets/js/Client.js"></script>
    </head>
    <body>