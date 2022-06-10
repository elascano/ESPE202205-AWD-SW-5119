/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.vinyl.model;

import com.google.gson.Gson;
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
 * @author usuario
 */
@Path("vinyl")
public class VinylResource {
ControllerDB controller = new ControllerDB();   
    @Context
    private UriInfo context;

    /**
     * Creates a new instance of VinylResource
     */
    public VinylResource() {
    }

    /**
     * Retrieves representation of an instance of ec.edu.vinyl.model.VinylResource
     * @return an instance of ec.edu.vinyl.model.vinyl
     */
@GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public vinyl getJson(@PathParam("id")int id) {
    Gson gson = new Gson();
    //String stringID =  Integer.toString(id);
    String stringVinyl = controller.find(id);  
    vinyl std = gson.fromJson(stringVinyl, vinyl.class);
    return std;
    }

    /**
     * PUT method for updating or creating an instance of VinylResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(vinyl content) {
    }
}
