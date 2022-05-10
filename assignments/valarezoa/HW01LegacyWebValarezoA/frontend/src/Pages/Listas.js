import '../Estilos CSS/listas.css'
import '../Estilos CSS/estiloTabla.css'
import { Link } from 'react-router-dom'

const Listas = () => (
    <div className="contenido">
    <div id="pricing-table" className="plan" >
        <div className="plan" id="most-popular">
            <h3>Actividades Realizadas<span>3</span></h3>
            <Link className="signup" to="/creartarea">Ingresar</Link>         
            <ul>
                <li><b>1.-</b> Tarea</li>
                <li><b>2.-</b> Tarea</li>
                <li><b>3.-</b> Tarea</li>
                <li><b>4.-</b> Tarea</li>			
            </ul> 
        </div>
        <div className="plan" id="most-popular">
            <h3>Actividades Realizando<span>9</span></h3>
            <Link className="signup" to="/creartarea">Ingresar</Link>        
            <ul>
                <li><b>1.-</b> Tarea</li>
                <li><b>2.-</b> Tarea</li>
                <li><b>3.-</b> Tarea</li>
                <li><b>4.-</b> Tarea</li>				
            </ul>    
        </div>
        <div className="plan" id="most-popular">
            <h3>Actividades por Realizar<span>7</span></h3>
            <Link className="signup" to="/creartarea">Ingresar</Link>
            <ul>
                <li><b>1.-</b> Tarea</li>
                <li><b>2.-</b> Tarea</li>
                <li><b>3.-</b> Tarea</li>
                <li><b>4.-</b> Tarea</li>				
            </ul>
        </div>
        <div className="plan" id="most-popular">
            <h3>Total de Actividades<span>19</span></h3>
            <Link className="signup" to="/creartarea">Ingresar</Link>		
            <ul>
                <li><b>1.-</b> Tarea</li>
                <li><b>2.-</b> Tarea</li>
                <li><b>3.-</b> Tarea</li>
                <li><b>4.-</b> Tarea</li>				
            </ul>
        </div> 	
    </div>
</div>
)

export default Listas