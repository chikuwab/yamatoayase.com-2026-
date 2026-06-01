document.addEventListener('DOMContentLoaded', function () {
  function setGlobalNavi() {
    let st;
    const btn = document.querySelector('.js-button-hamburger');

    if (!btn) return;

    btn.addEventListener('click', function () {
      const body = document.body;

      if (body.classList.contains('is-nav-open')) {
        body.classList.remove('is-nav-open');
        body.classList.add('is-nav-close');
        body.style.top = '0';
        window.scrollTo(0, st);
      } else {
        st = window.scrollY || window.pageYOffset;
        body.classList.add('is-nav-open');
        body.classList.remove('is-nav-close');
      }
    });
  }
  setGlobalNavi();
});

