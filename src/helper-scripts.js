function setCountry(country){
    localStorage.setItem("country", country);
    let table = document.querySelector("#termini");
    table.innerHTML = "";
    document.getElementById('country').innerHTML = country;
    document.getElementById('country-btn').innerHTML = country;
    getCountry()
  }
  function getCountry(){
    let country = localStorage.getItem("country");
    return country;
  }
  function copyForSolgar(country){
    navigator.clipboard.writeText(copyForWeb(country, "solgar"));
  }
  function copyForMicrolife(country){
    navigator.clipboard.writeText(copyForWeb(country, "microlife"));
  }
  function copyForMevFeller(country){
    navigator.clipboard.writeText(copyForWeb(country, "feller"));
  }
var openInbox = document.getElementById("myBtn");
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
function myFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show"; 
    x.previousElementSibling.className += " w3-red";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-red", "");
  }
}