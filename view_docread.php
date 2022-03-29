<?php
include 'connect.php';

$read = $_POST["read"];
$eid = $_POST["eid"];

if ($read == " ") {
    $sql_query1 = "SELECT  a.document_name , a.document_detail , a.document_date , b.documenttype_name , c.documentstatus_name
            FROM document a, documenttype b, document_status c
            WHERE b.documenttype_id = a.documenttype_id and c.documentstatus_id = a.documentstatus_id and a.emp_id = '$eid' ORDER BY `a`.`document_date` DESC";

    $result = mysqli_query($conn, $sql_query1);
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        while ($row = $result->fetch_assoc()) {
?>

            <tr style="background-color:white; color:black;">
                <td class="pl-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="docId" />
                        <label class="custom-control-label" for="docId">&nbsp;</label>
                    </div>
                </td>
                <td><a href="document_read_manager.php"><?= $row['document_name']; ?></a></td>
                <td><span style="color:grey"><?= $row['documentstatus_name']; ?></span></td>
                <td><a href="document_read_manager.php"><?= $row['document_detail']; ?></a></td>
                <td><?= $row['document_date']; ?></a></td>

            </tr>

        <?php
        }
    } else {
        echo "ไม่พบผลลัพธ์";
    }
} else {
    $sql_query = "SELECT  a.document_name , a.document_detail , a.document_date , b.documenttype_name , c.documentstatus_name
            FROM document a, documenttype b, document_status c
            WHERE b.documenttype_id = a.documenttype_id and c.documentstatus_id = a.documentstatus_id and a.emp_id = '$eid' and a.documentstatus_id = '$read'  ORDER BY `a`.`document_date` DESC";

    $result = mysqli_query($conn, $sql_query);
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        while ($row = $result->fetch_assoc()) {
        ?>

            <tr style="background-color:white; color:black;">
                <td class="pl-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="docId" />
                        <label class="custom-control-label" for="docId">&nbsp;</label>
                    </div>
                </td>
                <td><a href="document_read_manager.php"><?= $row['document_name']; ?></a></td>
                <td><span style="color:grey"><?= $row['documentstatus_name']; ?></span></td>
                <td><a href="document_read_manager.php"><?= $row['document_detail']; ?></a></td>
                <td><?= $row['document_date']; ?></a></td>

            </tr>

<?php
        }
    } else {
        echo '<span style="color:White;">ไม่พบข้อความ</span>';
    }
    mysqli_close($conn);
}
?>