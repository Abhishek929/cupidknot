<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>cupid knot</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

        <script>
          $( function() {
            $( "#slider-range" ).slider({
              range: true,
              min: 0,
              max: 50000,
              values: [ 0, 50000 ],
              slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
              }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
              " - $" + $( "#slider-range" ).slider( "values", 1 ) );
          } );

            $( function() {
            $( "#age-slider-range" ).slider({
              range: true,
              min: 15,
              max: 70,
              values: [ 15, 70 ],
              slide: function( event, ui ) {
                $( "#age" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
              }
            });
            $( "#age" ).val( $( "#age-slider-range" ).slider( "values", 0 ) +
              " - " + $( "#age-slider-range" ).slider( "values", 1 ) );
          } );

          
        </script>

    </head>
    <body>
        <div class="container">

            <header>
                <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                  <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">CupidKnot</span>
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

            <h3 class="mt-2">Users</h3>
            <div>

                <form method="get" enctype="multipart" action="{{url('/admin-dashboard')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="expected_income" class="form-label">Age:</label>
                            <input type="text" name="age" id="age" readonly style="border:0; color:#f6931f; font-weight:bold;" placeholder="" value="" required> 
                            <div id="age-slider-range"></div> 
                        </div>
                        <div class="col-sm-6">
                            <label for="gender" class="form-label">Gender:</label><br/>
                            <input type="radio" name="gender"  value="Male"/>Male
                            <input type="radio" name="gender"  value="Female"/>Female
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="family_type" class="form-label">Family Type:</label>
                            <select name="familytype[]" class="form-control" size="2" multiple="multiple">
                                <option value="Joint family">Joint Family</option>
                                <option value="Nuclear family">Nuclear Family</option>
                            </select>
                        </div>

                        <div class="col-sm-6">
                          <label for="manglik" class="form-label">Manglik:</label>
                            <select name="manglik" class="form-control">
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Both">Both</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="expected_income" class="form-label">Expected Income:</label>
                            <input type="text" name="expectedincome" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;" placeholder="" value="" required> 
                            <div id="slider-range"></div>
                        </div>
                        <div class="col-sm-6">
                          

                          <a href="{{url('/admin-dashboard')}}" class="btn btn-secondary mt-2" style="float:right;margin-left: 10px;">Reset</a>
                          <input type="submit" class="btn btn-primary mt-2" style="float:right;" name="submit" value="Submit"/>
                        </div>
                    </div> 
                    <hr>
                </form>
                
                <table class="table mt-2">
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
                                <td>{{$each_user->familytype1}}</td>
                                <td>{{$each_user->manglik1}}</td>
                            </tr>
                            <?php $counter++;?>
                            @endforeach
                        @else
                            <tr><td colspan="9" style="text-align: center;">No record found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>