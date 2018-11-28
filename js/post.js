(function(){
    $('#deletar').click(function(){
        $.delete(
            "add-post.php",
            {id:$('#deletar').data("id")},
            function(data){
                window.location = "./";
            }
        );
    });
})()