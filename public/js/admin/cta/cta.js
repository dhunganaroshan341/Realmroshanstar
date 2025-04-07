$(document).ready(function () {
    // Initialize Summernote for the description field
    $(".description").summernote({
        height: 300,
    });

    // Initialize Select2 for the days field (if applicable)
    $('#multiple-days').select2({
        placeholder: "Please Select the days",
        allowClear: true
    });

    // Handle form submission for updating CTA
    $(document).on("submit", "#ctaForm", function (event) {
        event.preventDefault();
        let formData = new FormData(this);
        $(".ctaSaveBtn").prop("disabled", true); // Disable the save button while the request is being processed

        $.ajax({
            url: "/admin/cta",  // Update CTA endpoint
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "CTA updated successfully!",
                    showConfirmButton: false,
                    timer: 1000,
                });
                // Optionally reload the form or update UI here
                $(".ctaSaveBtn").prop("disabled", false); // Re-enable save button
            },
            error: function (xhr) {
                // Handle validation errors if present
                if (xhr.status == 422) {
                    let error = xhr.responseJSON.errors;
                    $.each(error, function (data, message) {
                        $("#" + data + "-error").text(message[0]);
                    });
                }
            },
            complete: function () {
                $(".ctaSaveBtn").prop("disabled", false); // Re-enable save button after completion
            }
        });
    });

    // Handle file input for image and video uploads
    $(".cta-file-input").on("change", function () {
        let fileName = $(this).val().split("\\").pop();
        $(this).next(".file-label").text(fileName); // Update the label to show the file name
    });

    // Optional: Handle any additional form validation or UI updates here
});
