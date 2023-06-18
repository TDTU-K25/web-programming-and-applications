<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<style>

    /**
        Tạo thêm 2 class khác tương tự
     */

    .A{
        background-color: lightblue;
        color: black;
    }

    .A:hover{
        background-color: pink;
        color: white;
    }

    .B{
        background-color: green;
        color: black;
    }

    .B:hover{
        background-color: orange;
        color: white;
    }

    .C{
        background-color: yellow;
        color: black;
    }

    .C:hover{
        background-color: purple;
        color: white;
    }
</style>


<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse; width:  300px; margin: auto">

    <!-- dùng php lặp n lần với các class khác nhau lặp đi lặp lại theo thứ tự -->
    <?php 
    $classes = array("A", "B", "C");
    for($i = 0; $i < 10; $i++) { ?>
    <tr class="<?php echo $classes[$i % count($classes)] ?>">
        <td><?= $i + 1 ?></td>
        <td>Sinh viên <?= $i + 1 ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>