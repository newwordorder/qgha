import { ElementObserver } from 'viewprt';

const lazyload = () => {
  const imgs = document.querySelectorAll('img');
  imgs.forEach(image => {
    const elementObserver = ElementObserver(image, {
      onEnter(element, viewport) {
        const imgSrc = image.dataset.src;
        if (imgSrc) {
          image.src = imgSrc;
        }
      }, // callback when the element enters the viewport
      offset: 100, // offset from the edges of the viewport in pixels
      once: true, // if true, observer is detroyed after first callback is triggered
    });
  });

  const imgbg = document.querySelectorAll('.background-image-holder');

  imgbg.forEach(imagebg => {
    const elementObserver2 = ElementObserver(imagebg, {
      onEnter(imagebg, viewport) {
        const imgSrc = imagebg.dataset.src;
        if (imgSrc) {
          imagebg.style.background = `url(${imgSrc})`;
        }
      }, // callback when the element enters the viewport
      offset: 100, // offset from the edges of the viewport in pixels
      once: true, // if true, observer is detroyed after first callback is triggered
    });
  });
};

export { lazyload };
