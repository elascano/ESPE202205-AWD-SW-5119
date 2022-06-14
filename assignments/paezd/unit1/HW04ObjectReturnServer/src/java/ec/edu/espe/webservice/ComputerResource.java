/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.edu.espe.webservice;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author USUARIO
 */
@Path("computer")
public class ComputerResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ComputerResource
     */
    public ComputerResource() {
    }

    /**
     * Retrieves representation of an instance of
     * ec.edu.espe.webservice.ComputerResource
     *
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        String computer = "[      {\n"
                + "        \"marca\": \"MSI\",\n"
                + "        \"procesador\": \"Intel Core i7-9750H de 2,4 GHz\",\n"
                + "        \"Ram\": \"8GB\",\n"
                + "        \"tarjeta grafica \": \"NVIDIA GeForce GTX1650 Ti Max-Q 4GB GDDR6\",\n"
                + "        \"disco duro\": \"SSD NVMe 512 GB\",\n"
                + "        \"audio\": \"2 altavoces de 2,0 W\",\n"
                + "        \"camara\": \" HD HP Wide Vision de 720p\",\n"
                + "        \"pantalla\": \"IPS Full HD de 15,6\",\n"
                + "        \"sistema operativo\": \"Microsoft Windows 10\",\n"
                + "        \"dimenciones\": \" 14,13 x 9,99 x 0,85 pulgadas\"\n"
                + "      },\n"
                + "      {\n"
                + "        \"marca\": \"Dell\",\n"
                + "        \"procesador\": \"Intel Core i7-11390H de 11ava generación \",\n"
                + "        \"Ram\": \"16 GB, 2 de 8 GB, DDR4, 3200 MHz\",\n"
                + "        \"tarjeta grafica \": \"Intel Iris Xe con memoria gráfica compartida\",\n"
                + "        \"disco duro\": \"Unidad de estado sólido PCIe NVMe M.2 de 512 GB\",\n"
                + "        \"bateria\": \"Batería de 4 celdas y 54 Wh (integrada)\",\n"
                + "        \"camara\": \"Cámara HD de 720p a 30 ips\",\n"
                + "        \"pantalla\": \"Pantalla antirreflectante con retroiluminación LED WVA de 14\",\n"
                + "        \"sistema operativo\": \"Microsoft Windows 11\",\n"
                + "        \"dimenciones\": \"32,12 x 21,28 x 1,79 cm\"\n"
                + "      },\n"
                + "      {\n"
                + "        \"marca\": \"Lenovo\",\n"
                + "        \"procesador\": \"AMD Ryzen 7 4700U \",\n"
                + "        \"Ram\": \"DDR4-3200 de 16 GB\",\n"
                + "        \"tarjeta grafica \": \"Gráficos AMD Radeon\",\n"
                + "        \"disco duro\": \"SSD PCIe NVMe de 512 GB\",\n"
                + "        \"bateria\": \"Batería 52.5 WH (integrada)\",\n"
                + "        \"camara\": \"Cámara HD con obturador de privacidad\",\n"
                + "        \"pantalla\": \"Pantalla táctil brillante de 14 pulgadas FHD \",\n"
                + "        \"sistema operativo\": \"Windows 10\",\n"
                + "        \"dimenciones\": \" 32,13 x 21,74 x 2,08 cm\"\n"
                + "      }]";
        return computer;
    }

    /**
     * PUT method for updating or creating an instance of ComputerResource
     *
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
