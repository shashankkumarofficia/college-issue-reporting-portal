<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
     
    .topnav{
      width: 100%;
      height: 70px;
      background: #1b1b1b;
      display: flex;
      justify-content: space-around;
      align-items: center;
      position: sticky;
      top: 0;
    }

    .topnav a{
      text-decoration: none;
      color: white;
      font-size: 25px;
      font-weight: bold;
    }
    
*{
  margin: 0;
  padding: 0;
  user-select: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebar{
  position: fixed;
  width: 250px;
  height: 100%;
  left: 0px;
  background: #1b1b1b;
  transition: left 0.4s ease;
}
.sidebar.show{
  left: 0px;
}
.sidebar .text{
  color: white;
  font-size: 25px;
  font-weight: 600;
  line-height: 65px;
  text-align: center;
  background: #1e1e1e;
  letter-spacing: 1px;
}
nav ul{
  background: #1b1b1b;
  height: 100%;
  width: 100%;
  list-style: none;
}
nav ul li{
  line-height: 60px;
  border-top: 1px solid rgba(255,255,255,0.1);
}
nav ul li:last-child{
  border-bottom: 1px solid rgba(255,255,255,0.05);
}
nav ul li a{
  position: relative;
  color: white;
  text-decoration: none;
  font-size: 18px;
  padding-left: 40px;
  font-weight: 500;
  display: block;
  width: 100%;
  border-left: 3px solid transparent;
}
nav ul li.active a{
  color: cyan;
  background: #1e1e1e;
  border-left-color: cyan;
}
nav ul li a:hover{
  background: #1e1e1e;
}
nav ul ul{
  position: static;
  display: none;
}
nav ul .feat-show.show{
  display: block;
}
nav ul .serv-show.show1{
  display: block;
}
nav ul .prof-show.show2{
  display: block;
}
nav ul ul li{
  line-height: 42px;
  border-top: none;
}
nav ul ul li a{
  font-size: 17px;
  color: #e6e6e6;
  padding-left: 80px;
}
nav ul li.active ul li a{
  color: #e6e6e6;
  background: #1b1b1b;
  border-left-color: transparent;
}
nav ul ul li a:hover{
  color: cyan!important;
  background: #1e1e1e!important;
}
nav ul li a span{
  position: absolute;
  top: 50%;
  right: 20px;
  transform: translateY(-50%);
  font-size: 22px;
  transition: transform 0.4s;
}
nav ul li a span.rotate{
  transform: translateY(-50%) rotate(-180deg);
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: #202020;
  z-index: -1;
  text-align: center;
}
.content .header{
  font-size: 45px;
  font-weight: 600;
}
.content p{
  font-size: 30px;
  font-weight: 500;
}

  </style>



<nav class="topnav">
    <a href="#">Student</a>
<!--      <a href="#" >LOgout</a>-->
  </nav>
    <nav class="sidebar">
      <div class="text">Side Menu</div>
      <ul>
        <li class="active"><a href="index.php">Dashboard</a></li>
        <li>
          <a href="#" class="serv-btn">Profile
            <span class="fas fa-caret-down first"></span>
          </a>
          <ul class="serv-show">
           <li><a href="edit_student_profile.php">Edit Profile</a></li>
            <li><a href="student_password_reset.php">Change Password</a></li>
          </ul>
        </li>

              <li><a href="post_issue.php">Post Issue</a></li>
               <li>
          <a href="#" class="feat-btn">Issues
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="feat-show">
            <li><a href="post_by_you.php">Post By You</a></li>
            <li><a href="your_solved_issue.php">Your Solved Issue</a></li>
          </ul>
        </li>
        <li><a href="student_log_out.php">Logout</a></li>

      </ul>
    </nav>

    <script>
    
      $('.feat-btn').click(function(){
        $('nav ul .feat-show').toggleClass("show");
        $('nav ul .second').toggleClass("rotate");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .first').toggleClass("rotate");
      });
      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
    </script>



