<?php session_start();
if (empty($_SESSION['id'])) {
    header('location: login.php');
    exit;
}

if (empty($_SESSION['cart'])) {
    header('location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <h2>Giỏ hàng</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td colspan="7">
                        <a href="index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
                    </td>
                </tr>
                <tr>
                    <th>Ảnh</th>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                $total = 0;
                foreach ($_SESSION['cart'] as $product) { ?>
                    <tr data-id="<?= $product['id'] ?>">
                        <td><img src="<?= $product['image'] ?>" style="max-height: 50px"></td>
                        <td><?php echo $i;
                            $i++; ?></td>
                        <td><?= $product['name'] ?></td>
                        <td>
                            <input class="quantityInput" type="number" value="<?= $product['quantity'] ?>">
                        </td>
                        <td>
                            <span class="price"><?= $product['price'] ?> </span>đ
                        </td>
                        <td>
                            <span>
                                <?php echo $product['price'] * $product['quantity'];
                                $total += $product['price'] * $product['quantity']; ?> đ
                            </span>
                        </td>
                        <td><a href="delete_product_in_cart.php?id=<?= $product['id'] ?>" class="btn btn-danger">Xóa</a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="7" style="text-align: right">
                        <button id="updateCartBtn" type="button" class="btn btn-success">Cập nhật giỏ hàng</button>
                        <form id="orderForm" action="process_order.php" method="post" style="display: inline;">
                            <input id="total" type="hidden" name="total" value="<?= $total ?>">
                            <input id="date" type="hidden" name="date" value="">
                            <button id="orderBtn" type="button" class="btn btn-danger">Thanh toán</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#updateCartBtn').click(function(event) {
                let total = 0;
                $('.quantityInput').each(function() {
                    fetch('update_quantity.php', {
                            method: 'post',
                            header: {
                                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                            },
                            body: new URLSearchParams({
                                'id': $(this).closest('tr').data('id'),
                                'quantity': $(this).val(),
                            })
                        })
                        .then(response => response.json())
                        .then(json => {
                            if (json.status == 'success') {
                                let tr = $(this).closest('tr')
                                let tds = tr.find('td');
                                let quantity = parseInt($(this).val())
                                let price = parseInt(tr.find('.price')[0].innerText)
                                if (quantity <= 0) {
                                    tr.remove();
                                } else {
                                    tds[5].innerText = quantity * price;
                                    total += quantity * price
                                    $('#total').val(total);
                                }
                            }
                        })
                })
            })

            $('#orderBtn').click(function(event) {
                let d = new Date();
                $('#date').val(d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate());
                $('#orderForm').submit();
            })
        })
    </script>
</body>

</html>