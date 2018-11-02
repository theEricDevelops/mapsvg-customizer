// Create a new file request to get the needed JavaScript
var jsFile = new XMLHttpRequest();

// Open the JS file to do the work.
jsFile.open("GET", "/wp-content/plugins/mapsvg-customizer/assets/js/msvgc_json.min.js", true);

// When the file's ready state changes,
jsFile.onreadystatechange = function() {
    if (jsFile.readyState === 4) {  // Makes sure the document is ready to parse.
      if (jsFile.status === 200) {  // Makes sure it's found the file.
        // Loads the response into a variable for us to use.
        allJS = jsFile.responseText; 

        // Create the script element that will include our JS
        var scriptTag = document.createElement("script");
        scriptTag.setAttribute("type", "text/javascript");
        scriptTag.innerText = allJS;

        // Wait for the window to load
        window.addEventListener("load", function () {
          // Add the script element as the very last thing  
          document.body.appendChild(scriptTag);
        });

      }
    }
  }
  jsFile.send(null);
