<?php
	include 'connect.php';
	
	$sql_query = "SELECT board_name , board_id
                    FROM board
                    ORDER BY `board_id` ASC";

    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
              <tr>

                <?php
                echo "<td>" . "<img src='" . $row['board_name'] . "' width='10%'>" . "</td>" ?>
                <td style="width:10%;">
                  <button onclick="OnEdit3(<?= $row['board_id']; ?>)" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal4">แก้ไข</button>
                  <button onclick="OnDelete3(<?= $row['board_id']; ?>)" type="button" class="btn btn-sm btn-danger">ลบ</button>
                </td>
              </tr>

              </tr>

            <?php
            }
        }
    else {
        echo "ไม่พบผลลัพธ์";
    }
	mysqli_close($conn);
?>
  