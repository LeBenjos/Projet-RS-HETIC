export function getViewportSize() {
    let viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    let viewportHeight = window.innerHeight || document.documentElement.clientHeight;
    return {
        width: viewportWidth,
        height: viewportHeight
    };
}

function handleResize(pixel, element, className) {
    const { width } = getViewportSize();

    if (width <= pixel) {
        document.querySelector(element).classList.add(className);
    } else {
        document.querySelector(element).classList.remove(className);
    }
}

window.addEventListener('resize', () => {
    handleResize(720, 'aside', 'hideCta');
});

handleResize(720, 'aside', 'hideCta');
