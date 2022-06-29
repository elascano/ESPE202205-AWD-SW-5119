package ec.edu.espe.hardwareStore.webService;

import com.google.gson.Gson;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.hardwareStore.controller.DBManager;
import ec.edu.espe.hardwareStore.model.Items;
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
 * @author marce
 */
@Path("hardwareStore")
public class ItemsResource {

    DBManager dbManager = new DBManager();

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of HardwareStoreResource
     */
    public ItemsResource() {

    }

    /**
     * Retrieves representation of an instance of
     * ec.edu.espe.hardwareStore.webService.HardwareStoreResource
     *
     * @return an instance of ec.edu.espe.hardwareStore.model.HardwareStore
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Items> getAllHardwareStore() throws ParseException {
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
    public Items getOne(@PathParam("idItem") int idItem) {
        Gson gson = new Gson();

        dbManager.connection("edison19", "admin", "hardwareStore", "items");
        String hardwareStoreString = dbManager.findOne(idItem);
        Items hardwareStore = gson.fromJson(hardwareStoreString, Items.class);

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
    public String putJson(Items hardwareStoreNew, @PathParam("idItem") int idItem) {
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
    public String addHardwareStore(Items hardwareStore) {
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
        Items hardwareStore = new Items();

        dbManager.connection("edison19", "admin", "hardwareStore", "items");
        dbManager.delete(idItem);
     
        return "Deleted Id: " + idItem;
    }
}
