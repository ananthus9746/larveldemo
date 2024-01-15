(function () {
    "use strict";

    class Login {
        constructor() {
            // Attach event handlers

            $(".floating-labels .form-control").on(
                "focus blur",
                this.handleInputFocus
            );

            // Form Floating Input on Focus In handler

            $(document).on(
                "focusin",
                ".floating-labels input",
                this.handleFloatingLabelInputFocusIn
            );

            // Form Floating Select on Focus In handler

            $(document).on(
                "focusin",
                ".floating-labels select",
                this.handleFloatingLabelInputFocusIn
            );

            // Form Floating Label on Click handler

            $(document).on(
                "click",
                ".floating-labels label",
                this.handleFloatingLabelClick
            );

            // Initialize AJAX
            this.setupAjax();
            // --------------------------------------------------
            // Appling Ajax Form on Login Form
            // --------------------------------------------------
            this.initializeLoginFormAjax();
        }

        setupAjax() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                dataType: "json",
            });
        }

        handleInputFocus(e) {
            $(this)
                .parents(".form-group")
                .toggleClass(
                    "focused",
                    "focus" === e.type || 0 < this.value.length
                );
        }

        handleFloatingLabelInputFocusIn() {
            if ($(this).parents(".form-group").hasClass("focused") == false) {
                $(this).parents(".form-group").addClass("focused");
            }
            if ($(this).parents(".form-group").hasClass("focused") == false) {
                $(this).parents(".form-group").addClass("focused");
            }
        }

        handleFloatingLabelClick() {
            if ($(this).parents(".form-group").hasClass("focused") == false) {
                $(this).parents(".form-group").addClass("focused");
            }
            $(this).parents(".form-group").find("input").focus();
            if (!$(this).parents(".form-group").find("input").is(":checkbox")) {
                $(this).parents(".form-group").find("input").click();
            }
            $(this).parents(".form-group").find("select").focus().click();
            if ($(this).parents(".form-group").hasClass("focused") == false) {
                $(this).parents(".form-group").addClass("focused");
            }
        }

        initializeLoginFormAjax() {
            ajaxForm(
                "#login-form",
                function (form) {
                    if (!$(form).valid()) {
                        return false;
                    }
                },
                function (res) {
                    Swal.fire("Alert", res.msg, res.status).then(function () {
                        if (res.status === "success") {
                            location.href = base_url() + "control-panel";
                        }
                    });
                }
            );
        }
    }

    if (window.location.pathname.split("/")[2] === "login") {
        $(function () {
            console.log("DOCUMENT Ready");
            new Login();
        });
    }
})();
