<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users | List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 lock">
                <button class="btn btn-success float-right btn-sm mt-4 mr-4 btn_lock"><i class="fa fa-lock"></i></button>
            </div>
            <div class="col-lg-12 users">

                <table class="table table-sm mt-4 mb-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td><button onclick="loginUser({{ $user->id }})" class="btn btn-success btn-sm">Login</button></td>
                        </tr>        
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="login_form" action="{{ route('app_test.login') }}" method="post">
    @csrf
    <input type="hidden" name="id" id="user_id">
    <input type="hidden" name="email"/>
    <input type="hidden" name="project_key"/>
    <input type="hidden" name="user_key"/>
    <input type="hidden" name="session"/>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $("document").ready(function(){
            
            $(".users").hide();

            $(".btn_lock").on('click', function(){
                $(".lock").hide();
                $(".users").show();
            });

            if (localStorage.getItem("arctic_portal_email") === null || localStorage.getItem("arctic_portal_project_key") === null || localStorage.getItem("arctic_portal_user_key") === null || localStorage.getItem("arctic_portal_session") === null) {
                $("body").html("Invalid Access");
            }else{
                $("input[name='email']").val(localStorage.getItem("arctic_portal_email"));
                $("input[name='project_key']").val(localStorage.getItem("arctic_portal_project_key"));
                $("input[name='user_key']").val(localStorage.getItem("arctic_portal_user_key"));
                $("input[name='session']").val(localStorage.getItem("arctic_portal_session"));
                $("#account_confirmation_form").submit();
            }

        });
        
        function loginUser(user_id){
            $("#user_id").val(user_id);
            $("#login_form").submit();
        }
       
    </script>

</body>
</html>