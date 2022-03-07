/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/js/barbellCalculator/app.js ***!
  \***********************************************/
var barbellForm = document.getElementById('barbellForm');
var targetWeight = document.getElementById('targetWeightInput');
var barbellWeight = document.getElementById('barbellWeight');
var resultsBody = document.getElementById('resultsBody');

if (barbellForm && barbellCalcUrl) {
  var appendResultsTable = function appendResultsTable(targetW, barbellW, weights) {
    var returnHTML = document.createElement('tr');
    var tWeight = document.createElement('td');
    tWeight.innerHTML = targetW;
    var bWeight = document.createElement('td');
    bWeight.innerHTML = barbellW;
    returnHTML.append(tWeight, bWeight);
    weights.forEach(function (weight) {
      var weightEle = document.createElement('td');
      weightEle.innerHTML = weight.count.toString();
      returnHTML.append(weightEle);
    });
    resultsBody.append(returnHTML);
  };

  barbellForm.addEventListener('submit', function (e) {
    e.preventDefault();
    var data = {
      'targetWeight': targetWeight.value,
      'barbellWeight': barbellWeight.value
    };
    axios.post(barbellCalcUrl, data).then(function (r) {
      appendResultsTable(targetWeight.value, barbellWeight.value, r.data);
      targetWeight.focus();
    })["catch"](function (err) {
      console.log(err);
    });
  });
}
/******/ })()
;