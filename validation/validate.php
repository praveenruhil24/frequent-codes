
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
<link rel="stylesheet" href="login.css">
</head>
<body>
<form method="post" action="" enctype="multipart/form-data" id="first_form" name="abcForm">
<div class="main">
<div class="fullname">
<span>Enter Name</span>
<input type="text" name="name" placeholder="Enter Name" id="name"/><span id="name_error">Please Enter name</span>
</div>
<div class="user">
<span>Enter Email</span>
<input type="email" name="email" placeholder="Enter Email" id="email" /><span id="email_error">Please enter email</span>
</div>
<div class="password">
<span>Enter Password</span>
<input type="password" name="pass" placeholder="Enter Password" id="pass" /><span id="pass_error">Please enter password</span>
</div>
<div class="gender">
<span>Select Gender</span>
<input type="radio" name="gen" id="gen" value="male" >Male
<input type="radio" name="gen" id="gen" value="female">Female<span id="radio_error">Please Select Button</span>
</div>
<div class="done">
<input type="submit" value="Submit" onclick="getNames()" name="submit">
</div>
</div>
</form>
<p id="suggestions"></p>
<script>
$("document").ready(function(){
                $("#name_error").hide().css("color","red");
                $("#email_error").hide().css("color","red");
                $("#pass_error").hide().css("color","red");
				$("#radio_error").hide().css("color","red");

        
            $("input[type='submit']").click(function(e){
                e.preventDefault();
                
                $("#name_error").hide();
                $("#email_error").hide();
                $("#pass_error").hide();
				$("#radio_error").hide();
                
                 if($("input[name='name']").val()==""){
                 $("input[name='name']").focus();
                 $("#name_error").show();
                 }
				
					 $("#name").keypress(function(){  
						$("#name_error").hide();  
						}
						);
                    if($("input[name='email']").val()==""){
                    $("input[name='email']").focus();
                    $("#email_error").show();
                    }
                    
                 
					  $("#email").keypress(function(){  
						$("#email_error").hide();  
						});
                    if($("input[name='pass']").val()==""){
                    $("input[name='pass']").focus();
                    $("#pass_error").show();
                    }
					
					 $("#pass").keypress(function(){  
						$("#pass_error").hide();  
						});
						if($('input[name=gen]:checked').length<=0)
						{
								$("#radio_error").show();
						}
						
						$("#gen").click(function(){  
						$("#radio_error").hide();  
						});
                        
         
                    $("form").submit();
                    
            });
			
			
        });
		
function getNames()
{
	var name = document.forms['abcForm']['name'].value;
	var email = document.forms['abcForm']['email'].value;
	var pass = document.forms['abcForm']['pass'].value;
	var gen = document.forms['abcForm']['gen'].value;
	if(name!='' || email!='' || pass!='' || gen!='' )
	{
		jQuery.ajax ({
			type  :	"POST",
			url	: "text3.php",
			data :  {'name' : name,'email' :email,'pass':pass,'gen':gen},
			success : function(data){
				console.log(data);
				$('#suggestions').html(data);
									$('#name').html('');
				$('#email').empty();
				$('#pass').empty();
			}
		})	// END jQuery.ajax 
		
	} else {
		$('#suggestions').html('');
	}// END if 

}
</script>
</body>
</html>