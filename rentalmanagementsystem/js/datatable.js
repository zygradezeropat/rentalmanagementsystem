$(document).ready(function() {
    // Initialize DataTable with default entries
    var table = $('#myTable').DataTable({
        "lengthMenu": [10, 25, 50, 100] // Define available options
    });

    // Handle dropdown change event
    $('#entriesDropdown').on('change', function() {
        var selectedValue = $(this).val();

        // Change the number of entries displayed per page
        table.page.len(selectedValue).draw();
    });
});
