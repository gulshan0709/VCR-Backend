<!DOCTYPE html>
<html lang="en">

<head> 
    <title>Edit Student</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/form.css">
    
</head>
<body style="background-color: #A4A4A4!important;" class="main">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <!-- from start -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-4">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-3">Edit Student</h3></div>
                                    <div class="card-body">
                                        <form>
                                        <div class="form-floating mb-2">
                                                        <input class="form-control" id="fname" type="text" value="" placeholder="Enter your first name" />
                                                        <label for="fname">First name</label>
                                                    </div>
                                                
                                                
                                                    <div class="form-floating mb-2">
                                                        <input class="form-control" id="lname" type="text" value="" placeholder="Enter your last name" />
                                                        <label for="lname">Last name</label>
                                                    </div>

                                                    <div class="form-floating mb-3 md-2">
                                                        <input class="form-control" id="address" type="text" placeholder="enter address" />
                                                        <label for="dob">Address</label>
                                                    </div>
                                              
                                           
                                            <div class="form-floating mb-2">
                                                <input class="form-control" id="email" type="email" value="" placeholder="name@example.com" />
                                                <label for="email">Email</label>
                                            </div>

                                           
                                                    <div class="form-floating mb-2 ">
                                                        <input class="form-control" id="phone" type="text" value="" placeholder="Enter your phone number" />
                                                        <label for="phone">Phone</label>
                                                    </div>
                                               
                                                
                                                   
                                                 
                                            <div class="mt-4 mb-0" >
                                              <center>  <input style="background-color: black; color: white;" class="d-grid btn btn-black btn-block" type="button" onClick="sendData()" value="Submit"></center>
                                            </div>    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
          
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function sendData() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "http://localhost:8000/api/student/"+window.location.pathname.substring(13,20),
        data: {
            first_name: document.getElementById('fname').value,
            last_name: document.getElementById('lname').value,
            address: document.getElementById('address').value,
            phone: document.getElementById('phone').value,
            email: document.getElementById('email').value,
        },
        type: 'put',
        success: function(result) {
            console.log(result);
        }
    });
}
</script>
<script>
    console.log(window.location.pathname)
    var id= window.location.pathname.substring(13,20);

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "http://localhost:8000/api/student/"+id,
        type: 'get',
        success: function(result) {
            document.getElementById('fname').value=result.first_name;
            document.getElementById('lname').value=result.last_name;
            document.getElementById('address').value=result.address;
            document.getElementById('phone').value=result.phone;
            document.getElementById('email').value=result.email;
        }
    });
</script>
</html>