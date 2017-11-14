$('document').ready(function() {
    $("#login-form").on("submit", function(event) {
        var data = $("#login-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: data,
            dataType: 'json',
            beforeSend: function () {
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Logging In...');
            },
            success: function (response) {
                if (response.success == 1) {
                    // Reload the page as soon as the Modal Dialog is closed
                    showMessage('You have successfully logged in.', 'Log In Success', true);
                } else {
                    showMessage('<span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response.message, 'Login Error');
                    $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Log In');
                }
            }
        });

        return false;
    });

    $("#logout-form").on("submit", function(event) {
        var data = $("#logout-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.success == 1) {
                    window.location.reload();
                } else {
                    showMessage('<span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response.message, 'Log Out Error');
                    $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Log In');
                }
            }
        });

        return false;
    });

    function showMessage(message, title, doReload) {
        // Use defaults if they are not provided. Message is required.
        if (message === undefined) return false;
        if (title === undefined) title = 'Login Form';
        if (doReload === undefined) doReload = false;

        // Set elements of the modal dialog to the correct values
        $("#messageModal .modal-title").html(title);
        $("#messageModal .modal-body p").html(message);

        if (doReload) {
            $('#messageModal').on('hidden.bs.modal', function () {
                window.location.reload();
            })
        }
        // Show the modal dialog
        $("#messageModal").modal();

        return true;
    }
});