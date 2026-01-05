paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: '0.1'
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            alert('Thanh Toán Thành Công !');
        })
    },
    onCancel: function (data) {
        alert('Chưa Thanh Toán Đơn Hàng !');
    }
}).render('#paypal-payment-button');