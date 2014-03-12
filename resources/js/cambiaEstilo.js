      function cambiaEstilo(archivoCSS, indiceElemento) {
 
        var hojavieja = document.getElementsByTagName("link").item(indiceElemento);
 
        var hojanueva = document.createElement("link");
        hojanueva.setAttribute("rel", "stylesheet");
        hojanueva.setAttribute("type", "text/css");
        hojanueva.setAttribute("href", archivoCSS);
 
        document.getElementsByTagName("head").item(0).replaceChild(hojanueva, hojavieja);
      }