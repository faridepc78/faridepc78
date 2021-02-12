var $confirmed=0;function changeSign()
{var selector=$(".selectors .item.active");var sign=selector.attr('data-sign');var id=selector.attr('data-id');$("[data-name='showCurrencySign']").html(sign);$("#frmPayment [name='currencyTypeId']").val(id);}
$(function()
{$(".selectors .item").on("click",function()
{if($confirmed=='1')
{return;}
$(this).siblings(".item").removeClass("active");$(this).addClass("active");changeSign();});setTimeout(function(){$(".selectors .item.active").trigger("click");},100);$("#frmPayment").on("submit",function(e)
{e.preventDefault();var $confirmed=$(this).attr("data-confirm");if($confirmed==='0')
{$(this).find("input").prop("readonly",true);$(this).find(".btn-payment").html($(this).find(".btn-payment").attr("data-button-confirm-title"));$(".btn-back").fadeIn();$confirmed=1;$(this).attr("data-confirm",1);}
else
{var data=getSerializeData("Payment","Payment","#frmPayment");loading(".loading",true);$.ajax({url:AJAX_URL,type:'POST',data:data,dataType:'json',success:function(result)
{loading(".loading",false);if(result.RefreshCaptcha!==undefined)
{reloadRecaptcha();}
if(result.status)
{swal({title:alertSuccessful,text:result.text,type:'success'});document.location.href=result.paymentUrl;}
else
{swal({title:alertUnsuccessful,text:result.text,type:'error'});}},error:function(a,b,c)
{loading(".loading",false);}});}});$(".btn-back").on("click",function()
{$confirmed=0;var selector=$("#frmPayment");selector.attr("data-confirm",0);selector.find(".btn-payment").html(selector.find(".btn-payment").attr("data-button-title"));selector.find("input").prop("readonly",false);$(this).fadeOut();});});