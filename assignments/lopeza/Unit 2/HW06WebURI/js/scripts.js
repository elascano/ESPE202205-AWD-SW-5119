fetch('https://fakestoreapi.com/products/category/electronics').then((data)=>{
    return data.json(); 
}).then((objectData)=>{
    let tableData = "";
    
    objectData.map((values)=>{
        tableData += `
        <tr>
            <td>${values.title}</td>
            <td>${values.description}</td>
            <td>$${values.price}</td>
            <td>${values.category}</td>
            <td><img src="${values.image}" alt="product image" width=120px></td>
        </tr>`;
    });

    document.getElementById("table-body").innerHTML=tableData;
}).catch((err)=>{
    console.log(err);
})