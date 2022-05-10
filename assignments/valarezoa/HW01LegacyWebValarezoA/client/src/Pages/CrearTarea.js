import { Grid, TextField } from '@mui/material';
import { styled } from '@mui/material/styles';
import { useState } from 'react';
import Box from '@mui/material/Box';
import Paper from '@mui/material/Paper';
import FormControlLabel from '@mui/material/FormControlLabel';
import Checkbox from '@mui/material/Checkbox';
import Link from '@mui/material/Link';
import Button from '@mui/material/Button';
import Container from '@mui/material/Container';
import LockOutlinedIcon from '@mui/icons-material/LockOutlined';
import { createTheme, ThemeProvider } from '@mui/material/styles';
import Select from '@mui/material/Select';
import InputLabel from '@mui/material/InputLabel';
import MenuItem from '@mui/material/MenuItem';
import { display } from '@mui/system';
import { crearApi } from '../API/tarea';

const theme = createTheme();

function CrearTarea() {

  const today = new Date();
  const date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
  const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  const dateTime = date + ' ' + time;

  const [inputs, setInputs] = useState({
    cuenta: localStorage.getItem("email"),
    actividad: "",
    tiempo: "2022-02-04T12:00",
    creacion: dateTime,
    descripción: "",
    subtareas: 0,
    agendar: "",
    subCont1: "",
    subAct1: false,
    subCont2: "",
    subAct2: false,
    subCont3: "",
    subAct3: false,
    subCont4: "",
    subAct4: false,
    subCont5: "",
    subAct5: false,
  });


  const changeForm = e => {
    console.log(e.target);
    console.log(inputs);
    setInputs({
      ...inputs,
      [e.target.name]: e.target.value
    })
  };

  const register = async (e) => {
    const valid = await crearApi(inputs);
  };

  const [st1, setSt1] = useState({ visibility: 'hidden' });
  const [st2, setSt2] = useState({ visibility: 'hidden' });
  const [st3, setSt3] = useState({ visibility: 'hidden' });
  const [st4, setSt4] = useState({ visibility: 'hidden' });
  const [st5, setSt5] = useState({ visibility: 'hidden' });

  const inputValidation = e => {
    console.log(inputs);
    console.log(e.target);
    const { value, name } = e.target;

    setInputs({
      ...inputs,
      [name]: value
    })

    if (value === 0) {
      setSt1({ visibility: 'hidden' });
      setInputs({
        ...inputs,
        subCont1: "",
        subAct1: false,
        subCont2: "",
        subAct2: false,
        subCont3: "",
        subAct3: false,
        subCont4: "",
        subAct4: false,
        subCont5: "",
        subAct5: false,
      });
      setSt2({ visibility: 'hidden' });
      setSt3({ visibility: 'hidden' });
      setSt4({ visibility: 'hidden' });
      setSt5({ visibility: 'hidden' });
    }

    if (value === 1) {
      setSt1({ visibility: 'visible' });
      setSt2({ visibility: 'hidden' });
      setSt3({ visibility: 'hidden' });
      setSt4({ visibility: 'hidden' });
      setSt5({ visibility: 'hidden' });
      setInputs({
        ...inputs,
        subAct1: true,
        subCont2: "",
        subAct2: false,
        subCont3: "",
        subAct3: false,
        subCont4: "",
        subAct4: false,
        subCont5: "",
        subAct5: false,
      });
    }

    if (value === 2) {
      setSt1({ visibility: 'visible' });
      setSt2({ visibility: 'visible' });
      setSt3({ visibility: 'hidden' });
      setSt4({ visibility: 'hidden' });
      setSt5({ visibility: 'hidden' });
      setInputs({
        ...inputs,
        subAct1: true,
        subAct2: true,
        subCont3: "",
        subAct3: false,
        subCont4: "",
        subAct4: false,
        subCont5: "",
        subAct5: false,
      });
    }

    if (value === 3) {
      setSt1({ visibility: 'visible' });
      setSt2({ visibility: 'visible' });
      setSt3({ visibility: 'visible' });
      setSt4({ visibility: 'hidden' });
      setSt5({ visibility: 'hidden' });
      setInputs({
        ...inputs,
        subAct1: true,
        subAct2: true,
        subAct3: true,
        subCont4: "",
        subAct4: false,
        subCont5: "",
        subAct5: false,
      });
    }

    if (value === 4) {
      setSt1({ visibility: 'visible' });
      setSt2({ visibility: 'visible' });
      setSt3({ visibility: 'visible' });
      setSt4({ visibility: 'visible' });
      setSt5({ visibility: 'hidden' });
      setInputs({
        ...inputs,
        subAct1: true,
        subAct2: true,
        subAct3: true,
        subAct4: true,
        subCont5: "",
        subAct5: false,
      });
    }

    if (value === 5) {
      setSt1({ visibility: 'visible' });
      setSt2({ visibility: 'visible' });
      setSt3({ visibility: 'visible' });
      setSt4({ visibility: 'visible' });
      setSt5({ visibility: 'visible' });
      setInputs({
        ...inputs,
        subAct1: true,
        subAct2: true,
        subAct3: true,
        subAct4: true,
        subAct5: true,
      });
    }

  };



  return (

    <ThemeProvider theme={theme}>
      <Container component="main" maxWidth="xs">
        <Grid container spacing={2}>
          <Grid item xs={2}>

          </Grid>
          <Grid item xs={8}>
            <Box component="form" onChange={changeForm} onSubmit={register} sx={{ mt: 5 }}>
              <Grid container spacing={2}>
                <Grid item xs={12} sm={12}>
                  <TextField
                    autoComplete="given-name"
                    required
                    name="actividad"
                    fullWidth
                    id="actividad"
                    label="actividad"
                    type="text"
                    variant="standard"
                    value={inputs.actividad}
                    autoFocus
                  />
                </Grid>
                <Grid item xs={12} sm={6}>
                  <TextField
                    id="tiempo"
                    name="tiempo"
                    value={inputs.tiempo}
                    label="Fecha de finalización"
                    type="datetime-local"
                    sx={{ width: 250 }}
                    InputLabelProps={{
                      shrink: true,
                    }}
                  />
                </Grid>
                <Grid item xs={12} sm={12}>
                  <TextField
                    required
                    fullWidth
                    id="outlined-multiline-flexible"
                    multiline
                    maxRows={4}
                    label="Descripción"
                    type="text"
                    name="descripción"
                    autoComplete="email"
                    value={inputs.descripción}
                    autoFocus
                  />
                </Grid>
                <Grid item xs={4}>

                  <InputLabel id="demo-simple-select-label">Subtareas</InputLabel>
                  <Select
                    labelId="demo-simple-select-label"
                    id="subtareas"
                    name="subtareas"
                    value={inputs.subtareas}
                    label="Subtareas"
                    onChange={inputValidation}
                    fullWidth
                  >
                    <MenuItem value={0}>0</MenuItem>
                    <MenuItem value={1}>1</MenuItem>
                    <MenuItem value={2}>2</MenuItem>
                    <MenuItem value={3}>3</MenuItem>
                    <MenuItem value={4}>4</MenuItem>
                    <MenuItem value={5}>5</MenuItem>
                  </Select>

                </Grid>

                <Grid item xs={8}>

                  <InputLabel id="demo-simple-select-label">Agendar en</InputLabel>
                  <Select
                    labelId="demo-simple-select-label"
                    id="demo-simple-select"
                    name="agendar"
                    value={inputs.agendar}
                    label="Colección"
                    onChange={inputValidation}
                    fullWidth
                    required
                  >
                    <MenuItem value={"Universidad"}>Universidad</MenuItem>
                    <MenuItem value={"Trabajo"}>Trabajo</MenuItem>
                    <MenuItem value={"Cotidiano"}>Cotidiano</MenuItem>
                  </Select>

                </Grid>
                <Box sx={{ pb: 2 }} >
                  <Grid item xs={12} sm={12}>

                    <TextField
                      autoComplete="given-name"
                      name="subCont1"
                      fullWidth
                      id="subCont1"
                      label="Actividad"
                      type="text"
                      variant="standard"
                      onChange={inputValidation}
                      value={inputs.subCont1}
                      autoFocus
                      sx={st1}
                    />
                  </Grid>

                  <Grid item xs={12} sm={12}>
                    <TextField

                      autoComplete="given-name"
                      name="subCont2"
                      fullWidth
                      id="subCont2"
                      label="Actividad"
                      type="text"
                      variant="standard"
                      onChange={inputValidation}
                      value={inputs.subCont2}
                      autoFocus
                      sx={st2}
                    />
                  </Grid>

                  <Grid item xs={12} sm={12}>
                    <TextField
                      autoComplete="given-name"
                      name="subCont3"
                      fullWidth
                      id="subCont3"
                      label="Actividad"
                      type="text"
                      variant="standard"
                      onChange={inputValidation}
                      value={inputs.subCont3}
                      autoFocus
                      sx={st3}
                    />
                  </Grid>

                  <Grid item xs={12} sm={12}>
                    <TextField
                      autoComplete="given-name"
                      name="subCont4"
                      fullWidth
                      id="subCont4"
                      label="Actividad"
                      type="text"
                      variant="standard"
                      onChange={inputValidation}
                      value={inputs.subCont4}
                      autoFocus
                      sx={st4}
                    />
                  </Grid>

                  <Grid item xs={12} sm={12}>
                    <TextField
                      sx={st5}
                      autoComplete="given-name"
                      name="subCont5"
                      fullWidth
                      id="subCont5"
                      label="Actividad"
                      type="text"
                      variant="standard"
                      onChange={inputValidation}
                      value={inputs.subCont5}
                      autoFocus
                    />
                  </Grid>
                </Box>



              </Grid>
              <Button
                type="submit"
                fullWidth
                variant="contained"
                sx={{ mt: 3, mb: 2 }}
              >
                Guardar
              </Button>
              <Grid container justifyContent="flex-end">
                <Grid item>
                  <Button
                    type="submit"
                    fullWidth
                    variant="contained"
                    sx={{ mt: 3, mb: 2 }}
                  >
                    Cancelar
                  </Button>
                </Grid>
              </Grid>
            </Box>
          </Grid>
          <Grid item xs={2}>

          </Grid>
        </Grid>
      </Container>
    </ThemeProvider>


  )
}

export default CrearTarea