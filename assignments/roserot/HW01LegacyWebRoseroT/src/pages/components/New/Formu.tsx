import { Card, Form, Grid, Button, Icon, Confirm } from "semantic-ui-react";
import { ChangeEvent, FormEvent, useEffect, useState } from "react";


export default function Formu(){

return(
<form >
      <label htmlFor="Titulo">Titulo</label>
      <input
        id="titulo"
        name="titulo"
        type="textarea"
      />
      <label htmlFor="Contenido">Contenido</label>
      <input
        id="contenido"
        name="contenido"
        type="textarea"
      />
      <button type="submit">Publicar</button>
    </form>
);


}