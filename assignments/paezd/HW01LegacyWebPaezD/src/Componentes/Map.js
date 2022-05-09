import react,{Component} from 'react';
import GoogleMaps from 'simple-react-google-maps';
class Map extends Component{
    render(){
        return (
            <div className='container'>
                <GoogleMaps style={{height: "400px",with:"300PX"}}
                zoom={12}
                center={{lat:40.4127355,lng:-3.695428}}
                />
            </div>
        );
    }    
}
export default Map;