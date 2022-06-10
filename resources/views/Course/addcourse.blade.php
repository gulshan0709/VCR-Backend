<!DOCTYPE html>
<html lang="en">

<head> 
    <title>Add Course</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/form.css">
    
</head>
<body class="main">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <!-- from start -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-4">
                                <div class="card-header"><h3 class="text-center font-weight-light my-3">Add Course</h3></div>
                                    <div class="card-body">
                                        <form>
                                        <div class="form-floating mb-2">
                                                        <input class="form-control" id="cname" type="text" name="cname" value="" placeholder="Enter your course name" />
                                                        <label for="name">Course name</label>
                                                        <small id="cnamevalid" class="form-text text-muted invalid-feedback">
                                                         Enter the valid course name 
                                                          </small>
                                                    </div>

                                            <div class="mt-4 mb-0" >
                                              <center>  <input class="d-grid btn btn-black btn-block" type="button" onClick="sendData()" value="Submit"></center>
                                            </div>      
                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- form end -->
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/validation.js"></script>
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
        url: "http://localhost:8000/api/course",
        data: {
            cname: document.getElementById('cname').value,
           
        },
        type: 'post',
        success: function(result) {
            location.href = "/courselist"
        }
    });
}
</script>

</html>