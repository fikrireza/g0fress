function loadData(dataTarget){
    $.ajax(
        {
            url: dataTarget,
            type: "get",
        })
        .done(function(data)
        {
            $("#thisLoadData").html(data.html);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('server not responding...');
        });
}

$(document).ready(function(){  
    var slug = $('#getSdSlug').attr("data-slug");
    loadData(slug);
});

$(".callThisData").click(function(){
	var dataTarget =$(this).attr("data-target");
    loadData(dataTarget);
});
