document.addEventListener('DOMContentLoaded', function () {
    // Function để hiển thị Swal cho nút sắp xếp
    function showSortAlert(sortType) {
        Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        });
    }

    var sortButtons = document.querySelectorAll('form .btn-search');
    sortButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var sortType = this.innerText.trim();
            showSortAlert(sortType);
        });
    });

});