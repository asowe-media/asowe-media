const togglBtn = document.querySelector('.toggle_btn')
const togglBtnIcon = document.querySelector('.toggle_btn i')
const dropDownMenu = document.querySelector('.dropdown_menu')

togglBtn.onclick = function (){
    dropDownMenu.classList.toggle('open')
    const isOpen = dropDownMenu.classList.contains('open')

    togglBtnIcon.classList = isOpen
    ? 'fa-solid fa-xmark'
    : 'fa-solid fa-bars'
}



const skillBars = document.querySelectorAll('.skill-bar');

function checkSlide() {
    skillBars.forEach(skillBar => {
        const slideInAt = (window.scrollY + window.innerHeight) - skillBar.offsetHeight / 2;
        const skillBarBottom = skillBar.offsetTop + skillBar.offsetHeight;
        const isHalfShown = slideInAt > skillBar.offsetTop;
        const isNotScrolledPast = window.scrollY < skillBarBottom;

        if (isHalfShown && isNotScrolledPast) {
            skillBar.classList.add('in-view');
        } else {
            skillBar.classList.remove('in-view');
        }
    });
}

window.addEventListener('scroll', checkSlide);

// Initial check on load
checkSlide();



document.addEventListener("scroll", function () {
  const elements = document.querySelectorAll(".range");

  elements.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight && rect.bottom > 0) {
      el.classList.add("visible");
    }
  });
});