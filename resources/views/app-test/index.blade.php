
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Test</title>
</head>

<form id="account_confirmation_form" method="post" action="{{ route('app_test.app_auth_confirmation') }}">
    @csrf
    <input type="hidden" name="email"/>
    <input type="hidden" name="project_key"/>
    <input type="hidden" name="user_key"/>
    <input type="hidden" name="session"/>
    <button id="submit_btn" style="display: none;">Submit</button>
</form>

<div class="error_msg"></div>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            @if(isset(request()->email) && isset(request()->project_key) && isset(request()->user_key) && isset(request()->session))
                localStorage.setItem("arctic_portal_email", "{{ request()->email }}");
                localStorage.setItem("arctic_portal_project_key", "{{ request()->project_key }}");
                localStorage.setItem("arctic_portal_user_key", "{{ request()->user_key }}");
                localStorage.setItem("arctic_portal_session", "{{ request()->session }}");
            @endif

            if (localStorage.getItem("arctic_portal_email") === null || localStorage.getItem("arctic_portal_project_key") === null || localStorage.getItem("arctic_portal_user_key") === null || localStorage.getItem("arctic_portal_session") === null) {
                $(".error_msg").html("Invalid Access.");
            }else{
                $("input[name='email']").val(localStorage.getItem("arctic_portal_email"));
                $("input[name='project_key']").val(localStorage.getItem("arctic_portal_project_key"));
                $("input[name='user_key']").val(localStorage.getItem("arctic_portal_user_key"));
                $("input[name='session']").val(localStorage.getItem("arctic_portal_session"));
                $("#account_confirmation_form").submit();
            }

        });
    </script>
</body>
</html>