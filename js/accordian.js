const accordian = () => {
  const accordians = document.querySelectorAll('.accordian');
  if (accordians) {
    accordians.forEach(accordian => {
      accordian.addEventListener('click', () => {
        toggleAccordian(accordian);
      });
    });
  }

  const toggleAccordian = accordian => {
    const collapse = accordian.querySelector('.toggle');
    collapse.classList.toggle('collapse');
    const icon = accordian.querySelector('svg');
    icon.classList.toggle('rotate');
  };
};
export { accordian };
