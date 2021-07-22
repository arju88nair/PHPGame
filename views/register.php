<?php
include_once 'partials/header.php';
?>


<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

</style>


<!-- Custom styles for this template -->
</head>
<body class="text-center">

<main class="form-signin">
    <form>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="form-group">
            <input type="hidden" class="form-control" name="mode" value="users" required>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="username" placeholder="User name" required>
            <label for="floatingInput">User name</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                   minlength="4" required>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="nick" name="nickname" placeholder="Nickname" required>
            <label for="floatingPassword">Nickname</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" id="signup" type="submit">Sign in</button>
    </form>
    <a href="/login">Already a user? Log in</a>
    <div class="alert alert-danger" id="alert" role="alert" style="display: none">
    </div>
</main>


</body>
<script>
    $(document).ready(function () {
        let request;
        // Bind to the submit event of our form
        $("form").submit(function (event) {

            // Prevent default posting of form - put here to work in case of errors
            event.preventDefault();

            // Abort any pending request
            if (request) {
                request.abort();
            }
            // setup some local letiables
            let form = $(this);
            // Let's select and cache all the fields
            let $inputs = form.find("input, select, button, textarea");
            // Serialize the data in the form
            let serializedData = form.serialize();

            // Let's disable the inputs for the duration of the Ajax request.
            // Note: we disable elements AFTER the form data has been serialized.
            // Disabled form elements will not be serialized.
            $inputs.prop("disabled", true);

            // Fire off the request to /form.php
            request = $.ajax({
                url: "/doRegister",
                type: "post",
                data: serializedData
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR) {
                // Log a message to the console
                console.log("Hooray, it worked!");
                window.location.href = '/'

            });

            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown) {
                // Log the error to the console
                $('#alert').text(errorThrown);
                $('#alert').show();
                console.error(
                    "The following error occurred: " +
                    textStatus, errorThrown
                );
            });

            // Callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function () {
                // Reenable the inputs
                $inputs.prop("disabled", false);
            });

        });
    });
</script>
</html>
