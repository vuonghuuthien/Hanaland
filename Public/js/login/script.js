$( () => {
    //
    $(".vn .username").attr("placeholder", "Tên Đăng Nhập");
    $(".vn .password").attr("placeholder", "Mật Khẩu");
    $(".en .username").attr("placeholder", "Username");
    $(".en .password").attr("placeholder", "Password");
    $("input").keyup(function() {
        if ( $(".username").val() !== "" ) {
            $(".username").addClass("haveValue");
        } else {
            $(".username").removeClass("haveValue");
        }
        if ( $(".password").val() !== "" ) {
            $(".password").addClass("haveValue");
        } else {
            $(".password").removeClass("haveValue");
        }
    });
});