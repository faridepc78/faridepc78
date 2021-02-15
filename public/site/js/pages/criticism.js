$(document).ready(function()
{$("#frmCriticism").on("submit",function(e)
{e.preventDefault();var data=getSerializeData("Criticism","SendMessage","#frmCriticism");loading("#sendLoading",true);$.ajax({url:AJAX_URL,type:'POST',data:data,dataType:'json',success:function(result)
{loading("#sendLoading",false);if(result.RefreshCaptcha!==undefined)
{reloadRecaptcha();}
if(result.status)
{swal({title:alertSuccessful,text:result.text,type:"success"},function(){$(".track-code-area .success-text").html(result.text);$(".inputs-area .inputs").fadeOut(function(){if(result.WantAnswer==1)
{$(".track-code-area .track-code").show();$(".track-code-area .track-code .value").html(result.TrackCode);}
else
{$(".track-code-area .track-code").hide();}
$(".track-code-area").fadeIn();});});}
else
{swal({title:alertUnsuccessful,text:result.text,type:"error"});}},error:function(a,b,c)
{loading("#sendLoading",false);}});});$("#frmTrack").on("submit",function(e)
{e.preventDefault();var data=getSerializeData("Criticism","GetResults","#frmTrack");loading("#trackLoading",true);$.ajax({url:AJAX_URL,type:'POST',data:data,dataType:'json',success:function(result)
{loading("#trackLoading",false);if(result.status)
{document.location=result.TrackUrl;}
else
{swal({title:alertUnsuccessful,text:result.text,type:"error"});}},error:function(a,b,c)
{loading("#trackLoading",false);}});});$("#frmAnswer").on("submit",function(e)
{e.preventDefault();var data=getSerializeData("Criticism","Answer","#frmAnswer");loading("#answerLoading",true);$.ajax({url:AJAX_URL,type:'POST',data:data,dataType:'json',success:function(result)
{loading("#answerLoading",false);if(result.RefreshCaptcha!==undefined)
{reloadRecaptcha();}
if(result.status)
{swal({title:alertSuccessful,text:result.text,type:"success"},function(){document.location.reload();});}
else
{swal({title:alertUnsuccessful,text:result.text,type:"error"});}},error:function(a,b,c)
{loading("#answerLoading",false);}});});$(".btn-show-track").on("click",function(){$(this).fadeOut('fast',function(){$(".form-area").fadeIn();});});});