export function viewportSize() {
    const d = document.documentElement;
    return {
        height: d.clientHeight,
        width: d.clientWidth
    };
}

let viewport = viewportSize()
let height = viewport.height
let width = viewport.width

console.log(height)
console.log(width)
if (width <= 720) {
    document.querySelector('aside').classList.add('hideCta')
}

