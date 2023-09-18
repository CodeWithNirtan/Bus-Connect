let menu =document.querySelector('#menubtn');
let navbar =document.querySelector('.navbar');

menu.onclick= ()=>{
    menu.classList.toggle('fa-times'); 
    navbar.classList.toggle('active'); 
}
window.addEventListener("scroll", function(){
    var header =this.document.querySelector('.header');
    header.classList.toggle("sticky", window.scrollY >0);  
})
document.querySelector('.login-btn').onclick = () =>{
    document.querySelector('.login-form-container').classList.toggle('active');
}
document.querySelector('#close-login-form').onclick = () =>{
    document.querySelector('.login-form-container').classList.remove('active');
}

var swiper = new Swiper(".vehciles-slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop:true,
    grabCursor:true,
    centeredSlides:true,
    autoplay: {
        delay: 9500,
        disableOnInteraction: false
      },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
    },
  });
  var swiper = new Swiper(".featured-slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop:true,
    grabCursor:true,
    centeredSlides:true,
   
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
    },
  });

  var swiper = new Swiper(".review-slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop:true,
    grabCursor:true,
    centeredSlides:true,
   
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
    },
  });

  function myfunc1()
  {
      var userinput = document.getElementById("user").value
      var usercode = /Student/g;
    if(usercode.test(userinput))
      {
          window.location = "AdminDashboard/index.html"
      }
      else
      {
          alert("Error 404")
      }
  }