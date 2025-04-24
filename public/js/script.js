window.addEventListener("scroll", function () {
    const topbar = document.querySelector(".topbar")
    topbar.classList.toggle("scrolled", window.scrollY > 10)
})

AOS.init({
    duration: 1000,
    once: true
})

const toggle = document.getElementById('darkModeToggle')
toggle.addEventListener('click', () => {
    document.body.classList.toggle('dark')
    const isDark = document.body.classList.contains('dark')
    localStorage.setItem('theme', isDark ? 'dark' : 'light')
    showToast(isDark ? '🌙 Dark Mode Aktif' : '☀️ Light Mode Aktif')

    const cards = document.querySelectorAll('.card-body')
    const tables = document.querySelectorAll('table')

    cards.forEach(card => {
        card.classList.toggle('bg-dark', isDark)
    })

    tables.forEach(table => {
        table.classList.toggle('table-dark', isDark)
    })
})


if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark')
}

function toggleMenu() {
    const menu = document.querySelector('.topbar .menu')
    menu.classList.toggle('show')
}

function showToast(message) {
    let toast = document.getElementById("toast")
    if (!toast) {
        toast = document.createElement("div")
        toast.id = "toast"
        toast.style.position = "fixed"
        toast.style.top = "20px"
        toast.style.right = "20px"
        toast.style.backgroundColor = "#333"
        toast.style.color = "#fff"
        toast.style.padding = "10px 20px"
        toast.style.borderRadius = "8px"
        toast.style.boxShadow = "0 2px 10px rgba(0,0,0,0.3)"
        toast.style.zIndex = "9999"
        toast.style.opacity = "0"
        toast.style.transition = "opacity 0.3s ease"
        toast.style.display = "none"
        document.body.appendChild(toast)
    }

    toast.textContent = message
    toast.style.display = "block"

    requestAnimationFrame(() => {
        toast.style.opacity = "1"
    })

    setTimeout(() => {
        toast.style.opacity = "0"
        setTimeout(() => {
            toast.style.display = "none"
        }, 300)
    }, 1500)
}
