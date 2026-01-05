<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/src/Exception.php';
require 'vendor/src/PHPMailer.php';
require 'vendor/src/SMTP.php';

function sendEmail($user, $cart, $address, $phone, $id_order, $orderDate)
{
    $mail = new PHPMailer(true);

    try {
        // Cấu hình máy chủ SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Thay thế bằng địa chỉ SMTP của bạn
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nikevnjustdoit@gmail.com';
        $mail->Password   = 'pbvyfpipjcscuytx';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Cấu hình người gửi và người nhận
        $mail->setFrom('nikevnjustdoit@gmail.com', 'NIKE VN - Just do it');
        $mail->addAddress($user['email'], $user['fname']);

        
        // Thiết lập nội dung email
        $mail->isHTML(true);
        $mail->Subject = 'Order Confirmation';
        $emailBody = '<h1 style="text-align:center;color:black;"><i>NIKE</i></h1>
         <p style="color:black;">Thank you for your order.<span style="color: red;">&#10084;</span> <br> Here are the details of your purchase:</p>';

        $emailBody .= '<table <meta charset="UTF-8">';
        $emailBody .= '<tr><td><strong>Order ID:</strong></td><td>' . $id_order . '</td></tr>';
        $emailBody .= '<tr><td><strong>Name:</strong></td><td>' . $user['fname'] . '</td></tr>';
        $emailBody .= '<tr><td><strong>Email:</strong></td><td>' . $user['email'] . '</td></tr>';
        $emailBody .= '<tr><td><strong>Address:</strong></td><td>' . $address . '</td></tr>';
        $emailBody .= '<tr><td><strong>Phone Number:</strong></td><td>' . $phone . '</td></tr>';
        $emailBody .= '<tr><td><strong>Order Date:</strong></td><td>' . $orderDate . '</td></tr>';
        $emailBody .= '</table>';


        $emailBody .= '<br>';

        $emailBody .= '<table style="border-collapse: collapse; border: 1px black solid;">';
        $emailBody .= '<thead style="background-color: black; color: white;">
                        <tr>
                            <th style="padding: 10px;">Product</th>
                            <th style="padding: 10px;">Price</th>
                            <th style="padding: 10px;">Quantity</th>
                            <th style="padding: 10px;">Size</th>
                            <th style="padding: 10px;">Subtotal</th>
                        </tr>
                    </thead>';
        $emailBody .= '<tbody>';
        
        $tolal_price = 0; // Thêm dòng này để khai báo và khởi tạo biến tổng giá trị

        foreach ($cart as $value) {
            $emailBody .= '<tr>';
            $emailBody .= '<td style="padding: 10px;border: 1px solid black;">' . $value['name_product'] . '</td>';
            $emailBody .= '<td style="padding: 10px;border: 1px solid black;">' . number_format($value['price']) . ' VND</td>';
            $emailBody .= '<td style="padding: 10px;border: 1px solid black;">' . $value['qty'] . '</td>';
            $emailBody .= '<td style="padding: 10px;border: 1px solid black;">' . $value['size'] . '</td>';
            $subtotal = $value['price'] * $value['qty'];
            $tolal_price += $subtotal; // Cập nhật giá trị tổng
            $emailBody .= '<td style="padding: 10px;border: 1px solid black;">' . number_format($subtotal) . ' VND</td>';
            $emailBody .= '</tr>';
        }

        $emailBody .= '<tr>';
        $emailBody .= '<td colspan="4" align="left" style="padding: 10px;border: 1px solid black;"><strong>Total Payment:</strong></td>';
        $emailBody .= '<td style="padding: 10px;border: 1px solid black;">' . number_format($tolal_price) . ' VND</td>';
        $emailBody .= '</tr>';
        
        $emailBody .= '</tbody>';
        $emailBody .= '</table>';
        $emailBody .= '<p style="color:black;">The package will be shipped to you within 1 to 2 weeks.</p>';

        $emailBody .= '<hr style="color:black;height:1px">';
        $emailBody .= '<h4 style="color:black;">CONTACT US</h4>';
        $emailBody .= '<p style="color:black;">
                        NikeVN.com <br>
                        Phone : 0935182753 <br>
                        nikevnjustdoit@gmail.com <br>
                        Founder : Hoanglee
                       </p>'; 




        $mail->Body = $emailBody;
        $mail->send();

    } catch (\Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "Exception message: {$e->getMessage()}";
    }

}
?>
