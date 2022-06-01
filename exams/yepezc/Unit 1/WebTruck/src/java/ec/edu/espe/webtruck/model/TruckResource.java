/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.webtruck.model;

import com.google.gson.Gson;
import ec.edu.espe.webtruck.utils.MongoManager;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
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
@Path("truck")
public class TruckResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of TruckResource
     */
    public TruckResource() {
    }
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Truck getJson(@PathParam("id")int id) {
    Gson gson = new Gson();
    //String stringID =  Integer.toString(id);
    String stringInstructor = MongoManager.find(id);  
    Truck truck = gson.fromJson(stringInstructor, Truck.class);
    return truck;
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON) 
    public ArrayList<Truck> getAllJson() {
        Gson gson = new Gson();
        ArrayList<String> truckStringList = MongoManager.findAll();
        ArrayList<Truck> truckList = new ArrayList<>();
        Truck truck = new Truck();
        for(String stringTruck : truckStringList){
            truck = gson.fromJson(stringTruck,Truck.class);
            truckList.add(truck);
        }
        return truckList;
    }


    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Truck postJson(Truck truck) {
        Gson gson = new Gson();
        String stringTruck = gson.toJson(truck);
        MongoManager.save(stringTruck);
        return truck;
    }
}

