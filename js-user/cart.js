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