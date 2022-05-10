import * as React from 'react';
import Box from '@mui/material/Box';
import CssBaseline from '@mui/material/CssBaseline';
import BottomNavigation from '@mui/material/BottomNavigation';
import BottomNavigationAction from '@mui/material/BottomNavigationAction';
import Paper from '@mui/material/Paper';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemAvatar from '@mui/material/ListItemAvatar';
import ListItemText from '@mui/material/ListItemText';
import Avatar from '@mui/material/Avatar';
import useScript from '../useScript';
import './CSS/Comentarios.css'
import { Grid } from '@mui/material';
import ForumIcon from '@mui/icons-material/Forum';
import QuestionAnswerIcon from '@mui/icons-material/QuestionAnswer';

const Comentarios = () => {
    useScript("https://platform.twitter.com/widgets.js");
    return (
        <Box className='comentariobox'>

            <br/> <br/>  <br/>

<Grid container spacing={0.25} columns={24}>
  <Grid item xs={8}>
   
  <blockquote className="twitter-tweet"  data-theme="ligth" width='300px' align='center'>
                    <p lang="en" dir="ltr">
                        Teemo has arrived in Manila to find the best tikoy to add to his lucky 8 Treasure Box! 🧨 Have you visited Manila? If so, which place in town has the best tikoy?
                        <a href="https://twitter.com/hashtag/TeemoTreasureTrek?src=hash&amp;ref_src=twsrc%5Etfw">
                            #TeemoTreasureTrek</a>
                        <a href="https://t.co/p0EwtbqbkH">pic.twitter.com/p0EwtbqbkH</a>
                    </p>&mdash; League of Legends: Wild Rift (@wildrift)
                    <a href="https://twitter.com/wildrift/status/1491154873752047618?ref_src=twsrc%5Etfw">
                        February 8, 2022</a></blockquote>
  </Grid>
  <Grid item xs={8}>
  
  <blockquote className="twitter-tweet"  data-theme="ligth" width='300px' align='center'>
                    <p lang="en" dir="ltr">
                        Teemo had an amazing time in Bangkok enjo
                        ying the kanom pia from Aeu Leng Heng, Ngaun
                        Ha Cheng China Town, and Tang Song Heng. If
                        you&#39;re in Bangkok, head to these stores
                        to take pics with Teemo and get
                        Teemo-themed rewards!<br /><br />
                        🧨 He’ll be heading to Manila next!
                        <a href="https://twitter.com/hashtag/TeemoTreasureTrek?src=hash&amp;ref_src=twsrc%5Etfw">
                            #TeemoTreasureTrek</a>
                        <a href="https://t.co/f16hvupWeC">
                            pic.twitter.com/f16hvupWeC</a>
                    </p>&mdash; League of Legends: Wild Rift (@wildrift)
                    <a href="https://twitter.com/wildrift/status/1491049183171678208?ref_src=twsrc%5Etfw">February 8, 2022</a>
                </blockquote>
  </Grid>

  <Grid item xs={8}>
  <blockquote className="twitter-tweet" data-theme="ligth" width='300px' align='center'>
      <p lang="en" dir="ltr">
    Teemo had a fun time in Jakarta enjoying the kue mongkok 
    from Bakpau Kue 555, Bakpau A Satu, and Toko Kue. If you&#39;re
     in Jakarta, head to these shops to take pics with Teemo and get
      special Teemo-themed rewards!<br/><br/>🧨 He’ll be heading to 
      Ho Chi Minh City next!
      <a href="https://twitter.com/hashtag/TeemoTreasureTrek?src=hash&amp;ref_src=twsrc%5Etfw">#TeemoTreasureTrek</a> 
      <a href="https://t.co/swroVb2uM7">pic.twitter.com/swroVb2uM7
      </a></p>&mdash; League of Legends: Wild Rift (@wildrift) 
      <a href="https://twitter.com/wildrift/status/1491773957862617088?ref_src=twsrc%5Etfw">February 10, 2022</a></blockquote>
       

  </Grid>
</Grid>


<QuestionAnswerIcon sx={{fontSize: 70}} className='comentarioicontalk'/>
<h1 className='titulocomentarios'> Actualizaciones </h1>
        </Box>
    )
}

export default Comentarios