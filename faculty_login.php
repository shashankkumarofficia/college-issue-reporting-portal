<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="./images/scroll-64.png" sizes="32x32">
        <title>Faculty Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/login.css" />

    </head>
    <body>

        <?php include './asset/landingpage.php'; ?>


        <div class="container" style="margin-top: 7%;">
            <div class="row">
                <div class="col-md-6"> 
                    <div class="card"> 
                        <form  class="box" method='post' action='faculty_login_check.php'>
                            <h1>Faculty Login</h1>
                            <p class="text-muted"> Please enter your login and password!</p>
                            <input type="text" name="F_email" placeholder="Email"  required="">
                            <input type="password" name="Password" placeholder="Password" required="">
                            <input type="submit" name="login" value="Login"> 
                            <div class="col-md-12">
                                <ul class="social-network social-circle"> 
                                    <li><a href="https://www.facebook.com/" class="icoFacebook" title="Facebook">
                                            <i class="fab fa-facebook-f"></i></a>
                                    </li> <li><a href="https://twitter.com/?lang=en-in" class="icoTwitter" title="Twitter">
                                            <i class="fab fa-twitter"></i></a></li> 
                                    <li><a href="https://www.google.co.in/" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li> 
                                </ul> 
                            </div> 
                        </form> 
                    </div> 
                </div> 
            </div>
        </div>

        <!--     <br>
            <br>
        
        
            <form class="form-horizontal" method='post' action='faculty_login_check.php'>
        <fieldset>
        
         Form Name 
         <br>
        <center>
            <h3>Faculty Login</h3>
        </center>
            <br>
        
        
         Text input
        <div class="form-group">
          <label class="col-md-4 control-label" for="email">Email</label>  
          <div class="col-md-4">
          <input id="email" name="F_email" type="text" placeholder="Email" class="form-control input-md" required="">
          <span class="help-block">Email Id</span>  
          </div>
        </div>
        
         Password input
        <div class="form-group">
          <label class="col-md-4 control-label" for="password">Password</label>
          <div class="col-md-4">
            <input id="password" name="Password" type="password" placeholder="Password" class="form-control input-md" required="">
            <span class="help-block">Password</span>
          </div>
        </div>
        
        
         Button (Double) 
        <div class="form-group">
          <label class="col-md-4 control-label" for="login"></label>
          <div class="col-md-8">
            <button id="login" name="login" class="btn btn-success">Login</button>
            <button id="clear" type='reset' name="clear" class="btn btn-danger">Clear</button>
          </div>
        </div>
        
        </fieldset>
        </form>-->
    </body>
</html>
