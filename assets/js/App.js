$(document).ready(function() {

    $.get('/reservations/index_html', function(res) {
        $('#room_display').html(res);
    });

    $(document).on('submit', '#admin_check', function(){
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function(res){
            $('#room_display').html(res);
        });
        return false;
    });
    
    $('#upcoming').DataTable({
        "order":[],
        "aLengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]],
        "pageLength": 3,
        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
    });

    $('#current').DataTable({
        "order":[],
        "aLengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]],
        "pageLength": 3,
        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
    });
    $('#rooms').DataTable({
        "order":[],
        "aLengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]],
        "pageLength": 3,
        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
    });
    $('#datatable').DataTable({
        "order":[]
    });
    $('#verified').DataTable({
        "order":[]
    });
    $('#arrived').DataTable({
        "order":[]
    });
    $('#yesterday').DataTable({
        "order":[]
    });

    var bed = document.getElementById('bed').value;
    var person = document.getElementById('person').value;
    var bfast = document.getElementById('bfast').value;
    var hour = document.getElementById('hour').value;
    var package = parseInt(document.getElementById('package').value);
    var pwd_qty = document.getElementById('pwd').value;
    var senior_qty = document.getElementById('senior').value;
    var total_discount = 0;
    var total_amount = 0;
    var extras = 0;
    var x_bed = 0;
    var x_person = 0;
    var x_bfast = 0;
    var x_hour = 0;
    var bed_price = 300;
    var person_price = 200;
    var bfast_price = 170;
    var hour_price = 200;

    var discount_amount = (5 / 100) * package;
    var pwd_amount = pwd_qty * discount_amount;
    var senior_amount = senior_qty * discount_amount;
    total_discount = pwd_amount + senior_amount;

    x_bed = bed * bed_price;
    x_person = person * person_price;
    x_bfast = bfast * bfast_price;
    x_hour = hour * hour_price;

    extras = x_bed + x_person + x_bfast + x_hour;
    total_amount = (package - total_discount) + extras;

    document.getElementById('extras').value = Number(extras).toLocaleString('en', 2);
    document.getElementById('discount').value = Number(total_discount).toLocaleString('en', 2);
    document.getElementById('amount').value = Number(total_amount).toLocaleString('en', 2);

   
    $( "#pwd" ).change(function() {
        var bed = document.getElementById('bed').value;
        var person = document.getElementById('person').value;
        var bfast = document.getElementById('bfast').value;
        var hour = document.getElementById('hour').value;
        let pwd_discount = pwd.value * discount_amount;
        let sc_discount = senior.value * discount_amount;
        x_bed = bed * bed_price;
        x_person = person * person_price;
        x_bfast = bfast * bfast_price;
        x_hour = hour * hour_price;
    
        extras = x_bed + x_person + x_bfast + x_hour;
        total_discount = pwd_discount + sc_discount;
        total_amount = (package - total_discount) + extras;
        document.getElementById('extras').value = Number(extras).toLocaleString('en', 2);
        document.getElementById('discount').value = Number(total_discount).toLocaleString('en', 2);
        document.getElementById('amount').value = Number(total_amount).toLocaleString('en', 2);
    });

    $( "#senior" ).change(function() {
        var bed = document.getElementById('bed').value;
        var person = document.getElementById('person').value;
        var bfast = document.getElementById('bfast').value;
        var hour = document.getElementById('hour').value;
        let pwd_discount = pwd.value * discount_amount;
        let sc_discount = senior.value * discount_amount;
        x_bed = bed * bed_price;
        x_person = person * person_price;
        x_bfast = bfast * bfast_price;
        x_hour = hour * hour_price;
    
        extras = x_bed + x_person + x_bfast + x_hour;
        total_discount = pwd_discount + sc_discount;
        total_amount = (package - total_discount) + extras;
        document.getElementById('extras').value = Number(extras).toLocaleString('en', 2);
        document.getElementById('discount').value = Number(total_discount).toLocaleString('en', 2);
        document.getElementById('amount').value = Number(total_amount).toLocaleString('en', 2);
    });

    $( "#bed" ).change(function() {
        var bed = document.getElementById('bed').value;
        var person = document.getElementById('person').value;
        var bfast = document.getElementById('bfast').value;
        var hour = document.getElementById('hour').value;
        let pwd_discount = pwd.value * discount_amount;
        let sc_discount = senior.value * discount_amount;
        x_bed = bed * bed_price;
        x_person = person * person_price;
        x_bfast = bfast * bfast_price;
        x_hour = hour * hour_price;
    
        extras = x_bed + x_person + x_bfast + x_hour;
        total_discount = pwd_discount + sc_discount;
        total_amount = (package - total_discount) + extras;
        document.getElementById('extras').value = Number(extras).toLocaleString('en', 2);
        document.getElementById('discount').value = Number(total_discount).toLocaleString('en', 2);
        document.getElementById('amount').value = Number(total_amount).toLocaleString('en', 2);
    });

    $( "#person" ).change(function() {
        var bed = document.getElementById('bed').value;
        var person = document.getElementById('person').value;
        var bfast = document.getElementById('bfast').value;
        var hour = document.getElementById('hour').value;
        let pwd_discount = pwd.value * discount_amount;
        let sc_discount = senior.value * discount_amount;
        x_bed = bed * bed_price;
        x_person = person * person_price;
        x_bfast = bfast * bfast_price;
        x_hour = hour * hour_price;
    
        extras = x_bed + x_person + x_bfast + x_hour;
        total_discount = pwd_discount + sc_discount;
        total_amount = (package - total_discount) + extras;
        document.getElementById('extras').value = Number(extras).toLocaleString('en', 2);
        document.getElementById('discount').value = Number(total_discount).toLocaleString('en', 2);
        document.getElementById('amount').value = Number(total_amount).toLocaleString('en', 2);
    });
    
    $( "#bfast" ).change(function() {
        var bed = document.getElementById('bed').value;
        var person = document.getElementById('person').value;
        var bfast = document.getElementById('bfast').value;
        var hour = document.getElementById('hour').value;
        let pwd_discount = pwd.value * discount_amount;
        let sc_discount = senior.value * discount_amount;
        x_bed = bed * bed_price;
        x_person = person * person_price;
        x_bfast = bfast * bfast_price;
        x_hour = hour * hour_price;
    
        extras = x_bed + x_person + x_bfast + x_hour;
        total_discount = pwd_discount + sc_discount;
        total_amount = (package - total_discount) + extras;
        document.getElementById('extras').value = Number(extras).toLocaleString('en', 2);
        document.getElementById('discount').value = Number(total_discount).toLocaleString('en', 2);
        document.getElementById('amount').value = Number(total_amount).toLocaleString('en', 2);
    });
    
    $( "#hour" ).change(function() {
        var bed = document.getElementById('bed').value;
        var person = document.getElementById('person').value;
        var bfast = document.getElementById('bfast').value;
        var hour = document.getElementById('hour').value;
        let pwd_discount = pwd.value * discount_amount;
        let sc_discount = senior.value * discount_amount;
        x_bed = bed * bed_price;
        x_person = person * person_price;
        x_bfast = bfast * bfast_price;
        x_hour = hour * hour_price;
    
        extras = x_bed + x_person + x_bfast + x_hour;
        total_discount = pwd_discount + sc_discount;
        total_amount = (package - total_discount) + extras;
        document.getElementById('extras').value = Number(extras).toLocaleString('en', 2);
        document.getElementById('discount').value = Number(total_discount).toLocaleString('en', 2);
        document.getElementById('amount').value = Number(total_amount).toLocaleString('en', 2);
    });

   
});
  