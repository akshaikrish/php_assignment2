$(function() {
    $(".delete").click(function(){
    var element = $(this);
    // var del_id = element.attr("id");
    var info = element.attr("id");
    if(confirm("Are you sure you want to delete this?"))
    {
        $.ajax({
        type: "POST",
        url: "delete.php",
        data: {id:info},
        success: function(){
            $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
            .animate({ opacity: "hide" }, "slow");
        }
    });
        $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
        .animate({ opacity: "hide" }, "slow");
        }
    return false;
    });
});