$(document).ready(function () {
    // ... Other jQuery code ...
    $('.padding-right').on('click', '.add-to-cart', function () {
        divFunction(); // Call your function here
    });
    // Additional JavaScript for quantity buttons
    $('#addQty').on('click', function () {
        var currentQty = parseInt($('input[name="qty"]').val());
        if (!isNaN(currentQty)) {
            $('input[name="qty"]').val(currentQty + 1);
        }
    });

    $('#subtractQty').on('click', function () {
        var currentQty = parseInt($('input[name="qty"]').val());
        if (!isNaN(currentQty) && currentQty > 1) {
            $('input[name="qty"]').val(currentQty - 1);
        }
    });

    $('.left.item-control').click(function () {
        $('.carousel').carousel('prev');
    });

    $('.right.item-control').click(function () {
        $('.carousel').carousel('next');
    });
});

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

// comment
$(document).ready(function () {
    $(document).on('click', '.btn-size', function () {
        var sizeValue = $(this).text(); // Sử dụng text() để lấy nội dung của nút
        $('input[name="size"]').val(sizeValue);
        $('.btn-size').removeClass('active'); // Bỏ chọn tất cả các nút
        $(this).addClass('active'); // Đánh dấu nút đã chọn
    });
    //load_data
    function fetch_data() {
        $.ajax({
            url: "ajax-cmt.php",
            method: "POST",
            success: function (data) {
                $('#load_data').html(data);
                fetch_data();
            }
        });
    }
    // ảnhhhhhhhhhhhhhhh
    $(document).ready(function () {
        function updateMainImage(imagePath) {
            $('#main-image').attr('src', imagePath);
        }

        $('.thumbnail-image').on('click', function (e) {
            e.preventDefault();
            var imagePath = $(this).data('image-path');
            updateMainImage(imagePath);
        });
    });


    fetch_data();
    $('#submit_data').on('click', function () {
        var id_sp = $('#id_sp').val();
        var cmt = $('#comment').val();
        $.ajax({
            url: "ajax-cmt.php",
            method: "POST",
            data: {
                id_sp: id_sp,
                cmt: cmt
            },
            success: function (data) {
                Swal.fire({
                    icon: "success",
                    title: "Comment added successfully",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(function () {
                    $('#form_cmt')[0].reset();
                    fetch_data();
                });
            }
        });
    });
});




// $(document).ready(function () {

// });