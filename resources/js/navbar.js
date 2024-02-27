// Hide and unhide sign out button
$(function () {
    $("#showBtnLogout").click(function () {
        $("#btnLogout").toggleClass("show-btn-logout");
        $("#showBtnLogout").toggleClass("chevron-up");
    });
});
