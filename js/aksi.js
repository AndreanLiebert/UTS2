window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;
function myFunction(){
    if (    window.scrollY >= sticky){
        navbar.classlist.add("sticky")
    }else{
        navbar.classlist.remove("sticky")
    }
}