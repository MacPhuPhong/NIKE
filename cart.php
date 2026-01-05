<?php $page = 'CART'; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<?php
require_once 'template/public/inc/header.php';
require_once 'db/dbConnect.php';

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user'])) {
    header("Location: login.html"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}

// Lấy thông tin giỏ hàng từ cơ sở dữ liệu
$id_customer = $_SESSION['user']['id_customer'];
$getCartQuery = mysqli_query($conn, "SELECT * FROM cart WHERE id_customer = $id_customer");
$cart = [];
$total_price = 0;

// Xử lý dữ liệu giỏ hàng
while ($cartItem = mysqli_fetch_assoc($getCartQuery)) {
    $total_price += ($cartItem['price'] * $cartItem['qty']);
    $cart[] = $cartItem;
}

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="css-user/cart.css">

<section id="advertisement" style="background-color: black;">
    <div class="container-sm"></div>
</section>
<section id="advertisement" style="background-color: black;">
    <div class="container-sm"></div>
</section>
<section id="cart_items">
    <div class="container-sm">
        <div class="col-md-12" style="padding: 0;">
            <table class="table table-striped table-container">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" style="text-align: center;">Product</th>
                        <th scope="col" style="text-align: center;"></th>
                        <th scope="col" style="text-align: center;">Price</th>
                        <th scope="col" style="text-align: center;">Quantity</th>
                        <th scope="col" style="text-align: center;">Total price</th>
                        <th scope="col" style="text-align: center;">Size</th>
                        <th></th>
                    </tr>
                    <?php
                    if (empty($cart)) {
                    ?>
                    <tr style="background-color:black; color:white; padding:0; text-align: center;">
                        <td colspan="8">
                            <div class="empty-cart-message">
                                <p style="margin-top: 10px; ">- Your cart is empty. <a href="shop.php">Start shopping
                                        now ! -</a></p>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    foreach ($cart as $key => $value) {
                    ?>
                    <form action="cartxuly.php" method="GET">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $value['id_cart']; ?>">
                        <tr>
                            <!-- Thêm ô kiểm vào tiêu đề bảng -->
                            <td style="text-align: center;"><input type="checkbox" name="selectedItems[]" value="<?php echo $value['id_cart']; ?>"></td>

                            <td style="text-align: center;"><img src="admin/upload/<?php echo $value['image']; ?>"
                                    alt="" width="100px"></td>
                            <td style="text-align: center;"><?php echo $value['name_product']; ?></td>
                            <td style="text-align: center;"><?php echo number_format($value['price']) . ' VND'; ?></td>
                            <td style="text-align: center;">
                                <button type="button" class="quantity-btn" data-action="decrement"
                                    data-cart-id="<?php echo $value['id_cart']; ?>"
                                    onclick="updateQuantity(this)">-</button>
                                <input aria-label="quantity" class="input-qty" min="1" name="qty" type="text"
                                    value="<?php echo $value['qty']; ?>"
                                    data-cart-id="<?php echo $value['id_cart']; ?>">
                                <button type="button" class="quantity-btn" data-action="increment"
                                    data-cart-id="<?php echo $value['id_cart']; ?>"
                                    onclick="updateQuantity(this)">+</button>
                            </td>
                            <td style="text-align: center;"><?php $total = ($value['price'] * $value['qty']);
                                    echo number_format($total) . " VND"; ?></td>
                            <td style="text-align: center;"><?php echo $value['size']; ?></td>
                            <td style="text-align: center;">
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </td>
                        </tr>
                    </form>
                    <form>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </form>
                    <?php
                    }
                    ?>
                    <tr>

                    </tr>
                </tbody>
            </table>
            <section id="advertisement">
                <div class="container-sm"></div>
            </section>
            <section id="advertisement">
                <div class="container-sm"></div>
            </section>
        </div>
        <div class="div-footer">
            <footer id="page-footer">
                <div class="container-sm">
                    <div class="row-2 col-md-12" style="bottom: 0;">
                        <div class="col-md-12 div-pay-now text-right" style="margin-top: 10px;">
                            <div class="col-md-3">
                                <p style="color: black; font-size:17px"><b>Total payment :</b></p>
                            </div>
                            <div class="col-md-7" style="font-size:16px">
                                <td colspan="6" class="text-center bg-info col-md-3">
                                    <?php echo number_format($total_price) ?> VND
                                </td>
                            </div>
                        </div>
                        <div class="col-md-12 div-pay-now text-center">
                            <button class="btn btn-info pay-now">Pay
                                now</button>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</section>
<br>
<section id="advertisement">
    <div class="container-sm"></div>
</section>


<script>
    function updateQuantity(button) {
        var action = button.getAttribute('data-action');
        var cartId = button.getAttribute('data-cart-id');
        var input = document.querySelector('input[name="qty"][data-cart-id="' + cartId + '"]');
        var value = parseInt(input.value, 10);

        if (action === 'increment') {
            input.value = value + 1;
        } else if (action === 'decrement' && value > 1) {
            input.value = value - 1;
        }

        // Thực hiện Ajax request để cập nhật giá trị qty trong cơ sở dữ liệu
        updateQuantityInDatabase(cartId, input.value);
    }

    function updateQuantityInDatabase(cartId, newQuantity) {
        $.ajax({
            type: 'POST',
            url: 'cartxuly.php',
            data: {
                action: 'update',
                id: cartId,
                qty: newQuantity
            },
            success: function (response) {
                // Reload trang sau khi cập nhật giá trị qty
                location.reload();
            },
            error: function (error) {
                console.error('Error updating quantity');
            }
        });
    }
    function handlePayNow() {
        // Check if the cart is empty
        if (<?php echo empty($cart) ? 'true' : 'false'; ?>) {
            // Display a SweetAlert2 message for an empty cart
            Swal.fire({
                icon: 'error',
                title: 'Empty Cart',
                text: 'Your cart is empty. Please add items before proceeding to checkout.',
            });
        } else {
            // Redirect to the checkout page if the cart is not empty
            window.location.href = 'checkout.html';
        }
    }

    // Attach the handlePayNow function to the "Pay now" button click event
    $(document).ready(function () {
        $('.pay-now').click(function () {
            handlePayNow();
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>