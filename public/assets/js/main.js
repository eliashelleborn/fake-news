// BULMA
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

if ($navbarBurgers.length > 0) {

  $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      const target = el.dataset.target;
      const $target = document.getElementById(target);

      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
}

// LIKE BUTTON
const likeBtn = document.getElementById('like-btn');
if (likeBtn) {
  likeBtn.addEventListener('click', () => {
    const icon = likeBtn.firstElementChild;
    const count = likeBtn.lastElementChild;
    if (icon.classList.contains('fas')) {
      count.innerText = parseInt(count.innerText) - 1;
    } else {
      count.innerText = parseInt(count.innerText) + 1;
    }
    icon.classList.toggle('fas');
  })
}

