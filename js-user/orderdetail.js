document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("cancelOrderBtn").addEventListener("click", function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, cancel it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger the form submission when the user confirms
                document.getElementById("cancelOrderForm").submit();
            }
        });
    });
});