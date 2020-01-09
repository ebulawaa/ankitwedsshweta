<?php include('head.php');
if(isset($_SESSION['user']) && is_array($_SESSION['user'])){
	echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
}else{ ?>
<body>
<div class="container">
   <form class="form-signin" method="POST" id="theForm">
        <h2 class="form-signin-heading">Please sign  up</h2>
        <div class="messages"></div>
        <div class="form-group"> 
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" autocomplete="off" class="form-control" placeholder="Email address" required autofocus>
       	</div>
        <p><a href="index.php">Account already exist</a></p>
        <button class="btn btn-primary btn-block" id="signup" name="signup" type="submit">Sign up</button>
    </form>
</div>

</body>
</html>
<?php } ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#theForm').on('submit', function(e) {
		if (!e.isDefaultPrevented()) {
			var data = $('#theForm').serialize();
		    $.ajax({
		    	url: "siteajax.php?signup", 
		    	type:'POST',
		    	data:data,
		    	success: function(data){
		        	var messageAlert = 'alert-' + data.type;
	                var messageText = data.message;
	                var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
	                if (messageAlert && messageText) {
	                    $('#theForm').find('.messages').html(alertBox);
	                    if (data.type == 'success') {
	                        $('#theForm')[0].reset();
	                    }
	                }
		    	}
			});
			return false;
		}
	});

});
</script>