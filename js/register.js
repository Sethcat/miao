function checkform(){
		var name = document.getElementById("UserName").value;
		var email = document.getElementById("Email").value;
		var passwd1 = document.getElementById("Password").value;
		var passwd2 = document.getElementById("ConfirmPassword").value;
		//验证用户名
		if (name == "") { 
			alert("请输入您姓名!");
			return false;
			}
		//验证电子邮件
		var reg=/^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
		if(reg.test(strEmail)==false){
			alert("电子邮箱格式不正确！");
			return false;
		}
		//验证邮编
		var i,j,strTemp; 
		strTemp="0123456789-()# "; 
		for (i=0;i<tel.length;i++) 
		{ 
			j=strTemp.indexOf(tel.charAt(i)); 
			if (j==-1){ 
		//说明有字符不合法 
			alert("invalid"); 
			return false;
		}
		}		
		
		//验证密码
		if (document.register.passwd1.value != document.register.passwd2.value) { 
			alert("您两次输入的密码不一样！请重新输入.");
			return false;
		}
		catch(exception){
			alert(exception.message);
		}
		document.form[0].submit();
		return true;
		}

