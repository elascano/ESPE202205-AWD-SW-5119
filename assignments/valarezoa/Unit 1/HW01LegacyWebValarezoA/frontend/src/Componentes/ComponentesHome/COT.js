import * as React from 'react';
import Box from '@mui/material/Box';
import Card from '@mui/material/Card';
import CardActions from '@mui/material/CardActions';
import CardContent from '@mui/material/CardContent';
import CardHeader from '@mui/material/CardHeader';
import CssBaseline from '@mui/material/CssBaseline';
import Grid from '@mui/material/Grid';
import Typography from '@mui/material/Typography';
import GlobalStyles from '@mui/material/GlobalStyles';
import Container from '@mui/material/Container';
import '../ComponentesHome/CSS/COT.css'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'

const tiers = [
  {
    title: 'DISTRIBUYE',
    description: [
       
    ],

  },
  {
    title: 'CREA',
    subheader: 'actividades',
    description: [
      
    ],
  },
  {
    title: 'TEMPORIZA',
    description: [
    
    ],
  },
];


function PricingContent() {
  return (
    <div className='colorpg'>
      <GlobalStyles styles={{ ul: { margin: 0, padding: 0, listStyle: 'none' } }} />
      <CssBaseline />
      <Container maxWidth="md" component="main">
        <Grid container spacing={5} alignItems="flex-end">
          {tiers.map((tier) => (
            <Grid
              item
              key={tier.title}
              xs={12}
              sm={tier.title === 'Enterprise' ? 12 : 6}
              md={4}
            >
              <Card>
                <CardHeader
                  title={tier.title}
                  subheader={tier.subheader}
                  titleTypographyProps={{ align: 'center' }}
                  subheaderTypographyProps={{
                    align: 'center',
                  }}
                  sx={{
                    backgroundColor: (theme) =>
                      theme.palette.mode === 'light'
                        ? theme.palette.grey[400]
                        : theme.palette.grey[700],
                  }}
                />
                <CardContent>
                  <Box
                    sx={{
                      display: 'flex',
                      justifyContent: 'center',
                      alignItems: 'baseline',
                      height: '200px',
                    }}
                  >
                     
                
                  </Box>
                  <ul>
                    {tier.description.map((line) => (
                      <Typography
                        component="li"
                        variant="subtitle1"
                        align="center"
                        key={line}
                      >
                        {line}
                      </Typography>
                    ))}
                  </ul>
                </CardContent>
                <CardActions>
                  
                </CardActions>
              </Card>
            </Grid>
          ))}
        </Grid>
       
      </Container>
       
       <span className='logocrear'>
      <i class="fas fa-marker"/>
      </span>

      <span className='logoagrupar'>
      <i class="fas fa-object-group"/>
      </span>

      <span className='logoalarma'>
      <i class="fas fa-bell"/>
      </span>

    </div>
  );
}

export default function Pricing() {
  return <PricingContent />;
}