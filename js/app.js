(function(){
    
  $.delete = function(url, data, callback, type){
 
    if ( $.isFunction(data) ){
      type = type || callback,
          callback = data,
          data = {}
    }
   
    return $.ajax({
      url: url,
      type: 'DELETE',
      success: callback,
      data: data,
      contentType: type
    });
  }


  var SetarLinkAtivo = function(){
    var $navBarResponsive = $("#navbarResponsive");
    var url=location.href;
    var urlFilename = url.substring(url.lastIndexOf('/')+1);

    if(
      urlFilename === "" ||
      urlFilename === 'index.php' || 
      urlFilename === "/"
    ){      
        urlFilename = "./";
    }

    var linkPaginaAtual = $navBarResponsive.find("a[href='"+urlFilename+"']");
    linkPaginaAtual.parent().addClass("active");
    
  };

  SetarLinkAtivo();
})()