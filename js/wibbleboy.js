import anime from 'animejs';

class wibbleboy {
  constructor(el) {
    this.DOM = {};
    this.DOM.el = el;
    this.DOM.paths = Array.from(this.DOM.el.querySelectorAll('path'));
    this.animate();
  }

  animate() {
    this.DOM.paths.forEach(path => {
      setTimeout(() => {
        anime({
          targets: path,
          duration: anime.random(2500, 4500),
          d: path.getAttribute('pathdata:id'),
          loop: true,
          easing: 'cubicBezier(0.6,0,0.6,1)',
          direction: 'alternate',
        });
      }, anime.random(0, 1200));
    });
  }
}

export { wibbleboy };
