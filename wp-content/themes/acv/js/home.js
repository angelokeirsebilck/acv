import './modules/sliderHome';

const values = ['This', 'ES', 'Function', 'Got', 'Transpiled'];

const valuesContainer = document.querySelector('.values');

values.map((item) => {
    valuesContainer.innerHTML = valuesContainer.innerHTML + item;
});
