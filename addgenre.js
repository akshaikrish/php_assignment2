var addgenre=()=>{
    $("#addgenre").html("<input type=\"varchar\" name=\"genrename\" id=\"genre\" placeholder=\"Enter genre name\"></input><input type=\"submit\" name=\"submit\" id=\"add_genre\" value=\"Submit\" onclick=\"genre_update()\"></input>")
    
}


function genre_update(){
    var genre=$("#genre").val();
    $.ajax({
        type: "POST",
        url: "addgenre.php",
        data: {genre:genre},
        success: function(){
            alert(genre+" added.");
            home();
             
      }
     });
    
}