/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.espe.edu.webservices;

import ec.espe.edu.model.Parks;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author Home
 */
@Path("parks")
public class ParksResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ParksResource
     */
    public ParksResource() {
    }

    /**
     * Retrieves representation of an instance of ec.espe.edu.webservices.ParksResource
     * @return an instance of ec.espe.edu.model.Parks
     */
    @GET
    @Path("{name}")
    @Produces(MediaType.APPLICATION_JSON)
    public Parks getJson(@PathParam("name") String name) {
        Parks park = new Parks();
        park.setName("La carolina");
        park.setCityLocation("Quito");
        park.setCityAdress("North");
        park.setArea(6000);
        park.setCapacity(55000);
        
        park.setNumberChairs(500);
        return park;
    }

    /**
     * PUT method for updating or creating an instance of ParksResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Parks content) {
    }
}
