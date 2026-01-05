const carousel = document.querySelector(".carousel"),
    firstImg = carousel.querySelectorAll("img")[0],
    arrowIcons = document.querySelectorAll(".wrapper i");

let isDragStart = false,
    isDragging = false,
    prevPageX, prevScrollLeft, positionDiff;

const showHideIcons = () => {
    // hiển thị và ẩn biểu tượng trước/tiếp theo theo giá trị cuộn băng chuyền bên trái
    let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // nhận chiều rộng có thể cuộn tối đa
    arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
    arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
}

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14; // nhận chiều rộng img đầu tiên và thêm 14 giá trị lề
        // nếu biểu tượng được nhấp ở bên trái, hãy giảm giá trị chiều rộng từ cuộn băng chuyền bên trái, thêm vào biểu tượng đó
        carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // gọi showHideIcons sau 60ms
    });
});

const autoSlide = () => {
    // nếu không còn hình ảnh để cuộn thì hãy quay lại từ đây
    if (carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;

    positionDiff = Math.abs(positionDiff); // làm cho giá trị positionDiff thành dương
    let firstImgWidth = firstImg.clientWidth + 14;
    // nhận giá trị khác biệt cần thêm hoặc giảm từ băng chuyền bên trái để lấy trung tâm img ở giữa
    let valDifference = firstImgWidth - positionDiff;

    if (carousel.scrollLeft > prevScrollLeft) { // nếu người dùng đang cuộn sang phải
        return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }
    // nếu người dùng đang cuộn sang trái
    carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
}

const dragStart = (e) => {
    // cập nhật giá trị biến toàn cầu trên sự kiện di chuột xuống
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    // cuộn hình ảnh/băng chuyền sang trái theo con trỏ chuột
    if (!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    carousel.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}

const dragStop = () => {
    isDragStart = false;
    carousel.classList.remove("dragging");

    if (!isDragging) return;
    isDragging = false;
    autoSlide();
}

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("touchstart", dragStart);

document.addEventListener("mousemove", dragging);
carousel.addEventListener("touchmove", dragging);

document.addEventListener("mouseup", dragStop);
carousel.addEventListener("touchend", dragStop);


