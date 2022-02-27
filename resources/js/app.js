require('./bootstrap');



const barbellForm = document.getElementById('barbellForm');
const targetWeight = document.getElementById('targetWeightInput');
const barbellWeight = document.getElementById('barbellWeight');
const resultsBody = document.getElementById('resultsBody');


barbellForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const data = {
        'targetWeight': targetWeight.value,
        'barbellWeight': barbellWeight.value
    }

    axios.post(barbellCalcUrl, data)
        .then(r => {
            appendResultsTable(targetWeight.value, barbellWeight.value, r.data);
            targetWeight.focus();
        })
        .catch(err => {
            console.log(err);
        });
})

function appendResultsTable(targetW, barbellW, weights)
{
    const returnHTML = document.createElement('tr');

    const tWeight = document.createElement('td');
    tWeight.innerHTML = targetW;

    const bWeight = document.createElement('td');
    bWeight.innerHTML = barbellW;

    returnHTML.append(tWeight, bWeight);

    weights.forEach(weight => {
        const weightEle = document.createElement('td');
        weightEle.innerHTML = weight.count.toString();
        returnHTML.append(weightEle);
    })

    resultsBody.append(returnHTML);

}
