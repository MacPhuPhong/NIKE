document.addEventListener('DOMContentLoaded', function () {
    var deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var productId = this.getAttribute('data-id_sp');

            Swal.fire({
                title: 'Bạn chắc chứ?',
                text: "Bạn sẽ không thể hoàn lại sản phẩm này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#000000',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gửi AJAX request để xóa sản phẩm (thay thế dòng này nếu bạn sử dụng AJAX)
                    window.location.href = 'admin/products/del.php?id_xoa=' +
                        productId;

                    // Thêm hiệu ứng khi xóa thành công
                    Swal.fire({
                        icon: 'success',
                        title: 'Đã xóa!',
                        text: 'Sản phẩm đã được xóa.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        // Cập nhật lại trang hoặc thực hiện các hành động khác nếu cần
                        location.reload();
                    });
                }
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Function để hiển thị Swal cho nút sắp xếp
    function showSortAlert(sortType) {
        Swal.fire({
            // title: 'Đã sắp xếp!',
            // text: 'Đã sắp xếp theo ' + sortType,
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        });
    }

    // Bắt sự kiện khi nút sắp xếp được click

    var sortButtons = document.querySelectorAll('.btn-group a');
    sortButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var sortType = this.innerText.trim();
            showSortAlert(sortType);
        });
    });
    var sortButtons = document.querySelectorAll('form .btn-search');
    sortButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var sortType = this.innerText.trim();
            showSortAlert(sortType);
        });
    });
    var sortButtons = document.querySelectorAll('form .btn-add ');
    sortButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var sortType = this.innerText.trim();
            showSortAlert(sortType);
        });
    });

});