var edit=(obj)=>{
    $("#D"+obj).html("  Movie : <input type=\"varchar\" name=\"moviename\" id=\"Movie\" placeholder=\"Enter movie name\"></input><br>Actors: <input type=\"varchar\" name=\"starring\" id=\"Starring\" placeholder=\"Enter actors starring\"></input><br>Rating: <input type=\"int\" placeholder=\"Enter movie rating\" name=\"rating\" id=\"Rating\"></input><br>Year: <input type=\"year\" placeholder=\"Enter release year\" name=\"year\" id=\"Year\"></input><br>Genres: <input type=\"varchar\" placeholder=\"Enter genres\"name=\"genres\" id=\"Genres\"></input><br>Thumbnail: <input type=\"varchar\" placeholder=\"Enter thumbnail url\" name=\"thumbnail\" id=\"Thumbnail\"></input><br><input type=\"submit\" name=\"submit\" id=\"update\" value=\"Submit\" onclick=\"update("+obj+")\"></input>");
}

// edit movie
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
                home();  
            }
        });
    }
    
}

// add actor
var addactor=()=>{
    $("#addactor").html("<input type=\"varchar\" name=\"actorname\" id=\"actor\" placeholder=\"Enter actor name\"></input><input type=\"submit\" name=\"submit\" id=\"add_actor\" value=\"Submit\" onclick=\"actor_update()\"></input>")
    
}

function actor_update(){
    var actor=$("#actor").val();
    $.ajax({
        type: "POST",
        url: "addactor.php",
        data: {actor:actor},
        success: function(){
            alert(actor+" added.");
            home();
             
      }
     });
    
}