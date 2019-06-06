import anime from 'animejs';

const slideboy = () => {
  let animating = false;
  const left = document.querySelector('.left');
  const right = document.querySelector('.right');

  let activeSlide = 1;
  const slides = document.querySelectorAll('.slide');
  const numberOfSlides = slides.length;

  const getNextSlide = activeSlide => {
    if (activeSlide + 1 > numberOfSlides) {
      return 1;
    } else {
      return activeSlide + 1;
    }
  };

  const getPrevSlide = activeSlide => {
    if (activeSlide - 1 < 1) {
      return numberOfSlides;
    } else {
      return activeSlide - 1;
    }
  };

  const nextSlide = callback => {
    const currentSlide = document.querySelector('.active');
    const nextSlideNo = getNextSlide(activeSlide);
    const nextSlide = document.querySelector(`.slide--${nextSlideNo}`);

    animateOut(currentSlide, () => {
      currentSlide.classList.toggle('active');
      nextSlide.classList.toggle('active');
      animateIn(nextSlide, () => {
        callback();
      });
    });

    changeColor(nextSlideNo);
    activeSlide = nextSlideNo;
  };

  const prevSlide = callback => {
    const currentSlide = document.querySelector('.active');
    const prevSlideNo = getPrevSlide(activeSlide);
    const prevSlide = document.querySelector(`.slide--${prevSlideNo}`);

    animateOut(currentSlide, () => {
      currentSlide.classList.toggle('active');
      prevSlide.classList.toggle('active');
      animateIn(prevSlide, () => {
        callback();
      });
    });
    changeColor(prevSlideNo);

    activeSlide = prevSlideNo;
  };

  const animateOut = (currentSlide, callback) => {
    const image = currentSlide.querySelector('.image-container .img');
    const text = currentSlide.querySelector('.page-title');
    anime({
      targets: [image, text],
      duration: 600,
      easing: 'cubicBezier(.5, .05, .1, .3)',
      opacity: 0,
      translateY: '5%',
      complete: () => {
        callback();
      },
    });
  };

  const animateIn = (nextSlide, callback) => {
    const image = nextSlide.querySelector('.image-container .img');
    const text = nextSlide.querySelector('.page-title');
    image.style.opacity = '0';
    image.style.transform = 'translateY(5%)';
    text.style.opacity = '0';
    text.style.transform = 'translateY(5%)';
    anime({
      targets: [image, text],
      duration: 600,
      easing: 'cubicBezier(.5, .05, .1, .3)',
      opacity: 1,
      translateY: 0,
      complete: () => {
        callback();
      },
    });
  };

  const changeColor = slideNo => {
    const stop1 = document.querySelector('#stop-1');
    const stop2 = document.querySelector('#stop-2');

    const newStop1 = stop1.getAttribute(`data-color-${slideNo}`);
    const newStop2 = stop2.getAttribute(`data-color-${slideNo}`);

    anime({
      targets: stop1,
      stopColor: newStop1,
      duration: 600,
    });
    anime({
      targets: stop2,
      stopColor: newStop2,
      duration: 600,
    });
  };

  if (right) {
    right.addEventListener('click', () => {
      if (animating != true) {
        animating = true;
        nextSlide(() => {
          animating = false;
        });
      }
    });
  }
  if (left) {
    left.addEventListener('click', () => {
      if (animating != true) {
        animating = true;
        prevSlide(() => {
          animating = false;
        });
      }
    });
  }

  const swiperSetup = query => {
    if (query.matches) {
      console.log('setting up');
      const myElement = document.querySelector('.page-header--home');
      var hammertime = new Hammer(myElement);
      hammertime.on('swipeleft', function(ev) {
        if (animating != true) {
          animating = true;
          prevSlide(() => {
            animating = false;
          });
        }
      });
      hammertime.on('swiperight', function(ev) {
        if (animating != true) {
          animating = true;
          nextSlide(() => {
            animating = false;
          });
        }
      });
    }
  };
  let x = window.matchMedia('(max-width: 992px)');
  swiperSetup(x);
  x.addListener(swiperSetup); // Attach listener function on state changes
};

export { slideboy };
