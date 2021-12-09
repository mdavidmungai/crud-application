var dataArray = document.querySelectorAll("table tr td");

var buttons = document.querySelectorAll(".edit-btn");

var rows = document.querySelectorAll("tr.data-row");

var inputBookid = document.getElementById("book_id");

var inputBookname = document.getElementById("book_name");

var inputBookpublisher = document.getElementById("book_publisher");

var inputBookprice = document.getElementById("book_price");



buttons.forEach(function (node) {
    node.addEventListener("click", function (e) {
        var parentCell = e.target.parentElement;
        rows.forEach(function (node) {
            if (parentCell.id == node.id) {
                var bookId = document.querySelector(".row" + node.id + " #book-id");
                var bookName = document.querySelector(".row" + node.id + " #book-name");
                var bookPublisher = document.querySelector(".row" + node.id + " #book-publisher");
                var bookPrice = document.querySelector(".row" + node.id + " #book-price");
                inputBookid.value = bookId.textContent;
                inputBookname.value = bookName.textContent;
                inputBookpublisher.value = bookPublisher.textContent;
                inputBookprice.value = bookPrice.textContent.replace("$", "");
            } else {

            }
        });
    });
});