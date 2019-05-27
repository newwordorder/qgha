import anime from 'animejs';

const menuboy = () => {
  const menu = document.querySelector('.toggle-menu');
  const header = document.querySelector('#header__primary');
  menu.addEventListener('click', () => {
    header.classList.toggle('is-active');
    menu.classList.toggle('is-active');
  });

  const swiggityIn = () => {
    const menu = document.querySelector('.header__primary');
    const menuItems = Array.from(menu.children);
    var tl = anime.timeline({
      easing: 'easeOutExpo',
      duration: 1200,
      autoplay: false,
    });

    menuItems.forEach(item => {
      item.style.opacity = '0';
      item.style.transform = 'translateY(10%)';
    });

    anime({
      targets: '.header__primary li',
      opacity: 1,
      delay: anime.stagger(100),
      duration: 1200,
      translateY: 0,
    });

    tl.play();
  };

  swiggityIn();
};

export { menuboy };
