(function () {
    "use strict";

    class Product {
        constructor() {
            // Attach event handlers

            // Category on Change Function

            $("[name='category_id']").on("change", this.handleCategoryChange);

            // Description Textrea on Change handler

            $(document)
                .on(
                    "change keyup keydown paste cut",
                    "[name='description']",
                    function () {
                        $(this).height(0).height(this.scrollHeight);
                    }
                )
                .find("[name='description']")
                .trigger("change");

            // --------------------------------------------------
            // Appling Ajax Form on Create Form
            // --------------------------------------------------
            this.initializeCreateFormAjax();

            // --------------------------------------------------
            // Appling Ajax Form on Edit Form
            // --------------------------------------------------
            this.initializeEditFormAjax();

            // Register the plugin with FilePond
            FilePond.registerPlugin(FilePondPluginImagePreview);

            this.images = FilePond.create(document.querySelector("#images"), {
                allowMultiple: true,
                storeAsFile: true,
                allowReorder: true,
                files,
            });

            // --------------------------------------------------
            // Appling zoiaTable to Records Table
            // --------------------------------------------------
            $("#productTable").zoiaTable({
                url: base_url() + "control-panel/get_product_records",
            });
        }

        initializeCreateFormAjax() {
            const self = this;
            ajaxForm(
                "#create-product-form",
                function (form) {
                    if (!$(form).valid()) {
                        return false;
                    }
                    const files = self.images.getFiles();

                    if (files.length === 0) {
                        Swal.fire(
                            "Alert",
                            "Please Add One or More Property images",
                            "error"
                        );

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
            const self = this;
            ajaxForm(
                "#edit-product-form",
                function (form) {
                    if (!$(form).valid()) {
                        return false;
                    }
                    const files = self.images.getFiles();

                    if (files.length === 0) {
                        Swal.fire(
                            "Alert",
                            "Please Add One or More Property images",
                            "error"
                        );

                        return false;
                    }
                },
                function (res) {
                    Swal.fire("Alert", res.msg, res.status).then(function () {
                        if (res.status === "success") {
                            location.href =
                                base_url() + "control-panel/products";
                        }
                    });
                },
                "",
                {
                    method: "POST",
                }
            );
        }

        handleCategoryChange() {
            const category_id = Number($(this).val());

            if (!category_id) {
                $('[name="sub_category_id"]')
                    .empty()
                    .append(
                        `<option value=""></option><option value="" disabled>Please select Category first.</option>`
                    );
            }

            $.ajax({
                type: "get",
                url: base_url() + "control-panel/get_sub_category_options",
                data: { category_id: category_id },
                dataType: "json",
                success: function (res) {
                    $('[name="sub_category_id"]')
                        .empty()
                        .append(`<option></option>`)
                        .append(res.options)
                        .trigger("change");
                },
            });
        }
    }

    console.log(window.location.pathname.replaceAll("/", ""));
    if (window.location.pathname.split("/")[2] === "products") {
        $(function (event) {
            console.log("PJAX END");
            new Product();
        });
    }
})();
