// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();

  $('#datatablesSimple').DataTable( {
    select: true
  });
});
