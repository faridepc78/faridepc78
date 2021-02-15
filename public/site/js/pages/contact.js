$(document).ready(function()
{
    $("#frmContact").on("submit",function(e)
    {
        e.preventDefault();

        var data=getSerializeData("Contact","SendMessage","#frmContact");
        
        loading(".loading",true);

        $.ajax({
            url: AJAX_URL,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(result)
            {
                loading(".loading",false);

                if(result.RefreshCaptcha!==undefined)
                {
                    reloadRecaptcha();
                }

                if(result.status)
                {
                    swal({
                        title: alertSuccessful,
                        text: result.text,
                        type: "success"
                    },function(){
                        document.location.reload();
                    });
                }
                else
                {
                    swal({
                        title: alertUnsuccessful,
                        text: result.text,
                        type: "error"
                    });
                }
            },
            error:function(a,b,c)
            {
                loading(".loading",false);
            }
        });
    });
});