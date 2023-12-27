// dataTable nhà trọ

$(document).ready(function () {
  $('#data_nhatro').DataTable({
    "pageLength": 5,
    "LengthMenu": [5, 10, 15, 30]
  });
});


// dataTable tin tức


$(document).ready(function () {
  $('#data_tintuc').DataTable({
    "pageLength": 5,
    "LengthMenu": [5, 10, 15, 30]
  });
});

// dataTable khu vực

$(document).ready(function () {
  $('#data_khuvuc').DataTable({
    "pageLength": 5,
    "LengthMenu": [5, 10, 15, 30]
  });
});
