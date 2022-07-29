const url = "https://api.chucknorris.io/jokes/random";

function myAPI(){
  fetch(url)
    .then(response => {
      return response.json()
    })
    .then(data => {
      // Work with JSON data here
    var node = document.createElement("LI");
    var textnode = document.createTextNode(data.value);
    node.appendChild(textnode);
    document.getElementById("List").appendChild(node);
    })
}
    