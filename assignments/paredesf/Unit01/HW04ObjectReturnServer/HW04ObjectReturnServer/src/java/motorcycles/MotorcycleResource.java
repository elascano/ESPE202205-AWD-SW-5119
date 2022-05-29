/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package motorcycles;

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
 * @author Fernando
 */
@Path("motorcycle")
public class MotorcycleResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of GenericResource
     */
    public MotorcycleResource() {
    }

    /**
     * Retrieves representation of an instance of motorcycles.MotorcycleResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        String motorcycle="[{\"brand\":\"Honda\",\"engine\":500cc,\"color\":black,\"category\":\"sport\",\"price\":\"12.900\"},"+
                "{\"brand\":\"Honda\",\"engine\":500cc,\"color\":red,\"category\":\"sport\",\"price\":\"11.000\"},"+
                "{\"brand\":\"Ducati\",\"engine\":937cc,\"color\":white,\"category\":\"off-road\",\"price\":\"17.000\"},"+
                "{\"brand\":\"BMW\",\"engine\":895cc,\"color\":grey,\"category\":\"roadster\",\"price\":\"9.250\"}]";
        return motorcycle;
    }

    /**
     * PUT method for updating or creating an instance of MotorcycleResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
