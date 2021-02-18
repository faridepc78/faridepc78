$(document).ready(function(){
    var form=$("#frmSearch");
    
    form.on("submit",function(e){
        e.preventDefault();

        var $input=$(this).find("[name='txtSearch']").val().toString().trim();
        
        if($input=='')
        {
            return;
        }

        document.location=$("base").attr("href")+"search/"+encodeURI($input);
    });

    $("#btnSearch").on("click",function(){
        var $input=form.find("[name='txtSearch']").val().toString().trim();
        
        if($input=='')
        {
            return;
        }
        
        form.submit();
    });
});