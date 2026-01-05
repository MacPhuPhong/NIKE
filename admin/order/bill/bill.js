    // JavaScript để thêm/xóa lớp 'hide-print' tùy thuộc vào việc trang đang được in hay không
    window.onbeforeprint = function () {
        var printOnlyDiv = document.getElementById('print-only-div');
        if (printOnlyDiv) {
            printOnlyDiv.classList.remove('hide-print');
        }
    }

    window.onafterprint = function () {
        var printOnlyDiv = document.getElementById('print-only-div');
        if (printOnlyDiv) {
            printOnlyDiv.classList.add('hide-print');
        }
    }