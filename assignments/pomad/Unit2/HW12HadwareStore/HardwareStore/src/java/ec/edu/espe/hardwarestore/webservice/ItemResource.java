/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.hardwarestore.webservice;

import ec.edu.espe.hardwarestore.controller.ItemController;
import ec.edu.espe.hardwarestore.model.Item;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

/**
 * REST Web Service
 *
 * @author Dayse Poma
 */
@Path("item")
public class ItemResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ItemResource
     */
    public ItemResource() {
    }


    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Item getItem(@PathParam("id") int id) {
        return ItemController.getByIdProduct(id);
    }
    
    @GET
    @Path("all")
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Item> getItems() {
       return ItemController.getAllProduct();
    }
    
    @PUT
    @Path("/update")
    @Consumes(MediaType.APPLICATION_JSON)
    public Response putItem(Item item) {
        return ItemController.updateProduct(item);
    }

    @DELETE
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response deleteItem(@PathParam("id") int id) {
        return ItemController.deleteProduct(id);
    }
    
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response postItem(Item item){
        return ItemController.postProduct(item);
    }
 

}
