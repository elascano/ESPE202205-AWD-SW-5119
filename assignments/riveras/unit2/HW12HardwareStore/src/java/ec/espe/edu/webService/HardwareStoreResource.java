/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.espe.edu.webService;

import com.google.gson.Gson;
import ec.espe.edu.controller.ControllerDB;
import ec.espe.edu.model.HardwareStore;
import java.text.ParseException;
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

/**
 * REST Web Service
 *
 * @author User
 */
@Path("HardwareStore")
public class HardwareStoreResource {
    ControllerDB db = new ControllerDB();
    

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of HardwareStoreResource
     */
    public HardwareStoreResource() {
    }

    /**
     * Retrieves representation of an instance of ec.espe.edu.webService.HardwareStoreResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<HardwareStore> getAllHardwareStore() throws ParseException{
        db.connection("edison19", "admin", "hardwareStore", "items");
        db.getAll();
        return db.getAll();
    }
        @GET
    @Path("/{idItem}")
    @Produces(MediaType.APPLICATION_JSON)
    public HardwareStore getOne(@PathParam("idItem") int idItem) {
        Gson gson = new Gson();

        db.connection("edison19", "admin", "hardwareStore", "items");
        String hardwareStoreString = db.findOne(idItem);
        HardwareStore hardwareStore = gson.fromJson(hardwareStoreString, HardwareStore.class);

        return hardwareStore;
    }
    /**
     * PUT method for updating or creating an instance of HardwareStoreResource
     * @param content representation for the resource
     */
    @PUT
    @Path("update/{idItem}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public String putJson(HardwareStore hardwareStores, @PathParam("idItem") int idItem) {
        String hardwareStoreString = "";

        db.connection("edison19", "admin", "hardwareStore", "items");
        db.update(hardwareStores, idItem);
        hardwareStoreString = db.findOne(idItem);

        return hardwareStoreString;
    }
    @POST
    @Path("create")
    @Produces(MediaType.APPLICATION_JSON)
    @Consumes(MediaType.APPLICATION_JSON)
    public String addHardwareStore(HardwareStore hardwareStore) {
        String hardwareStoreString = "";

        db.connection("edison19", "admin", "hardwareStore", "items");
        db.create(hardwareStore);
        hardwareStoreString = db.findOne(hardwareStore.getIdItem());

        return hardwareStoreString;
    }

    @DELETE
    @Path("delete/{idItem}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public String deleteJson(@PathParam("idItem") int idItem) {
        HardwareStore hardwareStore = new HardwareStore();

        db.connection("edison19", "admin", "hardwareStore", "items");
        db.delete(idItem);

        return "Deleted successfully with id: " + idItem;
    }
}
