document.addEventListener('DOMContentLoaded', function() {
  const logoSection = document.getElementById('logoSection');

  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }

  document.querySelector('.up-container').addEventListener('click', scrollToTop);

  for (let i = 0; i < 5; i++) {
    const div = document.createElement('div');
    div.classList.add('col-2');

    const img = document.createElement('img');
    img.src = './img/logo.jpeg';
    img.alt = 'Logo';
    img.width = 90;
    img.height = 90;

    div.appendChild(img);

    logoSection.appendChild(div);
  }
});
