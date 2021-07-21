<?php
include_once 'partials/header.php';
?>
<body>
<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Score</th>
        <th>Date</th>

    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($scores as $score) {
        echo '
                <tr>
                <td>' . $score["id"] . '</td>
                <td>' . $score["user"] . '</td>
                <td>' . $score["score"] . '</td>
                <td>' . $score["date"] . '</td>
 ';
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Age</th>

    </tr>
    </tfoot>
</table>
</body>

<script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css    ">
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ]
        });
    });
</script>
