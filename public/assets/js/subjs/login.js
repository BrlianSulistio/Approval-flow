$("#FormData").on("submit", function (e) {
    alert("test");
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: APP_URL + "/login",
        data: $("#FormData").serialize(),
        beforeSend: function () {
            $.blockUI({
                overlayCSS: { backgroundColor: "#005ba2" },
            });
        },
        success: function (response) {
            window.location.replace(APP_URL + "/home");
        },
        error: function (data) {
            $.unblockUI();
            toastr.error("Maaf, data login yang anda masukkan masih salah!.");
        },
    });
});
