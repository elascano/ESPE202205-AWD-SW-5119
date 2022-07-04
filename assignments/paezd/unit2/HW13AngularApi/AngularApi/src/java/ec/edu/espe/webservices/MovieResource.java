/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.webservices;
import com.google.gson.Gson;
import ec.edu.espe.controller.MovieController;
import ec.edu.espe.model.Movie;
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

/**
 * REST Web Service
 *
 * @author USUARIO
 */
@Path("Movie")
public class MovieResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of MovieResource
     */
    public MovieResource() {
    }

    /**
     * Retrieves representation of an instance of
     * ec.edu.espe.webservices.MovieResource
     *
     * @param movie
     * @return an instance of java.lang.String
     */
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public Movie insertItem(Movie movie) {
        MovieController.insertDB(movie);
        return movie;
    }
    
    
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Movie getItem(@PathParam("id") int id) {
        return MovieController.getObjectDB(id);
    }
    
    @GET
    @Path("/all")
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Movie> getItems() {
        return MovieController.showDB();
    }
    
    @PUT
    @Path("/update/{id}")
    @Produces(MediaType.APPLICATION_JSON)
    @Consumes(MediaType.APPLICATION_JSON)
    public String putJson(@PathParam("id")int id,Movie content) {
        return MovieController.modifyDB(id, content);
    }
    
    @DELETE
    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    public String deleteItem(@PathParam("id")int id) {
        return MovieController.deleteDB(id);
    }

}
