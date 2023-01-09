function getData(data) {
    const table = document.querySelector("#termini");
    let termini = data;
    let firstRow = termini[0];
    let formated = [];
    termini.shift();
    let row = document.createElement("tr");
    let institutionTH = document.createElement('th');
    let addressTH = document.createElement('th');
    let dateTH = document.createElement('th');
    let timespanTH = document.createElement('th');
    let phoneTH = document.createElement('th');
    dateTH.innerHTML = firstRow[1];
    institutionTH.innerHTML = firstRow[2];
    timespanTH.innerHTML = firstRow[3];
    addressTH.innerHTML = firstRow[4];
    phoneTH.innerHTML = firstRow[5];
    row.appendChild(dateTH);
    row.appendChild(institutionTH);
    row.appendChild(timespanTH);
    row.appendChild(addressTH);
    row.appendChild(phoneTH);
    row.classList.add("colNames");
    table.appendChild(row);
    termini.forEach(element => {
        if(formated.includes(element[0])) {
          element.shift();
          createRow(element, table);
        } else {
          formated.push(element[0]);
          let row = document.createElement('tr');
          let cityTD = document.createElement('td');
          cityTD.innerHTML = '<h2>'+element[0]+'</h2>';
          row.classList.add('city');
          cityTD.setAttribute("colspan", 5);
          row.appendChild(cityTD);
          table.appendChild(row);
          element.shift();
          createRow(element, table);
        }
    });
};
  function createRow(item, table) {
    let row = document.createElement('tr');
    let institutionTD = document.createElement('td');
    let addressTD = document.createElement('td');
    let dateTD = document.createElement('td');
    let timespanTD = document.createElement('td');
    let phoneTD = document.createElement('td');
    dateTD.innerHTML = item[0];
    institutionTD.innerHTML = item[1];
    timespanTD.innerHTML = item[2];
    addressTD.innerHTML = item[3];
    phoneTD.innerHTML = item[4];
    row.appendChild(dateTD);
    row.appendChild(institutionTD);
    row.appendChild(timespanTD);
    row.appendChild(addressTD);
    row.appendChild(phoneTD);
    table.appendChild(row);
}