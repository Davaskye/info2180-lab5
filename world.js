var httpRequest = new XMLHttpRequest();

window.onload = function(){ 

    var lookup_button = document.getElementById("lookup"); 

    lookup_button.onclick = function(){
        console.log("Button works!");
        let searchVal = document.getElementById("country").value;
        httpRequest.onreadystatechange = updateResult;
        httpRequest.open('GET', "world.php?country=" + searchVal);
        httpRequest.send();
    }
}

function updateResult() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) { 
        if (httpRequest.status === 200) { 
          var response = httpRequest.responseText; 
          let results = document.getElementById("result");
          results.innerHTML = response; 
        } else { 
        alert('There was a problem with the request.'); 
        } 
    } 
}