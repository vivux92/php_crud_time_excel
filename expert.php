<?php 
include 'conn.php';

$sql = "SELECT * FROM vivek";
$result = mysqli_query($conn, $sql);
// print_r($value);
// exit();

$html = '<table border="1">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>';

while ($value = mysqli_fetch_assoc($result)) {
    
    $html .= '<tr>
    <td>'.$value['id'].'</td>
    <td>'.$value['firstname'].'</td>
    <td>'.$value['lastname'].'</td>
    </tr>';
}

$html .= '</table>';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="report.xls"');
echo $html;
?>
