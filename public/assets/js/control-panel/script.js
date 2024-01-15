(function () {
    "use strict";

    class App {
        constructor() {
            $.fn.hasAttr = function (name) {
                return (
                    this.attr(name) !== undefined && this.attr(name) !== false
                );
            };

            $.fn.select2.defaults.set("theme", "bootstrap");
            $.fn.modal.Constructor.prototype.enforceFocus = function () {};

            $('[data-select="true"]').next("span").next("span").remove();

            // Unregister All Event Listener

            // Hide loading
            $(".preloader").fadeOut();

            // Page Delay 20 millsecond and show
            $(".page-wrapper").delay(20).show(),
                // Setup Perfect Scroll
                this.setupPerfectScrollbar();

            // Attach event handlers
            $(".left-sidebar").on(
                "hover",
                this.handleSideBarMouseEnter,
                this.handleSideBarMouseLeave
            );
            $(".nav-toggler").on("click", this.handleNavToggleIconClick);
            $(".service-panel-toggle").on(
                "click",
                this.handleSettingIconBtnClick
            );
            $(".page-wrapper").on("click", this.handlePageClick);
            $(".mega-dropdown").on("click", this.handleMegaDropdownClick),
                $(".custom-file-input").on(
                    "change",
                    this.handleFileInputChange
                );
            $(".floating-labels .form-control").on(
                "focus blur",
                this.handleInputFocus
            );

            // --------------------------------------------------
            // Customer Form City Dropdown on Change Function
            // --------------------------------------------------
            $('.customer_form [name="city_id"]').on(
                "change",
                this.handleCustomerCityDropdownChange
            );

            // --------------------------------------------------
            // Customer Form Area Dropdown on Change Function
            // --------------------------------------------------
            $('.customer_form [name="area_id"]').on(
                "change",
                this.handleCustomerAreaDropdownChange
            );

            $(".supplier_ledger_tab").click(function () {
                let supplier_id = null;

                $('.tab-pane [name="supplier_id"]').each(function (index, el) {
                    supplier_id = $(el).val() || null;
                    if (supplier_id) {
                        return false; // breaks
                    }
                });

                window.open(
                    base_url() +
                        "supplier_ledger" +
                        (supplier_id ? "/" + supplier_id + "/" : ""),
                    "_blank"
                );
            });

            $(".manufacturer_ledger_tab").click(function () {
                let manufacturer_id = null;

                $('.tab-pane [name="manufacturer_id"]').each(function (
                    index,
                    el
                ) {
                    manufacturer_id = $(el).val() || null;
                    if (manufacturer_id) {
                        return false; // breaks
                    }
                });

                window.open(
                    base_url() +
                        "manufacturer_ledger" +
                        (manufacturer_id ? "/" + manufacturer_id + "/" : ""),
                    "_blank"
                );
            });

            $(".customer_ledger_tab").click(function () {
                let customer_id = null;

                $('.tab-pane [name="customer_id"]').each(function (index, el) {
                    customer_id = $(el).val() || null;
                    if (customer_id) {
                        return false; // breaks
                    }
                });

                window.open(
                    base_url() +
                        "customer_ledger" +
                        (customer_id ? "/" + customer_id + "/" : ""),
                    "_blank"
                );
            });

            $(".customer_as_supplier_ledger_tab").click(function () {
                let customer_id = null;

                $('.tab-pane [name="customer_id"]').each(function (index, el) {
                    customer_id = $(el).val() || null;
                    if (customer_id) {
                        return false; // breaks
                    }
                });

                window.open(
                    base_url() +
                        "customer_as_a_supplier_ledger" +
                        (customer_id ? "/" + customer_id + "/" : ""),
                    "_blank"
                );
            });

            $(".employee_ledger_tab").click(function () {
                let employee_id = null;

                $('.tab-pane [name="employee_id"]').each(function (index, el) {
                    employee_id = $(el).val() || null;
                    if (employee_id) {
                        return false; // breaks
                    }
                });

                window.open(
                    base_url() +
                        "employee_ledger" +
                        (employee_id ? "/" + employee_id + "/" : ""),
                    "_blank"
                );
            });

            $(".order_booker_ledger_tab").click(function () {
                let order_booker_id = null;

                $('.tab-pane [name="order_booker_id"]').each(function (
                    index,
                    el
                ) {
                    order_booker_id = $(el).val() || null;
                    if (order_booker_id) {
                        return false; // breaks
                    }
                });

                window.open(
                    base_url() +
                        "order_booker_ledger" +
                        (order_booker_id ? "/" + order_booker_id + "/" : ""),
                    "_blank"
                );
            });

            $(".rent_ledger_tab").click(function () {
                let property_id = null;

                $('.tab-pane [name="property_id"]').each(function (index, el) {
                    property_id = $(el).val() || null;
                    if (property_id) {
                        return false; // breaks
                    }
                });

                window.open(
                    base_url() +
                        "rent_ledger" +
                        (property_id ? "/" + property_id + "/" : ""),
                    "_blank"
                );
            });

            $(".trusty_ledger_tab").click(function () {
                let trusty_id = null;

                $('.tab-pane [name="trusty_id"]').each(function (index, el) {
                    trusty_id = $(el).val() || null;
                    if (trusty_id) {
                        return false; // breaks
                    }
                });

                window.open(
                    base_url() +
                        "trusty_ledger" +
                        (trusty_id ? "/" + trusty_id + "/" : ""),
                    "_blank"
                );
            });

            // Input Clear Button on Click Function

            $(document).on("click", ".clear-input-btn", function (e) {
                e.preventDefault();

                $(this)
                    .parents(".form-group")
                    .find("input")
                    .val("")
                    .trigger("change");
                $(this)
                    .parents(".form-group")
                    .find("select")
                    .val("")
                    .trigger("change");
            });

            // Global Supplier Modal

            this.setupGlobalSupplierAjaxForm();

            // Global Manufacturer Modal

            this.setupGlobalManufacturerAjaxForm();

            // Format number

            format_number();

            // Global Product Modal

            this.setupGlobalProductAjaxForm();

            // Global Supplier Add Button on Click Function

            $(document).on(
                "click",
                '[data-bs-target="#supplierModal"]',
                this.handleSupplierAddBtnClick
            );

            // Global Manufacturer Add Button on Click Function

            $(document).on(
                "click",
                '[data-bs-target="#manufacturerModal"]',
                this.handleManufacturerAddBtnClick
            );

            // Edit Button Click Handler

            $(document).on(
                "click",
                "table tbody .edit_row",
                this.handleEditBtn
            );

            // Delete Button Click Handler

            $(document).on(
                "click",
                "table tbody .delete_row",
                this.handleDeleteBtn
            );

            // Select2 Dropdown Change Handler

            $(document).on(
                "change.select2",
                "select",
                this.handleSelect2Select
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

            // Form Radio Label on Click handler

            $(document).on(
                "click",
                ".form-check-label",
                this.handleCheckLabelClick
            );

            // Select 2 on Click handler

            $(document).on(
                "change focusin focusout",
                ".select2.select2-container",
                this.handleSelect2Change
            );

            // Global Auto Customer Mobile No Input Change Function

            $(document).on("input", ".auto_customer_mobile_no", function (e) {
                const row = $(this).parents(".row").eq(0);
                const mobile_no = $(this);
                const customer_name = row.find(".auto_customer_name");
                const address = row.find(".auto_customer_address");

                $.ajax({
                    url: base_url() + "get_customer_detail_by_mobile_no",
                    type: "GET",
                    dataType: "json",
                    data: { mobile_no: mobile_no.val() },
                    success: function (res) {
                        if (res.status === "success") {
                            customer_name.val(res.id).trigger("change.select2");
                            customer_name
                                .parents(".form-group")
                                .addClass("focused");
                            address.val(res.address).trigger("change");
                            address.parents(".form-group").addClass("focused");
                            $(this).trigger("change");
                        } else {
                            customer_name.val("").trigger("change.select2");
                            address.val("").trigger("change");
                        }
                    },
                });
            });

            // Global Auto Customer Name Input Change Function

            $(document).on("change", ".auto_customer_name", function (e) {
                const row = $(this).parents(".row").eq(0);
                const mobile_no = row.find(".auto_customer_mobile_no");
                const customer_name = $(this);
                const address = row.find(".auto_customer_address");

                $.ajax({
                    url: base_url() + "get_customer_detail_by_id",
                    type: "GET",
                    dataType: "json",
                    data: { customer_id: $(this).val() },
                    success: function (res) {
                        if (res.status === "success") {
                            address.val(res.address).trigger("change");
                            address.parents(".form-group").addClass("focused");
                            mobile_no.val(res.mobile_no).trigger("change");
                            mobile_no
                                .parents(".form-group")
                                .addClass("focused");
                            $(this).trigger("input");
                        } else {
                            address.val("").trigger("change");
                            mobile_no.val("");
                        }
                    },
                });
            });

            // Global Customer Add Button on Click Function

            $(document).on(
                "click",
                '[data-bs-target="#customerEmployeeModal"]',
                function (e) {
                    const form = $(this).parents("form").eq(0);

                    const customer_id = form.find('[name="customer_id"]').val();

                    $('#customerEmployeeModal [name="customer_id"]').val(
                        customer_id
                    );
                }
            );

            // Global Customer Add Button on Click Function

            $(document).on(
                "click",
                '[data-bs-target="#customerModal"]',
                function (e) {
                    const form = $(this).parents("form");

                    const index = $(this).parents("form").index("form");

                    if (
                        form.find('[name="mobile_no"]').val() != null &&
                        form.find('[name="mobile_no"]').val() != ""
                    ) {
                        $("#customerModal")
                            .find('[name="mobile_no"]')
                            .parents(".form-group")
                            .addClass("focused");
                        $("#customerModal")
                            .find('[name="mobile_no"]')
                            .val(form.find('[name="mobile_no"]').val())
                            .trigger("input");
                    }

                    $(".customer_form").attr("data-form-index", index);
                }
            );

            // Global Supplier Add Button on Click Function

            // $(document).on('click', '[data-bs-target="#supplierModal"]', function(e) {

            // 	const form = $(this).parents('form');

            // 	const index = $(this).parents('form').index('form');

            // 	if (form.find('[name="mobile_no"]').val() != null && form.find('[name="mobile_no"]').val() != '') {

            // 		$('#supplierModal').find('[name="mobile_no"]').parents('.form-group').addClass('focused');
            // 		$('#supplierModal').find('[name="mobile_no"]').val(form.find('[name="mobile_no"]').val()).trigger('input');

            // 	}

            // 	$('.supplier_form').attr('data-form-index', index);

            // });

            // Global Customer Modal

            ajaxForm(".customer_form", "", function (res) {
                Swal.fire({
                    title: 'Alert',
                    text: res.msg,
                    icon: res.status,
                }).then(function () {
                    const index = $(".customer_form").attr("data-form-index");

                    if (res.shop_name != "" && res.shop_name != null) {
                        var data = {
                            id: res.id,
                            text: res.shop_name,
                        };
                    } else {
                        var data = {
                            id: res.id,
                            text: res.owner_name,
                        };
                    }

                    var newOption = new Option(
                        data.text,
                        data.id,
                        false,
                        false
                    );

                    $("form")
                        .eq(index)
                        .find('[name="customer_id"]')
                        .append(newOption)
                        .trigger("change");
                    $("form")
                        .eq(index)
                        .find('[name="customer_id"]')
                        .find("option")
                        .last()
                        .attr("selected", "selected");
                    $("form")
                        .eq(index)
                        .find('[name="customer_id"]')
                        .trigger("change");

                    $(".customer_form")
                        .find(".form-group")
                        .removeClass("focused")
                        .removeClass("is-success");
                    $(".customer_form").find(".input").removeClass("focused");

                    $(".customer_form").trigger("reset");
                    $("#customerModal").modal("hide");
                });
            });

            // Global Employee Modal

            ajaxForm(".employee_form", "", function (res) {
                Swal.fire({
                    title: 'Alert',
                    text: res.msg,
                    icon: res.status,
                }).then(function () {
                    $('[name="delivered_by"]')
                        .append(
                            `<option value="${res.id}">${res.name}</option>`
                        )
                        .trigger("change");
                    $('[name="delivered_by"]')
                        .find("option")
                        .last()
                        .attr("selected", "selected");
                    $('[name="delivered_by"]').trigger("change");

                    $(".employee_form").trigger("reset");
                    $("#employeeModal").modal("hide");
                });
            });

            // Global Doctor Modal

            ajaxForm(".doctor_form", "", function (res) {
                Swal.fire({
                    title: 'Alert',
                    text: res.msg,
                    icon: res.status,
                }).then(function () {
                    $('[name="doctor_id"]')
                        .append(
                            `<option value="${res.id}">${res.name}</option>`
                        )
                        .trigger("change");
                    $('[name="doctor_id"]')
                        .find("option")
                        .last()
                        .attr("selected", "selected");
                    $('[name="doctor_id"]').trigger("change");

                    $(".doctor_form").trigger("reset");
                    $("#doctorModal").modal("hide");
                });
            });

            // Global Customer Employee Modal

            ajaxForm(".customer_employee_form", "", function (res) {
                Swal.fire({
                    title: 'Alert',
                    text: res.msg,
                    icon: res.status,
                }).then(function () {
                    $('[name="received_by"]').empty();
                    $('[name="received_by"]')
                        .append(res.options)
                        .trigger("change");

                    $(".customer_employee_form").trigger("reset");
                    $("#customerEmployeeModal").modal("hide");
                });
            });

            // Globel Pages Employee Add Button Must in Model on Click Function

            $(document).on(
                "click",
                "#customerModal .add_employee",
                function (e) {
                    const html = `
						<div class="employee-group col-md-12" style="padding: 0px 20px;">
							<div class="row mt-4 mb-2">
								<div class="col-10 order-1 col-md-3">
									<div class="form-group mb-0">
										<label>Customer's Employee Name</label>
										<input type="text" class="form-control form-control-sm" name="employee_name[]">
										<span class="bar"></span>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group mb-0">
										<label>Mobile No.</label>
										<input type="text" class="form-control form-control-sm" name="employee_mobile_no[]">
										<span class="bar"></span>
									</div>
								</div>
								<div class="col-md-1 px-0">
									<button type="button" class="btn btn-sm btn-none delete_employee"><i class="fas fa-trash"></i></button>
								</div>
							</div>
						</div>
					`;

                    $(this)
                        .parents("form")
                        .find(".employee-group")
                        .last()
                        .after(html);
                }
            );

            // Globel Pages Employee Delete Button Must in Model on Clic Function

            $(document).on("click", ".modal .delete_employee", function (e) {
                $(this)
                    .parent(".col-md-1")
                    .parent(".row")
                    .parent(".employee-group")
                    .remove();
            });

            // Global Product Modal

            ajaxForm(".product_form", "", function (response) {
                res = $.parseJSON(response);
                Swal.fire({
                    title: 'Alert',
                    text: res.msg,
                    icon: res.status,
                }).then(function () {
                    $(".product_selector")
                        .append(
                            '<option value="' +
                                res.id +
                                '">' +
                                res.name +
                                "</option>"
                        )
                        .trigger("change");

                    $("#productModal").modal("hide");

                    $(".product_form").trigger("reset");
                });
            });

            // PJAX Loading

            // $(document).on('pjax:start', this.handlePjaxLoadingStart);
            // $(document).on('pjax:end', this.handlePjaxLoadingEnd);

            // PJAX on Success Event handler

            $(".page").on("pjax:success", this.handlePjaxSuccess);

            // AJAX on Error Event handler

            $(document).ajaxError(this.handleAjaxError);

            // Top Bar Dropdown Calculator Button On Click Dropdown Close Issue Fixed

            $(".dropdown-menu.keep-inside-clicks-open").on(
                "click.bs.dropdown",
                this.handleKeepOpenDropdownMenuClick
            );

            // Initialize Trigger
            $("body, .page-wrapper").trigger("resize");
            $(".floating-labels .form-control").trigger("blur");

            // Initialize PJAX
            // this.setupPjax();
            // Initialize AJAX
            this.setupAjax();
            // Initialize Bootstrap Tooltip
            this.setupTooltip();
            // Initialize Bootstrap Popover
            this.setupPopover();
            // Initialize Select2
            this.setupSelect2();
            // Initialize Date Picker
            this.setupDatePicker();

            // Apply Ajax to Delete Form
            this.setupDeleteForm();

            // Apply Ajax to Edit Form
            this.setupEditForm();
        }

        setupTooltip() {
            [].slice
                .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                .map(function (e) {
                    return new bootstrap.Tooltip(e);
                });
        }

        setupPopover() {
            [].slice
                .call(document.querySelectorAll('[data-bs-toggle="popover"]'))
                .map(function (e) {
                    return new bootstrap.Popover(e);
                });
        }

        setupPerfectScrollbar() {
            $(
                ".message-center, .customizer-body, .scrollable"
            ).perfectScrollbar({
                wheelPropagation: !0,
            });
        }

        setupPjax() {
            $(document).pjax("a", ".page", { timeout: 0 });
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

        setupSelect2() {
            // Global Select 2

            $('[data-select="true"]:not(.product_selector)').each(function () {
                $(this).select2({
                    theme: "bootstrap",
                    dropdownParent: $(this).parent(), // fix select2 search input focus bug
                });
            });

            // Global Product Select Select 2

            $(".product_selector").select2({
                theme: "bootstrap",
                closeOnSelect: false,
            });
        }

        setupEditForm() {
            ajaxForm(
                ".edit-form",
                "",
                function (res) {
                    Swal.fire("Alert", res.msg, res.status);
                    if (res.status === "success") {
                        reload();
                    }
                },
                "",
                {
                    method: "PUT",
                }
            );

            // $('.edit-form').on('submit', function(e) {

            // 	e.preventDefault();
            // 	e.stopImmediatePropagation();

            // 	$(this).parents('.modal').eq(0).modal('hide');

            // 	const url = $(this).attr('action').replace('?','')
            // 	const id = $(this).find('[name="id"]').val();

            // 	$.ajax({
            // 		type: "put",
            // 		url: url + id,
            // 		data: $(this).serialize(),
            // 		dataType: "json",
            // 		success: function (res) {
            // 			Swal.fire("Alert",res.msg,res.status);
            //             if (res.status === 'success') {
            //                 reload();
            //             }
            // 		}
            // 	});

            // });
        }

        setupDeleteForm() {
            $(".delete-form").on("submit", function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                $(this).parents(".modal").eq(0).modal("hide");

                const self = $(this);

                const url = $(this).attr("action").replace("?", "");
                const id = $(this).find('[name="id"]').val();

                $.ajax({
                    type: "delete",
                    url: url + id,
                    data: {},
                    dataType: "json",
                    success: function (res) {
                        if (!checkEvent(self[0], "onDeleteSuccess")) {
                            Swal.fire("Alert", res.msg, res.status).then(
                                function () {
                                    if (res.status === "success") {
                                        reload();
                                    }
                                }
                            );
                        } else {
                            self.trigger("onDeleteSuccess", res);
                        }
                    },
                });
            });
        }

        setupDatePicker() {
            // Old

            // $('[data-date="picker"]').bootstrapMaterialDatePicker({ format: 'DD/MMM/YYYY', weekStart: 0, time: false });

            $(document).on('change', '[data-date="picker"]', function(e) {
            	$(this).parents('.form-group').addClass('focused');

            	$(this).trigger('input');
            });

            // New

            $.extend($.dateDropperSetup.languages.en.months.short, [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "June",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ]);

            $('[data-date="picker"]').each(function() {
                const value = $(this).val();
                $('[data-date="picker"]').dateDropper({
                    format: "d/M/Y",
                    largeOnly: true,
                    autofill: false,
                    ...(value ? {defaultDate: value} : {})
                });
            });
        }

        setupGlobalSupplierAjaxForm() {
            ajaxForm(
                ".supplier_form",
                function (form) {
                    if (!$(form).valid()) {
                        return false;
                    }
                },
                function (res) {
                    Swal.fire({
                        title: 'Alert',
                        text: res.msg,
                        icon: res.status,
                    }).then(function () {
                        const index =
                            $(".supplier_form").attr("data-form-index");

                        if (
                            res.company_name != "" &&
                            res.company_name != null
                        ) {
                            var data = {
                                id: res.id,
                                text: res.company_name,
                            };
                        } else {
                            var data = {
                                id: res.id,
                                text: res.contact_person,
                            };
                        }

                        var newOption = new Option(
                            data.text,
                            data.id,
                            false,
                            false
                        );

                        $("form")
                            .eq(index)
                            .find('[name="supplier_id"]')
                            .append(newOption)
                            .trigger("change");
                        $("form")
                            .eq(index)
                            .find('[name="supplier_id"]')
                            .find("option")
                            .last()
                            .attr("selected", "selected");
                        $("form")
                            .eq(index)
                            .find('[name="supplier_id"]')
                            .trigger("change");

                        $(".supplier_form")
                            .find(".form-group")
                            .removeClass("focused")
                            .removeClass("is-success");
                        $(".supplier_form")
                            .find(".input")
                            .removeClass("focused");

                        $(".supplier_form").trigger("reset");
                        $(".supplier_form")
                            .find('[name="order_booker"]')
                            .trigger("change");
                        $("#supplierModal").modal("hide");
                    });
                }
            );
        }

        setupGlobalManufacturerAjaxForm() {
            ajaxForm(
                ".manufacturer_form",
                function (form) {
                    if (!$(form).valid()) {
                        return false;
                    }
                },
                function (res) {
                    Swal.fire({
                        title: 'Alert',
                        text: res.msg,
                        icon: res.status,
                    }).then(function () {
                        const index =
                            $(".manufacturer_form").attr("data-form-index");

                        if (
                            res.company_name != "" &&
                            res.company_name != null
                        ) {
                            var data = {
                                id: res.id,
                                text: res.company_name,
                            };
                        } else {
                            var data = {
                                id: res.id,
                                text: res.contact_person,
                            };
                        }

                        var newOption = new Option(
                            data.text,
                            data.id,
                            false,
                            false
                        );

                        $("form")
                            .eq(index)
                            .find('[name="manufacturer_id"]')
                            .append(newOption)
                            .trigger("change");
                        $("form")
                            .eq(index)
                            .find('[name="manufacturer_id"]')
                            .find("option")
                            .last()
                            .attr("selected", "selected");
                        $("form")
                            .eq(index)
                            .find('[name="manufacturer_id"]')
                            .trigger("change");

                        $(".manufacturer_form")
                            .find(".form-group")
                            .removeClass("focused")
                            .removeClass("is-success");
                        $(".manufacturer_form")
                            .find(".input")
                            .removeClass("focused");

                        $(".manufacturer_form").trigger("reset");
                        $(".manufacturer_form")
                            .find('[name="order_booker"]')
                            .trigger("change");
                        $("#manufacturerModal").modal("hide");
                    });
                }
            );
        }

        setupGlobalProductAjaxForm() {
            ajaxForm(
                ".product_form",
                function (form) {
                    if (!$(form).valid()) {
                        return false;
                    }
                },
                function (res) {
                    Swal.fire({
                        title: 'Alert',
                        text: res.msg,
                        icon: res.status,
                    }).then(function () {
                        if ($(".product_selector").length == 0) {
                            $('[name="detail[]"]')
                                .append(
                                    '<option value="' +
                                        res.id +
                                        '">' +
                                        res.name +
                                        "</option>"
                                )
                                .trigger("change");
                            $('[name="detail[]"]')
                                .find("option")
                                .last()
                                .attr("selected", "selected")
                                .trigger("change");
                        } else {
                            $(".product_selector")
                                .append(
                                    '<option value="' +
                                        res.id +
                                        '">' +
                                        res.name +
                                        "</option>"
                                )
                                .trigger("change");
                            // $('.product_selector').find('option').last().attr('selected', 'selected').trigger('change');
                        }

                        $("#productModal").modal("hide");

                        $(".product_form").trigger("reset");
                    });
                }
            );
        }

        // Event Handlers

        handleCustomerCityDropdownChange(e) {
            const city_id = $(this).val();
            const form = $(this).parents("form").eq(0);

            $.ajax({
                type: "GET",
                url: base_url() + "get_area_options",
                data: { city_id: city_id },
                dataType: "json",
                success: function (res) {
                    $(form)
                        .find('[name="area_id"]')
                        .empty()
                        .append(res.options);
                    const area_id = $(form)
                        .find('[name="area_id"]')
                        .data("val");
                    if (area_id) {
                        $(form)
                            .find('[name="area_id"]')
                            .val(area_id)
                            .trigger("change");
                    }
                },
            });
        }

        handleCustomerAreaDropdownChange(e) {
            const form = $(this).parents("form").eq(0);
            const city_id = form.find('[name="city_id"]').val();
            const area_id = $(this).val();

            $.ajax({
                type: "GET",
                url: base_url() + "get_road_options",
                data: { city_id: city_id, area_id: area_id },
                dataType: "json",
                success: function (res) {
                    $(form)
                        .find('[name="road_id"]')
                        .empty()
                        .append(res.options);
                    const road_id = $(form)
                        .find('[name="road_id"]')
                        .data("val");
                    if (road_id) {
                        $(form)
                            .find('[name="road_id"]')
                            .val(road_id)
                            .trigger("change");
                    }
                },
            });
        }

        handleSideBarMouseEnter() {
            $(".navbar-header").addClass("expand-logo");
        }

        handleSideBarMouseLeave() {
            $(".navbar-header").removeClass("expand-logo");
        }

        handleNavToggleIconClick() {
            $("#main-wrapper").toggleClass("show-sidebar"),
                $(".nav-toggler i").toggleClass("ti-menu");
        }

        handleSettingIconBtnClick() {
            $(".customizer").toggleClass("show-service-panel");
        }

        handlePageClick() {
            $(".customizer").removeClass("show-service-panel");
        }

        handleInputFocus(e) {
            if ($(this).is("[type=file]")) {
                $(this).parents(".form-group").addClass("focused");
            } else {
                $(this)
                    .parents(".form-group")
                    .toggleClass(
                        "focused",
                        "focus" === e.type || 0 < this.value.length
                    );
            }
        }

        handleMegaDropdownClick(e) {
            e.stopPropagation();
        }

        handleFileInputChange() {
            const e = $(this).val();
            $(this).next(".custom-file-label").html(e);
        }

        handleKeepOpenDropdownMenuClick(e) {
            e.stopPropagation();
            e.preventDefault();
        }

        handlePjaxLoadingStart() {
            NProgress.start();

            $(".after-script").remove();
            $("script:not([src])").remove();
            $(".page-titles").fadeOut();
            $(".page").fadeOut();
        }

        handlePjaxLoadingEnd() {
            NProgress.done();
            $(".page-titles").fadeIn();
            $(".page").fadeIn();
        }

        handlePjaxSuccess(event, data, status, xhr, options) {
            const dom = stringToHTML(data);
            const title = dom
                .querySelector("title")
                .textContent.split("|")[0]
                .trim();
            document.querySelector(".page-titles h3").textContent = title;
            document.querySelector(".breadcrumb-item.active").textContent =
                title;
            // reload_js(base_url() + 'assets/js/script.js');
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
            if ($(this).parents(".form-group").hasClass("no-floating-label")) {
                return false;
            }
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

        handleCheckLabelClick() {
            $(this).prev("input").click();
        }

        handleSelect2Change(e) {
            if ($(this).hasClass("select2-container--open") == 1) {
                if ($(this).parents(".form-group").hasClass("focused") == 0) {
                    $(this).parents(".form-group").addClass("focused");
                }
            } else {
                if (
                    $(this).parents(".form-group").children("select").val() ==
                    ""
                ) {
                    if (
                        $(this).parents(".form-group").hasClass("focused") == 1
                    ) {
                        $(this).parents(".form-group").removeClass("focused");
                    }
                }
            }
        }

        handleDeleteBtn() {
            const id = $(this).parents("tr").data("id");

            const modal = $($(this).data("bs-target"));

            modal.find('.delete-form .modal-footer [name="id"]').remove();

            modal.find(".delete-form .modal-footer").append(`
				<input type="hidden" name="id" value="${id}" />
			`);
        }

        handleEditBtn(e) {
            e.stopImmediatePropagation();

            const el = $(this);

            const id = $(this).parents("tr").data("id");

            const modal = $($(this).data("bs-target"));

            modal.find('.edit-form .modal-footer [name="id"]').remove();

            modal.find(".edit-form .modal-footer").append(`
				<input type="hidden" name="id" value="${id}" />
			`);

            let _url = String($(".edit-form").attr("action")).split("/");
            _url[_url.length - 1] = id;
            const url = _url.join("/");

            $(".edit-form").attr("action", url);

            $.ajax({
                type: "GET",
                url: url,
                success: function (res) {
                    console.log(res);
                    if (el.hasClass("auto_load_data")) {
                        $.each(res, function (name, value) {
                            if (
                                name === "created_at" ||
                                name === "updated_at"
                            ) {
                                return;
                            }
                            const field = $(".edit-form").find(
                                `[name="${name}"]`
                            );
                            if (
                                name.indexOf("date") > -1 &&
                                value !== null &&
                                value !== "null"
                            ) {
                                field.val(formatDate(new Date(value)));
                            } else {
                                field.val(value);
                            }
                            if (field.is("input")) {
                                field.trigger("input");
                            } else {
                                field.trigger("change");
                            }
                            field.parents(".form-group").addClass("focused");
                        });
                    }
                    console.log(el);
                    el.trigger("dataload", res);
                },
            });
        }

        handleAjaxError(event, xhr, options) {
            console.log(arguments);
            if (xhr.status === 401) {
                location.href = base_url() + "login";
            }
        }

        handleSelect2Select() {
            if ($(this).val() && 0 < $(this).val().length) {
                $(this).parents(".form-group").eq(0).addClass("focused");
            }
            $(this).nextAll(".invalid-feedback").remove();
        }

        handleSupplierAddBtnClick(e) {
            const form = $(this).parents("form").eq(0);

            const index = $(this).parents("form").eq(0).index("form");

            if (
                form.find('[name="mobile_no"]').val() != null &&
                form.find('[name="mobile_no"]').val() != ""
            ) {
                $("#supplierModal")
                    .find('[name="mobile_no"]')
                    .parents(".form-group")
                    .addClass("focused");
                $("#supplierModal")
                    .find('[name="mobile_no"]')
                    .val(form.find('[name="mobile_no"]').val())
                    .trigger("input");
            }

            $(".supplier_form").attr("data-form-index", index);
        }

        handleManufacturerAddBtnClick(e) {
            const form = $(this).parents("form").eq(0);

            const index = $(this).parents("form").eq(0).index("form");

            if (
                form.find('[name="mobile_no"]').val() != null &&
                form.find('[name="mobile_no"]').val() != ""
            ) {
                $("#manufacturerModal")
                    .find('[name="mobile_no"]')
                    .parents(".form-group")
                    .addClass("focused");
                $("#manufacturerModal")
                    .find('[name="mobile_no"]')
                    .val(form.find('[name="mobile_no"]').val())
                    .trigger("input");
            }

            $(".manufacturer_form").attr("data-form-index", index);
        }
    }

    // $(document).on('pjax:end', function(e) {

    // 	console.log('Pjax end');
    // 	new App;

    // });

    $(document).on("pjax:end", function (e) {
        console.log("PJAX END");
        new App();
    });

    $(function () {
        console.log("Document Ready");
        $(document).trigger("pjax:end");
    });
})();
