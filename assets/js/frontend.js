var jsFile = new XMLHttpRequest();
jsFile.open("GET", "/wp-content/plugins/mapsvg-customizer/assets/js/mapsvg_js.js", true);
jsFile.onreadystatechange = function() {
    if (jsFile.readyState === 4) {  // Makes sure the document is ready to parse.
      if (jsFile.status === 200) {  // Makes sure it's found the file.
        allJS = jsFile.responseText; 

        var scriptTag = document.createElement("script");
        scriptTag.setAttribute("type", "text/javascript");
        scriptTag.innerText = allJS;

        window.addEventListener("load", function () {
            document.body.appendChild(scriptTag);
        });

      }
    }
  }
  jsFile.send(null);
