<!doctype html>
<html>
<head>
	 <title>Alumnos</title>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body><br><br><br><br><br><br><br><br><br><br><br><br>
  <div >
    <form id="frm" method="get" action="shoesData.php">
    <div class="form">
          <div class="title">Registro</div>
          <div class="subtitle">Ingresa los datos del Producto</div>
          <div class="input-container ic1">
            <input id="brand" name="brand" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
            <label for="brand" class="placeholder">Marca</label>
          </div>
          <div class="input-container ic2">
            <input id="model" name="model" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
            <label for="model" class="placeholder">Modelo</label>
          </div>
          <div class="input-container ic2">
              <select class="input" name="category" id="category" >
              <option>Deportivo</option>
              <option>Urbano</option>
              <option>Formal</option>
              </select>
            <div class="cut cut-short"></div>
            <label for="category" class="placeholder">Categoría</>
          </div>
          <div class="input-container ic2">
          <select class="input" name="gender" id="gender" >
              <option>Hombre</option>
              <option>Mujer</option>
              </select>
            <div class="cut cut-short"></div>
            <label for="gender" class="placeholder">Género</>
          </div>
          <div class="input-container ic2">
          <select class="input" name="size" id="size" >
              <option>37</option>
              <option>38</option>
              <option>39</option>
              <option>40</option>
              <option>41</option>
              <option>42</option>
              <option>43</option>
              <option>44</option>
              <option>45</option>
              </select>
            <div class="cut cut-short"></div>
            <label for="size" class="placeholder">Talla</>
          </div>
          <div class="input-container ic2">
            <input id="price" name="price" class="input" type="text" placeholder=" " />
            <div class="cut cut-short"></div>
            <label for="price" class="placeholder">Precio</>
          </div>
          <button type="text" class="submit">Registrar</button>
          <button type="reset" class="submit">Restablecer</button>
        </div>
    </form>
</div>
</body>
</html>