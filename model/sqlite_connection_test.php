<table>
    <thead>
        <th>Date</th>
        <th>Description</th>
        <th>fMoy</th>
        <th>Duree</th>
        <th>Distance</th>
        <th>Altitude</th>
    </thead>
<?php
require_once 'SqliteConnection.php';
$that = new SqliteConnection();
$that -> getConnection();
?>
</table>