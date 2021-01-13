const result = document.querySelector('.result');

// Built n inputs dynamically
const times = () => {
    let inputTemplates = [];
    for (let i = 0; i < 6; i++) {
        inputTemplates[i] = '<input class="otp" type="number" onchange="isComplete()" maxlength="1" oninput="goToNextInput()" disabled>';
    }

    let inputCollection = inputTemplates.join('');
    return inputCollection;
}

// Mount html template
const otpContent = document.querySelector('.otp-content');
otpContent.innerHTML = times();

// Collect the inputs
const inputsList = document.querySelectorAll('input');

// onchange setDisabledAttribute

const isComplete = () => {
    for (const [i, inputElement] of inputsList.entries()) {
        if (inputElement.value.length === 1) {
            // setDisabledAttribute(inputsList[i]);
            inputsList[i].classList.add('paintOrangeLine');
        } else {
            inputsList[i].classList.remove('paintOrangeLine');
        }
    }
}

const goToNextInput = () => {
    for (const [i, inputElement] of inputsList.entries()) {
        if (inputElement.value.length === 1 && i !== 5) {
            removeDisabledAttribute(inputsList[i + 1]);
            inputsList[i + 1].focus();
        }
        if (inputElement.value.length === 1 && i === 5) {
            inputElement.parentElement.nextElementSibling.focus();
            areAllFilled(inputsList) ? setDisabledAttributeForAll(inputsList) : '';
        }
    }
}

// // Get all values from inputs
// const sendValues = () => {
//     let inputValues = [];
//     for (let inputValue of inputsList) {
//         if (inputValue.value.length === 1) {

//             inputValues.push(inputValue.value);
//         }
//     }

//     result.innerHTML = inputValues.join('');
// }

// // Show result in screen after button clicked
// const btn = document.querySelector('button');
// btn.addEventListener('click', sendValues, true);


// Remove disabled attribute from input
const removeDisabledAttribute = (elem) => {
    elem.removeAttribute("disabled");;
}

// Set disabled attribute from input
const setDisabledAttribute = (elem) => {
    elem.setAttribute("disabled", '');
}

const setDisabledAttributeForAll = (arr) => {
    for (let input of arr) {
        input.setAttribute('disabled', '');
    }
}

// Remove disabled from the first input
// to be called in connectedCallback()
removeDisabledAttribute(inputsList[0]);

const fill = (currentValue) => {
    return currentValue.value.length === 1;
}

// Check if all fields are filled
const areAllFilled = (arr) => {
    let newArray = Array.from(arr);
    return newArray.every((input) => input.value.length === 1);
}