var selectedRow = null
function onFormSubmit(e) {
	event.preventDefault();
        var formData = readData();
        if (selectedRow == null){
            insertData(formData);
		}
        else{
            updateData(formData);
		}
        clearForm();    
}

function readData() {
    var formData = {};
    formData["phoneCode"] = document.getElementById("phoneCode").value;
    formData["phoneBrand"] = document.getElementById("phoneBrand").value;
    formData["ram"] = document.getElementById("ram").value;
    formData["price"] = document.getElementById("price").value;
    formData["storage"] = document.getElementById("storage").value;
    return formData;
}

function insertData(data) {
    var table = document.getElementById("phoneList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
		cell1.innerHTML = data.phoneCode;
    cell2 = newRow.insertCell(1);
		cell2.innerHTML = data.phoneBrand;
    cell3 = newRow.insertCell(2);
		cell3.innerHTML = data.ram;
    cell4 = newRow.insertCell(3);
		cell4.innerHTML = data.price;
    cell5 = newRow.insertCell(4);
		cell5.innerHTML = data.storage;
    cell5 = newRow.insertCell(5);
        cell5.innerHTML = `<button onClick="onEdit(this)">Edit</button> <button onClick="onDelete(this)">Delete</button>`;
}

function updateData(formData) {
    selectedRow.cells[0].innerHTML = formData.phoneCode;
    selectedRow.cells[1].innerHTML = formData.phoneBrand;
    selectedRow.cells[2].innerHTML = formData.ram;
    selectedRow.cells[3].innerHTML = formData.price;
    selectedRow.cells[4].innerHTML = formData.storage;
}

function clearForm() {
    document.getElementById("phoneCode").value = '';
    document.getElementById("phoneBrand").value = '';
    document.getElementById("ram").value = '';
    document.getElementById("price").value = '';
    document.getElementById("storage").value = '';
    selectedRow = null;
}
   
//InsertData///onEdit
function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("phoneCode").value = selectedRow.cells[0].innerHTML;
    document.getElementById("phoneBrand").value = selectedRow.cells[1].innerHTML;
    document.getElementById("ram").value = selectedRow.cells[2].innerHTML;
    document.getElementById("price").value = selectedRow.cells[3].innerHTML;
    document.getElementById("storage").value = selectedRow.cells[4].innerHTML;
}

//InsertData//Delete the data
function onDelete(td) {
    if (confirm('Do you want to delete this data?')) {
        row = td.parentElement.parentElement;
        document.getElementById('phoneList').deleteRow(row.rowIndex);
        clearForm();
    }
}
