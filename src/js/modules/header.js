export default function headerService() {
    const header = document.querySelector('.header');
    const headerOverlay = document.querySelector('.navigation__overlay');
    const doc = document.documentElement;
    console.log("Test geaderJS");
    window.addEventListener('scroll', () => {
      const top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
  
      if (top > 20) {
        header.classList.add('header--scrolled');
      } else {
        header.classList.remove('header--scrolled');
      }
    });
  
  
    const burger = document.querySelector('.header__toggle');
  
    burger.addEventListener('click', () => {
      if(header.classList.contains('header--navigation-open')){
        header.classList.remove('header--navigation-open');
      } else {
        header.classList.add('header--navigation-open');
      }
    });
  
    headerOverlay.addEventListener('click', () => {
        header.classList.remove('header--navigation-open');
    });
  }
  