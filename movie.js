var edit=(obj)=>{
    $("#D"+obj).html("  Movie : <input type=\"varchar\" name=\"moviename\" id=\"Movie\" placeholder=\"Enter movie name\"></input><br>Actors: <input type=\"varchar\" name=\"starring\" id=\"Starring\" placeholder=\"Enter actors starring\"></input><br>Rating: <input type=\"int\" placeholder=\"Enter movie rating\" name=\"rating\" id=\"Rating\"></input><br>Year: <input type=\"year\" placeholder=\"Enter release year\" name=\"year\" id=\"Year\"></input><br>Genres: <input type=\"varchar\" placeholder=\"Enter genres\"name=\"genres\" id=\"Genres\"></input><br>Thumbnail: <input type=\"varchar\" placeholder=\"Enter thumbnail url\" name=\"thumbnail\" id=\"Thumbnail\"></input><br><input type=\"submit\" name=\"submit\" id=\"update\" value=\"Submit\" onclick=\"update("+obj+")\"></input>");
}
{/* */}
// 
var update=(Id)=>{
    var Movie=$("#Movie").val();
    var Starring=$("#Starring").val();
    var Rating=$("#Rating").val();
    var Year=$("#Year").val();
    var Genres=$("#Genres").val();
    var Thumbnail=$("#Thumbnail").val();
    var id=Id;

    if(confirm("Are you sure you want to edit this?")){
        $.ajax({
            url:'update.php',
            method:'POST',
            data:{
                Movie:Movie,
                Starring:Starring,
                Rating:Rating,
                Year:Year,
                Genres:Genres,
                Thumbnail:Thumbnail,
                Id:id
            },
            success:function(response){
                alert(response);
                // $(this).parents(".show").animate();
                location.reload();
                // $(this).parents("#"+Id).animate({ backgroundColor: "#003" }, "slow")
                // .animate({ opacity: "hide" }, "slow");
                // setInterval(function(){
                //     $("#"+Id).load("#"+Id)
                //     }, 1000);

                
            }
        });
        $(this).parents("#"+Id).animate({ backgroundColor: "#003" }, "slow")
        .animate({ opacity: "hide" }, "slow");
    }
}


// delete 
$(function() {
    $(".delete").click(function(){
    var element = $(this);
    var del_id = element.attr("id");
    var info = 'id=' + del_id;
    if(confirm("Are you sure you want to delete this?"))
    {
     $.ajax({
       type: "POST",
       url: "delete.php",
       data: info,
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

