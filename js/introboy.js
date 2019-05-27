import anime from 'animejs';

const introboy = () => {
  const image = document.querySelector('.image-container .img');
  const text = document.querySelector('.page-title');
  if (image) {
    image.style.opacity = '0';
    image.style.transform = 'translateY(5%)';
  }
  if (text) {
    text.style.opacity = '0';
    text.style.transform = 'translateY(5%)';
  }
  anime({
    targets: [image ? image : '', text ? text : ''],
    duration: 600,
    easing: 'cubicBezier(.5, .05, .1, .3)',
    opacity: 1,
    translateY: 0,
  });
};

export { introboy };
