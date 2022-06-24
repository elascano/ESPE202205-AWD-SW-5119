/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.hardwareStore.webService;

import com.google.gson.Gson;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.hardwareStore.controller.DBManager;
import ec.edu.espe.hardwareStore.model.HardwareStore;
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
import org.json.simple.parser.ParseException;

/**
 * REST Web Service
 *
 * @author Andrés López
 */
@Path("hardwareStore")
public class HardwareStoreResource {

    DBManager dbManager = new DBManager();

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of HardwareStoreResource
     */
    public HardwareStoreResource() {

    }

    /**
     * Retrieves representation of an instance of
     * ec.edu.espe.hardwareStore.webService.HardwareStoreResource
     *
     * @return an instance of ec.edu.espe.hardwareStore.model.HardwareStore
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<HardwareStore> getAllHardwareStore() throws ParseException {
        dbManager.connection("edison19", "admin", "hardwareStore", "items");
        dbManager.getAll();

        return dbManager.getAll();
    }

    /**
     * Retrieves representation of an instance of
     * ec.edu.espe.hardwareStore.webService.HardwareStoreResource
     *
     * @return an instance of ec.edu.espe.hardwareStore.model.HardwareStore
     */
    @GET
    @Path("/{idItem}")
    @Produces(MediaType.APPLICATION_JSON)
    public HardwareStore getOne(@PathParam("idItem") int idItem) {
        Gson gson = new Gson();

        dbManager.connection("edison19", "admin", "hardwareStore", "items");
        String hardwareStoreString = dbManager.findOne(idItem);
        HardwareStore hardwareStore = gson.fromJson(hardwareStoreString, HardwareStore.class);

        return hardwareStore;
    }

    /**
     * PUT method for updating or creating an instance of HardwareStoreResource
     *
     * @param content representation for the resource
     */
    @PUT
    @Path("update/{idItem}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public String putJson(HardwareStore hardwareStoreNew, @PathParam("idItem") int idItem) {
        String hardwareStoreString = "";

        dbManager.connection("edison19", "admin", "hardwareStore", "items");
        dbManager.update(hardwareStoreNew, idItem);
        hardwareStoreString = dbManager.findOne(idItem);

        return hardwareStoreString;
    }

    @POST
    @Path("create")
    @Produces(MediaType.APPLICATION_JSON)
    @Consumes(MediaType.APPLICATION_JSON)
    public String addHardwareStore(HardwareStore hardwareStore) {
        String hardwareStoreString = "";

        dbManager.connection("edison19", "admin", "hardwareStore", "items");
        dbManager.create(hardwareStore);
        hardwareStoreString = dbManager.findOne(hardwareStore.getIdItem());

        return hardwareStoreString;
    }

    @DELETE
    @Path("delete/{idItem}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public String deleteJson(@PathParam("idItem") int idItem) {
        HardwareStore hardwareStore = new HardwareStore();

        dbManager.connection("edison19", "admin", "hardwareStore", "items");
        dbManager.delete(idItem);

        return "Deleted successfully with id: " + idItem;
    }
}