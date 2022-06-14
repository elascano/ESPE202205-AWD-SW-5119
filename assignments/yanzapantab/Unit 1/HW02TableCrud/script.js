const usrNameInput = document.getElementById('name');
const usrCompanyInput = document.getElementById('company');
const usrAgeInput = document.getElementById('age');
const usrPriceInput = document.getElementById('price');
//Developing
window.addEventListener('load', () => {
    appendAddBtn();
    createDataOnStorage();
    let dataArray = getArrayFromStorage();
    if (dataArray.length == 0) {
        addToLocalStorage('PlayStation','Sony',1996 ,100);
        addToLocalStorage('PlayStation2','Sony', 2000 ,200);
                dataArray = getArrayFromStorage();
    }
    dataArray.forEach((obj) => {
        appendTableData(obj.name, obj.company, obj.age ,obj.price);
    });
});

var selectedRow = null
function onFormSubmit(e) {
	event.preventDefault();
        var formData = readFormData();
        if (selectedRow == null){
            insertNewRecord(formData);
		}
        else{
            updateRecord(formData);
		}
        resetForm();    
}

function readFormData() {
    var formData = {};
    formData["name"] = document.getElementById("name").value;
    formData["company"] = document.getElementById("company").value;
    formData["age"] = document.getElementById("age").value;
    formData["price"] = document.getElementById("price").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("storeList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
		cell1.innerHTML = data.name;
    cell2 = newRow.insertCell(1);
		cell2.innerHTML = data.company;
    cell3 = newRow.insertCell(2);
		cell3.innerHTML = data.age;
    cell4 = newRow.insertCell(3);
		cell4.innerHTML = data.price;
    cell4 = newRow.insertCell(4);
        cell4.innerHTML = `<button onClick="onEdit(this)">Edit</button> <button onClick="onDelete(this)">Delete</button>`;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("name").value = selectedRow.cells[0].innerHTML;
    document.getElementById("company").value = selectedRow.cells[1].innerHTML;
    document.getElementById("age").value = selectedRow.cells[2].innerHTML;
    document.getElementById("price").value = selectedRow.cells[3].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.name;
    selectedRow.cells[1].innerHTML = formData.company;
    selectedRow.cells[2].innerHTML = formData.age;
    selectedRow.cells[3].innerHTML = formData.price;
}

function onDelete(td) {
    if (confirm('Estas seguro de que quieres borrar?')) {
        row = td.parentElement.parentElement;
        document.getElementById('storeList').deleteRow(row.rowIndex);
        resetForm();
    }
}

function resetForm() {
    document.getElementById("name").value = '';
    document.getElementById("company").value = '';
    document.getElementById("age").value = '';
    document.getElementById("price").value = '';
    selectedRow = null;
}
