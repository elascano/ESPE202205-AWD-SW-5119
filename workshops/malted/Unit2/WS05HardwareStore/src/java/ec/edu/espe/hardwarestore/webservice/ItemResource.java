/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.hardwarestore.webservice;

import com.google.gson.Gson;
import ec.edu.espe.hardwarestore.controller.DBManager;
import ec.edu.espe.hardwarestore.model.Item;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

/**
 * REST Web Service
 *
 * @author yulia
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

    /**
     * Retrieves representation of an instance of ec.edu.espe.hardwarestore.webservice.ItemResource
     * @return an instance of ec.edu.espe.hardwarestore.model.Item
     */
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response insertItem(String item) {
        Gson gson = new Gson();
        Item newitem = gson.fromJson(item,Item.class);
        DBManager db = new DBManager();
        db.insert(newitem);
        return Response.status(Response.Status.OK).entity("Entity created for ID: " + newitem.getIdItem() ).build();
    }

    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Item getJson() {
        //TODO return proper representation object
        throw new UnsupportedOperationException();
    }

    /**
     * PUT method for updating or creating an instance of ItemResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Item content) {
    }
}
