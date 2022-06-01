/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.vehicles.webservices;

import com.google.gson.Gson;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.vehicles.controller.DBManager;
import ec.edu.espe.vehicles.model.Vehicle;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import org.json.simple.parser.ParseException;

/**
 * REST Web Service
 *
 * @author Andrés López
 */
@Path("vehicle")
@Produces(MediaType.APPLICATION_JSON)
public class VehicleResource {

    DBManager dbManager = DBManager.getInstance();
    @Context
    private UriInfo context;

    /**
     * Creates a new instance of VehicleResource
     */
    public VehicleResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.InstructorResource
     * @param id
     * @return an instance of ec.edu.espe.university.model.Instructor
     */
    @GET
    @Path("/{id}")
    public Vehicle getVehicle(@PathParam("id") int id) {
        String stringVehicle = "";
        String collection = "Vehicles";
        MongoDatabase database; 
        Vehicle vehicle = new Vehicle();
        Gson gson = new Gson();
        
        database = dbManager.connection("edison19", "admin", "AWD5119");
        stringVehicle = dbManager.find(collection, "id", id, database);
        vehicle = gson.fromJson(stringVehicle, Vehicle.class);
        
        return vehicle;
    }
    
    /**
     * Retrieves representation of an instance of ec.edu.espe.vehicles.webservices.VehicleResource
     * @return an instance of ec.edu.espe.vehicles.model.Vehicle
     */
    @GET
    public String getJson() throws ParseException {
        String collection = "Vehicles";
        MongoDatabase database; 
        
        database = dbManager.connection("edison19", "admin", "AWD5119");
        
        return dbManager.completeModel(collection, database); 
    }

    /**
     * PUT method for updating or creating an instance of VehicleResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Vehicle content) {
    }
}
