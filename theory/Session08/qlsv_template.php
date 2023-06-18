<?php
$db = new mysqli('mysql-server', 'root', 'root', 'dbstudent');
if ($db->connect_errno)
    die("Lỗi kết nối: " . $db->connect_error);
$selected = $_GET['lop'];
$stm = $db->prepare("select * from lop");
$stm->execute();
$stm->bind_result($ms, $tenlop);
$options = '';
$first_ms = null;
$found = false;
while ($stm->fetch()) {
    if (!$selected)
        $selected = $ms;
    if (!$first_ms)
        $first_ms = $ms;
    $sel = '';
    if ($selected == $ms) {
        $found = true;
        $sel = ' selected';
    }
    $options .= "<option value='$ms'$sel>$tenlop</option>";
}
if (!$found) {
    $selected = $first_ms;
}
$msg = '';

if (isset($_POST['btn'])) {
    $ms = $_POST['mssv'];
    $ht = $_POST['hoten'];
    $ns = $_POST['namsinh'];
    $malop = $_POST['malop'];
    //phải nhập đủ ms, ht
    //kiểm tra trùng mssv trong CSDL, kiểm tra malop có trong bảng lop hay không.
    if (!empty($_POST['mssv']) and !empty($_POST['hoten'])) {
        # kiểm tra thông tin: không trùng mã với sv đang có
        # $_SESSION['dssv'][] = array('ms'=>$ms, 'ht'=>$ht);
        $stm = $db->prepare("insert into sinhvien(mssv,hoten,namsinh,malop) values(?,?,?,?)");
        $stm->bind_param('ssii', $ms, $ht, $ns, $malop);
        $stm->execute();
        if ($stm->affected_rows == 1)
            $msg = "Đã lưu";
        else
            $msg = "Lỗi lưu: " . $db->error;
    } else {
        $msg = "Chưa nhập đủ thông tin";
    }
}
# mysqli_escape_string()
?>
<!DOCTYPE html> <!--We can mix HTML, CSS, JS commands inside PHP file -->
<html lang="en">

<head>
    <?php echo '<title>Quản lý SV</title>'; ?>
    <script>
        function change_class(cbo) {
            //lấy mã lớp đang chọn
            let ml = cbo.options[cbo.selectedIndex].value; //$(cbo).val() // 
            window.location.href = 'qlsv.php?lop=' + ml
        }
    </script>
</head>

<body>
    <form method="post">
        MSSV: <input type="text" name="mssv" /> <br />
        Họ tên: <input type="text" name="hoten" /> <br />
        Năm sinh: <input type="text" name="namsinh" /> <br />
        Lớp: <select name="malop">
            <?php echo $options ?>
        </select> <br />
        <div style="color:red"><?php echo $msg ?></div>
        <input type="submit" name="btn" value="Thêm" /> <br />
    </form>
    <div>Danh sách sinh viên</div>
    Chọn lớp: <select name="malop" onchange="change_class(this)">
        <?php echo $options ?>
    </select>
    <table border="1">
        <thead>
            <tr>
                <th>MSSV</th>
                <th>Họ tên</th>
                <th>Lớp</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = $db->query("select s.*, l.tenlop from sinhvien s inner join lop l on s.malop=l.ms where l.ms=" . $selected);
            while ($row = mysqli_fetch_assoc($res)) {
                $ms = $row['mssv'];
                $ht = $row['hoten'];
                $tl = $row['tenlop'];
                echo "<tr><td>$ms</td><td>$ht</td><td>$tl</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<?php
$db->close();
?>