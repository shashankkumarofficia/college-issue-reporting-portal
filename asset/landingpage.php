<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>college issue report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}


header{
  z-index: 999;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #23252B;
  box-shadow: 0 5px 25px rgb(0 0 0 / 20%);
  padding: 0 100px;
  transition: 0.6s;
}

header .logo{
  color: #fff;
  font-size: 1.8em;
  font-weight: 700;
  text-transform: uppercase;
  text-decoration: none;
  letter-spacing: 2px;
}

header .navigation{
  position: relative;
  line-height: 75px;
  transition: 0.6s;
  transition-property: line-height;
}

header.sticky .navigation{
  line-height: 60px;
}

header .navigation .menu{
  position: relative;
  display: flex;
  justify-content: center;
  list-style: none;
  user-select: none;
}

.menu-item > a{
  color: #fff;
  font-size: 1em;
  text-decoration: none;
  margin: 20px;
  padding: 25px 0;
}

.menu-item > a:hover{
  color: #469DFF;
  transition: 0.3s;
}

.menu-item .sub-menu{
  position: absolute;
  background: #23252B;
  top: 74px;
  line-height: 40px;
  list-style: none;
  border-radius: 0 0 8px 8px;
  box-shadow: 0 5px 25px rgb(0 0 0 / 20%);
  pointer-events: none;
  transform: translateY(20px);
  opacity: 0;
  transition: 0.3s;
  transition-property: transform, opacity;
}

header.sticky .menu-item .sub-menu{
  top: 60px;
}

.menu-item:hover .sub-menu{
  pointer-events: all;
  transform: translateY(0);
  opacity: 1;
}

.menu-item .sub-menu .sub-item{
  position: relative;
  padding: 7px 0;
  cursor: pointer;
  box-shadow: inset 0px -30px 5px -30px rgba(255, 255, 255, 0.2);
}

.menu-item .sub-menu .sub-item a{
  color: #fff;
  font-size: 1em;
  text-decoration: none;
  padding: 15px 30px;
}

.menu-item .sub-menu .sub-item:hover{
  background: #4080EF;
}

.menu-item .sub-menu .sub-item:last-child:hover{
  border-radius: 0 0 8px 8px;
}

.more .more-menu{
  position: absolute;
  background: #23252B;
  list-style: none;
  top: 0;
  left: 100%;
  white-space: nowrap;
  border-radius: 0 8px 8px 8px;
  overflow: hidden;
  pointer-events: none;
  transform: translateY(20px);
  opacity: 0;
  transition: 0.3s;
  transition-property: transform, opacity;
}

.more:hover .more-menu{
  pointer-events: all;
  transform: translateY(0);
  opacity: 1;
}

.more .more-menu .more-item{
  padding: 7px 0;
  box-shadow: inset 0px -30px 5px -30px rgba(255, 255, 255, 0.2);
  transition: 0.3s;
}

.more .more-menu .more-item:hover{
  background: #4080EF;
}

.menu-btn{
  display: none;
}

@media (max-width: 1060px){
  header .navigation .menu{
    position: fixed;
    display: block;
    background: #23252b;
    min-width: 350px;
    height: 100vh;
    top: 0;
    right: -100%;
    padding: 90px 50px;
    visibility: hidden;
    overflow-y: auto;
    transition: 0.5s;
    transition-property: right, visibility;
  }

  header.sticky .navigation{
    line-height: 75px;
  }

  header .navigation .menu.active{
    right: 0;
    visibility: visible;
  }

  .menu-item{
    position: relative;
  }

  .menu-item .sub-menu{
    opacity: 1;
    position: relative;
    top: 0;
    transform: translateX(10px);
    background: rgba(255, 255, 255, 0.1);
    border-radius: 5px;
    overflow: hidden;
    display: none;
  }

  header.sticky .menu-item .sub-menu{
    top: 0;
  }

  .menu-item:hover .sub-menu{
    transform: translateX(10px);
  }

  .menu-item .sub-menu .sub-item{
    box-shadow: none;
  }

  .menu-item .sub-menu .sub-item:hover{
    background: none;
  }

  .menu-item .sub-menu .sub-item a:hover{
    color: #4080EF;
    transition: 0.3s;
  }

  .more .more-menu{
    opacity: 1;
    position: relative;
    left: 0;
    transform: translateY(0);
    background: rgba(255, 255, 255, 0.1);
    border-radius: 5px;
    display: none;
  }

  .more .more-menu .more-item{
    box-shadow: none;
  }

  .more .more-menu .more-item:hover{
    background: none;
  }

  .more .more-menu .more-item a{
    margin-left: 20px;
  }

  .close-btn{
    position: absolute;
    background: url(./images/close.png)no-repeat;
    width: 40px;
    height: 40px;
    background-size: 25px;
    background-position: center;
    top: 0;
    left: 0;
    margin: 25px;
    cursor: pointer;
  }

  .menu-btn{
    background: url(./images/menu.png)no-repeat;
    width: 40px;
    height: 40px;
    background-size: 30px;
    background-position: center;
    cursor: pointer;
    display: block;
  }

  header{
    padding: 15px 20px;
  }

  header.sticky{
    padding: 10px 20px;
  }
}
    </style>
  </head>
  <body>

    <header>
      <a href="#" class="logo">College Issues Report</a>
      <div class="navigation">
        <ul class="menu">
          <div class="close-btn"></div>
          <li class="menu-item"><a href="index.php">Home</a></li>
          <li class="menu-item">
            <a class="sub-btn" href="#">Login <i class="fas fa-angle-down"></i></a>
            <ul class="sub-menu">
              <li class="sub-item"><a href="student_login.php">Student</a></li>
              <li class="sub-item"><a href="faculty_login.php">Faculty</a></li>
              <li class="sub-item"><a href="admin_login.php">Admin</a></li>
            </ul>
          </li>
          <li class="menu-item"><a href="registration.php">Register</a></li>
          <li class="menu-item"><a href="contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="menu-btn"></div>
    </header>

   

    <script type="text/javascript">
    //jquery for toggle dropdown menus
    $(document).ready(function(){
      //toggle sub-menus
      $(".sub-btn").click(function(){
        $(this).next(".sub-menu").slideToggle();
      });

      //toggle more-menus
      $(".more-btn").click(function(){
        $(this).next(".more-menu").slideToggle();
      });
    });

    //javascript for the responsive navigation menu
    var menu = document.querySelector(".menu");
    var menuBtn = document.querySelector(".menu-btn");
    var closeBtn = document.querySelector(".close-btn");

    menuBtn.addEventListener("click", () => {
      menu.classList.add("active");
    });

    closeBtn.addEventListener("click", () => {
      menu.classList.remove("active");
    });

    //javascript for the navigation bar effects on scroll
    window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    });
    </script>

  </body>
</html>


