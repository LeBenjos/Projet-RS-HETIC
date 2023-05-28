export function getElement(element1, element2) {
    let i = 0
    let value1Array = []
    let value2Array = []

    while (true) {
        let value1 = document.getElementById(element1 + i)
        let value2 = document.getElementById(element2 + i)
        if (!value1 && !value2) {
            break;
        }
        value1Array.push(value1)
        value2Array.push(value2)
        i++
    }
    return [value1Array, value2Array]

}
export function display(button, toDisplay, className) {
    for (let i = 0; i < button.length; i++) {
        button[i].addEventListener('click', function (event) {
            event.preventDefault()
            toDisplay[i].classList.toggle(className);
        });
    }
}


export function displayCta(element, reactionCta) {
    element.addEventListener("mouseenter", function (event) {
        event.preventDefault();
        reactionCta.classList.remove("hideCta");
    });
}
export function hideCta(element, reactionCta) {
    element.addEventListener("mouseleave", function (event) {
        setTimeout(() => {
            event.preventDefault();
            reactionCta.classList.add("hideCta");
        }, 1500);
    });
}
// MANAGE RESIZE AND RESPONSIVE

export function handleResizePost() {
    let viewportWidth = window.innerWidth || document.documentElement.clientWidth;

    if (viewportWidth <= 600) {
        let postButton = document.getElementsByName('postPost');

        if (postButton[0].querySelector('img') === null) {
            let postImg = document.createElement('img');
            postImg.src = '../Views/assets/icons/left.png';

            postButton[0].textContent = '';
            postButton[0].appendChild(postImg);
        }
    } else {
        let postButton = document.getElementsByName('postPost');
        let postImg = postButton[0].querySelector('img');

        if (postImg !== null) {
            postImg.remove();
            postButton[0].textContent = 'Post';
        }
    }
}

export function handleResizeLogo() {
    let viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    let burgerButton = document.getElementById('burgerMenu');
    let logo = document.getElementById('logo');

    if (viewportWidth <= 720) {
        burgerButton.classList.remove('hideCta');
        logo.classList.add("hideCta");
    } else {
        burgerButton.classList.add('hideCta');
        logo.classList.remove("hideCta");

    }
}

export function displayAside() {
    let aside = document.querySelector('aside');
    let closeMenu = document.getElementById('closeMenu')
    let burgerButton = document.getElementById('burgerMenu');

    burgerButton.addEventListener('click', (event) => {
        event.preventDefault();
        aside.classList.toggle('hideCta');
        closeMenu.classList.toggle('hideCta');
        burgerButton.classList.toggle('hideCta');
        aside.classList.add('active');
    });
}

export function removeAside() {
    let aside = document.querySelector('aside');
    let closeMenu = document.getElementById('closeMenu');
    let burgerButton = document.getElementById('burgerMenu');
    closeMenu.addEventListener('click', (event) => {
        event.preventDefault();
        aside.classList.toggle('hideCta');
        closeMenu.classList.toggle('hideCta');
        burgerButton.classList.toggle('hideCta');
    });
}
