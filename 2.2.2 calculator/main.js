let calculationDone = false;

function append(val) {
  const display = document.getElementById("display");
  if (calculationDone) {
    display.value = "";
    calculationDone = false;
  }
  display.value += val;
}

function clearDisplay() {
  document.getElementById("display").value = "";
  calculationDone = false;
}

function backspace() {
  const display = document.getElementById("display");
  display.value = display.value.slice(0, -1);
}

function calculate() {
  const display = document.getElementById("display");
  const exprPost = document.getElementById("exprPost");
  exprPost.value = display.value;
  document.getElementById('calcForm').submit();
}

document.addEventListener("keydown", (event) => {
  const key = event.key;
  if (/[0-9]/.test(key) || ["+","-","*","/",".","(",")"].includes(key)) {
    append(key);
  } else if (key === "Enter") {
    event.preventDefault();
    calculate();
  } else if (key === "Backspace") {
    event.preventDefault();
    backspace();
  } else if (key === "Escape") {
    event.preventDefault();
    clearDisplay();
  }
});