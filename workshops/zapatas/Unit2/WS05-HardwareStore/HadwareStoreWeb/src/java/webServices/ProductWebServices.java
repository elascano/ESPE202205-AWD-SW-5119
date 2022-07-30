/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webServices;

import com.google.gson.Gson;
import ec.edu.espe.product.control.MongoDbManager;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

/**
 * REST Web Service
 *
 * @author avand
 */
@Path("product")
public class ProductWebServices {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ProductWebServices
     */
    public ProductWebServices() {
    }

    /**
     * Retrieves representation of an instance of webServices.ProductWebServices
     * @param id
     * @return an instance of java.lang.String
     */
    @GET
    @Path("{idProduct}")
    @Produces(MediaType.APPLICATION_JSON)
    public Response getJson(@PathParam("idProduct")int id) {
        
        
        MongoDbManager.delete(id);
        return Response.status(Response.Status.OK).entity("Entity updated for ID: " + id ).build();
        
    }
    
    @DELETE
    @Path("{idProduct}")
    @Produces(MediaType.APPLICATION_JSON)
    public Response deleteJson(@PathParam("idProduct")int id) {
        MongoDbManager.delete(id);
        return Response.status(Response.Status.OK).entity("Entity updated for ID: " + id ).build();
        

    }

    /**
     * PUT method for updating or creating an instance of ProductWebServices
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
    

  
}
