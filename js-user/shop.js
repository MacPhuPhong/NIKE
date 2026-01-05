
function divFunction() {
    Swal.fire({
        icon: "success",
        title: "Added to cart.",
        showConfirmButton: false,
        timer: 1500,
    }).then((result) => {
        if (result.isConfirmed || result.isDismissed) {}
    });
}