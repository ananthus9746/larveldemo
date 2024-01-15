(function () {
    "use strict";

    class ChangePassword {
        constructor() {
            // --------------------------------------------------
            // Appling Ajax Form on Form
            // --------------------------------------------------
            this.initializeFormAjax();
        }

        initializeFormAjax() {
            ajaxForm(
                "#change-password-form",
                function (form) {
                    if (!$(form).valid()) {
                        return false;
                    }
                },
                function (res) {
                    Swal.fire("Alert", res.msg, res.status).then(function () {
                        if (res.status === "success") {
                            reload();
                        }
                    });
                }
            );
        }
    }

    if (window.location.pathname.split("/")[2] === "change-password") {
        $(function (event) {
            new ChangePassword();
        });
    }
})();
