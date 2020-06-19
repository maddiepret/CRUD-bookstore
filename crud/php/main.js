$(".btnedit").click(e => {
    // console.log("clicekd")
    let textValues = displayData(e);
    console.log(textValues);

    let id = $("input[name*='id']");
    let bookName = $("input[name*='book_name']");
    let bookPublisher = $("input[name*='book_publisher']");
    let bookPrice = $("input[name*='book_price']");

    id.val(textValues[0]);
    bookName.val(textValues[1]);
    bookPublisher.val(textValues[2]);
    bookPrice.val(textValues[3]);

});

function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textValues = [];
    for (const value of td) {
        if (value.dataset.id == e.target.dataset.id) {
            textValues[id++] = value.textContent;



        }
    }
    return textValues;

}