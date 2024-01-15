
(function() {
	"use strict";

	class Profile {
        constructor() {
            // --------------------------------------------------
    		// Attach event handlers
            // --------------------------------------------------
            $(document).on('click', '.change-profile-image', this.handleProfileImageBtnClick);
            $(document).on('change', '#profile-image-uploader', this.handleProfileImageChange);

            // --------------------------------------------------
            // Appling Ajax Form on Edit Form
            // --------------------------------------------------
            this.initializeEditFormAjax();
            
        }

        initializeEditFormAjax() {

            ajaxForm("#edit-profile-form", function(form) {
                if (!$(form).valid()) {
                    return false;
                }
            }, function(res) {
                Swal.fire("Alert",res.msg,res.status).then(function() {
                    if (res.status === 'success') {
                        reload();
                    }
                });
            });

        }

        handleProfileImageBtnClick(e) {
            $("#profile-image-uploader").click();
        }

        handleProfileImageChange(e) {
            const profileImage = e.target.files[0];
            const profileImagePreview = URL.createObjectURL(profileImage);

            const previousImage = $("#profile-image").attr("src");

            $(".profile-pic").attr("src", profileImagePreview);
            $("#profile-image").attr("src", profileImagePreview);

            const formData = new FormData();
            formData.append("profile_image", profileImage);

            $.ajax({
                type: "POST",
                url: base_url() + "control-panel/change-profile-image",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status === 'error') {
                        $(".profile-pic").attr("src", previousImage);
                        $("#profile-image").attr("src", previousImage);
                        return Swal.fire('Alert', res.msg, 'error');
                    }
                },
                error: function(xhr) {
                    const res = xhr.responseJSON;
                    if (res.errors) {
                        $(".profile-pic").attr("src", previousImage);
                        $("#profile-image").attr("src", previousImage);
                        return Swal.fire('Alert', res.errors.profile_image[0], 'error');
                    }
                }
            });
        }
    }

    if (window.location.pathname.split('/')[2] === 'profile') {
        $(function(event) {
            new Profile;
        });
    }

})();