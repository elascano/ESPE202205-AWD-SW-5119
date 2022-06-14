/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author Henry
 */
@Path("medicine")
public class MedicineResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of MedicineResource
     */
    public MedicineResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.MedicineResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
       String medicine="{\"name\":\"Paracetamol\",\"price\":2,\"density\":5,\"id\":01,\"type\":1 ml}";
       return medicine;
    }

    /**
     * PUT method for updating or creating an instance of MedicineResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
