$(document).ready(function() {
    $.get('/clients/index_html', function(res) {
        $('#personal_info').html(res);
    });

    $(document).on('submit', '#book_details', function(){
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function(res){
            $('#personal_info').html(res);
        });
        return false;
    });

    $('#book_details').submit(function() {
        $('#spin').show();
        $('#spin').css('visibility', 'visible');
    });

    $('#book_details').submit(function() {
        if ($('#reservebtn').is(':disabled')) {
            $('#reservebtn').removeAttr('disabled');
        } else {
            $('#reservebtn').attr('disabled', 'disabled');
        }
    });

    $(document).on('click', '#successbtn', function() {
        $('#spin').hide();
        $('#spin').css('visibility', 'hidden');
    });

});