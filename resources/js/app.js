import "./bootstrap";
import "tailwindcss/tailwind.css";

// Powergrid
import "./../../vendor/power-components/livewire-powergrid/dist/powergrid";

// If you use Tailwind
import "./../../vendor/power-components/livewire-powergrid/dist/tailwind.css";

// Hide and unhide sign out button
$(function () {
    $("#showBtnLogout").click(function () {
        $("#btnLogout").toggleClass("show-btn-logout");
        $("#showBtnLogout").toggleClass("chevron-up");
    });
});
