function checkFormBook() {
    var bookCode = document.forms["bookForm"]["bookCode"].value;
    var bookName = document.forms["bookForm"]["bookName"].value;
    var bookAuthor = document.forms["bookForm"]["bookAuthor"].value;
    var publishYear = document.forms["bookForm"]["publishYear"].value;
    var totalNumber = document.forms["bookForm"]["totalNumber"].value;
    var availableBooks = document.forms["bookForm"]["availableBooks"].value;

    if (bookCode == "" || bookName == "" || bookAuthor == "" || publishYear == "0000-00-00" || totalNumber == "" || availableBooks == "") {
        alert("Molimo popunite sva polja!");
        return false;
    }
}

function checkFormMember() {
    var memberName = document.forms["memberForm"]["memberName"].value;
    var memberLastName = document.forms["memberForm"]["memberLastName"].value;
    var email = document.forms["memberForm"]["email"].value;
    if (memberName == "" || memberLastName == "" || email == "") {
        alert("Molimo popunite sva polja!");
        return false;
    }
}