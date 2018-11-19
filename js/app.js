(function(){
    var navegacao = function () {
        var $navBarResponsive = $("#navbarResponsive");
        
        var _montarUrl = function (element) {
          return 'pages/' + element.data("target-page") + '.html'
        };
  
        var _carregarConteudo = function (url){
          $(".conteudo").load(url, _obterEventos);
        }
  
        var _iniciar = function () {
          if(window.location.href.search("contato.php") == -1)
            _carregarConteudo('pages/home.html');
          else
            _obterEventos();
        };
  
        var _obterEventos = function (){
          _eventoClickPosts();
          _eventoClickNavBar();
        }
        
        var _eventoClickNavBar = function () {
          $navBarResponsive.find("a.nav-link[href='#']").off()
          $navBarResponsive.find("a.nav-link[href='#']").on('click', function () {
            $navBarResponsive.find("li.nav-item.active").removeClass("active")
            $(this).parent().addClass("active");
            var url = _montarUrl($(this));
            _carregarConteudo(url);
          });        
        };
  
        var _eventoClickPosts = function () {
          $("a.post-link").off();
          $("a.post-link").on('click', function () {
            
            var url = _montarUrl($(this));
            _carregarConteudo(url);
          });        
        };
  
        _iniciar();
    }
  
      new navegacao();
})()