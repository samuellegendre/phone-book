const SEL_ANCHOR_DROPDOWN = "#anchorDropdown"
const SEL_LIST_DROPDOWN_MENU = "#listDropdownMenu"
const SEL_ICON_WELCOME_MESSAGE = "#iconWelcomeMessage"
const SEL_SPAN_WELCOME_MESSAGE = "#spanWelcomeMessage"

const elAnchorDropdown = document.querySelector(SEL_ANCHOR_DROPDOWN)
const elListDropdownMenu = document.querySelector(SEL_LIST_DROPDOWN_MENU)
const elIconWelcomeMessage = document.querySelector(SEL_ICON_WELCOME_MESSAGE)
const elSpanWelcomeMessage = document.querySelector(SEL_SPAN_WELCOME_MESSAGE)

const EVENT_JS_CLICK = "click"

let booleanToggleDropdownMenu = true

function setWelcomeMessage(numberDateTime) {
    if (numberDateTime >= 0 && numberDateTime < 6) {
        elIconWelcomeMessage.classList.add("bi", "bi-moon-stars")
        elSpanWelcomeMessage.textContent = "Allez vous coucher." // 0 h 00 - 6 h 00 / moon
    } else if (numberDateTime >= 6 && numberDateTime < 12) {
        elIconWelcomeMessage.classList.add("bi", "bi-brightness-alt-high")
        elSpanWelcomeMessage.textContent = "Bon matin !" // 6 h 00 - 12 h 00 / sunrise
    } else if (numberDateTime >= 12 && numberDateTime < 13) {
        elIconWelcomeMessage.classList.add("bi", "bi-sunglasses")
        elSpanWelcomeMessage.textContent = "Bon diner !" // 12 h 00 - 13 h 00 / sunglasses
    } else if (numberDateTime >= 13 && numberDateTime < 18) {
        elIconWelcomeMessage.classList.add("bi", "bi-sun")
        elSpanWelcomeMessage.textContent = "Bon après-midi !" // 13 h 00 - 18 h 00 / sun
    } else if (numberDateTime >= 18 && numberDateTime <= 24) {
        elIconWelcomeMessage.classList.add("bi", "bi-brightness-alt-high")
        elSpanWelcomeMessage.textContent = "Bonne soirée !" // 18 h 00 - 0 h 00 / sunset
    }
}

function toggleDropdownMenu() {
    booleanToggleDropdownMenu = !booleanToggleDropdownMenu
    switch (booleanToggleDropdownMenu) {
        case true:
            elListDropdownMenu.style.display = "block"
            break
        case false:
            elListDropdownMenu.style.display = "none"
            break
    }
}

function onAnchorDropdownClick(event) {
    event.preventDefault()
    event.stopPropagation()
    toggleDropdownMenu()
}

function listenToEvents() {
    elAnchorDropdown.addEventListener(EVENT_JS_CLICK, (e) => onAnchorDropdownClick(e))
}

listenToEvents()
toggleDropdownMenu()
setWelcomeMessage(new Date().getHours())
