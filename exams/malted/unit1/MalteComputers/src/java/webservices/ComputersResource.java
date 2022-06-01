/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import Controller.DBMongoManager;
import com.google.gson.Gson;
import ec.edu.espe.computersystem.model.Computer;
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
 * @author marce
 */
@Path("computers")
public class ComputersResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ComputersResource
     */
    public ComputersResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.ComputersResource
     * @return an instance of java.lang.String
     */
@GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    
    public Computer getComputer(@PathParam("id") int id) {
       //TODO return proper representation object
       Gson gson = new Gson();
       DBMongoManager db = new DBMongoManager();
       
       String computer = db.search(id);
       Computer computers = gson.fromJson(computer, Computer.class);
 
        return computers;
    }

    /**
     * PUT method for updating or creating an instance of ComputersResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
