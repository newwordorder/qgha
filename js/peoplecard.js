import anime from 'animejs';

const peoplecard = () => {
  console.log();
  if (getPeopleCards()) {
    getPeopleCards().forEach(person => {
      setUpOpenListener(person);
    });
  }
};

const getPeopleCards = () =>
  Array.from(document.querySelectorAll('.people__container'));

const showFullProfile = person => {
  if (isOneActive()) {
    console.log('one is active');
  } else {
    createGhostCard(person).then(() => {
      toggleClasses(person).then(() => {
        animateCardIn(person).then(() => {
          setupCloseListener(person);
        });
      });
    });
  }
};

const setUpOpenListener = person =>
  new Promise(resolve => {
    person.addEventListener('click', () => {
      showFullProfile(person);
    });
    resolve();
  });

const setupCloseListener = person =>
  new Promise(resolve => {
    const closeButton = person.querySelector('.corner-closer');
    closeButton.addEventListener('click', () => {
      closePerson(person);
    });
    resolve();
  });

const closePerson = person => {
  animateCardOut(person).then(() => {
    makeGhostReal();
  });
};

const createGhostCard = person =>
  new Promise(resolve => {
    const ghostcol = person.cloneNode(true);
    ghostcol.classList.add('ghostcol');
    person.parentNode.insertBefore(ghostcol, person.nextSibling);
    resolve();
  });

const makeGhostReal = () =>
  new Promise(resolve => {
    const ghost = document.querySelector('.ghostcol');
    ghost.classList.remove('ghostcol');
    setUpOpenListener(ghost);
    resolve();
  });

const toggleClasses = person =>
  new Promise(resolve => {
    person.classList.toggle('active');
    resolve();
  });

const isOneActive = () => {
  const cards = getPeopleCards();
  const activeCards = cards.filter(person => {
    return person.classList.contains('active');
  });
  return activeCards.length > 0;
};

const animateCardIn = person =>
  new Promise(resolve => {
    person.style.transition = 'none';
    person.style.height = '7rem';
    person.style.opacity = '0';

    const image = person.querySelector('.people__image');
    const bio = person.querySelector('.people__bio');
    const name = person.querySelector('.people__name');
    const title = person.querySelector('.people__title');
    name.style.opacity = '0';
    title.style.opacity = '0';

    var tl = anime.timeline({ autoplay: true });
    tl.add({
      targets: person,
      height: '100%',
      width: '100%',
      left: '50%',
      translateX: '-50%',
      top: '50%',
      translateY: '-50%',
      duration: 0,
      easing: 'cubicBezier(.5, .05, .1, .3)',
    })
      .add({
        targets: image,
        width: '12rem',
        height: '12rem',
        easing: 'cubicBezier(.5, .05, .1, .3)',
        duration: 0,
      })
      .add({
        targets: [bio, name, title],
        opacity: 1,
        duration: 0,
      })
      .add({
        targets: person,
        width: '100%',
        opacity: 1,
        height: '100%',
        duration: 400,
        easing: 'cubicBezier(.5, .05, .1, .3)',
      });

    tl.finished.then(() => {
      resolve();
    });
  });

const animateCardOut = person =>
  new Promise(resolve => {
    var tl = anime.timeline({ autoplay: true });
    tl.add({
      targets: person,
      opacity: 0,
      duration: 400,
      easing: 'cubicBezier(.5, .05, .1, .3)',
    });
    tl.finished.then(() => {
      person.parentNode.removeChild(person);
      resolve();
    });
  });

export { peoplecard };
