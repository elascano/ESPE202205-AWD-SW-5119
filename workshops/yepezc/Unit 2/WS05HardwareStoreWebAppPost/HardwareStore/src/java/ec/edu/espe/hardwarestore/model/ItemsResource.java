/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.hardwarestore.model;

import com.google.gson.Gson;
import ec.edu.espe.hardwarestore.controller.DBController;

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
 * @author yepec
 */
@Path("items")
public class ItemsResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of ItemsResource
     */
    public ItemsResource() {
    }

    /**
     * Retrieves representation of an instance of ec.edu.espe.hardwarestore.model.ItemsResource
     * @param id
     * @return an instance of ec.edu.espe.hardwarestore.model.Item
     */
 
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Response getJson(@PathParam("id")int id) {
        DBController db = new DBController();
        Response response = db.getById(id);
        return response;
    }
    
    @PUT
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response updateJson(@PathParam("id")int id, Item content) {
        DBController db = new DBController();
        Response response = db.update(id,content);
        return response;
    }
    
    @POST
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response postJson(@PathParam("id")int id, Item item) {
        DBController db = new DBController();       
        item.setIdItem(id);
        Response response = db.save(item);
        return response;
    }
    
    @DELETE
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Response deleteJson(@PathParam("id")int id) {
        DBController db = new DBController();
        Response response = db.delete(id);
        System.out.println("HOLA");
        return response;
    }   
    
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Response getJson() {
        DBController db = new DBController();
        Response response = db.getAll();
        return response;
    }


    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Response postJson(Item item) {
        DBController db = new DBController();       
        Response response = db.save(item);
        return response;
    }
}
