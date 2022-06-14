/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.building.controller;

import ec.edu.espe.building.model.Building;
import java.util.ArrayList;
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
 * @author yulia
 */
@Path("building")
public class BuildingResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of BuildingResource
     */
    public BuildingResource() {
    }

    /**
     * Retrieves representation of an instance of ec.edu.espe.building.controller.BuildingResource
     * @return an instance of ec.edu.espe.building.model.Building
     */
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Building getJson(@PathParam("id") int id) {
        DBManager database= new DBManager("Buildings");
        Building building = database.retrieve(id);
        return building;
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Building> getBuildings() {
        DBManager database= new DBManager("Buildings");
        ArrayList<Building> buildings = database.retrieveBuildings();
        return buildings;
    }

    /**
     * PUT method for updating or creating an instance of BuildingResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Building content) {
    }
}
