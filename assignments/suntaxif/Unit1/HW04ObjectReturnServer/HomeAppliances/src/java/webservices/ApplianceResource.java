/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

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
 * @author HP PC
 */
@Path("appliance")
public class ApplianceResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ApplianceResource
     */
    public ApplianceResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.ApplianceResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        //TODO return proper representation object
        String appliance="[{\"Trademark\":\"MABE\",\"Name\":\"kitchen\",\"Color\":\"Black\",\"Price\":850.50,\"Description\":\"NA\"},"
                + "{\"Trademark\":\"Indurama\",\"Name\":\"refrigerator\",\"Color\":\"white\",\"Price\":1100,\"Description\":\"water filter\"},"
                + "{\"Trademark\":\"Artefacta\",\"Name\":\"juicer\",\"Color\":\"gray\",\"Price\":225,\"Description\":\"NA\"},"
                + "{\"Trademark\":\"Oster\",\"Name\":\"blender\",\"Color\":\"black\",\"Price\":300,\"Description\":\"NA\"},"
                + "{\"Trademark\":\"Oster\",\"Name\":\"toaster\",\"Color\":\"black/white\",\"Price\":150,\"Description\":\"for four loaves\"}]";
        return appliance;
    }

    /**
     * PUT method for updating or creating an instance of ApplianceResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
