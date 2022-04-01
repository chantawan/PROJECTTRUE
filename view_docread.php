<?php
include 'connect.php';
$read = $_POST["read"];
$eid = $_POST["eid"];

if ($read == " ") {
    $sql_query1 = "SELECT  a.Doc_id , a.document_number , a.document_name , a.document_detail , a.document_date , b.documenttype_name , c.documentstatus_name
            FROM document a, documenttype b, document_status c
            WHERE b.documenttype_id = a.documenttype_id and c.documentstatus_id = a.documentstatus_id and a.emp_id = '$eid' and a.documentstatus_id < 3 ORDER BY `a`.`document_date` DESC";

    $result = mysqli_query($conn, $sql_query1);
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        while ($row = $result->fetch_assoc()) {
?>

            <tr style="background-color:white; color:black;">
                <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['document_number']; ?></td>
                <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['document_name']; ?></td>
                <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['documentstatus_name']; ?></span></td>
                <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['document_detail']; ?></td>
                
                <td><?= $row['document_date']; ?></a></td>
                <td> <button onclick="OnDelete(<?=$row['Doc_id'];?>)" type="button" class="btn btn-sm btn-danger">ลบ</button></td>

            </tr>

        <?php
        }
    } else {
        echo '<span style="color:black;">ไม่พบข้อความ</span>';
    }
} else {
    $sql_query = "SELECT  a.Doc_id , a.document_number , a.document_name , a.document_detail , a.document_date , b.documenttype_name , c.documentstatus_name
            FROM document a, documenttype b, document_status c
            WHERE b.documenttype_id = a.documenttype_id and c.documentstatus_id = a.documentstatus_id and a.emp_id = '$eid' and a.documentstatus_id = '$read' and a.documentstatus_id < 3  ORDER BY `a`.`document_date` DESC";

    $result = mysqli_query($conn, $sql_query);
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        while ($row = $result->fetch_assoc()) {
        ?>

            <tr style="background-color:white; color:black;">
            <td onclick="show_read()"><?= $row['document_number']; ?></td>
                <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['document_name']; ?></td>
                <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['documentstatus_name']; ?></span></td>
                <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['document_detail']; ?></td>
                <td><?= $row['document_date']; ?></a></td>
                <td> <button onclick="OnDelete(<?=$row['Doc_id'];?>)" type="button" class="btn btn-sm btn-danger">ลบ</button></td>
            </tr>

<?php
        }
    } else {
        echo '<span style="color:black;">ไม่พบข้อความ</span>';
    }
    mysqli_close($conn);
}
?>