/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.webservices;

import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;
import ec.edu.espe.controller.HardwareController;
import ec.edu.espe.model.Hardware;
import javax.ws.rs.DELETE;
import javax.ws.rs.POST;
import javax.ws.rs.PathParam;

/**
 * REST Web Service
 *
 * @author SEBAS
 */
@Path("item")
public class HardwareStoreResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of HardwareStoreResource
     */
    public HardwareStoreResource() {
    }

   
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Hardware getItem(@PathParam("id") int id) {
        return HardwareController.getObjectDB(id);
    }

    @GET
    @Path("/all")
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Hardware> getItems() {
        return HardwareController.showDB();
    }

    @PUT
    @Path("/update/{id}")
    @Produces(MediaType.APPLICATION_JSON)
    @Consumes(MediaType.APPLICATION_JSON)
    public String putJson(@PathParam("id")int id,Hardware content) {
        return HardwareController.modifyDB(id, content);
    }
    
   
    @DELETE
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public String deleteItem(@PathParam("id")int id) {
        return HardwareController.deleteDB(id);
    }
    
     @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Hardware insertItem(Hardware product) {
        HardwareController.insertDB(product);
        return product;
    }
}
