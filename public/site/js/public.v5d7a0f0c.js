var alertSuccessful="";var alertUnsuccessful="";var AJAX_URL='pages/ajax.php';function getHeader(className,methodName)
{return{"Class":className,"Method":methodName,"LangId":$("body").attr("data-lang-id")};}
function getSerializeData(className,methodName,selector)
{var data=getHeader(className,methodName);var formData=$(selector).serializeArray();for(var i=0;i<formData.length;i++)
{data[formData[i].name]=formData[i].value;}
return data;}
function getFormData(className,methodName,selector)
{var data=getHeader(className,methodName);var fd=new FormData($(selector)[0]);var keys=Object.keys(data);for(var i=0;i<keys.length;i++)
{fd.append(keys[i],data[keys[i]]);}
return fd;}
function numberFormat(input)
{return Intl.NumberFormat("en-US").format(input);}
$(function()
{alertSuccessful=$("body").attr("data-alert-successful");alertUnsuccessful=$("body").attr("data-alert-unsuccessful");$("footer .social-networks li").each(function($index,$item)
{var $color=$($item).attr("data-color");$($item).find("a").css("color",$color);});$("footer .menu li a[href='#top']").on("click",function(e)
{e.preventDefault();$("body,html").stop().animate({scrollTop:0},1000,'swing');});var selector=$(".material-input input,.material-input textarea");selector.each(function($index,$item)
{var $value=$($item).val();if($value!='')
{$($item).attr("data-has-value",1);}
else
{$($item).attr("data-has-value",0);}});selector.on("keyup",function()
{if($(this).val()=='')
{$(this).attr("data-has-value",0);}
else
{$(this).attr("data-has-value",1);}});if(typeof(grecaptcha)!=='undefined')
{grecaptcha.ready(function(){reloadRecaptcha();});}});function reloadRecaptcha()
{var siteKey=$("[data-with-captcha]").attr("data-with-captcha");grecaptcha.execute(siteKey,{action:'form'}).then(function(token){$("[data-with-captcha]").find("[name='token']").val(token);});}
function loading($selector,show)
{if(show===true)
{$($selector).css("opacity","1")}
else
{$($selector).css("opacity","0")}}