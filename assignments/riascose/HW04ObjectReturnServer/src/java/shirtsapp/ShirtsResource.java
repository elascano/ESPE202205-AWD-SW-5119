/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package shirtsapp;

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
 * @author Erick
 */
@Path("shirts")
public class ShirtsResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ShirtsResource
     */
    public ShirtsResource() {
    }

    /**
     * Retrieves representation of an instance of shirtsapp.ShirtsResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        String shirts="[{\"brand\":\"RedSkins\",\"size\":L,\"color\":white,\"type\":\"polo\",\"price\":\"15.00\"},"+
                "{\"brand\":\"Bershka\",\"size\":S,\"color\":black,\"type\":\"llana\",\"price\":\"34.00\"},"+
                "{\"brand\":\"Marathon\",\"size\":XS,\"color\":red,\"type\":\"camisa\",\"price\":\"5.00\"},"+
                "{\"brand\":\"DePrati\",\"size\":XM,\"color\":white,\"type\":\"cuello v\",\"price\":\"23.00\"},"+
                "{\"brand\":\"Rm\",\"size\":M,\"color\":green,\"type\":\"polo\",\"price\":\"13.00\"},";
        return shirts;
    }

    /**
     * PUT method for updating or creating an instance of ShirtsResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
