// Get the modal
var modal = document.getElementById("myModal2");

// Get the link and insert it inside the modal - use its "alt" text as a caption
var link = document.getElementById("forgot");

link.onclick = function(){
  modal.style.display = "block";

}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}