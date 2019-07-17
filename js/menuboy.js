const menuboy = () => {
  const menu = document.querySelector('.toggle-menu');
  const header = document.querySelector('#header__primary');
  menu.addEventListener('click', () => {
    header.classList.toggle('is-active');
    menu.classList.toggle('is-active');
  });
};

export { menuboy };
