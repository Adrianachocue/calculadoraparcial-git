const valorA = document.getElementById('valorA');
const valorB = document.getElementById('valorB');
const operacionInput = document.getElementById('operacion');
let activeInput = valorA;

function fillInput(value) {
    if (!activeInput) {
        activeInput = valorA;
    }

    if (value === '.' && activeInput.value.includes('.')) {
        return;
    }

    activeInput.value += value;
}

function setOperation(operation) {
    operacionInput.value = operation;
    document.querySelectorAll('.btn').forEach((button) => {
        button.classList.remove('active');
    });

    const activeButton = Array.from(document.querySelectorAll('.btn')).find(
        (button) => button.textContent && button.textContent.trim() === getSymbol(operation)
    );

    if (activeButton) {
        activeButton.classList.add('active');
    }
}

function getSymbol(operation) {
    switch (operation) {
        case 'sumar':
            return '+';
        case 'restar':
            return '−';
        case 'multiplicar':
            return '×';
        case 'dividir':
            return '÷';
        default:
            return '';
    }
}

function clearAll() {
    valorA.value = '';
    valorB.value = '';
    operacionInput.value = '';
    activeInput = valorA;
}

valorA.addEventListener('focus', () => { activeInput = valorA; });
valorB.addEventListener('focus', () => { activeInput = valorB; });

window.fillInput = fillInput;
window.setOperation = setOperation;
window.clearAll = clearAll;
