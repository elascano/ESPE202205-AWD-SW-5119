/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.anime.webservices;

import com.google.gson.Gson;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.anime.contoller.DBManager;
import ec.edu.espe.anime.model.Anime;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
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
@Path("anime")
public class animeResource {

    DBManager dbManager = DBManager.getInstance();
    @Context
    private UriInfo context;

    /**
     * Creates a new instance of animeResource
     */
    public animeResource() {
    }

    /**
     * Retrieves representation of an instance of ec.edu.espe.anime.webservices.animeResource
     * @return an instance of ec.edu.espe.anime.model.Anime
     */
    @GET
    @Path("{name}")
    @Produces(MediaType.APPLICATION_JSON)
    public Anime getAnime(@PathParam("name") String name) {
        String stringAnime = "";
        String collection = "Anime";
        MongoDatabase database; 
        Anime anime = new Anime();
        Gson gson = new Gson();
        
        database = dbManager.connection("edison19", "admin", "AWD5119");
        stringAnime = dbManager.find(collection, "name", name, database);
        anime = gson.fromJson(stringAnime, Anime.class);
        
        return anime; 
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() throws ParseException {
        String stringAnime = "";
        String collection = "Anime";
        MongoDatabase database; 
        
        database = dbManager.connection("edison19", "admin", "AWD5119");
        
        return dbManager.completeModel(collection, database); 
    }
    
    /**
     * PUT method for updating or creating an instance of animeResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Anime content) {
    }
}
