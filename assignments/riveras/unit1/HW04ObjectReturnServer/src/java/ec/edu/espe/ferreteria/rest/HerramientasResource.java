/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.ferreteria.rest;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author User
 */
@Path("Herramientas")
public class HerramientasResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of HerramientasResource
     */
    public HerramientasResource() {
    }

    /**
     * Retrieves representation of an instance of ec.edu.espe.ferreteria.rest.HerramientasResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        String jsonData;
        jsonData = "{\"Herramientas\":["
                + "{\"name\":\"Martillo\",\"marca\":\"Alemana\",\"precio\":\"17\",\"stock\":\"NO\",\"cantidad\":\"0\", \"uso\":\"nuevo\",\"tipo\":\"de Punta\",\"longitud\":\"pequeño\",\"categoria\":\"golpe\",\"promocion\":\"NO\","
                + "{\"name\":\"Clavo\",\"marca\":\"BAHCO\",\"precio\":\"41\",\"stock\":\"SI\",\"cantidad\":\"5\", \"uso\":\"medio uso\",\"tipo\":\"Acerado\",\"longitud\":\"mediano\",\"categoria\":\"medida\",\"promocion\":\"NO\"},"
                + "{\"name\":\"Tabla\",\"marca\":\"3M\",\"precio\":\"21\",\"stock\":\"SI\",\"cantidad\":\"18\", \"uso\":\"sin datos\",\"tipo\":\"Triplex\",\"longitud\":\"grande\",\"categoria\":\"longitud\",\"promocion\":\"SI\"}"
                + "]}";
        return jsonData;
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    @Path("{herramientaId}")
    public String getJson(@PathParam("herramientaId")String clientId) {
                                                           
        String jsonData;
        jsonData = "{\"herramienta\":\""+ clientId +"\",\"name\":\"Martillo\",\"marca\":\"Alemana\",\"precio\":\"17\",\"stock\":\"NO\",\"cantidad\":\"0\", \"uso\":\"nuevo\",\"tipo\":\"de Punta\",\"longitud\":\"pequeño\",\"categoria\":\"golpe\",\"promocion\":\"NO\"}";
        //jsonData = "{\"herramienta\":\""+ clientId +"\",\"name\":\"Clavo\",\"marca\":\"BAHCO\",\"precio\":\"41\",\"stock\":\"SI\",\"cantidad\":\"5\"}";
        //jsonData = "{\"herramienta\":\""+ clientId +"\",\"name\":\"Martillo\",\"marca\":\"Alemana\",\"precio\":\"17\",\"stock\":\"NO\",\"cantidad\":\"0\"}";
        return jsonData;
    }

    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
