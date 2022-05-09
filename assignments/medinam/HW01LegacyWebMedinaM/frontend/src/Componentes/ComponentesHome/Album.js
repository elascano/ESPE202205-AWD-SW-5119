
import Button from '@mui/material/Button';
import CssBaseline from '@mui/material/CssBaseline';
import Stack from '@mui/material/Stack';
import Box from '@mui/material/Box';
import Typography from '@mui/material/Typography';
import Container from '@mui/material/Container';
import { Link } from 'react-router-dom';
import { createTheme, ThemeProvider } from '@mui/material/styles';
import './CSS/Album.css';
import { IconButton } from '@mui/material';
import KeyboardDoubleArrowDownIcon from '@mui/icons-material/KeyboardDoubleArrowDown';

const theme = createTheme();

export default function Album() {
  return (
    <ThemeProvider theme={theme}>
      <CssBaseline />

        {/* Hero unit */}
        <Box
          sx={{
            bgcolor: 'background.paper',
            pt: 8,
            pb: 6,
          }}
          className='presentacion'
        >
          <Container maxWidth="sm">
            <Typography
              component="h1"
              variant="h2"
              align="center"
              color="text.primary"
              gutterBottom

            >
              <div className='logoalb'/>
            </Typography>
            <Typography variant="h4" align="center" color="text.secondary" paragraph className='BWelcome'>
              Bienvenido a HAMA, crea, edita, agrupa y temporaliza tus actividades o ideas!
            </Typography>
            <Stack
              sx={{ pt: 0 }}
              direction="row"
              spacing={2}
              justifyContent="center"
              className='stackalb'
            >

              <Button component={Link} to={'/registro'}  color="secondary" variant="contained"> Registrarse!
                </Button>
             <Button component={Link} to={'/iniciar'}  color="secondary" variant="contained">Iniciar Sesion</Button>

            </Stack>
          </Container>

          <span className='arrdow'>
          <IconButton  size="large" color="primary" aria-label="abajo">
          <KeyboardDoubleArrowDownIcon fontSize="inherit"/>
         </IconButton>
          </span>

        </Box>

    </ThemeProvider>
  );
}
