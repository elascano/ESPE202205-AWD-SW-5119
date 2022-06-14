/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webServices;

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
 * @author yepec
 */
@Path("shoe")
public class ShoeResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ShoeResource
     */
    public ShoeResource() {
    }

    /**
     * Retrieves representation of an instance of webServices.ShoeResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        //TODO return proper representation object
        String shoe = "[{\"id\":\"S01\",\"brand\":\"Covers\",\"size\":36,\"manufacturingMaterial\":\"leather\",\"type\":\"oxford\"},"
                + "{\"id\":\"S02\",\"brand\":\"Adidas\",\"size\":38,\"manufacturingMaterial\":\"rubber\",\"type\":\"boots\"}"
                + "{\"id\":\"S03\",\"brand\":\"Chanel\",\"size\":42,\"manufacturingMaterial\":\"suede\",\"type\":\"high-heels\"}"
                + "{\"id\":\"S04\",\"brand\":\"Puma\",\"size\":40,\"manufacturingMaterial\":\"cloth\",\"type\":\"flat\"}"
                + "{\"id\":\"S05\",\"brand\":\"Dior\",\"size\":38,\"manufacturingMaterial\":\"leather\",\"type\":\"wedge\"}]";
       return shoe;
    }

    /**
     * PUT method for updating or creating an instance of ShoeResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
