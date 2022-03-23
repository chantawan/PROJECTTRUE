<!DOCTYPE html>
<html lang="en">

<head>
    <title>GFG- Store Data</title>
</head>

<body>
    <center>
        <h1>Storing Form data in Database</h1>

        <form action="insert.php" method="post">


            <p>
                <label for="documentId">เลขที่หนังสือ:</label>
                <input type="text" name="document_id" id="documentid">
            </p>





            <p>
                <label for="documentName">ชื่อหนังสือ:</label>
                <input type="text" name="document_name" id="documentName">
            </p>





            <p>
                <label for="documentDetail">รายละเอียด:</label>
                <input type="text" name="document_detail" id="documentDetail">
            </p>


            <p>
                <label for="empId">รหัส:</label>
                <input type="text" name="emp_id" id="empId">
            </p>


            <p>
                <label for="divistionId">กอง:</label>
                <input type="text" name="divistion_id" id="divistionId">
            </p>





            <p>
                <label for="documenttypeId">ประเภทเอกสาร:</label>
                <input type="text" name="documenttype_id" id="documenttypeId">
            </p>

            <p>
                <label for="documentstatusId">สถานะเอกสาร:</label>
                <input type="text" name="documentstatus_id" id="documentstatusId">
            </p>

            <p>
                <label for="fileUpload">อัพโหลดเอกสาร:</label>
                <input type="text" name="fileupload" id="fileUpload">
            </p>

            <p>
                <label for="documentDate">เก็บไว้ถึงปี พ.ศ.:</label>
                <input type="text" name="document_date" id="documentDate">
            </p>



            <input type="submit" value="Submit">
        </form>
    </center>
</body>

</html>