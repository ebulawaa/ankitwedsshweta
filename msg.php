<head>
    <title>RohitwedsAnkita | ebulawaa.com</title>
  <link rel="apple-touch-icon" href="http://ebulawaa.com/eb.png">
  <link rel="shortcut icon" type="image/png" href="http://ebulawaa.com/eb.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.teal-pink.min.css">
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto|Pacifico|Italianno" rel="stylesheet" type="text/css">
     <style type="text/css">
      :root {
  --theme-color: #A63338;
  --theme-color2:#FFCF40;
  --font-family1:"Italianno";
  --font-family2:"Pacifico";  
 
    }
   body{
      
 background-color: #FBF4EC;

     }
     .main{
      font-size: 18px;
      color: #fff;
      font-family: "Roboto";
      background-color: rgba(0,0,0,0.5);
      margin: 5px;
      padding: 5px;
      border-radius: 10px;
      word-wrap: break-word;
     }
     .main>img{
      margin: 8px;
      height: 28px;
      border-radius: 100%;
     }

     .msg{
       margin-left: 43px;
      font-size: 18px;
      font-family: sans-serif;
      padding-bottom: 5px;
     }
  h4{
font-family: "Pacifico";
color: var(--theme-color);
margin: 8px;
text-align: center;
  }
  #theForm{
    text-align: center;
   
  }
  #header {
    display: inline;
    vertical-align: middle;
}
.mdl-layout__header {
   position: fixed;
    color: var(--theme-color2);
    background-color: var(--theme-color);
    text-align: center;
    font-size: 36px;
    padding: 20px;
    font-family: var(--font-family1);
    flex-shrink: 0;
    width: 100%;
    margin: 0;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
   
}
.mdl-layout__obfuscator,.mdl-layout__drawer{
  position: fixed;
}
.material-icons {
  margin-top: 13px;
    }
    .empty{
      margin-top: 70px;
    }
    #save{
      background-color: var(--theme-color);
      color: #fff;
    }
    .mdl-navigation__link{
      font-size: 18px !important;
      color: var(--theme-color) !important;
      text-decoration-color: var(--theme-color) !important;
    }
    .mdl-layout-title{
  text-align: center;
}
.mdl-layout-title>a>img{
margin-top: 10px;
border-radius: 5px;
width: 60px;
}
hr{
     margin: auto;
    width: 90%;
    margin-top: 17px;
    background: rgba(0,0,0,0.5);
    height: 2px;

}

.mdl-layout__drawer>.mdl-layout-title{
  padding-left: 0px !important;
}
.material-icons{
  color: var(--theme-color2);
}

    </style>
    <body>
  
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
 <header id="header" class="mdl-layout__header">Mathur's invitation</header>

  <div class="mdl-layout__drawer">
   <span class="mdl-layout-title"><a href="http://ebulawaa.com"><img src="http://ebulawaa.com/eb.png"></span></a>
     <nav class="mdl-navigation">
       <a class="mdl-navigation__link" href="index.html">Home</a>
       <a class="mdl-navigation__link" href="msg.php">Send wishes</a>
        <a class="mdl-navigation__link" target="_blank" href="http://ebulawaa.com">About us</a>
      
    </nav>
  </div> 
   <div id="mdl-layout__container">
      <div id="app-header">

    <div id="main-content">
    <div class="empty">
      <form method="POST" id="theForm">
        <h4>Send your wish</h4>
         <!-- <div class="form-group">
          <label for="inputName">Name</label>
          <input type="text" id="inputName" class="form-control" name="inputName" placeholder="Enter your name" required autofocus>
      </div>-->
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="inputName" name="inputName" >
    <label class="mdl-textfield__label" for="sample3">Enter your name</label>
  </div><br>
      
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="email" id="inputEmail" name="inputEmail" >
    <label class="mdl-textfield__label" for="sample3">Enter your email</label>
  </div><br>
  
      
      <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" name="inputMessage" type="text" rows= "3" id="inputMessage" ></textarea>
    <label class="mdl-textfield__label" for="sample5">Enter your message</label>
  </div><br>
    
     
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"id="save" type="submit">
  SEND
</button>
        
      </form>
      <hr>
     <h4>Received wishes 📨</h4>
</body>
</head>

<?php 
$servername = "localhost";
$username = "ebulad4i_wedexp2";
$password = "8tyH(w8psVR$";
$dbname = "ebulad4i_weddingexp2";

// $servername = "localhost";
// $username = "root";
// $password = "techno";
// $dbname = "wish";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, message FROM rohitwedsankita ORDER BY create_at DESC";
$result = $conn->query($sql);

   echo '';
  
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='main'> <img src='http://ebulawaa.com/eb.png'><b>". $row["name"]. "</b><br><div class='msg'>" . $row["message"] . "</div></div><br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 

</div></div></div>
<script type="text/javascript">
$(document).ready(function(){
  $('#theForm').on('submit', function(e) {

  var name = $('#inputName').val();
  var email = $('#inputEmail').val();
  var message =  $('#inputMessage').val();
   if(name == ''|| email== ''|| message==''){
       alert("Enter data in all fields!");
        return false;
      }

    if (!e.isDefaultPrevented()) {
      var data = $('#theForm').serialize();
        $.ajax({
          url: "siteajax.php?savemessage", 
          type:'POST',
          data:data,
          success: function(data){
            // alert(data);
            var x = JSON.parse(data);
            // alert(x.status);
            if(x.status == 1){
              alert("Message has been saved successfully.");
              window.location.reload();
              $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            }
              // var messageAlert = 'alert-' + data.type;
            //       var messageText = data.message;
            //       var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
            //       if (messageAlert && messageText) {
            //           $('.messages').html(alertBox);
            //           if (data.type == 'success') {
            //               $('#theForm')[0].reset();
            //               $('#theForm').find('.closeclass').click();
            //               $('#tbldata').html(data.result);
            //               $('#datatable-buttons').DataTable();
            //           }
            //       }
          }
      });
      return false;
    }
  });

});
</script>