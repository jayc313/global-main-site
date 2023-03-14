const swiper = new Swiper('.testimonial-swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    spaceBetween: 16,
    slidesPerView: 1.2,
    initialSlide: 1,
    centeredSlides: true,

  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

new Swiper('.logos-swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    spaceBetween: 16,
    slidesPerView: 2,
    initialSlide: 1,
    centeredSlides: false,
    loopAdditionalSlides: 10,
    breakpoints: {
      // when window width is >= 320px
      800: {
        slidesPerView: 2.2,
      },
      1200: {
        slidesPerView: 6,
      },
    },
    autoplay: {
      delay: 3000,
    },
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });


  new Swiper('.media-swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    spaceBetween: 16,
    slidesPerView: 1,
    breakpoints: {
      // when window width is >= 320px
      800: {
        slidesPerView: 1.4,
      },
      1200: {
        slidesPerView: 2.4,
      },
    },
    initialSlide: 1,
    centeredSlides: true,
    
    noSwiping: true,
    noSwipingClass: 'swiper-slide',
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    
  });

  new Swiper('.posts-swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    spaceBetween: 16,
    slidesPerView: 1,
    breakpoints: {
      // when window width is >= 320px
      800: {
        slidesPerView: 2.4,
      },
      1043: {
        slidesPerView: 3.4,
      },
      1660: {
        slidesPerView: 4.4,
      },
    },
    initialSlide: 1,
    centeredSlides: true,
    
    noSwiping: true,
    noSwipingClass: 'swiper-slide',
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    
  });


  document.addEventListener("DOMContentLoaded",
        function() {
            var div, n,
                v = document.getElementsByClassName("youtube-player");
            for (n = 0; n < v.length; n++) {
                div = document.createElement("div");
                div.setAttribute("data-id", v[n].dataset.id);
                div.innerHTML = labnolThumb(v[n].dataset.id);
                div.onclick = labnolIframe;
                v[n].appendChild(div);
                v[n].classList.add('loaded');
            }

        });

function labnolThumb(id) {
        var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
            play = `<div class="play">
                          <svg version="1.1" id="YouTube_Icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 0 1024 721" enable-background="new 0 0 1024 721" xml:space="preserve">
              <path id="Triangle" fill="#FFFFFF" d="M407,493l276-143L407,206V493z"/>
              <path id="The_Sharpness" opacity="0.12" fill="#420000" d="M407,206l242,161.6l34-17.6L407,206z"/>
              <g id="Lozenge">
                <g>
                  
                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="512.5" y1="719.7" x2="512.5" y2="1.2" gradientTransform="matrix(1 0 0 -1 0 721)">
                    <stop  offset="0" style="stop-color:#E52D27"/>
                    <stop  offset="1" style="stop-color:#BF171D"/>
                  </linearGradient>
                  <path fill="url(#SVGID_1_)" d="M1013,156.3c0,0-10-70.4-40.6-101.4C933.6,14.2,890,14,870.1,11.6C727.1,1.3,512.7,1.3,512.7,1.3
                    h-0.4c0,0-214.4,0-357.4,10.3C135,14,91.4,14.2,52.6,54.9C22,85.9,12,156.3,12,156.3S1.8,238.9,1.8,321.6v77.5
                    C1.8,481.8,12,564.4,12,564.4s10,70.4,40.6,101.4c38.9,40.7,89.9,39.4,112.6,43.7c81.7,7.8,347.3,10.3,347.3,10.3
                    s214.6-0.3,357.6-10.7c20-2.4,63.5-2.6,102.3-43.3c30.6-31,40.6-101.4,40.6-101.4s10.2-82.7,10.2-165.3v-77.5
                    C1023.2,238.9,1013,156.3,1013,156.3z M407,493V206l276,144L407,493z"/>
                </g>
              </g>
              </svg></div>`;
        return thumb.replace("ID", id) + play;
    }

function labnolIframe() {
        var iframe = document.createElement("iframe");
        var embed = "https://www.youtube.com/embed/ID?autoplay=1";
        iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
        iframe.setAttribute("frameborder", "0");
        iframe.setAttribute("allowfullscreen", "1");
        this.parentNode.replaceChild(iframe, this);
}



var acc = document.getElementsByClassName("accord");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}