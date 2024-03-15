const hamburger = document.getElementById('hamburger')
const navItems = document.getElementById('right-list')
const topLine = document.getElementById('top-line')
const bottomLine = document.getElementById('bottom-line')


hamburger.addEventListener("click", e => {
    navItems.classList.toggle('right-display')
    topLine.classList.toggle('top-line-anim')
    bottomLine.classList.toggle('bottom-line-anim')
})