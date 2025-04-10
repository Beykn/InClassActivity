// These variables took the level data.
let currentLevel = 1;
// Click Counter variable checked and increase the level.
let clickCounter = 0;


// buttonSpeed variable determine the level's difficulty.
// Each level will be different speed rate.
let buttonSpeed = 500;

// Button object created with document object.
const button = document.getElementById("catchButton");

// After the mouseover event these part will be triggered.
// The code wait the timeout and than button moved.
button.addEventListener("mouseover", () => {
  setTimeout(moveButton, buttonSpeed);
});

// This is a event listener for click event.
// Every button click event will increase the clickCounter variable.
button.addEventListener("click", () => {
  clickCounter++;
  // If clickCounter equal to 3 next level comes.
  if (clickCounter === 3) {
    alert("You won Level " + currentLevel + "!");
    nextLevel();
  }
});

// moveButton function ensure the change the button's location. 
// Random Location
function moveButton() {
  // These random values determine the button's top value and left value.
  // Math.random() * 500.
  // 500 value is for small screens.
  const topValue = Math.random() * 500 + "px";
  const leftValue = Math.random() * 500 + "px";
  
  // Apply the new button location.
  button.style.marginTop = topValue;
  button.style.marginLeft = leftValue;
}

// Function to move to the next level and adjust difficulty
function nextLevel() {
  currentLevel++;
  clickCounter = 0; // Reset clicks


  if (currentLevel <= 6) {
    // Each level button speed will be decreased.
    // Level 1  Speed: 500
    // Level 2  Speed: 400 ...
    buttonSpeed = Math.max(0, 500 - (currentLevel - 1) * 100);
    alert("New Level " + currentLevel + "! The button will move faster.");
  } else {
   
    alert("Congratulations, you win!");
    
    button.disabled = true;
  }
}
