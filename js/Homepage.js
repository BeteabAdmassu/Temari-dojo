window.onload = function() {
    fetch('http://localhost/Temari-dojo/backend/api/user/loadUserInfoAPI.php')
   .then(response => response.json())
   .then(data => {
     document.querySelector("#username").innerHTML = data.username

   })
   .catch(error => console.error(error.message));

}


function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

function fun2()
{
    document.querySelector('.span2').style.width = "100%";
    document.querySelector('.span2').style.transition = ".5s all linear";
    document.querySelector('.span7').style.transition = ".5s all linear";
    document.querySelector('.span1').style.width = "0%";
    document.querySelector('.span1').style.transition = ".5s all linear";
    document.querySelector('.span3').style.width = "0%";
    document.querySelector('.span3').style.transition = ".5s all linear";
    document.querySelector('.span4').style.width = "0%";
    document.querySelector('.span4').style.transition = ".5s all linear";
    document.querySelector('.span5').style.width = "0%";
    document.querySelector('.span5').style.transition = ".5s all linear";
    document.querySelector('.span6').style.width = "0%";
    document.querySelector('.span6').style.transition = ".5s all linear";
}
function fun1()
{
    document.querySelector('.span1').style.width = "100%";
    document.querySelector('.span1').style.transition = ".5s all linear";
    document.querySelector('.span7').style.transition = ".5s all linear";
    document.querySelector('.span2').style.width = "0%";
    document.querySelector('.span2').style.transition = ".5s all linear";
    document.querySelector('.span3').style.width = "0%";
    document.querySelector('.span3').style.transition = ".5s all linear";
    document.querySelector('.span4').style.width = "0%";
    document.querySelector('.span4').style.transition = ".5s all linear";
    document.querySelector('.span5').style.width = "0%";
    document.querySelector('.span5').style.transition = ".5s all linear";
    document.querySelector('.span6').style.width = "0%";
    document.querySelector('.span6').style.transition = ".5s all linear";
}
// Adding Scroll Event to the Navigation Bar
window.addEventListener('scroll',()=>
{
    const scrolled = window.scrollY;
    if(scrolled > 5)
    {
        document.querySelector('.nav').style.backgroundColor = "#000";
        document.querySelector('.udemy').style.color = "#fff";
        document.querySelector('.dash').style.color = "#fff";
        document.querySelector('.browser').style.color = "#fff";
        document.querySelector('.udemy').style.zIndex = "100";
        document.querySelector('.nav').style.transition = ".5s all linear";
        document.querySelector('.udemy').style.transition = ".5s all linear";
        document.querySelector('.letter').style.color = "#fff";
        document.querySelector('.log').style.transition = ".5s all linear";
        document.querySelector('.sgin').style.border = ".5px solid #fff";
        document.querySelector('.sgin').style.transition = ".5s all linear";
        document.querySelector('.log').style.border = ".5px solid #fff";
    }
    else
    {
        document.querySelector('.nav').style.backgroundColor = "#fff";
        document.querySelector('.udemy').style.color = "#000";
        document.querySelector('.dash').style.color = "#000";
        document.querySelector('.browser').style.color = "#000";
        document.querySelector('.nav').style.transition = ".5s all linear";
        document.querySelector('.udemy').style.transition = ".5s all linear";
        document.querySelector('.log').style.border = ".5px solid #000";
        document.querySelector('.letter').style.color = "#000";
        document.querySelector('.log').style.transition = ".5s all linear";
        document.querySelector('.sgin').style.border = ".5px solid #000";
        document.querySelector('.sgin').style.transition = ".5s all linear"
    }
    // document.querySelector('.para').innerHTML= scrolled;
})