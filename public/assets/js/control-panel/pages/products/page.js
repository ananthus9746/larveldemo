(function () {
    "use strict";

    class Page {
        constructor() {
            // --------------------------------------------------
            // Appling Ajax Form on Create Form
            // --------------------------------------------------
            this.initializeCreateFormAjax();

            // --------------------------------------------------
            // Appling Ajax Form on Edit Form
            // --------------------------------------------------
            this.initializeEditFormAjax();

            // --------------------------------------------------
            // Appling zoiaTable to Records Table
            // --------------------------------------------------
            $("#pageTable").zoiaTable({
                url: base_url() + "control-panel/get_page_records",
            });
        }

        initializeCreateFormAjax() {
            ajaxForm(
                "#create-page-form",
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

        initializeEditFormAjax() {
            ajaxForm(
                "#edit-page-form",
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
                },
                "",
                {
                    method: "PUT",
                }
            );
        }
    }

    console.log(window.location.pathname.replaceAll("/", ""));
    if (window.location.pathname.split("/")[2] === "pages") {
        $(function (event) {
            console.log("PJAX END");
            new Page();
        });
    }
})();
