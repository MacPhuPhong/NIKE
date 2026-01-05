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

    var sortButtons = document.querySelectorAll('form .btn-info');
    sortButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var sortType = this.innerText.trim();
            showSortAlert(sortType);
        });
    });

});