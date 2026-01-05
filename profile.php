<?php require_once 'template/public/inc/header.php';
$user = (isset($_SESSION['user']) ? $_SESSION['user'] : []);
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="css-user/profile.css">

<style>
    .log-out{
        text-align: center;
        padding: 20px 15px;
        font-size: 15px;
        background-color: black;
        color: white;
        font-weight: bold;
        margin-bottom: 20px;
        border-radius: 5px;
    }
    .cus-in {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Điều chỉnh giá trị để tùy chỉnh độ đậm và kích thước của bóng */
    padding: 20px 50px; 
    margin-bottom: 40px;
    font-size: 15px;
    color: black;
    font-weight: 5px;
}
</style>

<section id="advertisement" style="background-color: black;">
    <div class="container-sm"></div>
</section>

<section id="advertisement" style="background-color: black;">
    <div class="container-sm"></div>
</section>

<section class="tong">
    <div class="container-fluid full-height">
        <div class="row center-content">
            <h2 class="text-center">My Profile</h2> <hr> <br><br>
            <div class="col-md-6">
                <div class="customer-info">
                    <table class="table mx-auto my-table">
                        <?php
                        if (!empty($user)) {
                            echo '<tr>';
                            echo '<th>ID :</th>';
                            echo '<td>' . $user['id_customer'] . '</td>';
                            echo '</tr>';
                            
                            echo '<tr>';
                            echo '<th>Name :</th>';
                            echo '<td>' . $user['fname'] . '</td>';
                            echo '</tr>';

                            echo '<tr>';
                            echo '<th>Email :</th>';
                            echo '<td>' . $user['email'] . '</td>';
                            echo '</tr>';

                            echo '<tr>';
                            echo '<th>Phone Number :</th>';
                            echo '<td>' . str_repeat('*', strlen($user['phone_number']) - 3) . substr($user['phone_number'], -3) . '</td>';
                            echo '</tr>';

                            echo '<tr>';
                            echo '<th>Password :</th>';
                            echo '<td>' . str_repeat('*', strlen($user['password'])) . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
                <a href="changePass.html">
                    <div class="customer-info" style="font-size:large;">
                        Change password
                        <i class="bi bi-chevron-right" style="float: right;"></i>
                    </div>
                </a>
                <a href="orders.html">
                    <div class="customer-info" style="font-size:large;">
                        Purchase history
                        <i class="bi bi-chevron-right" style="float: right;"></i>
                    </div>
                </a>
                <a href="ordercanceled.html">
                    <div class="customer-info" style="font-size:large;">
                        Order canceled
                        <i class="bi bi-chevron-right" style="float: right;"></i>
                    </div>
                </a>
                <a href="infor.php">
                    <div class="cus-in">
                        Customer information
                        <i class="bi bi-chevron-right" style="float: right;"></i>
                    </div>
                </a>
                <a href="logout.php">
                    <div class="log-out">
                        LOG - OUT 
                    </div>
                </a>
                
            </div>
        </div>
    </div>
</section>

<?php require_once 'template/public/inc/footer.php' ?>
