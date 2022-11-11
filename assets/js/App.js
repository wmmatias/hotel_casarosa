$(document).ready(function() {
    // $('#upcoming').DataTable();
    $('#upcoming').DataTable({
        "aLengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]],
        "pageLength": 3,
        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
    });

    $('#current').DataTable({
        "aLengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]],
        "pageLength": 3,
        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
    });
    $('#rooms').DataTable({
        "aLengthMenu": [[3, 5, 10, -1], [3, 5, 10, "All"]],
        "pageLength": 3,
        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
    });
    $('#datatable').DataTable();
    $('#verified').DataTable();
    $('#arrived').DataTable();
});
  