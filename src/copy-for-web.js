function copyForWeb(country, brand) {
  let countryName = country.toLowerCase();
  fetch('./api/api-' + countryName + '.php')
    .then((response) => response.json())
    .then((data) => {
      if(brand === 'feller'){
        createFellerData(data);
      } else {
        createData(data);
      }
    });
}
function createData(data) {
  let termini = data;
  let formated = [];
  termini.shift();
  let code;
  termini.forEach(element => {
        if(formated.includes(element[0])) {
          code += `<br><strong>${element[1]}</strong>, ${element[2]}, ${element[3]}, ${element[4]}`
        } else if (formated.length != 0) {
          code += `</p><h2>${element[0]}</h2><p><strong>${element[1]}</strong>, ${element[2]}, ${element[3]}, ${element[4]}`;
          formated.push(element[0]);
        } else {
          code = `<h2>${element[0]}</h2><p><strong>${element[1]}</strong>, ${element[2]}, ${element[3]}, ${element[4]}`;
          formated.push(element[0]);
        }
  });
  document.querySelector("#termini").innerHTML = code;
  return code;
}
function createFellerData(data) {
  let termini = data;
  let formated = [];
  termini.shift();
  let code;
  termini.forEach(element => {
        if(formated.includes(element[0])) {
          code += `<br><strong>${element[1]}</strong>, ${element[2]}, ${element[3]}, ${element[4]}`
        } else if (formated.length != 0) {
          code += `</p><p><strong>${element[0]}</strong><br><strong>${element[1]}</strong>, ${element[2]}, ${element[3]}, ${element[4]}`;
          formated.push(element[0]);
        } else {
          code = `<p><strong>${element[0]}</strong><br><strong>${element[1]}</strong>, ${element[2]}, ${element[3]}, ${element[4]}`;
          formated.push(element[0]);
        }
  });
  document.querySelector("#termini").innerHTML = code;
  return code;
}