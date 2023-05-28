import { getElement, display, displayCta, hideCta } from './feedFunction.js';
import { viewportSize } from './sideProfile.js';

const textarea = document.querySelector(".commentContent");

textarea.addEventListener("input", function () {
  textarea.style.height = "auto";
  const newHeight = textarea.scrollHeight / 12;
  textarea.style.height = newHeight + "vw";
});


let reactionEmojiArray = [];
let emoji = 0;
while (true) {
  const reactionEmoji = document.getElementById("reactionEmoji" + emoji);
  if (!reactionEmoji) {
    break;
  }
  reactionEmojiArray.push(reactionEmoji);
  emoji++;
}
reactionEmojiArray.forEach((emoji) => {
  if (emoji.classList[1] === "react1") {
    emoji.src = "../Views/assets/icons/smiley-bad.svg";
  } else if (emoji.classList[1] === "react2") {
    emoji.src = "../Views/assets/icons/smiley-crying-rainbow.svg";
  } else if (emoji.classList[1] === "react3") {
    emoji.src = "../Views/assets/icons/smiley-drop.svg";
  } else if (emoji.classList[1] === "react4") {
    emoji.src = "../Views/assets/icons/smiley-in-love.svg";
  } else {
    emoji.src = "../Views/assets/icons/smiley-lol-sideways.svg";
  }
});

let id = 0;
while (true) {
  let likeButton = document.getElementById("likeButton" + id);
  let reactionCta = document.getElementById("reactionCta" + id);
  if (!likeButton || !reactionCta) {
    break;
  }
  reactionCta.classList.add("reactionCta");
  displayCta(likeButton, reactionCta);
  hideCta(likeButton, reactionCta);
  id++;
}


let displayFormComment = getElement("displayForm", "comment")
display(displayFormComment[0], displayFormComment[1], "hideCta")

let displayComment = getElement("commentButton", "displayComment")
display(displayComment[0], displayComment[1], "hideCta")

let displayReaction = getElement("reactionButton", "displayReaction")
display(displayReaction[0], displayReaction[1], "hideCta")


// let displayFriendsReaction = getElement("reactionEmoji", "")
// displayFriendsReaction.splice(1)
// console.log(displayFriendsReaction)

// console.log(displayFriendsReaction[0])
// displayFriendsReaction[0].forEach((emoji) => {
//   if (emoji.react1) {
//     emoji.src = "../Views/assets/icons/smiley-bad.svg";
//   } else if (emoji.react2) {
//     emoji.src = "../Views/assets/icons/smiley-crying-rainbow.svg";
//   } else if (emoji.react3) {
//     emoji.src = "../Views/assets/icons/smiley-drop.svg";
//   } else if (emoji.react4) {
//     emoji.src = "../Views/assets/icons/smiley-in-love.svg";
//   } else {
//     emoji.src = "../Views/assets/icons/smiley-lol-sideways.svg";
//   }
// })

let viewport = viewportSize()

if (viewport.width <= 600) {
  let postButton = document.getElementsByName('postPost')
  let postImg = document.createElement('img')
  postImg.src = '../Views/assets/icons/left.png'

  postButton[0].textContent = ''
  postButton[0].appendChild(postImg)
}

let burgerButton = document.getElementById('burgerMenu');


let aside = document.querySelector('aside');
let closeMenu = document.getElementById('closeMenu')

let logo = document.getElementById('logo');
let header = document.getElementsByTagName('header')[0];

if (viewport.width <= 720) {
  burgerButton.classList.remove('hideCta');
  logo.remove();
}
let profile = document.querySelector(".profile")


burgerButton.addEventListener('click', (event) => {
  event.preventDefault();
  aside.classList.toggle('hideCta');
  closeMenu.classList.toggle('hideCta');
  burgerButton.classList.toggle('hideCta');
  aside.classList.add('active');
  setTimeout(() => {
    profile.classList.add('show');
  }, 5000);
  console.log(burgerButton.style);
});

closeMenu.addEventListener('click', (event) => {
  event.preventDefault();
  aside.classList.toggle('hideCta');
  closeMenu.classList.toggle('hideCta');
  burgerButton.classList.toggle('hideCta');
  console.log(burgerButton.style);
});
