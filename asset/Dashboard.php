<style>
    body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  position: fixed;
  top: 120px;
  margin-top: -1%;
/*  border: 1px solid #ccc;*/
/*  background-color: #f1f1f1;*/
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
/*  border: 1px solid #ccc;*/
  border-top: none;
}
    
  .margin {
      margin-left: 20%;
    margin-top: 3%;
    align-content: center;
    align-items: center;
    
} 

* {
  box-sizing: border-box

}


a {
  color: inherit;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

.post {
  width: 500px;
  padding: 10px;
  position: relative;
  margin: 0 auto;
  border: 1px solid #dddddd;
  box-shadow: 0 0 2px rgba(0,0,0,0.2);
}

.wall {
  width: 100%;
  display: flex;
  align-items: strech;
  flex-direction: column;
}

.post-header {
  margin-bottom: 20px;
  overflow-y: auto;
}

.post-authorPic {
  width: 50px;
  height: 50px;
  float: left;
  margin-right: 5px;
}

.post-author {
  color: #44f;
  display: inline-block;
  font-weight: 600;
}

.post-action {
  display: inline-block;
  font-weight: 600;
  color: #888888;
}

.post-time {
  font-size: 0.9em;
  color: #888888;
}

.post-stats {
  margin-top: 15px;
  border-top: 1px solid #dddddd;
  padding-top: 5px;
  margin-bottom: 10px;
}

.post-stats-reaction {
  position: relative;
  display: inline-block;
}

.post-reaction-count {
  position: relative;
  color: #888888;
  display: inline-block;
}

.post-interactions {
  padding-top: 6px;
  border-top: 1px solid #dddddd;
}

.btn {
  display: inline-block;
  position: relative;
  margin: 0 0.5em;
}

.btn::before {
  content: '';
  display: inline-block;
  width: 1em;
  height: 1em;
  margin-right: 0.25em;
  border-radius: 50%;
  background: #ddd;
}

* > .popup {
  visibility: hidden;
}

*:hover > .popup {
  visibility: visible;
}

.peopleList {
  position: absolute;
  background: #333;
  color: #eee;
  padding: 0.5em;
  font-size: 0.8em;
  border-radius: 3px;
  bottom: 2em;
  width: max-content;
}

.peopleList::after {
  content: '';
  display: block;
  position: absolute;
  width: 0;
  height: 0;
  border-top: 5px solid #333;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  bottom: -5px;
  left: 10px;
}

.btn--like::after {
  content: '';
  position: absolute;
  background: transparent;
  width: 295px;
  height: 10px;
  top: -10px;
  visibility: hidden;
}

.btn--like:hover::after {
  visibility: visible;
}

.reactions {
  position: absolute;
  top: -60px;
  background: #fff;
  border: 1px solid #eee;
  box-shadow: 0 0 3px rgba(0,0,0,0.2);
  height: 50px;
  width: 295px;
  border-radius: 25px;
}

.reactionIcon {
  display: inline-block;
  position: relative;
  width: 40px;
  height: 40px;
  background: #25b0dc;
  border-radius: 50%;
  margin: 5px 0 0 5px;
  transform-origin: bottom center;
  transition: transform 200ms ease, opacity 50ms ease;
  
  opacity: 0;
  transform: translate(0, 100px);
}

.reactionIcon.enabled {
  opacity: 1;
  transform: translate(0,0);
  animation: reactionPopup 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.reactionIcon:hover {
  transform: scale(1.25);
}

.reactionIcon > label {
  display: inline-block;
  position: relative;
  color: #eee;
  background: #333;
  font-size: 0.7em;
  padding: 0.3em 0.75em;
  height: 25px;
  border-radius: 12.5px;
  top: -30px;
  opacity: 0;
  transition: opacity 50ms ease;
}

.reactionIcon:hover > label {
  opacity: 1;
}



@keyframes reactionPopup {
  0% {
    opacity: 0;
    transform: translate(0, 50px);
  }
  75% {
    opacity: 1;
  }
  100% {
    opacity: 1;
    transform: translate(0,0);
  }
}

.postp{
    overflow: hidden;
    overflow-y: auto;
    height: 550px;
    
    
}

::-webkit-scrollbar{
    width: 0;
}
</style>

<div class="margin">
      <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Public</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Anonymous</button>
</div>

    
     <!-- public -->
<div id="London" class="tabcontent">
    <div class="postp">
        <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
        
   <?php
                      include '../Connection.php';
                      $i=1;
                        $que=mysqli_query($conn,"select i.*,s.Name from issue i ,student s where s.Sid=i.studentid and postoption='public' order by date desc");
	
                            while($row=mysqli_fetch_array($que))
                        {
                          ?>
        
  <div class="wall">  
  <div class="post">      
    <div class="post-header">
      <div class="post-header-top">
        <a href="#" class="post-author"><?php echo $row['Name'];?></a>
      </div>
      <div class="post-header-bottom">
        <div class="post-time"><?php echo $row['date'];?></div>
      </div>
    </div>
    <div class="post-content"><?php echo $row['postissue'];?></div>
    <br>
    <div class="post-interactions">
      <a href="#" class="btn btn--like">
        Support
      </a>
    </div>
  </div>
</div>
  <br>
   <?php
                        }
 ?>
</div>
    </div>
    
    <!-- Anonymous -->
<div id="Paris" class="tabcontent">
    
    <div class="postp">
        <?php
                      include '../Connection.php';
                      $i=1;
                        $que=mysqli_query($conn,"select i.*,s.Name from issue i ,student s where s.Sid=i.studentid and postoption='Anonymous' order by date desc");
	
                            while($row=mysqli_fetch_array($que))
                        {
                          ?>
  <div class="wall">
  <div class="post">
    <div class="post-header">

      <div class="post-header-top">
        <a href="#" class="post-author">Anonymous</a>
      </div>
      <div class="post-header-bottom">
        <div class="post-time"><?php echo $row['date'];?></div>
      </div>
    </div>
    <div class="post-content"><?php echo $row['postissue'];?></div>
    <br>
    <div class="post-interactions">
      <a href="#" class="btn btn--like">
        Support
      </a>
    </div>
  </div>
</div>
  <br>
   <?php
                        }
 ?>
    
    </div>
    
    <div id="Tokyo" class="tabcontent">
<!--  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>-->
</div>

</div>


</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</script>
