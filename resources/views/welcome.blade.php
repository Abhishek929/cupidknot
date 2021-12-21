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
                  max: 500,
                  values: [ 75, 300 ],
                  slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                  }
                });
                $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
            });

            function validateEmail(emailField){
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                if(reg.test(emailField.value) == false)
                {
                    alert('invled email');
                    return false;
                }
                return true;
            } 

            function validateForm(){
                console.log('validateForm');
                var firstName = $("#firstName").val();
                if(firstName==''){
                    $("#firstName_err").show();
                    return false;
                }

                var lastName = $("#lastName").val();
                if(lastName==''){
                    $("#lastName_err").show();
                    return false;
                }

                var email = $("#email").val();
                if(email==''){
                    $("#email_err").show();
                    return false;
                }

                var password = $("#password").val();
                if(password==''){
                    $("#password_err").show();
                    return false;
                }

                var dob = $("#birthday").val();
                if(dob==''){
                    $("#dob_err").show();
                    return false;
                }

                var gender = $("input[type='radio']:checked");  
                if(gender.length==0){  
                    $("#gender_err").show(); 
                    return false;  
                }

                var income = $("#income").val();
                if(income==''){
                    $("#income_err").show();
                    return false;
                }

            }
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
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{url('/login')}}">Login</a>
                    <a class="py-2 text-dark text-decoration-none" href="#">Register</a>
                  </nav>
                </div>
            </header>

            <h3 class="mt-2">Basic Information Section</h3>
            <form id="myform" method="POST" enctype="multipart" action="{{url('/welcome')}}" onSubmit="return validateForm();">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <label for="first_name" class="form-label">First Name<sup style="color:red;">*</sup></label>
                        <input type="text" name="fname" class="form-control" id="firstName" onkeyup="value=value.replace(/[^a-zA-Z]/g,'')" placeholder="" value="">
                        <span id="firstName_err" style="color:red;display:none;">Please provide first name</span>
                    </div>
                    <div class="col-sm-6">
                        <label for="last_name" class="form-label">Last Name<sup style="color:red;">*</sup></label>
                        <input type="text" name="lname" class="form-control" id="lastName" onkeyup="value=value.replace(/[^a-zA-Z]/g,'')" placeholder="" value=""> 
                        <span id="lastName_err" style="color:red;display:none;">Please provide last name</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="email" class="form-label">Email<sup style="color:red;">*</sup></label>
                        <input type="text" name="email" class="form-control" id="email" onblur="validateEmail(this);" placeholder="" value=""> 
                        <span id="email_err" style="color:red;display:none;">Please provide email</span>
                    </div>
                    <div class="col-sm-6">
                        <label for="password" class="form-label">Password<sup style="color:red;">*</sup></label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="" value=""> 
                        <span id="password_err" style="color:red;display:none;">Please provide password</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="dob" class="form-label">Date Of Birth<sup style="color:red;">*</sup></label>
                        <input type="date" name="dob" class="form-control" id="birthday">
                        <span id="dob_err" style="color:red;display:none;">Please provide date of birth</span> 
                    </div>
                    <div class="col-sm-6">
                        <label for="gender" class="form-label">Gender<sup style="color:red;">*</sup></label><br/>
                        <input type="radio" name="gender"  value="Male"/> Male
                        <input type="radio" name="gender"  value="Female"/> Female<br/>
                        <span id="gender_err" style="color:red;display:none;">Please select gender</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="annual_income" class="form-label">Annual Income<sup style="color:red;">*</sup></label>
                        <input type="text" name="income" class="form-control" id="income" placeholder="" value=""> 
                        <span id="income_err" style="color:red;display:none;">Please provide income</span>
                    </div>
                    <div class="col-sm-6">
                        <label for="occupation" class="form-label">Occupation:</label>
                        <select name="occupation" class="form-control">
                            <option value="Private Job">Private Job</option>
                            <option value="Government Job">Government Job</option>
                            <option value="Business">Business</option>
                        </select> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="family_type" class="form-label">Family Type:</label>
                        <select name="familytype" class="form-control">
                            <option value="Joint family">Joint Family</option>
                            <option value="Nuclear family">Nuclear Family</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                      <label for="manglik" class="form-label">Manglik:</label>
                        <select name="manglik" class="form-control">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <h3 class="mt-2">Partner Preference</h3>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="expected_income" class="form-label">Expected Income:</label>
                        <input type="text" name="expectedincome" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;" placeholder="" value="" required> 
                        <div id="slider-range"></div>
                    </div>
                    
                    <div class="col-sm-6">
                      <label for="occupation" class="form-label">Occupation:</label>
                        <select name="occupation1[]" size="3" multiple="multiple" class="form-control">
                            <option value="Private Job">Private Job</option>
                            <option value="Government Job">Government Job</option>
                            <option value="Business">Business</option>
                        </select> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                      <label for="family_type" class="form-label">Family Type:</label>
                        <select name="familytype1[]" size="2" multiple="multiple" class="form-control">
                            <option value="Joint family">Joint Family</option>
                            <option value="Nuclear family">Nuclear Family</option>
                        </select> 
                    </div>
                    <div class="col-sm-6">
                      <label for="manglik" class="form-label">Manglik:</label>
                        <select name="manglik1" class="form-control">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Both">Both</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mt-2">
                      <input type="submit" class="btn btn-primary"  value="Submit" />
                    </div>
                </div>                       
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>