//<SPAN style="FONT-SIZE: 12px">
//<script type="text/javascript"> 
<!-- 
function go(t,url){ 
//t设置跳转时间：秒 
//url设置跳转网址 
document.write("<div id=text>本页将在<strong id='tt'></strong>后，跳转至：<span id='link'></span></div>"); 
document.getElementById("link").innerHTML=url; 
$(t,url); 
} 

function $(t,url){ 
ta = t-1; 
tb = t + "000"; 
d = document.getElementById("tt"); 
d.innerHTML=t; 
window.setInterval(function() 
{ 
go_to(url); 
},1000); 
} 

function go_to(url){ 
d.innerHTML=ta--; 
if(ta<0){ 
document.write("正在跳转至：<a href="+url+">"+url+"</a>"); 
location.href=url; 
} 
else{ 
return; 
} 
} 
