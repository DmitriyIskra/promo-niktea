
  let codeAddbutton = document.querySelector('.code__add');
  let codeSlider = document.querySelector('.code__slider');


  if(document.querySelector('.code__add')){
    codeAddbutton.addEventListener('click', ()=> {
      codeSlider.classList.toggle('code__sleder--display');
    })

    document.querySelector('.code__submit').addEventListener('click', function(){
      console.log('Кнопка зарегистрировать код')
    })
  }
    


  var swiperCheck = new Swiper(".checkSlider", {
    grabCursor: true,
    keyboard: true,    
    slidesPerView: 3,
    spaceBetween: 10,
    loop: true,  
    // centeredSlide: true,    
    slideShadows: true,
    navigation: {
        nextEl: ".slider-button-next",
        prevEl: ".slider-button-prev",
      },      
      pagination: {
        el: ".pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
      },
      breakpoints: {        
        1360: {
          slidesPerView: 3,
          spaceBetween: 15,
        },
              960: {
                width: 940,
                slidesPerView: 2,
                spaceBetween: 5,
              },
              
              540: {
                // width: 540,
                slidesPerView: 2,
                spaceBetween: 0,
              },
              300: {
                with: 300,
                slidesPerView: 2,
                spaceBetween: 5,
              },
            }
  });  
  

    
    let navToggler = document.querySelector('.navbar-toggler');

    navToggler.addEventListener('click', function(){
      navToggler.classList.toggle('burgerChecked');
      document.querySelector('.navbar-toggler-icon').classList.toggle('navbar-toggler-icon--close')      
    })
  

    var swiperCode = new Swiper(".codeSlider", {
      grabCursor: true,
      keyboard: true,    
      slidesPerView: 3,
      spaceBetween: 2,
      loop: true,  
      centeredSlides: true,    
      slideShadows: true,
      navigation: {
          nextEl: ".code__carousel-next",
          prevEl: ".code__carousel-prev",
        },      
        breakpoints: {        
          1360: {
            slidesPerView: 3,
            spaceBetween: 15,
          },
                960: {
                  width: 940,
                  slidesPerView: 2,
                  spaceBetween: 5,
                },
                
                540: {
    
                  slidesPerView: 2,
                  spaceBetween: 0,
                },
                300: {
                  with: 300,
                  slidesPerView: 2,
                  spaceBetween: 5,
                },
              }
    });  


    // var roundSlider = new Swiper(".roundSlider", {
    //   slidesPerView: 8,
    //   spaceBetween: 10,
    //   loop: true,
    //   centeredSlides: true,
    //   height: 500,
    //   centeredSlidesBounds: true,
    //   pagination: {
    //     el: ".swiper-pagination",
    //     clickable: true,
    //   },
    //   navigation: {
    //     nextEl: ".slider-button-next",
    //     prevEl: ".slider-button-prev",
    //   },        
      
    //   grabCursor: true,   
    //   limitProgress: 1,
    // });  
    
   let visibleSlide = document.querySelectorAll('.swiper-slide__priz');


   for (let i = 0; i < visibleSlide.length; i++){
    visibleSlide[i].innerHTML = "Слайд" + i;

    // let slideWidth = visibleSlide[i].style.width;         

    if(i < 3) {
      visibleSlide[i].style.width =  80 + i*10 + "px"
      visibleSlide[i].style.height = 80 + i*10 + "px"          
        
    }
    
    if(i == 3) {
      visibleSlide[i].style.width =  155 + "px"
      visibleSlide[i].style.height = 155 + "px"                  
    }

    if (i > 4) {    
      visibleSlide[i].style.width =  80 - i + "px"
      visibleSlide[i].style.height = 80 - i + "px"         
    }
 
     console.log(visibleSlide[i].style.height + " слайд " +  i)
     console.log(visibleSlide[i].style.width + " слайд " + i)
   }


   (function () {
    'use strict'
 

    var forms = document.querySelectorAll('.needs-validation')
 

    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()


  document.querySelector('.modal_close').addEventListener('click', function (){
    document.getElementById("enterAccountForm").reset();
  })

