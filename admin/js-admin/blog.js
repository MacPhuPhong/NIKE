document.addEventListener('DOMContentLoaded', function () {
    var deleteButtons = document.querySelectorAll('.btn-danger');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var blogId = this.getAttribute('data-id_xoa');

            Swal.fire({
                // title: 'Đã sắp xếp!',
                // text: 'Đã sắp xếp theo ' + sortType,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
            });
        });
    });
});