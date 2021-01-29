let contactFields = document.querySelectorAll('.Contact-field');
let contactFieldsTextArea = document.querySelectorAll('.Contact-field--textarea');

contactFields.forEach((contactField) => {
    let input = contactField.querySelector('.Contact-input');
    let label = contactField.querySelector('.Contact-label');

    input.addEventListener('change', () => {
        input.classList.add('Contact-input--focus');
        label.classList.add('Contact-label--focus');
    });

    input.addEventListener('focusin', () => {
        input.classList.add('Contact-input--focus');
        label.classList.add('Contact-label--focus');
    });

    input.addEventListener('focusout', () => {
        if (!input.value.length > 0) {
            input.classList.remove('Contact-input--focus');
            label.classList.remove('Contact-label--focus');
        }
    });
});

contactFieldsTextArea.forEach((contactField) => {
    let input = contactField.querySelector('.Contact-textarea');
    let label = contactField.querySelector('.Contact-label');

    input.addEventListener('focusin', () => {
        input.classList.add('Contact-textarea--focus');
        label.classList.add('Contact-label--focus');
    });

    input.addEventListener('focusout', () => {
        if (!input.value.length > 0) {
            input.classList.remove('Contact-textarea--focus');
            label.classList.remove('Contact-label--focus');
        }
    });
});

var wpcf7Elm = document.querySelector('#wpcf7-f47-o1');

wpcf7Elm.addEventListener(
    'wpcf7mailsent',
    function (event) {
        let contactInputs = document.querySelectorAll('.Contact-input');
        let contactLabels = document.querySelectorAll('.Contact-label');

        contactInputs.forEach((input) => {
            input.classList.remove('Contact-input--focus');
        });

        contactLabels.forEach((label) => {
            label.classList.remove('Contact-label--focus');
        });

        let textArea = document.querySelector('.Contact-textarea');
        textArea.classList.remove('Contact-textarea--focus');
    },
    false
);
