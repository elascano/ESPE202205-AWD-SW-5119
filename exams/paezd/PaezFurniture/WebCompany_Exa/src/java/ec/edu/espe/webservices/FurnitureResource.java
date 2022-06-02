/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.webservices;

import com.google.gson.Gson;
import ec.edu.espe.controller.ControllerDB;
import ec.edu.espe.model.Furniture;
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
 * @author USUARIO
 */
@Path("Furniture")
public class FurnitureResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of FurnitureResource
     */
    public FurnitureResource() {
    }

    /**
     * Retrieves representation of an instance of
     * ec.edu.espe.webservices.FurnitureResource
     *
     * @return an instance of java.lang.String
     */
    @GET
    @Path("{idFurniture}")
    @Produces(MediaType.APPLICATION_JSON)
    public Furniture getJson(@PathParam("idFurniture") int idFurniture) {
        //TODO return proper representation object
        Gson gson = new Gson();
        ControllerDB db = new ControllerDB();

        String instruct = db.search(idFurniture);
        Furniture furniture = gson.fromJson(instruct, Furniture.class);

        return furniture;
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
        Gson gson = new Gson();
        ControllerDB db = new ControllerDB();

        String furniture = db.read();

        return furniture;
    }

    /**
     * PUT method for updating or creating an instance of FurnitureResource
     *
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
