<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Matrimony</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    </head>
    <body>
        <div class="container">

            <header>
                <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                  <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Matrimony</span>
                  </a>

                  <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    @if($user_id!='')
                        <a class="me-3 py-2 text-dark text-decoration-none" href="javascript:void(0);">{{$user_name}}</a>
                    @endif

                    @if($user_id!='')
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{url('/logout')}}">Logout</a>
                    @else
                        <a class="me-3 py-2 text-dark text-decoration-none" href="{{url('/login')}}">Login</a>
                    @endif

                    @if($user_id=='')
                    <a class="py-2 text-dark text-decoration-none" href="#">Register</a>
                    @endif
                  </nav>
                </div>
            </header>

            <h3 class="mt-2">Best matches for you...</h3>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Annual Income</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">Family</th>
                            <th scope="col">Manglik</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($matched_user_count>0)
                            <?php $counter=1;?>
                            @foreach($matched_users as $each_user)
                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <td>{{$each_user->fname}} {{$each_user->lname}}</td>
                                <td>{{$each_user->email}}</td>
                                <td>{{$each_user->gender}}</td>
                                <td>{{$each_user->dob}}</td>
                                <td>{{$each_user->income}}</td>
                                <td>{{$each_user->occupation}}</td>
                                <td>{{$each_user->familytype}}</td>
                                <td>{{$each_user->manglik}}</td>
                            </tr>
                            <?php $counter++;?>
                            @endforeach
                        @else
                            <tr><td colspan="9" style="text-align: center;">No matching record found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
