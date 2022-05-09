import Carousel from 'react-material-ui-carousel'
import { Paper, Box, Avatar} from '@mui/material'
import ChevronRightIcon from '@mui/icons-material/ChevronRight';
import ChevronLeftIcon from '@mui/icons-material/ChevronLeft';
import './CSS/Testiomonial.css';

function Testimonial(props)
{
    var items = [
        {
            name: "Andres Valarezo",
            description: "Me gusta el pico",
            image: "https://live.hsmob.io/storage/images/wakyma.com/wakyma.com_enfermedades-de-los-conejos-mas-frecuentes-1.jpg"

        },
        {
            name: "Michelle Cantuña",
            description: "Probably the most random thing you have ever seen!",
            image: "data:image/jpeg;base64,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"
        },
        {
            name: "Hamilton Perez",
            description: "Probably the most random thing you have ever seen!",
            image: "https://maskowe.com/media/magefan_blog/rabbit-4303823__340-compressor.jpg"

        },
        {
            name: "Martin Medina",
            description: "Ya manden a mimir",
            image: "https://okdiario.com/img/2021/09/08/pablo-martinez-adagxtvkrwe-unsplash11-655x368.jpg"

        }
    ]

    return (
        <Box className='testimonialbox'>
        <Carousel
        NextIcon={<ChevronRightIcon />}
        PrevIcon={<ChevronLeftIcon/>}
        className='carrouselT'
        >
            {
                items.map( (item, i) => <Item key={i} item={item} foto={item.image} /> )
            }
        </Carousel>
        </Box>
    )
}

function Item(props)
{
    return (
        <Paper className='papertestimonial'>
             <h1 className='team'> HAMA team </h1>
            <Avatar
            className='personaschingonas'
            src={props.foto}
           sx={{ width: 200, height: 200 }} />
                <p className='nombreschingones'>{props.item.name}</p>
            <p className='weasramdon'> " {props.item.description} "</p>
              
        </Paper>
    )
}

export default Testimonial