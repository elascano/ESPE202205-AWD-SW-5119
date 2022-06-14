/*Universidad de las Fuerzas Armadas "ESPE"
Advanced Web Development
Author: Christopher Daniel Yépez Chandi
HW02 TableCRUD
Uptade Date: 15/05/2022 */

function getCreatedData(){
    data = {
        movieName : document.getElementById("movieName").value,
        director : document.getElementById("director").value,
        productor : document.getElementById("productor").value,
        yearOfRealease : document.getElementById("yearOfRealease").value,
        budget : document.getElementById("budget").value
    }
    JSON.stringify(data);
    return data;
}

async function createMovie() {
    data = getCreatedData();

    const url = `http://localhost:3000/create`;
    const params = {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Content-Type": "application/json"
      }
    };
    try {
        const response = await fetch(url, params);
        const result_1 = await response.json();
        return result_1;
    } catch (err) {
        return err.message;
    }
}

async function getAllMovies() {
    const url = `http://localhost:3000/read`;
    try {
        const response = await fetch(url);
        const results = await response.json();
        return results;
    } catch (err) {
        return err.message;
    }
    
}

let createTable = async () => {
      try{
        data = await getAllMovies();
      }
    catch (err) {
        return err.message;
        }
    let stringTable = "<tr><th>Name</th><th>Director</th><th>Productor</th><th>Year Of Realease</th><th>Budget</th></tr>";
      for (let movie of data) {
        let row = "<tr> <td>";
        row += movie.movieName;
        row += "</td>";

        row += "<td>";
        row += movie.director;
        row += "</td>";

        row += "<td>";
        row += movie.productor;
        row += "</td>";

        row += "<td>";
        row += movie.yearOfRealease;
        row += "</td>";

        row += "<td>";
        row += movie.budget;
        row += "</td>";

        row += "</tr>";

        stringTable += row;
    }
    console.log(stringTable);
    document.getElementById("moviesTable").innerHTML = stringTable;
    return stringTable;
}

function getUpdateData(){
    data = {
        movieName : document.getElementById("finder").value,
        newMovieName : document.getElementById("updated-name").value,
        director : document.getElementById("updated-director").value,
        productor : document.getElementById("updated-productor").value,
        yearOfRealease : document.getElementById("updated-yearOfRealease").value,
        budget : document.getElementById("updated-budget").value
    }
    JSON.stringify(data);
    return data;
}


async function updateMovie(){
    data = getUpdateData();
    console.log(data);
    const url = `http://localhost:3000/update`;
    const params = {
      method: "PUT",
      body: JSON.stringify(data),
      headers: {
        "Content-Type": "application/json"
      }
    };
    try {
        const response = await fetch(url, params);
        const result_1 = await response.json();
        console.log(result_1);
        return result_1;
    } catch (err) {
        return err.message;
    }
}

function getMovieNameToDelete(){
    data = {
        movieName: document.getElementById("deleted-name").value
    };
      
    return data;
}

async function deleteMovie(){
    data = getMovieNameToDelete();
    console.log(data);
    const url = 'http://localhost:3000/erase';
    const params = {
       method: "DELETE",
       body: JSON.stringify(data),
       headers:{
        "Content-Type": "application/json"
       }
    };
    try {
        const response = await fetch(url, params);
        const result_1 = await response.json();
        console.log(result_1);
        return result_1;
    } catch (err) {
        return err.message;
    }
}


